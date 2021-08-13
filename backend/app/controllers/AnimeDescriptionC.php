<?php


class AnimeDescriptionC extends Controller
{
    public function __construct()
    {
        $this->Adescription = $this->model("AnimeDescriptionM");
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
                if ($this->Adescription->read())
                    echo json_encode($this->Adescription->read());
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
    //             if ($this->Adescription->readAll($data))
    //                 echo json_encode($this->Adescription->readAll($data));
    //         // }
    //     }
    // }
    
    // public function read_single()
    // {
    //     $data = json_decode(file_get_contents("php://input"));
    //     // die(var_dump($data));
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         if ($this->Adescription->read_single($data))
    //             echo json_encode($this->Adescription->read_single($data));
    //     }
    // }

    // public function checkTime()
    // {
    //     $data = json_decode(file_get_contents("php://input"));
    //     if ($this->Adescription->checkTime($data)) {
    //         echo json_encode($this->Adescription->checkTime($data));
    //     }
    // }
    public function insert()
    {

        $data = json_decode(file_get_contents("php://input"));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->Adescription->insert($data)) {
                echo json_encode(["Success", "Created Successfully"]);
            }
        }
    }

    public function delete()
    {
        $data = json_decode(file_get_contents("php://input"));
        if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
            if ($this->Adescription->delete($data)) {
                echo json_encode(['Success' => 'deleted Successfully']);
            }
        }
    }


    public function update()
    {
        $data = json_decode(file_get_contents("php://input"));

        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            if ($this->Adescription->update($data)) {
                echo json_encode(['Success' => 'data has updated']);
            }
        }
        // } else {
        //     echo json_encode("exist");
        // }
    }
}
