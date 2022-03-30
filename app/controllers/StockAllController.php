<?php
use Symfony\Component\HttpFoundation\Request;

class StockAllController {
    protected $stock;
    protected $item;
    protected $request;
    public $table;

    public function __construct($table) {
        $this->stock = new StockModel;
        $this->table = $table;
        $this->stock->table = $table;
        $this->item = new ItemModel;
        $this->request =  Request::createFromGlobals();
    }

    public function index() {
        $data['page_title'] = strtoupper($this->table);
        $data['table'] = $this->table;
        $data['stock'] = $this->stock->getAll();
        view('stock_list', $data);
    }

    public function new() {
        $data['page_title'] = 'New Stock';
        view('stock_new_line', $data);
    }

    public function new_multi() {
        $data['page_title'] = 'New Stock Multi';
        view('stock_multi', $data);
    }

    // multiple list stock in out
    public function edit_item() {
        // echo "edit_item";exit;
        $data['page_title'] = 'Edit '.strtoupper($this->table);
        $data['table'] = $this->table;
        $data['item'] = uri(3);
        $data['stock'] = $this->stock->getAllTrxu(uri(3));
        view('stock_list', $data);
    }

    public function list_all() {
        $data['page_title'] = "STOCK ALL";
        $data['table'] = $this->table;
        $data['item'] = 'all';
        $data['stock'] = $this->stock->getAllTrxu();
        view('stock_list', $data);
    }

    public function edit() {
        $data['page_title'] = 'Edit '.strtoupper($this->table);
        $data['table'] = $this->table;
        $data['stock'] = $this->stock->getStock(uri(3));
        // print_r($data['stock']);exit;
        view('stock_edit', $data);
    }

    public function update() {
        $post = $this->request->request->all();
        print_r($post);exit;
        // $this->stock->table = $table;
        // echo $this->table;
        // edit current stock
        // $this->editStock($post['item_id'], $post['type']);
        $this->stock->where('stock_id', $post['stock_id'])->update($post);
        header('Location: ' . base_url() . $this->table);
    }

    public function save() {
        // $data['item_id'] = $this->request->request->get('item_id');
        $post = $this->request->request->all();
        // print_r($post);exit;
        $data = ['item_id' => $post['item_id'], 'desc' =>  $post['desc'] , 'user_id' => 1];
        !empty($post['rak']) ? $data['rak'] = $post['rak'] : '';
        $data['quantity'] = !empty($post['quantity_in']) ? $post['quantity_in'] : $post['quantity_out'];
        // print_r($data);exit;
        $this->stock->table = $post['table'];
        $this->stock->insertLatest($data);
        $this->stock->updateStock($data['item_id'], $post['table'],$data['quantity']);
        header('Location: ' . base_url() . 'home');
    }

    public function save_multi() {
        // $data['item_id'] = $this->request->request->get('item_id');
        $post = $this->request->request->all();
        print_r($post);exit;
        $data = ['item_id' => $post['item_id'], 'desc' =>  $post['desc'] , 'user_id' => 1];
        !empty($post['rak']) ? $data['rak'] = $post['rak'] : '';
        $data['quantity'] = !empty($post['quantity_in']) ? $post['quantity_in'] : $post['quantity_out'];
        // print_r($data);exit;
        $this->stock->table = $post['table'];
        $this->stock->insertLatest($data);
        $this->stock->updateStock($data['item_id'], $post['table'],$data['quantity']);
        header('Location: ' . base_url() . 'home');
    }
    
    public function table() {
        echo $this->stock->table;
    }
}
