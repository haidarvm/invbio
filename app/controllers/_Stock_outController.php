<?php
use Symfony\Component\HttpFoundation\Request;

class Stock_outController {
    protected $stock;
    protected $item;
    protected $request;

    public function __construct() {
        $this->stock = new StockModel;
        $this->stock->table = "stock_out";
        $this->item = new ItemModel;
        $this->request =  Request::createFromGlobals();
    }

    public function index() {
        $data['page_title'] = 'Stock Out';
        $data['table'] = $this->stock->table;
        $data['stock'] = $this->stock->getAll("stock_out");
        // print_r($data['stock']);exit;
        Basic::view('list_stock', $data);
    }

    public function edit() {
        $stock_id = Basic::segment(3);
    }

    public function table() {
        echo $this->stock->table;
    }

}
