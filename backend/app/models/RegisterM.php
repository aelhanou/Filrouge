<?php


class RegisterM
{

    public $table = "register";
    public $conn;
    public function __construct()
    {
        $this->conn = new Database();
    }


    public function getAllUsers()
    {
        $query = "SELECT register.id, register.firstName,register.LastName,register.email,register.role,register.connected,imageprofile.image FROM `register` INNER JOIN imageprofile ON imageprofile.id_user = register.id";
        $this->conn->query($query);
        return $this->conn->resultSet();
    }

    public function read($data)
    {
        $query = "SELECT connected,role,firstName,LastName,email FROM `$this->table` WHERE id=:id";
        $this->conn->query($query);
        $this->conn->bind(":id", $data->id);

        return $this->conn->single();
    }

    public function insert($data)
    {
        $query = "INSERT INTO `$this->table`(firstName,LastName,email,password) VALUES(:firstName,:LastName,:email,:password)";
        $this->conn->query($query);
        $this->conn->bind(":firstName", $data->firstName);
        $this->conn->bind(":LastName", $data->LastName);
        $this->conn->bind(":email", $data->email);
        $this->conn->bind(":password", $data->password);

        if ($this->conn->execute())
            return true;
        return false;
    }

    public function InsertImageProfile($data)
    {
        $query = "INSERT INTO ImageProfile (image,id_user) VALUES(:image,:id_user)";
        $this->conn->query($query);
        $this->conn->bind(":image", $data->image);
        $this->conn->bind(":id_user", $data->id_user);

        if ($this->conn->execute())
            return true;
        return false;
    }

    public function UpdateImageProfile($data)
    {
        $query = "UPDATE ImageProfile SET image=:image  WHERE id_user=:id_user";
        $this->conn->query($query);
        $this->conn->bind(":image", $data->image);
        $this->conn->bind(":id_user", $data->id_user);

        if ($this->conn->execute())
            return true;
        return false;
    }
    public function readImageProfile($data)
    {
        $query = "SELECT image FROM ImageProfile  WHERE id_user=:id";
        $this->conn->query($query);
        $this->conn->bind(":id", $data->id_user);

        return $this->conn->single();
    }


    public function getIdImage($data)
    {
        $query = "SELECT id FROM ImageProfile  WHERE id_user=:id";
        $this->conn->query($query);
        $this->conn->bind(":id", $data->id_user);

        return $this->conn->single();
    }


    public function edit($data)
    {
        $query = "UPDATE `$this->table` SET firstName=:firstName,LastName=:LastName,email=:email WHERE id=:id";
        $this->conn->query($query);

        $this->conn->bind(":id", $data->id);
        $this->conn->bind(":firstName", $data->firstName);
        $this->conn->bind(":LastName", $data->LastName);
        $this->conn->bind(":email", $data->email);
        if ($this->conn->execute())
            return true;
        return false;
    }

    public function update($data)
    {
        $query = "UPDATE `$this->table` SET connected=:connected WHERE id=:id";
        $this->conn->query($query);

        $this->conn->bind(":id", $data->id);
        $this->conn->bind(":connected", $data->connected);
        if ($this->conn->execute())
            return true;
        return false;
    }
}
