<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fidelidade2";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
  die("Falha na Conexão: " . mysqli_connect_error());
}


$sql2 = "CREATE DATABASE fidelidade2";

if (mysqli_query($conn, $sql2)) {
    echo "Banco criado com Sucesso <br />";
  } else {
    echo "Error ao Criar Banco: " . mysqli_error($conn);
  }

  $sql3 = "CREATE TABLE team (
    Id_team INT PRIMARY KEY AUTO_INCREMENT,
    team_name VARCHAR(55),
    total_vacancies INT
)";

if (mysqli_query($conn, $sql3)) {
    echo "Tablela team criado com Sucesso <br />";
  } else {
    echo "Error ao Criar Tablela team: " . mysqli_error($conn);
  }


// sql to create table
$sql = "CREATE TABLE user (
	Id_user INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(255),
	surname VARCHAR(255),
	email VARCHAR(255),
	password_user VARCHAR(255),
	status_user BOOL,
	Id_team INT,
	FOREIGN KEY (Id_team ) REFERENCES team (Id_team)
)";

if (mysqli_query($conn, $sql)) {
  echo "Tabela usuario Criada com Sucesso <br />";
} else {
  echo "Error ao Criar Tabela usuario: " . mysqli_error($conn);
}


mysqli_close($conn);

?> 