<?php


class ContactUsM
{

    public $table = "contactus";
    public $conn;
    public function __construct()
    {
        $this->conn = new Database();
    }



 
    public function readAll()
    {        
        $this->conn->query("SELECT * FROM `$this->table` ");
        return $this->conn->resultSet(); 
    }

    public function insert($data)
    {
        $query = "INSERT INTO `$this->table` (fullname,email,message) VALUES(:fullname,:email,:message)";
        $this->conn->query($query);
        $this->conn->bind(":fullname", $data->fullname);
        $this->conn->bind(":email", $data->email);
        $this->conn->bind(":message", $data->message);
        
        if ($this->conn->execute())
            return true;
        return false;
    }

    public function delete($data)
    {
        $query = "DELETE  FROM `$this->table` WHERE id = :id ";
        $this->conn->query($query);

        $this->conn->bind(":id", $data->id);

        if ($this->conn->execute())
            return true;
        return false;
    }

    public function update($data)
    {
        $query = "UPDATE `$this->table` SET title=:title,genre=:genre,Created_at=:Created_at WHERE id=:id";
        $this->conn->query($query);

        $this->conn->bind(":id", $data->id);
        $this->conn->bind(":title", "$data->title");
        $this->conn->bind(":genre", "$data->genre");
        $this->conn->bind(":Created_at", "$data->Created_at");

        // $this->conn->bind(":reference_id",$data->reference_id);

        if ($this->conn->execute())
            return true;
        return false;
    }
}
