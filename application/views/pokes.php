<!DOCTYPE html>
<html lang="en">
<head>
	<title>Pokes</title>
	<meta charset="UTF-8">
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src=""></script>

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/main.css') ?>">
	

	
</head>
<body>
	<div id="wrapper">
		<div class="top-bar">
			<h3>Welcome, <?= $session_user ?>! <br/> 
				<span><?= count($poke_record) ?> people poked you!</span>
			</h3>

			<ul>
				<li><a href="logout">Logout</a></li>
			</ul>
			<div class="clr"></div>	
		</div>

		<div id="main">
			<div id="people-poked">
				<?php foreach ($poke_record as  $poke) { ?>
					
					<p><?= $poke['alias'] ?> poked you <?= $poke['pokes_made']?> times.</p>

				<?php } ?>


			</div>


			<p>People you may want to poke:</p>

			<table width="100%" cellspacing="0" cellpadding="0" border="1" bordercolor="#888">
				<tr>
					<th>Name</th>
					<th>Alias</th>
					<th>Email Address</th>
					<th>Poke History</th>
					<th>Action</th>

				</tr>
				<?php foreach ($users as $user) { ?>
					<tr>
					<td><?= $user['name'] ?></td>
					<td><?= $user['alias'] ?></td>
					<td><?= $user['email'] ?></td>
					<td><?= $user['poke_received'] ?> pokes</td>
					<td><a href="/Pokes/poke/<?= $user['id'] ?>" class="btn btn-default">Poke!</a></td>

				</tr>
				<?php } ?>

			</table>


		</div>			


	</div>
</body>
</html>