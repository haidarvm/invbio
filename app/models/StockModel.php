<?php

class StockModel extends Db  {
    protected $table = 'stock';

    protected $primaryKey = 'ID';
    protected $mcat;

    public $timestamps = false;

    public function getAll($category=null, $date=null) {
        $data = $this
        ->leftJoin('item AS i', 'i.item_id', '=', 'stock.item_id')
        ->leftJoin('category AS c', 'c.category_id', '=', 'i.category_id');
        return $data->orderByDesc('stock.created_at')->get();
    }

    public function insertLatest($data) {
       return $this->insertGetId($data);
    }
    
    // update data
}