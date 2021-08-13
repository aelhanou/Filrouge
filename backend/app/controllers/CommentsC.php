<?php


class CommentsC extends Controller
{
    public function __construct()
    {
        $this->comment = $this->model("CommentsM");
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
                if ($d = $this->comment->read())
                    echo json_encode($d);
            // }
        }
    }

    public function read_Single()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = json_decode(file_get_contents("php://input"));

            // $headers = apache_request_headers();

            // $headers = $headers['authorization'] ? explode(" ", $headers['authorization']) : '';

            // if (count($headers) == 1) {
            //     echo json_encode(["response" => "redirect"]);
            // } else {
                if ($d = $this->comment->read_Single($data))
                    echo json_encode($d);
            // }
        }
    }
    public function readComments()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = json_decode(file_get_contents("php://input"));

            // $headers = apache_request_headers();

            // $headers = $headers['authorization'] ? explode(" ", $headers['authorization']) : '';

            // if (count($headers) == 1) {
            //     echo json_encode(["response" => "redirect"]);
            // } else {
                if ($d = $this->comment->readComments($data))
                {

                    echo !empty($d) ?  json_encode($d) : json_encode(["status" => "empty"]);
                    
                    
                }
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
    //             if ($this->comment->readAll($data))
    //                 echo json_encode($this->comment->readAll($data));
    //         // }
    //     }
    // }
    
    // public function read_single()
    // {
    //     $data = json_decode(file_get_contents("php://input"));
    //     // die(var_dump($data));
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         if ($this->comment->read_single($data))
    //             echo json_encode($this->comment->read_single($data));
    //     }
    // }

    // public function checkTime()
    // {
    //     $data = json_decode(file_get_contents("php://input"));
    //     if ($this->comment->checkTime($data)) {
    //         echo json_encode($this->comment->checkTime($data));
    //     }
    // }
    public function insert()
    {

        $data = json_decode(file_get_contents("php://input"));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->comment->insert($data)) {
                echo json_encode(["Success", "Created Successfully"]);
            }
        }
    }

    public function delete()
    {
        $data = json_decode(file_get_contents("php://input"));
        if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
            if ($this->comment->delete($data)) {
                echo json_encode(['Success' => 'deleted Successfully']);
            }
        }
    }


    public function update()
    {
        $data = json_decode(file_get_contents("php://input"));

        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            if ($this->comment->update($data)) {
                echo json_encode(['Success' => 'data has updated']);
            }
        }
        // } else {
        //     echo json_encode("exist");
        // }
    }
}
