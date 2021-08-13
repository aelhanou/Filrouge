<?php


class EpisodesM
{

    public $table = "episodes";
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
    public function readEpisodesWithImage($data)
    {
        $query = "SELECT episodes.id,episodes.Episodes,episodes.id_ep,episodes.session,animes.image FROM episodes inner join animes on animes.id = episodes.id_ep WHERE id_ep=:id;";
        $this->conn->query($query);
        $stmt = $this->conn->query($query);

        $this->conn->bind(":id", $data->id);

        return $this->conn->resultSet();
    }
    public function read_sing($data)
    {
        $query = "SELECT * FROM `$this->table` WHERE id_ep=:id";
        $stmt = $this->conn->query($query);

        $this->conn->bind(":id", $data->id);

        $stm = $this->conn->resultSet();

        return $stm;
    }

    public function read_sin($data)
    {
        // $query = "SELECT * FROM `$this->table` WHERE id_ep=:id";
        $query = "SELECT episodes.id,episodes.Episodes,episodes.id_ep,episodes.session FROM `episodes` INNER JOIN sessions ON sessions.id = episodes.session WHERE episodes.id_ep =:id AND episodes.session =:id_session";
        $stmt = $this->conn->query($query);

        $this->conn->bind(":id", $data->id);
        $this->conn->bind(":id_session", $data->id_session);

        $stm = $this->conn->resultSet();

        return $stm;
    }

    public function read_single($data)
    {
        $query = "SELECT * FROM `$this->table` WHERE id_ep=:id_ep";
        $stmt = $this->conn->query($query);

        $this->conn->bind(":id_ep", $data->id_ep);

        $stm = $this->conn->resultSet();

        return $stm;
    }

    public function read_s($data)
    {
        $query = "SELECT * FROM `$this->table` WHERE id=:id";
        $stmt = $this->conn->query($query);

        $this->conn->bind(":id", $data->id);

        $stm = $this->conn->resultSet();

        return $stm;
    }

    // public function checkTime($data)
    // {
    //     $query = "SELECT  time FROM `$this->table` WHERE Date =:R_date ";
    //     $stm = $this->conn->query($query);
    //     $this->conn->bind(":R_date", $data->Date);
    //     // $this->conn->bind(":R_time", $data->time);
    //     // $this->conn->single();
        
     
    //     return $this->conn->resultSet();
    // }
    public function insert($data)
    {
        $query = "INSERT INTO `$this->table` (Episodes,id_ep) VALUES(:Episodes,:id_ep)";
        $this->conn->query($query);
        $this->conn->bind(":Episodes", $data->Episodes);
        $this->conn->bind(":id_ep", $data->id_ep);
        
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
        $query = "UPDATE `$this->table` SET Episodes=:Episodes,id_ep=:id_ep WHERE id=:id";
        $this->conn->query($query);

        $this->conn->bind(":id", $data->id);
        $this->conn->bind(":Episodes", "$data->Episodes");
        $this->conn->bind(":id_ep", "$data->id_ep");

        // $this->conn->bind(":reference_id",$data->reference_id);

        if ($this->conn->execute())
            return true;
        return false;
    }
}
