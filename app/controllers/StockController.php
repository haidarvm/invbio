<?php
use Symfony\Component\HttpFoundation\Request;

class StockController {
    protected $stock;
    protected $item;
    protected $request;

    public function __construct() {
        $this->stock = new StockModel;
        $this->item = new ItemModel;
        $this->request =  Request::createFromGlobals();
    }

    public function index() {
        $page_title = 'Inventory BioFarma Electrical';
        $this->stock = new StockModel;
        Basic::view('stock', compact('page_title'));
    }

    public function save() {
        // $data['item_id'] = $this->request->request->get('item_id');
        // $data['stock'] =  $this->request->request->get('quantity');
        $post = $this->request->request->all();
        // print_r($post);exit;
        $data['item_id'] = $post['item_id'];
        $data['quantity'] = !empty($post['quantity_in']) ? $post['quantity_in'] : $post['quantity_out'];
        $id = $this->stock->insertLatest($data);
        // echo $id;
        // echo $item_id;
        header('Location: ' . base_url() . 'home');
    }

}
