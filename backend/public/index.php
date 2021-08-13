<?php



require_once '../app/bootstrap.php';


$init = new Core();    
if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    http_response_code(202);
    die();
}


