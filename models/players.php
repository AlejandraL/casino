<?php

require_once 'config/database.php';

class Players {
    private $id;
    private $username;
    private $balance;

    public function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
    }
    
    function getUsername() {
        return $this->username;
    }
    
    function getBalance() {
        return $this->balance;
    }

    function setId($id) {
        $this->id = $id;
    }
    
    function setUsername($username) {
        $this->username = $username;
    }
    
    function setBalance($balance) {
        $this->balance = $balance;
    }
    
    public function getPlayers() {
        $sql = $this -> db-> query("SELECT * FROM player ORDER BY id DESC");
        return $sql;
    }

    public function create_player() {
        $sql = "INSERT INTO player VALUES(null, '{$this->getUsername()}', '10000');";

        $register = $this -> db -> query($sql);

        $result = false;
        if ($register) $result = true;
        return $result;
    }

    public function get_player(){
		$player = $this->db->query("SELECT * FROM player WHERE id = {$this->getId()}");
		return $player->fetch_object();
	}

    public function edit_player() {
        $sql = "UPDATE player SET username='{$this->getUsername()}', balance={$this->getBalance()} WHERE id={$this->getId()};";

        $edit = $this->db->query($sql);

        $result = false;
        if ($edit) $result = true;
        return $result;
    }

    public function update_balance() {
        $sql = "UPDATE player SET balance={$this->getBalance()} WHERE id={$this->id}";

        $edit = $this -> db -> query($sql);

        $result = false;
        if ($edit) $result = true;
        return $result;
    }

	public function delete_player(){
		$sql = "DELETE FROM player WHERE id={$this->id}";
		$delete = $this->db->query($sql);
		
		$result = false;
		if($delete) $result = true;
		return $result;
  }

}

?>