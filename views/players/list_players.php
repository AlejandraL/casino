<?php

error_reporting(0);

$edit = false;
$id_val = null;
// function edit_data($id) {
// 	print_r($id);
// 	$edit = true;
// 	$id_val = $id;
// }
$username = $_POST['username'];
$id = $_POST['id'];
$balance = $_POST['balance'];

if(array_key_exists('edit', $_POST)) { 
	// echo '<pre>';
	// var_dump($id);
	// echo '<pre>';
	// echo 'HOLA';
	$edit = true;
}
?>

<html>
	<head>
		<title>Casino</title>
		<meta charset="UTF-8">
		<link href="assets/css/style.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

		.a-style {
			border: none;
			color: white;
			padding: 12px 16px;
			font-size: 16px;
			cursor: pointer;
			text-decoration: none;
		}

		.a-edit {
			background-color: #1E90E4;
		}

		.a-delete {
			background-color: red;
		}
	</style>

	<body>
		<div class="custom-div">
			<h1>Jugadores</h1>

			<?php if (!$edit) :?>
				<form action="<?= BASE_URL ?>players/create_player" method="POST">
					<input type="text" placeholder="Usuario" name="username"/>
					<input type="text" placeholder="$10.000" disabled/>
					<input type="submit" value="Guardar" />
				</form>
			<?php else :?>
				<form action="<?= BASE_URL ?>players/edit_player" method="POST">
					<input type="hidden" name="id" value="<?php echo $id?>"/>
					<input type="text" placeholder="Usuario" name="username" value="<?php echo $username?>"/>
					<input type="text" placeholder="Saldo" name="balance" value="<?php echo $balance?>"/>
					<input type="submit" value="Actualizar" />
				</form>
			<?php endif; ?>

			<hr>

			<table>
				<tr>
					<th>Usuario</th>
					<th>Saldo</th>
					<th>Acciones</th>
				</tr>
				<?php foreach($players as $player) :?>
					<tr>
						<td><?php echo $player['username']?></td>
						<td><?php echo $player['balance']?></td>
						<td>
							<form method="post" action="">
								<button class="a-style a-edit fa fa-edit" name="edit"></button>
								<input type="hidden" name="id" value="<?=$player['id']?>">								
								<input type="hidden" name="username" value="<?=$player['username']?>">								
								<input type="hidden" name="balance" value="<?=$player['balance']?>">
							</form>
							<a href="<?= BASE_URL ?>players/delete_player&id=<?=$player['id']?>" 
								class="a-style a-delete fa fa-trash" title="Eliminar">
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</body>
</html>
