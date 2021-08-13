<?php


class ContactUsC extends Controller
{
    public function __construct()
    {
        $this->contactUs = $this->model("ContactUsM");
    }



    public function readAll()
    {
        print_r(json_encode( $this->contactUs->readAll(), JSON_INVALID_UTF8_IGNORE ));
    }

    
    // public function read_single()
    // {
    //     $data = json_decode(file_get_contents("php://input"));

    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         if ($d = $this->contactUs->read_single($data))
    //             echo json_encode($d, JSON_INVALID_UTF8_IGNORE);
    //     }
    // }


    public function insert()
    {

        $data = json_decode(file_get_contents("php://input"));
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->contactUs->insert($data)) {
                echo json_encode(["Success", "Created Successfully"]);
            }
        }
    }

    public function delete()
    {
        $data = json_decode(file_get_contents("php://input"));
        if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
            if ($this->contactUs->delete($data)) {
                echo json_encode(['Success' => 'deleted Successfully']);
            }
        }
    }


    public function update()
    {
        $data = json_decode(file_get_contents("php://input"));

        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            if ($this->contactUs->update($data)) {
                echo json_encode(['Success' => 'data has updated']);
            }
        }
        // } else {
        //     echo json_encode("exist");
        // }
    }
}
