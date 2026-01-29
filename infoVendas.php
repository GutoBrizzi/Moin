<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <title>Informações de Venda</title>
    </head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "Senac@trijuntos25";
$dbname = "moinho";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verifica se veio do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome     = htmlspecialchars($_POST['nome']);
    $cpf      = htmlspecialchars($_POST['cpf']);
    $cartao   = htmlspecialchars($_POST['cartao']);
    $validade = htmlspecialchars($_POST['validade']);
    $valor    = htmlspecialchars($_POST['valor']);

    $sql = "INSERT INTO pagamentos 
            (nome_cliente, cpf, numero_cartao, validade_cartao, preco_produto)
            VALUES 
            ('$nome', '$cpf', '$cartao', '$validade', '$valor')";

    if ($conn->query($sql) === TRUE) {
        echo " <h1 style='color: green;'>Pagamento salvo com sucesso!</h1> ";
    } else {
        echo "Erro: " . $conn->error;
    }

    $conn->close();
}
?>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
