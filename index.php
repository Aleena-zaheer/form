<?php  include('server.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM crud WHERE id=$id");

		if (is_iterable($record)) {
			$n = mysqli_fetch_array($record);
			$name = $n['function'];
			$address = $n['command'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Crud</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
    <?php endif ?>
   <?php $results = mysqli_query($db, "SELECT * FROM crud"); ?>

			<table>
				<thead>
					<tr>
						<th>Function</th>
						<th>Command</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
				
				<?php while ($row = mysqli_fetch_array($results)) { ?>
					<tr>
						<td><?php echo $row['function']; ?></td>
						<td><?php echo $row['command']; ?></td>
						<td>
							<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
						</td>
						<td>
							<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
						</td>
					</tr>
				<?php } ?>
			</table>

	
	<form method="post" action="server.php" >

    <input type="hidden" name="id" value="<?php echo $id; ?>">




		<div class="input-group">
			<label>Function</label>
			<input type="text" name="function" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Command</label>
			<input type="text" name="command" value="<?php echo $address; ?>">
		</div>
		<div class="input-group">
			<?php if ($update == true): ?>
				<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
			<?php else: ?>
				<button class="btn" type="submit" name="save" >Save</button>
			<?php endif ?>
		</div>
	</form>
</body>
</html>