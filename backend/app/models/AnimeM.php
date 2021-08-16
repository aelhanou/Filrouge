<?php


class AnimeM
{

    public $table = "animes";
    public $conn;
    public function __construct()
    {
        $this->conn = new Database();
    }



    public function readCategorise($data)
    {
        $query = "SELECT animes.id,animes.title,animes.genre,animes.Created_at,animes.image,animediscription.description,animediscription.numberOfEpisodes,animediscription.Status,animediscription.timeOfEpisode,animediscription.TheBeginningOfShow FROM `animes` INNER JOIN animediscription ON animediscription.id_info_anime = animes.id WHERE  animes.genre = '$data->category'";
        $this->conn->query($query);
        return $this->conn->resultSet();
    }

    public function read()
    {
        $query = "SELECT * FROM `$this->table`";
        $this->conn->query($query);
        
        return $this->conn->resultSet();;
    }

    public function readA($data)
    {
        $stmt = $this->conn->query("SELECT animes.id,animes.image , animes.title,animes.genre,animes.Created_at,animediscription.description,animediscription.numberOfEpisodes,animediscription.Status,animediscription.timeOfEpisode,animediscription.TheBeginningOfShow FROM `animes` INNER JOIN animediscription ON animes.id = animediscription.id_info_anime LIMIT $data->pagination,5");
        return $this->conn->resultSet(); 
    }
    public function readAll()
    {
        // $query = "SELECT * FROM `$this->table` INNER JOIN animediscription ON animes.id = animediscription.id_info_anime";
        
        $this->conn->query("SELECT animes.id,animes.image , animes.title,animes.genre,animes.Created_at,animediscription.description,animediscription.numberOfEpisodes,animediscription.Status,animediscription.timeOfEpisode,animediscription.TheBeginningOfShow FROM `animes` INNER JOIN animediscription ON animes.id = animediscription.id_info_anime");
        // $this->conn->resultSet();

        return $this->conn->resultSet(); 
    }
    public function read_single($data)
    {
        $query = "SELECT animes.id ,animes.image,animes.title,animes.genre,animes.Created_at,animediscription.description,animediscription.numberOfEpisodes,animediscription.Status,animediscription.timeOfEpisode,animediscription.TheBeginningOfShow FROM animes INNER JOIN animediscription ON animes.id = animediscription.id_info_anime WHERE animes.id=:id";
        $this->conn->query($query);

        $this->conn->bind(":id", $data->id);

        $stm = $this->conn->single();


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
        $query = "INSERT INTO `$this->table` (title,genre,Created_at,image) VALUES(:title,:genre,:Created_at,:image)";
        $this->conn->query($query);
        $this->conn->bind(":title", $data->title);
        $this->conn->bind(":genre", $data->genre);
        $this->conn->bind(":Created_at", $data->Created_at);
        $this->conn->bind(":image", $data->image);
        
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
