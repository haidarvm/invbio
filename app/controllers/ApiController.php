<?php
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ApiController {
    protected $stock;
    protected $product;
    protected $request;

    public function __construct() {
        $this->stock = new StockModel;
        $this->item = new ItemModel;
        $this->request =  Request::createFromGlobals();
    }

    public function index() {
        $data = $this->stock->getAll();
        $response = new JsonResponse([$data]);
        return $response->send();
    }

    public function raw() {
        $raw = json_decode($this->request->getContent(), true);
        if(!empty($raw)) {
            // print_r($raw);
            $headers = $this->request->headers->all();
            // $this->post->headers = json_encode($headers); 
            $this->post->body = json_encode($raw);
            $this->post->insert();
            $raw['message'] = "success";
        } else {
            $raw['message'] = 'empty';
        }
        $response = new JsonResponse($raw);
        return $response->send();
    }

    public function hello() {
        $response = new JsonResponse(['Hello' => 'World']);
        return $response->send();
    }

    public function search() {
        $search = $this->request->get("search");
        echo $search;
    }

    public function seg() {
        $param1 = Basic::segment(3);
        echo $param1;
    }

    // get from Auto complete js 
    public function auto_item() {
        $search = !empty($this->request->get("search")) ? $this->request->get("search") : '';
        $item = $this->item->getAll($search);
        $response = new JsonResponse($item);
        return $response->send();
    }
}
