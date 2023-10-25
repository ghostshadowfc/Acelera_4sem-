<?php
include 'banco.php';


$error = ""; // Inicialize a mensagem de erro como uma string vazia

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $senha_digitada = $_POST['password'];

    // Consulta SQL para obter o hash da senha do banco de dados
    $sql = "SELECT senha FROM cadastro WHERE nome = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $senha_hash = $row['senha'];

        if (password_verify($senha_digitada, $senha_hash)) {
            // Senha correta, o usuário está autenticado
            // Redirecione para a próxima tela
            header('Location: painelt.php');
            exit();
        } else {
            // Senha incorreta
            header('Location: login.php?error=password');
            exit();
        }
    } else {
        // Nome de usuário não encontrado
        header('Location: login.php?error=username');
        exit();
    }
}


?>


<?php
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    if ($error === 'password') {
        $errorMessage = "Senha incorreta.";
    } elseif ($error === 'username') {
        $errorMessage = "Nome de usuário não encontrado.";
    } else {
        $errorMessage = "Erro desconhecido.";
    }
} else {
    $errorMessage = ""; // Mensagem de erro em branco por padrão
}
?>

<!-- Exiba a mensagem de erro -->
<p class="error-message" style="color: red;"><?php echo $errorMessage; ?></p>




<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
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
        .login-box {
            width: 800px;
            height: 500px;
            position: relative;
            display: flex;
            flex-direction: row;
        }
        .form-side {
            width: 50%;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .message-box {
            width: 50%;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: #7ABC37; /* Fundo verde */
        }
        h1 {
            color: #7ABC37;
            font-size: 40px;
            font-weight: 700;
            text-transform: uppercase;
        }
        label {
            color: #7ABC37;
            font-size: 20px;
            font-weight: 400;
        }
        input {
            width: 100%;
            height: 30px;
            border: 1px solid #7ABC37;
            border-radius: 5px;
        }
        button {
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
        p {
            color: white;
            font-size: 20px;
            font-weight: 400;
            text-align: center;
        }
        .signup-button {
            background: white;
            color: #7ABC37;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <div class="form-side">
                <h1>Login</h1>
                <form method="post" action="painelt.php">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit" class="button ">Entrar</button>
        <p class="error-message" style="color: red;"></p>
        <div class="form-side">
   
    </form>
</div>

    </form>
              
            </div>
            <div class="message-box">
                <p>Para novos usuários, insira seus dados pessoais para começar a sua jornada conosco.</p>
                <button class="signup-button" onclick="window.location.href = 'cadastrar.php'">Inscrever-se</button>
                <form method="post" action="cadastrar.php">
            </div>
        </div>
    </div>
    
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


