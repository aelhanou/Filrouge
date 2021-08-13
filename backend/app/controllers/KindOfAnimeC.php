<?php


class KindOfAnimeC extends Controller
{
    public function __construct()
    {
        $this->KindOfA = $this->model("KindOfAnimeM");
    }


    public function read()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $data = json_decode(file_get_contents("php://input"));

            // $headers = apache_request_headers();

            // $headers = $headers['authorization'] ? explode(" ", $headers['authorization']) : '';

            // if (count($headers) == 1) {
            //     echo json_encode(["response" => "redirect"]);
            // } else {
                if ($d = $this->KindOfA->read())
                    echo json_encode($d,JSON_INVALID_UTF8_IGNORE);
            // }
        }
    }
    // public function readAll()
    // {

    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $data = json_decode(file_get_contents("php://input"));

    //         // $headers = apache_request_headers();

    //         // $headers = $headers['authorization'] ? explode(" ", $headers['authorization']) : '';

    //         // if (count($headers) == 1) {
    //         //     echo json_encode(["response" => "redirect"]);
    //         // } else {
    //             if ($this->KindOfA->readAll($data))
    //                 echo json_encode($this->KindOfA->readAll($data));
    //         // }
    //     }
    // }
    
    // public function read_single()
    // {
    //     $data = json_decode(file_get_contents("php://input"));
    //     // die(var_dump($data));
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         if ($this->KindOfA->read_single($data))
    //             echo json_encode($this->KindOfA->read_single($data));
    //     }
    // }

    // public function checkTime()
    // {
    //     $data = json_decode(file_get_contents("php://input"));
    //     if ($this->KindOfA->checkTime($data)) {
    //         echo json_encode($this->KindOfA->checkTime($data));
    //     }
    // }
    public function insert()
    {

        $data = json_decode(file_get_contents("php://input"));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->KindOfA->insert($data)) {
                echo json_encode(["Success", "Created Successfully"]);
            }
        }
    }

    public function delete()
    {
        $data = json_decode(file_get_contents("php://input"));
        if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
            if ($this->KindOfA->delete($data)) {
                echo json_encode(['Success' => 'deleted Successfully']);
            }
        }
    }


    public function update()
    {
        $data = json_decode(file_get_contents("php://input"));

        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            if ($this->KindOfA->update($data)) {
                echo json_encode(['Success' => 'data has updated']);
            }
        }
        // } else {
        //     echo json_encode("exist");
        // }
    }
}
