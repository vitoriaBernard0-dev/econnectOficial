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

// Receber dados do formulário
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Inserir os dados na tabela faleconosco
$sql = "INSERT INTO faleconosco (faleconosco_name, faleconosco_email, faleconosco_message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
  // Retorna sucesso via JavaScript
  echo "<script>
          window.onload = function() {
            showModal('Mensagem enviada com sucesso! Aguarde nossa equipe entrar em contato.');
          };
        </script>";
} else {
  // Retorna erro via JavaScript
  echo "<script>
          window.onload = function() {
            showModal('Erro ao enviar mensagem: " . $conn->error . "');
          };
        </script>";
}

// Fechar a conexão
$conn->close();
?>
