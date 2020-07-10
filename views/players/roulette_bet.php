<?php

error_reporting(0);

function get_random_colours(array $ar) {
	$rand = mt_rand(1, (int) array_sum($ar));

	foreach ($ar as $key => $value) {
		$rand -= $value;
		if ($rand <= 0) {
			return $key;
		}
	}
}

function up($id, $balance) {
	require_once 'controllers/PlayersController.php';
	//  call_user_func('upd', "hola");


}

$show = false;
$winner_colour = null;
$array_colorus = array('#058A15'=>2, '#F51A10'=>49, '#000000'=>49);
$winner_colour = get_random_colours($array_colorus);
 
?>

<html>
	<head>
		<title>Casino</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css"/>
	<head>

	<style>
		.custom-div {
			margin-left: 25%;
			margin-right: 8%;
			margin-top: 3%;
			margin-bottom: 3%;
		}
		
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}
		
		td, th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}
		
		tr:nth-child(even) {
			background-color: #dddddd;
        }
        
        .div-color {
            padding: 10px 30px;
            width: 10px;
		}		

		.a-style {
			border: none;
			color: white;
			padding: 11px 14px;
			border-radius: 5px;
			font-size: 16px;
			cursor: pointer;
			text-decoration: none;
		}

		.a-redirect {
			background: #A7A7A7;
		}

	</style>

	<body>
		<form action="<?= BASE_URL ?>players/update_balance" method="POST">
		</form>
		<div class="custom-div">
			<h1>Apuestas</h1>
				<hr>
			<table>
				<tr>
					<th>Usuario</th>
					<th>Saldo disponible</th>
					<th>Apuesta</th>
					<th>Color</th>
				</tr>

				<?php foreach($players as $player) :
					$array_colorus = array('#058A15'=>2, '#F51A10'=>49, '#000000'=>49);
					$colours['colour'] = get_random_colours($array_colorus);
					
					if ($player['balance'] > 1000) {
						$min = $player['balance'] * 0.08;
						$max = $player['balance'] * 0.15;                    
	
						$value = rand($min, $max);
						$play['balance'] = $value;
					}

					$data[] = array(
						'id' => $player['id'],
						'username' => $player['username'],
						'balance' => $play['balance'],
						'colour' => $colours['colour'],
						'total_balance' => $player['balance'],
					  );

					$new_balance = $player['balance'] - $play['balance'];
					up($player['id'], $new_balance);
				?>
						
					<?php if ($player['balance'] > 1000) :?>			
						<tr>
							<td><?php echo $player['username']?></td>
							<td><?php echo $player['balance']?></td>
							<td><?php echo $play['balance']?></td>
							<td><div class="div-color" style="background: <?php echo $colours['colour']?>"></div></td>
						</tr>
					<?php endif; ?>
				<?php endforeach; ?>
			</table>
			
			<div>
				<h1>Ganadores</h1>
				<div class="div-color" style="background: <?php echo $winner_colour?>"></div>
				<hr>

				<table>
					<tr>
						<th>Usuario</th>
						<th>Color elegido</th>
						<th>Valor ganado</th>
						<th>Saldo total</th>
					</tr>

					<?php foreach($data as $info) :?>	
						<?php if ($info['colour'] === $winner_colour) :

							if ($info['colour'] === '#F51A10' || $info['colour'] === '#000000') {
								$info['balance'] = $info['balance'] * 2;
							}
							else {
								$info['balance'] = $info['balance'] * 15;
							}
							
							$info['total_balance'] = $info['total_balance'] + $info['balance'];

							up($info['id'], $info['total_balance']);
						?>				
							<tr>
								<td><?php echo $info['username']?></td>
								<td><div class="div-color" style="background: <?php echo $info['colour']?>"></div></td>
								<td><?php echo $info['balance']?></td>
								<td><?php echo $info['total_balance']?></td>
							</tr>

						<?php endif; ?>

						<form method="post" action="">
							<input type="hidden" name="total" value="<?php echo $info['total_balance']?>">
							</form>
					<?php endforeach; ?>
					
				</table>
			</div>
		</div>
	</body>
</html>