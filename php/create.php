<?php 

include "config.php";

  if (isset($_POST['submit'])) {

    $nome = $_POST['nome'];

    $cpf = $_POST['cpf'];

    $email = $_POST['email'];

    $senha = $_POST['senha'];

    $usuario = $_POST['usuario'];

    $sql = "INSERT INTO `users`(`nome`, `cpf`, `email`, `senha`, `usuario`) VALUES ('$nome','$cpf','$email','$senha','$usuario')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "Cadastro Realizado";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close(); 

  }

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>replit</title>
  <link href="Style-Cadastro.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <div class="cabeçalho">
    <a href="#" id="imageLink3"><img class="logo" src="assents/image_1.png"> </a>
    <h1 class="titulo"> Health <br> Care </h1>
    <button class="login">
      <img class="login2" src="assents/3607444_1.png">
      <h1 class="login3"> Login </h1>
    </button>
    <div class="botoes-cabeçalho">
      <nav>
        <ul>
          <li><a href="planos.html">Assine nosso plano</a></li>
          <li><a href="#">Contatos</a></li>
          <li><a href="#">Atendimentos</a></li>
          <li><a href="#">Quem Nós Somos</a></li>
        </ul>
      </nav>
    </div>
  
  <div class="crie-conta"> Crie sua conta </div>
  <div class="meio">
    <form action="cadastro.php" method="post" id="cadastro-form">
      <fieldset>
      <label class="nome2"> Nome:
        <input class="nome" id="nome" type="text" name="nome" required placeholder="Digite seu nome aqui">
      </label>

      <label class="email2"> Email:
        <input class="email" id="email" type="email" name="email" required placeholder="marquinhos@exemplo.com" />
      </label>

      <label class="cidade2"> Cidade:
        <input class="cidade" id="cidade" type="text" name="cidade" required placeholder="Digite sua Cidade aqui" list="opcoes-cidade"
          size="40" />
        <datalist id="opcoes-cidade">
          <option value="Sumaré"></option>
          <option value="Nova Odessa"></option>
          <option value="Americana"></option>
          <option value="Piracicaba"></option>
          <option value="Campinas"></option>
        </datalist>
      </label>

      <label class="cpf2"> CPF:
        <input class="cpf" type="text" name="cpf" id="cpf" required placeholder="Digite seu CPF aqui">
      </label>

      <label class="senha2"> Senha: 
        <input class="senha" type="password" name="senha" required placeholder="Digite sua Senha aqui"
          id="senha">
      </label>

      <label class="confirme-senha2"> Confirme sua senha:
        <input class="confirme-senha" type="password" name="confirme-senha" required
          placeholder="Digite novamente sua senha" id="confirme-senha">
      </label>
      
      <label id="usuario" class="opcoes-usuarios"> Selecione o tipo de usuário:</label>
      <label class="opcao-usuario">
        <input id="usuario" type="radio" name="usuario" value="medico" required>
        Médico
      </label>
      
      <label class="opcao-usuario">
        <input type="radio" name="usuario" value="paciente" required>
        Paciente
      </label>

      <button type="submit" name="submit"  value="Cadastrar" class="criar-conta1"> Criar Conta </button>
</fieldset>
    </form>
  </div>
  <script>
    function validarFormulario(event) {
      // Evita o envio do formulário
      event.preventDefault();

      // Variável que indica se o formulário é válido
      let formValido = true;

      // Verifica o campo "Nome"
      const nome = document.getElementById("nome").value;
      if (nome.trim() === "") {
        formValido = false;
        alert("Por favor, preencha o campo Nome.");
      }

      // Verifica o campo "Email"
      const email = document.getElementById("email").value;
      if (email.trim() === "") {
        formValido = false;
        alert("Por favor, preencha o campo Email.");
      } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        formValido = false;
      } else {
        // Campo "Email" válido
        // Remove a mensagem de erro, se estiver visível
        const emailError = document.getElementById("email-error");
        if (emailError) {
          emailError.remove();
        }
      }
      
      // Verifica o campo "Cidade"
      const cidade = document.getElementById("cidade").value;
      if (cidade.trim() === "") {
        formValido = false;
        alert("Por favor, selecione uma cidade.");
      }

      // Verifica o campo "CPF"
      const cpf = document.getElementById("cpf").value;
      if (cpf.trim() === "") {
        formValido = false;
        alert("Por favor, preencha o campo CPF.");
      } else if (!/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/.test(cpf)) {
        formValido = false;
        alert("Por favor, preencha o campo CPF com um formato válido (ex: 123.456.789-10).");
      }

      // Verifica o campo "Senha"
      const senha = document.getElementById("senha").value;
      if (senha.trim() === "") {
        formValido = false;
        alert("Por favor, preencha o campo Senha.");
      } else if (senha.length < 8) {
        formValido = false;
        alert("A senha deve ter no mínimo 8 caracteres.");
      }

      // Verifica o campo "Confirme sua senha"
      const confirmaSenha = document.getElementById("confirme-senha").value;
      if (confirmaSenha.trim() === "") {
        formValido = false;
        alert("Por favor, preencha o campo Confirme sua senha.");
      } else if (confirmaSenha !== senha) {
        formValido = false;
        alert("As senhas não coincidem. Por favor, verifique.");
      }

      // Se o formulário for válido, envia o cadastro
      if (formValido) {
        alert("Cadastro enviado com sucesso!");
        document.getElementById("cadastro-form").reset();
        const tipoUsuario = document.querySelector('input[name="usuario"]:checked').value;
        if (tipoUsuario === "medico") {
          window.location.href = "index.html";
        } else if (tipoUsuario === "paciente") {
          window.location.href = "Tela de Login.html";
        }
      }
    }

    // Adiciona um event listener para o submit do formulário
    const formCadastro = document.getElementById("cadastro-form");
    formCadastro.addEventListener("submit", validarFormulario);

    const imageLink3 = document.getElementById("imageLink3");
    imageLink3.addEventListener("click", function () {
      window.location.href = "index.html";
    });
  </script>
</body>

</html>