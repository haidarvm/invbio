<?php
use Symfony\Component\HttpFoundation\Request;

class StockAllController extends Admin{
    protected $stock;
    protected $item;
    protected $request;
    public $table;

    public function __construct($table) {
        parent::__construct();
        $this->stock = new StockModel;
        $this->table = $table;
        $this->stock->table = $table;
        $this->item = new ItemModel;
        $this->request =  Request::createFromGlobals();
    }

    public function index() {
        $get = $this->request->query->all();
        $item_id = checkValAr($get,'item_id');
        if (!empty($get['date_start'])) {
            $date_start = checkValAr($get,'date_start');
            $date_end = checkValAr($get,'date_end');
            $data['date_start'] = $date_start;
            $data['date_end'] = $date_end;
            $data['stock'] = $this->stock->getAll($item_id, '', toSqlDate($date_start), toSqlDate($date_end));
        } else {
            $data['stock'] = $this->stock->getAll($item_id);
        }
        $data['item_id'] = $item_id;
        $data['item'] = checkIf($this->item->getItem($item_id));
        $data['page_title'] = strtoupper($this->table);
        $data['table'] = $this->table;
        view('stock_list', $data);
    }

    public function new() {
        $data['page_title'] = 'Update Stock';
        view('stock_update', $data);
    }

    public function new_multi() {
        $data['page_title'] = 'Update Stock Multi';
        view('stock_multi', $data);
    }

    // multiple list stock in out
    public function edit_item() {
        $get = $this->request->query->all();
        if (!empty($get['date_start'])) {
            $date_start = $get['date_start'];
            $date_end = $get['date_end'];
            $data['date_start'] = $date_start;
            $data['date_end'] = $date_end;
            $data['stock'] = $this->stock->getAllTrxu(uri(3), '', toSqlDate($date_start), toSqlDate($date_end));
        } else {
            $data['stock'] = $this->stock->getAllTrxu(uri(3));
        }
        $data['page_title'] = 'Edit '.strtoupper($this->table);
        $data['table'] = $this->table;
        $data['item'] = uri(3);
        $data['column'] = '[0,1,2,3,4,5]';
        view('stock_list', $data);
    }

    public function list_all() {
        $get = $this->request->query->all();
        $item_id = checkValAr($get,'item_id');
        if (!empty($get['date_start'])) {
            $date_start = $get['date_start'];
            $date_end = $get['date_end'];
            $data['date_start'] = $date_start;
            $data['date_end'] = $date_end;
            $data['stock'] = $this->stock->getAllTrxu(uri(3), '', toSqlDate($date_start), toSqlDate($date_end));
        } else {
            $data['stock'] = $this->stock->getAllTrxu(uri(3));
        }
        $data['item_id'] = $item_id;
        $data['item'] = checkIf($this->item->getItem($item_id));
        $data['page_title'] = "STOCK ALL";
        $data['table'] = 'stock_all';
        $data['all'] = 'all';
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
        // print_r($post);exit;
        // $this->stock->table = $table;
        // echo $this->table;
        // edit current stock
        $this->stock->editStock($post['item_id'], $this->table, $post['old_quantity'], $post['quantity']);
        unset($post['old_quantity']);
        unset($post['item_id']);
        // echo $this->table;exit;
        $this->stock->table = uri(3);
        // echo $this->stock->table;exit;
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
