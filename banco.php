<?php
session_start();
error_log("Mensagem de erro", 3, "caminho_para_o_arquivo_de_log.txt");

$host = "localhost";
$dbname = "arduino";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta SQL para inserir dados
    $sql = "INSERT INTO cadastro (nome, email, senha) VALUES ('$nome', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "Dados inseridos com sucesso.";
        // Após inserir os dados com sucesso, você pode redirecionar o usuário para a página de login.
        header("Location: login.php");
        exit(); // Certifica-se de que o código posterior não seja executado após o redirecionamento
    } else {
        echo "Erro ao inserir dados: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

