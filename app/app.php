<?php

/*
|--------------------------------------------------------------------------
| Configuration - Constants and Variables
|--------------------------------------------------------------------------
*/
define('URL_PROTOCOL', '//');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
// define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN .'/');

define('DB_NAME', 'invbio'); // Sample database name
define('DB_USER', 'root'); // Sample database username
define('DB_PASS', 'Bismillah'); // Sample database password
define('DB_PREFIX', 'invbio_'); // Sample database password

define('PASS_PHRASE', 'https://open-nis.org/api/encryption'); // Passphrase or KEK API URL
define('AUTH_TOKEN', 'encv1.VWZUSXNEUVdQVmlPbnVVTVRDZkxibC9aM3YwT21raVhpdXRBNGZoR1dsUjllUT09.iJPEzvBUYueIhg0c8VD5Ag==.a1ycb+X3teBNAlAjQAQe/w=='); // Authorization Bearer token

/*
|--------------------------------------------------------------------------
| Load BasicPHP Class Library
|--------------------------------------------------------------------------
*/


require_once __DIR__ . '/../Basic.php';
require_once __DIR__ . '/functions.php';


/*
|--------------------------------------------------------------------------
| Middleware
|--------------------------------------------------------------------------
*/

Basic::capsulate();

Basic::setErrorReporting(); // Error reporting
// Basic::setJsonBodyAsPOST(); // JSON as $_POST
// Basic::setFirewall(); // Enable firewall
// Basic::setHttps(); // Require TLS/HTTPS

// setcookie('token', Basic::encrypt('{"username":"user","role":"admin"}', PASS_PHRASE), NULL, NULL, NULL, NULL, TRUE); // Sample token
// var_dump(json_decode(Basic::decrypt($_COOKIE['token'], PASS_PHRASE), TRUE));

Basic::setAutoloadClass(['classes', 'models', 'views', 'controllers']); // Autoload folders
Basic::setAutoRoute(); // Automatic '/class/method' routing


/*
|--------------------------------------------------------------------------
| Endpoint Routes
|--------------------------------------------------------------------------
*/

Basic::route('GET', '/', function()  { // Set homepage
    // echo base_url_no();
    header('Location: ' . base_url() . 'home');
    // $page_title = 'Dashboard';
    // Basic::view('home', compact('page_title'));
});

Basic::route('GET', '/chart', function()  { // Set homepage
    $chart = new ChartAllController("stock");
    $chart->index();
});

Basic::route('GET', '/chart/stock', function()  { // Set homepage
    $chart = new ChartAllController("stock");
    $chart->index();
});

Basic::route('GET', '/chart/stock_in', function()  { // Set homepage
    $chart = new ChartAllController("stock_in");
    $chart->index();
});

Basic::route('GET', '/chart/stock_out', function()  { // Set homepage
    $chart = new ChartAllController("stock_out");
    $chart->index();
});

Basic::route('GET', '/chart_all', function()  { // Set homepage
    $chart = new ChartAllController("stock");
    $chart->list_all();
});



Basic::route('GET', '/stock', function()  { // Set homepage
    $stock = new StockAllController("stock");
    $stock->index();
});

Basic::route('GET', '/stock_all', function()  { // Set homepage
    $stock = new StockAllController("stock");
    $stock->list_all();
});

Basic::route('GET', '/stock/new', function()  { // Set homepage
    $stock = new StockAllController("stock");
    $stock->new();
});

Basic::route('GET', '/stock/new_multi', function()  { // Set homepage
    $stock = new StockAllController("stock");
    $stock->new_multi();
});

Basic::route('POST', '/stock/save', function()  { // Set homepage
    $stock = new StockAllController("stock");
    $stock->save();
});

Basic::route('POST', '/stock/save_multi', function()  { // Set homepage
    $stock = new StockAllController("stock");
    $stock->save_multi();
});

Basic::route('GET', '/stock_in', function()  { // Set homepage
    $stock = new StockAllController("stock_in");
    $stock->index();
});

Basic::route('GET', '/stock_out', function()  { // Set homepage
    $stock = new StockAllController("stock_out");
    $stock->index();
});

Basic::route('GET', '/stock/edit/(:any)', function()  { // Set homepage
    $stock = new StockAllController("stock");
    $stock->edit_item(uri(3));
});

Basic::route('GET', '/stock_in/edit/(:num)', function()  { // Set homepage
    $stock = new StockAllController("stock_in");
    $stock->edit();
});

Basic::route('GET', '/stock_out/edit/(:num)', function()  { // Set homepage
    $stock = new StockAllController("stock_out");
    $stock->edit();
});

Basic::route('POST', '/stock/update/(:any)', function()  { // Set homepage
    $stock = new StockAllController(uri(3));
    $stock->update();
});

Basic::route('GET', '/logout', function()  { // Set homepage
    $auth = new AuthController;
    $auth->logout();
});

Basic::route('ANY', '/jsonrpc', function() {
    Basic::setJsonRpc(); // JSON-RPC endpoint
});

Basic::route('ANY', '/httprpc', function() {
    Basic::setHttpRpc(); // RPC over HTTP
});

Basic::route('GET', '/posts', function() {
    if (! isset($_GET['order'])) $_GET['order'] = 0;

    if (! is_numeric($_GET['order'])) {
        $error_message = 'Post order value should be numeric.';
        $page_title = 'Error in order parameter';

        $data = compact('error_message', 'page_title');
        Basic::view('error', $data);
    }
    if (isset($_GET['order']) && $_GET['order'] < 0) $_GET['order'] = 0;

    $per_page = 3;
    $order = intval($_GET['order']);

    $post = new PostModel;
    $stmt = $post->list( $per_page, $order );
    $total = $post->total();

    if (isset($_GET['order']) && $_GET['order'] > $total) $_GET['order'] = $total;

    $page_title = 'List of Posts';

    $data = compact('stmt', 'total', 'per_page', 'page_title');
    Basic::view('post_list', $data);
});

Basic::route('GET', '/posts/(:num)', function() {
    $post = new PostModel;
    $row = $post->view(Basic::segment(2));

    if ($row) {
        $page_title = 'View Post';

        $data = compact('row', 'page_title');
        Basic::view('post_view', $data);
    } else {
        $error_message = 'The Post ID does not exist.';
        $page_title = 'Error in Post ID';

        $data = compact('error_message', 'page_title');
        Basic::view('error', $data);
    }
});

Basic::route('POST', '/posts/(:num)', function() {
    if (isset($_POST['delete-post'])) {
        $post = new PostModel;
        $post->delete(Basic::segment(2));

        header('Location: ' . Basic::baseUrl() . 'posts');
        exit();
    }

    if (isset($_POST['goto-edit'])) {
        header('Location: ' . Basic::baseUrl() . 'posts/' . Basic::segment(2) . '/edit');
        exit();
    }
});

Basic::route('GET', '/posts/(:num)/edit', function() {
    $post = new PostModel;
    $row = $post->view( Basic::segment(2) );

    if ($row) {
        $page_title = 'Edit Post';

        $data = compact('row', 'page_title');
        Basic::view('post_edit', $data);
    } else {
        $error_message = "The Post ID does not exist.";
        $page_title = 'Error in Post ID';

        $data = compact('error_message', 'page_title');
        Basic::view('error', $data);
    }
});

Basic::route('POST', '/posts/(:num)/edit', function() {
    $post = new PostModel;

    if (isset($_POST['edit-post'])) {
        $post->edit(Basic::segment(2));

        header('Location: ' . Basic::baseUrl() . 'posts/' . Basic::segment(2));
        exit();
    }
});

Basic::route('POST', '/api/request', function() {
    // $data as an array of name and age
    $data = array();
    $data[] = ['name' => 'John', 'age' => 32];
    $data[] = ['name' => 'Peter', 'age' => 43];
    $data[] = ['name' => 'James', 'age' => 22];
    $data[] = ['name' => 'Samuel', 'age' => 28];
    $data[] = ['name' => 'Joseph', 'age' => 65];

    // Convert JSON POST body as an array
    $body = json_decode(file_get_contents("php://input"), TRUE);

    // Check Authorization Bearer token
    if ( $_SERVER['HTTP_AUTHORIZATION'] !== 'Bearer ' . AUTH_TOKEN ) Basic::apiResponse(403, 'You do not have the right credentials.');

    $data_output = array();
    foreach ($data as $row) {
        // Add to $data_output array if name contains search string
        if ( stristr($row['name'], $body['search']) == TRUE ) {
            // Change $data_output key names to hide database column names
            $data_output[] = ['name'=>$row['name'], 'age'=>$row['age']];
        }
    }

    if ( empty($data_output) ) Basic::apiResponse(400, 'No name found on search.');

    Basic::apiResponse(200, $data_output, 'application/json');
});

/*
|--------------------------------------------------------------------------
| Handle Error 404 - Page Not Found - Invalid URI
|--------------------------------------------------------------------------
*/

Basic::apiResponse(404); // Not Found
