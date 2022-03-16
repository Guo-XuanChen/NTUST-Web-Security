<?php
	$options = [
		PDO::ATTR_PERSISTENT => false,
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_EMULATE_PREPARES => false,
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
	];
	try {
		$pdo = new PDO('mysql:host=localhost;port=3306;dbname=WebSecurity','admin','Skills39');
		$pdo->exec('SET CHARACTER SET utf8');
		
	}catch (PDOException $e){
		throw new PDOException($e->getMessage());
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Web Security Dynamic Page</title>
</head>
<body> 
	<center>
		<h1>Web Security Dynamic WebPage</h1>
		<h2>B10615012 郭軒辰	<h2>
		<table border="1px" width="50%">
			<tr>
				<th>Account</th>
				<th>Password</th>
			</tr>
			<tr>
				<td>Example</td>
				<td>Example</td>
			</tr>
			<?php
				$sql = 'SELECT * FROM Accounts';
				$result = $pdo->prepare($sql);
				$result->execute();
				foreach($result->fetchAll() as $value)
				{
					echo "<tr>"; 
					echo "<td>" . $value['account'] . "</td>";
					echo "<td>" . $value['password'] . "</td>";
					echo "</tr>"; 
				}
			?>
		</table>
	</center>
</body>
</html>