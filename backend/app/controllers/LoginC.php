<?php


class LoginC extends Controller
{
    public function __construct()
    {
        $this->log = $this->model("LoginM");
    }


    
    

    public function check()
    {
        $data = json_decode(file_get_contents("php://input"));
        
        if($d = $this->log->check($data))
        {
            $token = $this->generateToken();
            // die(var_dump($token));
            echo json_encode(["success",$d,"token" => $token]);
        }else
        {
            echo json_encode("failure");
        }


    }
   
}
