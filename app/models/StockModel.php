<?php

class StockModel extends Db  {
    public $table;

    protected $primaryKey = 'stock_id';

    public $timestamps = false;

    public function __construct() {
        $this->table = "stock";
    }

    public function getAll($item_id=null, $category=null, $date_start=null, $date_end=null) {
        $data = $this->select('item_name', 'i.item_id', 'item_code', 'category_name','stock_id', 'quantity', 'unit', $this->table.'.created_at', $this->table.'.updated_at')
        // ->from($this->table)
        ->leftJoin('item AS i', 'i.item_id', '=', $this->table.'.item_id')
        ->leftJoin('category AS c', 'c.category_id', '=', 'i.category_id');
        $this->table == 'stock_in' ? $data->addSelect($this->table.".location") : '';
        !empty($item_id) ? $data->where($this->table.'.item_id', $item_id) : "";
        !empty($date_start) ? $data->whereDate($this->table.'.created_at', '>=', $date_start) : '';
        !empty($date_end) ? $data->whereDate($this->table.'.created_at', '<=', $date_end) : '';
        // echo $item_id;exit;
        return $data->orderByDesc($this->table.'.created_at')->get();
    }

    public function getAllTrxu($item_id=null, $category=null,$date_start=null, $date_end=null) {
        $data = $this->select('item_name', 'i.item_id', 'item_code', 'category_name','stock_id', $this->raw("'in' as status"), 'quantity', 'unit','in.created_at')
        ->leftJoin('item AS i', 'i.item_id', '=', 'in.item_id')
        ->leftJoin('category AS c', 'c.category_id', '=', 'i.category_id');
        $stock_in = $data->from("stock_in AS in");
        !empty($item_id) ? $stock_in->where('in.item_id', $item_id) : "";
        $stock_out = $this->select('item_name', 'i.item_id', 'item_code', 'category_name','stock_id', $this->raw("'out' as status"),'quantity', 'unit','out.created_at')
        ->leftJoin('item AS i', 'i.item_id', '=', 'out.item_id')
        ->leftJoin('category AS c', 'c.category_id', '=', 'i.category_id')->from('stock_out as out')->union($stock_in);
        !empty($item_id) ? $stock_out->where('out.item_id', $item_id) : "";
        return $stock_out->get();
    }

    public function getAllTrx($item_id=null, $category=null, $date_start=null, $date_end=null) {
        $data = $this->select('item_name', 'i.item_id', 'item_code', 'category_name',$this->raw(DB_PREFIX.'in.stock_id as stock_id_in'), $this->raw(DB_PREFIX.'out.stock_id as stock_id_out') , $this->raw(DB_PREFIX.'in.quantity as quantity_in'), $this->raw(DB_PREFIX.'out.quantity as quantity_out') ,'in.created_at')
        ->from("stock_in AS in")
        ->leftJoin('item AS i', 'i.item_id', '=', 'in.item_id')
        ->leftJoin("stock_out AS out", 'in.item_id', '=', 'out.item_id')
        ->leftJoin('category AS c', 'c.category_id', '=', 'i.category_id');
        $this->table == 'stock_in' ? $data->addSelect($this->table.".location") : '';
        !empty($item_id) ? $data->where('in.item_id', $item_id) : "";
        // echo $item_id;exit;
        return $data->orderByDesc('in.created_at')->get();
    }

    public function getStock($stock_id) {
        return $this->where("stock_id", $stock_id)
        ->leftJoin('item AS i', 'i.item_id', '=', $this->table.'.item_id')->first();
    }

    public function insertLatest($data) {
        // echo $this->table;exit;
        // print_r($data);exit;
       return $this->insertGetId($data);
    }

    public function checkItem($item_id) {
        return $this->where("item_id", $item_id)->first();
    }

    public function insertNewItem($data){
        return $this->insertGetId($data);
    }

    // IF edit stock in / out than update current stock
    public function editStock($item_id, $type, $old_quantity, $new_quantity) {
        // if edit stock in = decrement old value than increment new value
        $this->table = "stock";
        // echo $this->table.' ';
        $item = ['item_id' => $item_id];
        $this->where($item)->decrement('quantity', $old_quantity);
        $type == "stock_in" ? $this->where($item)->increment('quantity', $new_quantity) : $this->where($item)->decrement('quantity', $new_quantity);
        // if edit stock out = decrement old value than decrement new value
    }
    
    // update stock after insert new stock
    public function updateStock($item_id, $type, $quantity) {
        $this->table = "stock";
        $item = ['item_id' => $item_id];
        // print_r($this->checkItem($item_id));exit;
        $check = $this->checkItem($item_id);
        // print_r($check->item_id);exit;
        if(empty($check->item_id)) {
            // $quantity = $type == 'stock_in' ? $quantity : -$quantity;
            $data = ['item_id' => $item_id, 'quantity' => 0];
            $this->insertNewItem($data);
        } 
        // return $this->where($item)->increment('quantity', $quantity);
        return $type == 'stock_in' ? $this->where($item)->increment('quantity', $quantity) : $this->where($item)->decrement('quantity', $quantity) ;
    }

    public function getTable() {
        return $this->table;
    }


}