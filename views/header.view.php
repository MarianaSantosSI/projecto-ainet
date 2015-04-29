<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
		<?php if (isset($authenticated)): ?>
			<div><a href="logout.php">Logout</a></div>
		<?php endif?>