<?php


class RegisterC extends Controller
{
    public function __construct()
    {
        $this->reg = $this->model("RegisterM");
    }


    public function getAllUsers()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $data = json_decode(file_get_contents("php://input"));

            // $headers = apache_request_headers();

            // $headers = $headers['authorization'] ? explode(" ", $headers['authorization']) : '';

            // if (count($headers) == 1) {
            //     echo json_encode(["response" => "redirect"]);
            // } else {
                if ($d = $this->reg->getAllUsers($data))
                    echo json_encode($d,JSON_INVALID_UTF8_IGNORE);
            // }
        }
    }
    public function read()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = json_decode(file_get_contents("php://input"));

            // $headers = apache_request_headers();

            // $headers = $headers['authorization'] ? explode(" ", $headers['authorization']) : '';

            // if (count($headers) == 1) {
            //     echo json_encode(["response" => "redirect"]);
            // } else {
                if ($d = $this->reg->read($data))
                    echo json_encode($d,JSON_INVALID_UTF8_IGNORE);
            // }
        }
    }

    
    public function insert()
    {

        $data = json_decode(file_get_contents("php://input"));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->reg->insert($data)) {
                echo json_encode(["Success", "Created Successfully"]);
            }
        }
    }
    public function UpdateImageProfile()
    {

        $data = json_decode(file_get_contents("php://input"));

        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            if ($this->reg->UpdateImageProfile($data)) {
                echo json_encode(["Success", "Created Successfully"]);
            }
        }
    }


    public function InsertImageProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = json_decode(file_get_contents("php://input"));

            if ($d = $this->reg->InsertImageProfile($data))
                    echo json_encode($d);
        }   
    }

    public function readImageProfile()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = json_decode(file_get_contents("php://input"));

            // $headers = apache_request_headers();

            // $headers = $headers['authorization'] ? explode(" ", $headers['authorization']) : '';

            // if (count($headers) == 1) {
            //     echo json_encode(["response" => "redirect"]);
            // } else {
                if ($d = $this->reg->readImageProfile($data))
                {
                        echo json_encode($d);  
                }
                else{
                    echo json_encode(["image"=>"empty"]);
                }

            // }
        }
    }

    public function getIdImage()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = json_decode(file_get_contents("php://input"));

            // $headers = apache_request_headers();

            // $headers = $headers['authorization'] ? explode(" ", $headers['authorization']) : '';

            // if (count($headers) == 1) {
            //     echo json_encode(["response" => "redirect"]);
            // } else {

                if ($d = $this->reg->getIdImage($data))
                    echo json_encode($d,JSON_INVALID_UTF8_IGNORE);
            // }
        }
    }


    public function edit()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            $data = json_decode(file_get_contents("php://input"));

            // $headers = apache_request_headers();

            // $headers = $headers['authorization'] ? explode(" ", $headers['authorization']) : '';

            // if (count($headers) == 1) {
            //     echo json_encode(["response" => "redirect"]);
            // } else {

                if ($d = $this->reg->edit($data))
                    echo json_encode($d,JSON_INVALID_UTF8_IGNORE);
            // }
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            $data = json_decode(file_get_contents("php://input"));

            // $headers = apache_request_headers();

            // $headers = $headers['authorization'] ? explode(" ", $headers['authorization']) : '';

            // if (count($headers) == 1) {
            //     echo json_encode(["response" => "redirect"]);
            // } else {

            // die(var_dump($data));
                if ($d = $this->reg->update($data))
                    echo json_encode($d,JSON_INVALID_UTF8_IGNORE);
            // }
        }
    }

    
}
