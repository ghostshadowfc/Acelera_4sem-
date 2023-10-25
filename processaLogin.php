<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["email"];
    $password = $_POST["password"];

    // Conecte-se ao banco de dados
    $conn = new mysqli("arduino", "email", "senha", "nome");

    // Consulta para verificar as credenciais do usuário
    $query = "SELECT * FROM email WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Autenticação bem-sucedida
        $_SESSION["email"] = $username;
        header("location: painelt.php");
    } else {
        // Autenticação falhou
        echo "Credenciais inválidas.";
    }

    $stmt->close();
    $conn->close();
}
?>
