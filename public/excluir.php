<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

// Conectar ao banco de dados
$conn = new mysqli("localhost", "root", "", "econnect");

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificar se foi passado um ID via GET
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Executar a query de exclusão
    $sql = "DELETE FROM faleconosco WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "Mensagem excluída com sucesso.";
    } else {
        echo "Erro ao excluir a mensagem.";
    }

    $stmt->close();
} else {
    echo "ID inválido.";
}

// Fechar a conexão com o banco de dados
$conn->close();

// Redirecionar de volta ao painel
header('Location: admin.php');
exit();
?>
