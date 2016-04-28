<?php
require_once('./config.php');
if ( isset( $_GET['user'] ) && isset( $_GET['password'] ) ) {
	$exe = $db->prepare("SELECT * FROM `passwd` WHERE `user` = ?");
	$exe->execute(array($_GET['user']));
	$rows = $exe->fetchAll(PDO::FETCH_ASSOC);

	if ( isset( $rows[0]["user"] ) ) {
		echo "You exist";
	} else {
echo "here";
		$exe = $db->prepare("INSERT INTO `passwd` VALUES (?,?,?,?,?)");
		$exe->execute(array($_GET['user'],$_GET['password'],1,"default","default"));
		$affected_rows = $exe->rowCount();
		var_dump($affected_rows);
	}
}
