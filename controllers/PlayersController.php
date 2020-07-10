<?php

require_once 'models/players.php';

class playersController {
	
	public function list_players(){
		
		$player = new Players();		
		$players = $player->getPlayers();
		
		require_once 'views/players/list_players.php';
	}
	
	public function create_player(){
		if(isset($_POST)){
			$username = isset($_POST['username']) ? $_POST['username'] : false;

			if($username) {
				$player = new Players();
				$player->setUsername($username);
			
				$save = $player->create_player();				
			}
			header('Location:'.BASE_URL.'players/list_players');
		}		
	}
	
	public function edit_player(){
		if(isset($_POST['id'])){
			$id = isset($_POST['id']) ? $_POST['id'] : false;
			$username = isset($_POST['username']) ? $_POST['username'] : false;
			$balance = isset($_POST['balance']) ? $_POST['balance'] : false;

			$player = new Players();
			$player->setId($id);
			$player->setUsername($username);
			$player->setBalance($balance);
			
			$play = $player->edit_player();			
		}
		header('Location:'.BASE_URL.'players/list_players');
	}
	
	public function update_balance(){		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$balance = $_GET['balance'];
			$edit = true;

			var_dump($id);
			
		$player = new Players();		
		$players = $player->update_balance();
			$player->setId(16);
			
			$play = $player->get_player();			
		}
		header('Location:'.BASE_URL.'players/roulette_bet');
	}
	
	public function delete_player(){
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$player = new Players();
			$player->setId($id);	

			$delete = $player->delete_player();
		}
		header('Location:'.BASE_URL.'players/list_players');
	}

	public function roulette_bet(){		

		// echo '<pre>';
		// var_dump($_POST);
		// echo '</pre>';

		$player = new Players();		
		$players = $player->getPlayers();

		$play = $players->fetch_array();

		require_once 'views/players/roulette_bet.php';

	}
}

?>