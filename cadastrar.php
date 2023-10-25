<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="your-stylesheet.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
            background: rgba(236, 240, 241, 0.92);
            border-radius: 10px; /* Arredonda as bordas do contêiner */
        }
        .container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(236, 240, 241, 0.92);
            border-radius: 10px; /* Arredonda as bordas do contêiner */
        }
        .white-container {
            background-color: #FFFFFF; /* Cor branca */
            flex: 1;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 60%; /* Aumenta a altura do container */
        }
        .form {
            max-width: 500px;
            width: 100%;
        }
        .form label{
            color: #7ABC37;
            font-size: 20px;
            font-weight: 400;
        }
         .form input {
            width: 100%;
            height: 30px;
            border: 1px solid #7ABC37;
            border-radius: 5px;
        }
        .form button {
            width: 150px;
            height: 40px;
            background: #7ABC37;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 20px;
            font-weight: 700;
            cursor: pointer;
            margin-top: 10px; /* Espaçamento maior entre os botões */
        }
    </style>
    <title>CadastrarPage</title>
</head>
<body>
    <div class="container">
        <div class="white-container">
            <h2 class="text-light-green uppercase">Cadastrar</h2>
            <form method="POST" action="banco.php" class="form">
                <label for="name" class="text-black-900">Nome:</label>
                <input type="text" name="name" id="name" class="bg-blue_gray-50 h-12 rounded w-full">
                <label for= "email" class="text-black-900">Email:</label>
                <input type="email" name="email" id="email" class="bg-blue_gray-50 h-12 rounded w-full">
                <label for="password" class="text-black-900">Senha:</label>
                <input type="password" name ="password" id="password" class="bg-blue_gray-50 h-12 rounded w-full">
                <button type="submit" class="common-pointer bg-light-green-A700 cursor-pointer text-white text-center">Inscrever-se</button>
            </form>
        </div>
        <div class="green-container">
    <h1 class="text-white uppercase">Bem-Vindo de Volta!</h1>
    <form action="login.php" method="get">
    <button type="submit" class="common-pointer bg-black-900 cursor-pointer text-white text-center">Entrar</button>
</form>
</div>

    </div>
    <p class="text-white uppercase text-center">
        para se manter conectado conosco,<br>faça login com suas informações pessoais
    </p>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.9/jquery.inputmask.min.js"></script>
    <script>
        // embaixo esta a aplicação das mascaras nos campos de email e senha
        $(document).ready(function() {
            $('#email').inputmask({ alias: 'email' });
        });

        $(document).ready(function(){
            $('#password')inputmask({ alias: 'password' });
        });
        
       
    </script>

</body>
</html>


<?php
// Inclua o arquivo de conexão ao banco de dados (banco.php)
include 'banco.php';

// Verifique se o formulário foi submetido via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $senha = $_POST['password'];

    // Crie um hash seguro da senha
    $senha_hash = password_hash($senha, PASSWORD_BCRYPT);

    // Consulta SQL usando uma declaração preparada para inserir dados com a senha criptografada
    $sql = "INSERT INTO cadastro (nome, email, senha) VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("cadastro", $nome, $email, $senha_hash);

    if ($stmt->execute()) {
        // Registro bem-sucedido, redirecione para a página de login
        header("Location: login.php");
        exit();
    } else {
        echo "Erro ao inserir dados: " . $stmt->error;
    }

    $stmt->close();
}

error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

