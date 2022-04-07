<?php
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends PublicController {
    protected $stock;
    protected $product;
    protected $request;
    protected $response;

    public function __construct() {
        parent::__construct();
        $this->stock = new StockModel;
        $this->item = new ItemModel;
        $this->request =  Request::createFromGlobals();
        $this->response = new Response(
            'Content',
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );
    }

    public function index() {
        $data = $this->stock->getAll();
        $response = new JsonResponse([$data]);
        return $response->send();
    }

    public function raw() {
        $raw = json_decode($this->request->getContent(), true);
        if (!empty($raw)) {
            // print_r($raw);
            $headers = $this->request->headers->all();
            // $this->post->headers = json_encode($headers);
            $this->post->body = json_encode($raw);
            $this->post->insert();
            $raw['message'] = 'success';
        } else {
            $raw['message'] = 'empty';
        }
        $response = new JsonResponse($raw);
        return $response->send();
    }

    public function stock() {
        $this->stock->table  = !empty(uri(3)) ? uri(3) :  uri(2);
        $get = $this->request->query->all();
        // print_r($get);exit;
        // echo $this->stock->table;exit;
        if (!empty($get['date_start'])) {
            // echo 'ada';exit;
            $date_start = $get['date_start'];
            $date_end = $get['date_end'];
            $stock = $this->stock->getAllApi('',toSqlDate($date_start), toSqlDate($date_end));
        } else {
            $stock =  $this->stock->getAllApi();
        }
        $arrays = [];
        foreach($stock as  $row) {
            $arrays[] = [$row->dateunix, $row->quantity];
        }
        // print_r($arrays);exit;
        // $response = $this->response->setContent($arrays);
        $response = new JsonResponse($arrays);
        return $response->send();
    }

    public function hello() {
        $response = new JsonResponse(['Hello' => 'World']);
        return $response->send();
    }

    public function search() {
        $search = $this->request->get('search');
        echo $search;
    }

    public function seg() {
        $param1 = Basic::segment(3);
        echo $param1;
    }

    // get from Auto complete js
    public function auto_item() {
        $search = !empty($this->request->get('search')) ? $this->request->get('search') : '';
        $item = $this->item->getAll($search);
        $response = new JsonResponse($item);
        return $response->send();
    }
}
