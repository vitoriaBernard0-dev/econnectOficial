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

// Consulta SQL para buscar os dados da tabela faleconosco
$sql = "SELECT * FROM faleconosco";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #f9ebd2;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        header h2 {
            color: #4caf50;
            margin: 0;
        }

        header a {
            color: #4caf50;
            text-decoration: none;
            font-weight: bold;
        }

        main {
            padding: 40px;
            max-width: 1200px;
            margin: auto;
        }

        h3 {
            color: #4caf50;
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #4caf50;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-edit, .btn-delete {
            display: inline-block;
            padding: 5px 10px;
            margin: 0 5px;
            border-radius: 4px;
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
        }

        .btn-edit {
            background-color: #4caf50;
        }

        .btn-edit:hover {
            background-color: #45a049;
        }

        .btn-delete {
            background-color: #f44336;
        }

        .btn-delete:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>

<header>
    <h2>Painel Administrativo</h2>
    <a href="logout.php">Sair</a>
</header>

<main>
    <div class="container">
        <p>Bem-vindo, <?php echo $_SESSION['admin']; ?></p>

        <h3>Mensagens Recebidas</h3>

        <?php
        if ($result->num_rows > 0) {
            echo "<table>";
            // Remove o cabeçalho de ID
            echo "<tr><th>Nome</th><th>Email</th><th>Mensagem</th><th>Ações</th></tr>";

            // Loop pelos resultados e exibição na tabela com botões de Editar e Excluir
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['faleconosco_name'] . "</td>";
                echo "<td>" . $row['faleconosco_email'] . "</td>";
                echo "<td>" . $row['faleconosco_message'] . "</td>";
                echo "<td>
                      
                        <a href='excluir.php?id=" . $row['id'] . "' class='btn-delete' onclick='return confirm(\"Tem certeza que deseja excluir?\");'>Excluir</a>
                      </td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhuma mensagem encontrada.";
        }

        // Fechar a conexão com o banco de dados
        $conn->close();
        ?>
    </div>
</main>

</body>
</html>
