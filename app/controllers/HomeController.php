<?php

class HomeController {
    protected $stock;
    protected $item;
    public $table;

    public function __construct() {
        $this->stock = new StockModel;
        $this->table = "stock";
        $this->stock->table = "stock";
        $this->item = new ItemModel;
    }

    public function index() {
        $data['page_title'] = 'Inventory BioFarma Electrical';
        $data['table'] = $this->table;
        $data['stock'] = $this->stock->getAll();
        view('stock_list', $data);
    }

    public function new() {
        $data['page_title'] = 'New Stock';
        view('stock_new_line', $data);
    }
}
