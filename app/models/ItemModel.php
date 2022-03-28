<?php

class ItemModel extends Db  {
    protected $table = 'item';

    protected $primaryKey = 'item_id';
    protected $mcat;

    public $timestamps = false;

    public function getAll($search = null) {
        $data = $this->select('item_id', $this->raw("CONCAT(item_name, ' - ',item_code) as item_name" ), 'category_name' ) ;
        $data = $data->leftJoin('category AS c', 'c.category_id', '=', 'item.category_id');
        $data = !empty($search) ?  $data->where('item_name', 'like', '%' . $search . '%')->orWhere('item_code', 'like', '%' . $search . '%') : $data;
        return $data->get();
    }

    public function insertLatest($data) {
        $this->insertGetId($data);
    }
  
}