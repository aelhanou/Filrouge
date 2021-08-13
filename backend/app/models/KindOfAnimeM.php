<?php


class KindOfAnimeM
{

    public $table = "kindofanime";
    public $conn;
    public function __construct()
    {
        $this->conn = new Database();
    }


    public function read()
    {
        $query = "SELECT * FROM `$this->table`";
        $this->conn->query($query);
        

        return $this->conn->resultSet();;
    }
    // public function readAll($data)
    // {
    //     $query = "SELECT * FROM `$this->table` WHERE reference_id =:Ref";
    //     $this->conn->query($query);
    //     $this->conn->bind(":Ref",$data->Ref);
    //     $stm = $this->conn->resultSet();

    //     return $stm;
    // }
    // public function read_single($data)
    // {
    //     $query = "SELECT * FROM `$this->table` WHERE id=:id";
    //     $stmt = $this->conn->query($query);

    //     $this->conn->bind(":id", $data->id);

    //     $stm = $this->conn->single();

    //     return $stm;
    // }

  
    public function insert($data)
    {
        $query = "INSERT INTO `$this->table`(genreOfAnime) VALUES(:genreOfAnime)";
        $this->conn->query($query);
        $this->conn->bind(":genreOfAnime", $data->genreOfAnime);
        
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
        $query = "UPDATE `$this->table` SET genreOfAnime=:genreOfAnime WHERE id=:id";
        $this->conn->query($query);

        $this->conn->bind(":id", $data->id);
        $this->conn->bind(":genreOfAnime", "$data->genreOfAnime");

        // $this->conn->bind(":reference_id",$data->reference_id);

        if ($this->conn->execute())
            return true;
        return false;
    }
}
