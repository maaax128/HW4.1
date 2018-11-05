<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
	<style>
		form {
			margin: 20px 0;
		}
	    table { 
	        border-spacing: 0;
	        border-collapse: collapse;
	    }
	    table td, table th {
	        border: 1px solid black;
	        padding: 5px;
	    }
	    
	    table th {
	        background: #bebebe;
	    }
	</style>
	<title>Поиск книг</title>
</head>
<body>

<h1>Библиотека успешного человека</h1>

<form method="GET">
    <input type="text" name="isbn" placeholder="ISBN" value="">
    <input type="text" name="name" placeholder="Название книги" value="">
    <input type="text" name="author" placeholder="Автор книги" value="">
    <input type="submit" value="Поиск">
</form>
<?php
$pdo = new PDO("mysql:host=localhost;dbname=global","xxxxxx","xxxxxx");
if (empty($_GET['isbn']) && empty($_GET['name']) && empty($_GET['author'])) {
	$sth = $pdo->prepare('SELECT * FROM books');
	$sth->execute();
	$sth = $sth->fetchAll(PDO::FETCH_ASSOC);
	print_r($sth);
include('table.php');
} elseif (isset($_GET['isbn']) && empty($_GET['name']) && empty($_GET['author'])) {
	$strIsbn = 'SELECT * FROM books where isbn like "'.$_GET['isbn'].'"';
	$sth = $pdo->prepare($strIsbn);
	$sth->execute();
	$sth = $sth->fetchAll(PDO::FETCH_ASSOC);
	include('table.php');
} elseif (empty($_GET['isbn']) && isset($_GET['name']) && empty($_GET['author'])) {
	$strName = 'SELECT * FROM books where name like "'.$_GET['name'].'"';
	$sth = $pdo->prepare($strName);
	$sth->execute();
	$sth = $sth->fetchAll(PDO::FETCH_ASSOC);
	include('table.php');
} elseif (empty($_GET['isbn']) && empty($_GET['name']) && isset($_GET['author'])) {
	$strAuthor = 'SELECT * FROM books where author like "'.$_GET['author'].'"';
	$sth = $pdo->prepare($strAuthor);
	$sth->execute();
	$sth = $sth->fetchAll(PDO::FETCH_ASSOC);
	include('table.php');
} 
?>
</body>
</html>