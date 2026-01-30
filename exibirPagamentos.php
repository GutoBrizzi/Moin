<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <title>Exibir Pagamentos</title>
    </head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "Senac@trijuntos25";
$dbname = "moinho";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT 
            id, 
            nome_cliente, 
            cpf, 
            numero_cartao, 
            validade_cartao, 
            preco_produto, 
            data_venda 
        FROM pagamentos";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' class='table table-striped'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Cartão</th>
                <th>Validade</th>
                <th>Preço</th>
                <th>Data da Venda</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nome_cliente']}</td>
                <td>{$row['cpf']}</td>
                <td>{$row['numero_cartao']}</td>
                <td>{$row['validade_cartao']}</td>
                <td>{$row['preco_produto']}</td>
                <td>{$row['data_venda']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
<script src="js/bootstrap.min.js"></script>
</body>
</html>