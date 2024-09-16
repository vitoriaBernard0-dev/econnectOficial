<?php
session_start();
if (isset($_POST['submit'])) {
    // Conexão com o banco de dados
    $conn = new mysqli("localhost", "root", "", "econnect");

    // Verificar conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Preparar e executar a consulta SQL
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Credenciais corretas, redirecionar para a página de administração
        $_SESSION['admin'] = $email;
        header('Location: admin.php');
        exit();
    } else {
        $erro = "Email ou senha incorretos!";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login do Administrador</title>
    <style>
        body {
            background-color: #FAE3BA;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #FFF;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h2 {
            text-align: center;
            color: #5A8C5D;
        }
        label {
            display: block;
            color: #5A8C5D;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #FFF;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #FF9052;
            color: #FFF;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #E67C3C;
        }
        p {
            text-align: center;
            color: #FF9052;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login do Administrador</h2>
        <form action="login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <button type="submit" name="submit">Login</button>
        </form>
        <?php if (isset($erro)) { echo "<p>$erro</p>"; } ?>
    </div>
</body>
</html>
