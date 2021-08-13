<?php


class AnimeC extends Controller
{
    public function __construct()
    {
        $this->anime = $this->model("AnimeM");
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
                if ($this->anime->read())
                    echo json_encode($this->anime->read());
            // }
        }
    }
    public function readAll()
    {

        // $d = $this->anime->readAll();

        
        // print_r(json_encode((object) $d));


        // print_r(  json_encode(
        //     ["data" => $this->anime->readAll()]
        //  , JSON_UNESCAPED_UNICODE)) ;

        print_r(json_encode( $this->anime->readAll(), JSON_INVALID_UTF8_IGNORE ));



        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // $headers = apache_request_headers();

            // $headers = $headers['authorization'] ? explode(" ", $headers['authorization']) : '';

            // if (count($headers) == 1) {
            //     echo json_encode(["response" => "redirect"]);
            // } else {

                
                // }

               
            // }
        // }
    }
    public function readA()
    {

        // $d = $this->anime->readAll();

        
        // print_r(json_encode((object) $d));
        $data = json_decode(file_get_contents("php://input"));


        // print_r(  json_encode(
        //     ["data" => $this->anime->readAll()]
        //  , JSON_UNESCAPED_UNICODE)) ;

        print_r(json_encode( $this->anime->readA($data), JSON_INVALID_UTF8_IGNORE ));



        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // $headers = apache_request_headers();

            // $headers = $headers['authorization'] ? explode(" ", $headers['authorization']) : '';

            // if (count($headers) == 1) {
            //     echo json_encode(["response" => "redirect"]);
            // } else {

                // die(print_r($this->anime->readAll()));
                // $d = [];
                // $i = 0;
                // while($i < count($this->anime->readAll()))
                // {
                //     echo json_encode($this->anime->readAll()[0]);
                //     echo json_encode($this->anime->readAll()[1]);
                //     echo json_encode($this->anime->readAll()[2]);
                //     $i++;
                // }

                // $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
                // print_r($this->anime->readAll());
                // echo json_encode();

                // die(print_r($this->anime->readAll()));
                    // echo json_encode();

                // echo count($this->anime->readAll());

                // die(var_dump($d));
                // if ()

                // die(var_dump($d));
                    
            // }
        // }
    }
    
    public function read_single()
    {
        $data = json_decode(file_get_contents("php://input"));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($d = $this->anime->read_single($data))
                echo json_encode($d, JSON_INVALID_UTF8_IGNORE);
        }
    }

    // public function checkTime()
    // {
    //     $data = json_decode(file_get_contents("php://input"));
    //     if ($this->anime->checkTime($data)) {
    //         echo json_encode($this->anime->checkTime($data));
    //     }
    // }
    public function insert()
    {

        $data = json_decode(file_get_contents("php://input"));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->anime->insert($data)) {
                echo json_encode(["Success", "Created Successfully"]);
            }
        }
    }

    public function delete()
    {
        $data = json_decode(file_get_contents("php://input"));
        if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
            if ($this->anime->delete($data)) {
                echo json_encode(['Success' => 'deleted Successfully']);
            }
        }
    }


    public function update()
    {
        $data = json_decode(file_get_contents("php://input"));

        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            if ($this->anime->update($data)) {
                echo json_encode(['Success' => 'data has updated']);
            }
        }
        // } else {
        //     echo json_encode("exist");
        // }
    }
}
