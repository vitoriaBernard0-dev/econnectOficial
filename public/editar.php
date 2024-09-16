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

    // Buscar a mensagem com base no ID
    $sql = "SELECT * FROM faleconosco WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Mensagem não encontrada.";
        exit();
    }

    $stmt->close();
} else {
    echo "ID inválido.";
    exit();
}

// Atualizar a mensagem no banco de dados
if (isset($_POST['update'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    $sql = "UPDATE faleconosco SET faleconosco_name = ?, faleconosco_email = ?, faleconosco_message = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nome, $email, $mensagem, $id);

    if ($stmt->execute()) {
        // Redirecionar para a página admin após a atualização
        header('Location: admin.php');
        exit();
    } else {
        echo "Erro ao atualizar a mensagem.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mensagem</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 0 0 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        textarea {
            resize: vertical;
            height: 100px;
        }
        button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .alert {
            color: red;
            text-align: center;
            margin: 10px 0;
        }
    </style>
    <script>
        function confirmSave() {
            return confirm("Você tem certeza que deseja salvar as alterações?");
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Editar Mensagem</h2>
        <form action="editar.php?id=<?php echo $id; ?>" method="POST" onsubmit="return confirmSave()">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo htmlspecialchars($row['faleconosco_name']); ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($row['faleconosco_email']); ?>" required>

            <label for="mensagem">Mensagem:</label>
            <textarea name="mensagem" required><?php echo htmlspecialchars($row['faleconosco_message']); ?></textarea>

            <button type="submit" name="update">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>
