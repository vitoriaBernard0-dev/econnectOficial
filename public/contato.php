<?php
// Conectar ao banco de dados
$hostname = 'localhost';
$bancodedados = 'econnect';
$usuario = 'root';
$senha = '';

// Criando a conexão
$conn = new mysqli($hostname, $usuario, $senha, $bancodedados);

// Verificar a conexão
if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Receber dados do formulário
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Inserir os dados na tabela faleconosco
  $sql = "INSERT INTO faleconosco (faleconosco_name, faleconosco_email, faleconosco_message) VALUES ('$name', '$email', '$message')";

  if ($conn->query($sql) === TRUE) {
    // Redireciona para a página de sucesso com um parâmetro indicando o sucesso
    header("Location: ../index.html?status=success");
    exit();
  } else {
    // Redireciona para a página de erro com um parâmetro indicando a falha
    header("Location: ../index.html?status=error");
    exit();
  }
}

// Fechar a conexão
$conn->close();
?>