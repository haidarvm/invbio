<?php

class HomeController {
    protected $stock;
    protected $item;
    public function __construct() {
        $this->stock = new StockModel;
        $this->item = new ItemModel;
    }

    public function index() {
        $page_title = 'Inventory BioFarma Electrical';
        $stock = $this->stock->getAll();
        $data =  compact('stock', 'page_title');
        Basic::view('dashboard', $data);
    }
}
