<?php


class chatMsgM
{

    public $table = "messages";
    public $conn;
    public function __construct()
    {
        $this->conn = new Database();
    }


    public function read($data)
    {
        $query = "SELECT * FROM `messages` INNER JOIN register ON messages.user_id = register.id WHERE (messages.user_id = $data->myUserId OR messages.user_id = $data->hisUserId) AND (messages.sendTo = $data->myUserId OR messages.sendTo = $data->hisUserId) ORDER BY messages.id";
        $this->conn->query($query);
        return $this->conn->resultSet();;
    }

    







    public function insert($data)
    {
        $query = "INSERT INTO `$this->table` (description,numberOfEpisodes,Status,timeOfEpisode,TheBeginningOfShow,id_info_anime) VALUES(:description,:numberOfEpisodes,:Status,:timeOfEpisode,:TheBeginningOfShow,:id_info_anime)";
        $this->conn->query($query);
        $this->conn->bind(":description", $data->description);
        $this->conn->bind(":numberOfEpisodes", $data->numberOfEpisodes);
        $this->conn->bind(":Status", $data->Status);
        $this->conn->bind(":timeOfEpisode", $data->timeOfEpisode);
        $this->conn->bind(":TheBeginningOfShow", $data->TheBeginningOfShow);
        $this->conn->bind(":id_info_anime", $data->id_info_anime);
        
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
