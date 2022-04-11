<?php

class HomeController extends Admin {
    protected $stock;
    protected $item;
    public $table;

    public function __construct() {
        parent::__construct();
        $this->stockc = new StockAllController('stock');
        $this->stock = new StockModel;
        $this->table = "stock";
        $this->stock->table = "stock";
        $this->item = new ItemModel;
    }

    public function index() {
        return $this->stockc->index();
    }

    public function new() {
        $data['page_title'] = 'New Stock';
        view('stock_new_line', $data);
    }
}
