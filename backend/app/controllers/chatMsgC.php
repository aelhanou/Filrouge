<?php


class chatMsgC extends Controller
{
    public function __construct()
    {
        $this->chatmsg = $this->model("chatMsgM");
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
        
                if($d = $this->chatmsg->read($data))
                {
                    echo json_encode(["error"=>"not empty","msg" => $d]);
                }
                else
                {
                    echo json_encode(["error"=>"empty"]);
                }
            
            // }
        }
    }
    
    public function insert()
    {

        $data = json_decode(file_get_contents("php://input"));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->chatmsg->insert($data)) {
                echo json_encode(["Success", "Created Successfully"]);
            }
        }
    }

    public function delete()
    {
        $data = json_decode(file_get_contents("php://input"));
        if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
            if ($this->chatmsg->delete($data)) {
                echo json_encode(['Success' => 'deleted Successfully']);
            }
        }
    }


    public function update()
    {
        $data = json_decode(file_get_contents("php://input"));

        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            if ($this->chatmsg->update($data)) {
                echo json_encode(['Success' => 'data has updated']);
            }
        }
        // } else {
        //     echo json_encode("exist");
        // }
    }
}
