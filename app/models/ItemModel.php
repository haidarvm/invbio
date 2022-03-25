<?php

class ItemModel extends Db  {
    protected $table = 'item';

    protected $primaryKey = 'item_id';
    protected $mcat;

    public $timestamps = false;

    public function getAll($search = null) {
        $data = $this->select('item_id', 'item_name', 'item_code') ;
        $data = !empty($search) ?  $data->where('item_name', 'like', '%' . $search . '%')->orWhere('item_code', 'like', '%' . $search . '%') : $data;
        return $data->get();
    }

    public function insertLatest($data) {
        $this->insertGetId($data);
    }
  
}