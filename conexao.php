<?php

// Configurações de conexão com o banco de dados
$hostname = 'localhost';    // Endereço do servidor MySQL
$user = 'root';             // Nome de usuário do banco de dados
$password = '';             // Senha do banco de dados
$database = 'select';       // Nome do banco de dados a ser utilizado

// Estabelece a conexão com o banco de dados MySQL
$conn = new mysqli($hostname, $user, $password, $database);

// Verifica se houve algum erro na conexão
if($conn->connect_errno) {
    // Em caso de falha na conexão, exibe uma mensagem de erro
    die('Falha na conexão (' . $conn->connect_errno . ') ' . $conn->connect_error);
}

// Se a conexão for bem-sucedida, você pode prosseguir com operações no banco de dados

?>
