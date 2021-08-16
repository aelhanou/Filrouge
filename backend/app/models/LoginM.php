<?php


class LoginM
{

    public $table = "register";
    public $conn;
    public function __construct()
    {
        $this->conn = new Database();
    }


    
				 
    public function check($data)
    {
          

        $query = "SELECT id,email,password FROM register WHERE email=:email AND password=:password";
        $stmt = $this->conn->query($query);

        
        $this->conn->bind(":email", $data->email);
        $this->conn->bind(":password", $data->password);
        $stm = $this->conn->single();
        $st = $this->conn->rowCount();
      
        if ($st > 0)
            return $stm;
        return false;
    }

    
}
