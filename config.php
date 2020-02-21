<?php $dbname =   __DIR__ . '/data/garderie.db';
$file_db = new PDO('sqlite:'.$dbname);
$file_db->exec("pragma synchronous = off;");


?>
