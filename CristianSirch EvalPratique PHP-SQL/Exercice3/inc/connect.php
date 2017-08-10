<?php

$dbh = new PDO('mysql:host=localhost;dbname=vehicles_eval;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));