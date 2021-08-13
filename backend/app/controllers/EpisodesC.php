<?php


class EpisodesC extends Controller
{
    public function __construct()
    {
        $this->Episodes = $this->model("EpisodesM");
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

                if ($d = $this->Episodes->read())
                    echo json_encode($d);
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
    //             if ($this->Episodes->readAll($data))
    //                 echo json_encode($this->Episodes->readAll($data));
    //         // }
    //     }
    // }
    
    public function read_sing()
    {
        $data = json_decode(file_get_contents("php://input"));
        // die(var_dump($data));
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($d = $this->Episodes->read_sing($data))
                echo json_encode($d);
        }
    }

    public function read_sin()
    {
        $data = json_decode(file_get_contents("php://input"));
        // die(var_dump($data));
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($d = $this->Episodes->read_sin($data))
                echo json_encode($d);
        }
    }
    public function readEpisodesWithImage()
    {
        $data = json_decode(file_get_contents("php://input"));
        // die(var_dump($data));
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($d = $this->Episodes->readEpisodesWithImage($data))
                echo json_encode($d);
        }
    }
    public function read_single()
    {
        $data = json_decode(file_get_contents("php://input"));
        // die(var_dump($data));
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($d = $this->Episodes->read_single($data))
                echo json_encode($d);
        }
    }

    public function read_s()
    {
        $data = json_decode(file_get_contents("php://input"));
        // die(var_dump($data));
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($d = $this->Episodes->read_s($data))
                echo json_encode($d);
        }
    }
    // public function checkTime()
    // {
    //     $data = json_decode(file_get_contents("php://input"));
    //     if ($this->Episodes->checkTime($data)) {
    //         echo json_encode($this->Episodes->checkTime($data));
    //     }
    // }
    public function insert()
    {

        $data = json_decode(file_get_contents("php://input"));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->Episodes->insert($data)) {
                echo json_encode(["Success", "Created Successfully"]);
            }
        }
    }

    public function delete()
    {
        $data = json_decode(file_get_contents("php://input"));
        if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
            if ($this->Episodes->delete($data)) {
                echo json_encode(['Success' => 'deleted Successfully']);
            }
        }
    }


    public function update()
    {
        $data = json_decode(file_get_contents("php://input"));

        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            if ($this->Episodes->update($data)) {
                echo json_encode(['Success' => 'data has updated']);
            }
        }
        // } else {
        //     echo json_encode("exist");
        // }
    }
}
