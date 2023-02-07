<?php

$username = 'root';
$password = '';
$host = 'localhost';
$data = 'test';

$file = file_get_contents('./SQL/user.sql');

try {
    $db = new PDO('mysql:host=' . $host . ';dbname=' . $data . ';charset=utf8', $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db->lastInsertId();

    $sql = "DELETE FROM utilisateurs WHERE id = 1";
    $sql = "TRUNCATE TABLE utilisateurs";
    $sql = "
                INSERT INTO utilisateurs (nom, prenom, rue, numero, code_postal, ville, pays, mail)
                VALUES ('Doe', 'John', 'Rue Arlette Corrente', '54', '59610', 'Fourmies', 'France', 'test@test.fr')
        ";
    $sql = "DROP TABLE utilisateurs";
    $sql = "DROP DATABASE $data";

    $db->exec($sql);



    echo "requête validé !";
}
catch (PDOException $exception) {
    echo $exception->getMessage();
}