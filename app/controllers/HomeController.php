<?php

class HomeController {
    protected $stock;
    protected $item;
    public function __construct() {
        $this->stock = new StockModel;
        $this->item = new ItemModel;
    }

    public function index() {
        $data['page_title'] = 'Inventory BioFarma Electrical';
        $data['stock'] = $this->stock->getAll();
        Basic::view('dashboard', $data);
    }
}
