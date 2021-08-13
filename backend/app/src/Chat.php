<?php


require_once '../vendor/autoload.php';
require_once '../libraries/Database.php';
require_once '../config/config.php';


use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";
    }
    
    public function insertMsg($obj,$id_user,$msg,$hisuserId)
    {
        $obj->query("INSERT INTO messages (msg_content,user_id,sendTo) VALUES ('$msg', $id_user,$hisuserId)");
        $obj->execute();
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        
        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        $data = json_decode($msg,true);
        
        $user_obj = new Database;
        $stmt = $user_obj->query("SELECT * FROM register WHERE id = " . $data['userId'] );
        $user_data = $user_obj->single();
        $data['dt'] = date("Y/m/d h:i:s");

        $this->insertMsg($user_obj,(int)$data['userId'],$data['msg'],(int)$data['hisuserId']);
        
        foreach ($this->clients as $client) {
            // if ($from !== $client) {
            //     // The sender is not the receiver, send to each client connected
            //     $client->send($msg);
                
            // }
            if($from == $client)
            {
                $data['from'] = 'Me';
            }
            else
            {
                $data['from'] = $user_data;
            }

            $client->send(json_encode($data));
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}