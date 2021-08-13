<?php


class CommentsM
{

    public $table = "comments";
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

    public function read_Single($data)
    {
        $query = "SELECT * FROM `$this->table` WHERE id =:id";
        $this->conn->query($query);
        $this->conn->bind(":id", $data->id);
        return $this->conn->single();;
    }


    public function readComments($data)
    {
        $query = "SELECT comments.id,comments.comment,comments.created_at,register.firstName,
        register.LastName,imageprofile.image FROM `comments` INNER JOIN register ON 
        register.id = comments.id_user INNER JOIN imageprofile ON 
        imageprofile.id = comments.id_image_profile WHERE comments.id_comment_anime =:id;";
        $this->conn->query($query);
        $this->conn->bind(":id", $data->id);

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
        $query = "INSERT INTO `$this->table` (comment,id_comment_anime,id_user,id_image_profile) VALUES(:comment,:id_comment_anime,:id_user,:id_image_profile)";
        $this->conn->query($query);
        $this->conn->bind(":comment", $data->comment);
        $this->conn->bind(":id_comment_anime", $data->id_comment_anime);
        $this->conn->bind(":id_user", $data->id_user);
        $this->conn->bind(":id_image_profile", $data->id_image_profile);

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
        $query = "UPDATE `$this->table` SET comment=:comment,id_comment_anime=:id_comment_anime,id_user=:id_user,id_image_profile=:id_image_profile WHERE id=:id";
        $this->conn->query($query);

        $this->conn->bind(":id", $data->id);
        $this->conn->bind(":comment", $data->comment);
        $this->conn->bind(":id_comment_anime", $data->id_comment_anime);
        $this->conn->bind(":id_user", $data->id_user);
        $this->conn->bind(":id_image_profile", $data->id_image_profile);

        if ($this->conn->execute())
            return true;
        return false;
    }
}
