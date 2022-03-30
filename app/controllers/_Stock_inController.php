<?php
use Symfony\Component\HttpFoundation\Request;

class Stock_inController {
    protected $stock;
    protected $item;
    protected $request;
    public $table;
    public $stock_table;

    public function __construct($table) {
        // parent::__construct();
        $this->stock = new StockModel;
        $this->stock->table = $table;
        $this->stock_table = $table;
        $this->item = new ItemModel;
        $this->request =  Request::createFromGlobals();
    }

    public function index() {
        $data['page_title'] = 'Stock';
        $data['table'] = $this->stock->table;
        $data['stock'] = $this->stock->getAll($this->table);
        // print_r($data['stock']);exit;
        view('list_stock', $data);
    }

    public function edit() {
        $data['page_title'] = 'Edit Stock';
        $data['table'] = $this->stock->table;
        $data['stock'] = $this->stock->getStock(uri(3));
        // print_r($data['stock']);exit;
        view('edit_stock', $data);
    }

    public function table_list() {
        echo $this->stock->table;
        // echo $this->table;
        // echo $this->stock_table;
        $data['stock'] = $this->stock->getStock(2);
        print_r($data);
        // return $data;
    }

}
