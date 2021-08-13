<?php


require_once '../app/vendor/autoload.php';

use Firebase\JWT\JWT;


header('Access-Control-Allow-Origin: *');
header('Access-Control-Max-Age: 600');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE,OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json');
// header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

class Controller
{
    public $key = "zer0";
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';

        return new $model;
    }


    public function view($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die('View does not exist');
        }
    }

    public function generateToken()
    {

        $payload = array(
            "iss" => "localhost",
            "aud" => "localhost",
            "iat" => 1356999524,
            "nbf" => 1357000000,
            "name" => "azeddine"
        );

        $jwt = JWT::encode($payload, $this->key);
        return $jwt;

    }
    public function valid_token($token)
    {
        return JWT::decode($token, $this->key);
    }
}
