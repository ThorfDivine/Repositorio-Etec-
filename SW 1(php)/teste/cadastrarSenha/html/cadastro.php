<?php
include('../php/conectarPhp.php');
if (!empty($_POST)) {
$name = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['gmail'];
$nascimento = $_POST['nascimento'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];

$senhaCripto = base64_encode($senha);

$busca = mysqli_query($conexao, "select * from usuario where cpf = '$cpf' or gmail = '$email'");

    if(mysqli_num_rows($busca)>0){
        echo "<script>alert('CPF ou email ja cadastrado!'); window.location.href = '../html/cadastro.html'</script>";
    }else{
        $gravar = mysqli_query($conexao, "insert into usuario(cpf, nome, gmail, senha, data_nascimento, telefone) values('$cpf', '$name', '$email','$senha','$nascimento','$telefone')" );
        header("location: ../html/site_do_gustavo.html");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Gustavo batisat de Oliveira Santos">
    <link rel="stylesheet" href="../css/menu2.css">
    <script src="../js/menu2.js"></script>
    <title>site do gustavo</title>
    <link rel="shortcut icon" href="../IMG/logo.png">
</head>
<body onload="openPage()" >

    <script> 
    //var responsavel por abrir e fachar o menu
    let n1;
    let n2;
    //lógica por tras da var    
    
    </script>


    
<div class="super-pai">

    <div class="menu" id="menu">
    <!--menu-->
        <header class="headerMenu" id="headerMenu" >
            <div class="triangulo1" id="triangulo1"></div>
            <div class="Menu1" id="Menu1" onmouseenter="ThorfDivineOpen()" onmouseleave="ThorfDivineClose()"onclick=" alterador()" >
                <h1 class="MenuThorfDivine" id="ThorfDivine">ThorfDivine</h1>
            </div>
            <div class="triangulo2" id="triangulo2"/></div>
        </header>

    <!--mini-menu-->
        <ul class="nav-list" id="nav-list" >
            <li><p class="opcao" id="op1" onclick="cs1() ,alterador2();"></p>
                <p class="opcaomat" id="opcaomat1" onclick="cs11()">iW</p>
                <p class="opcaomat" id="opcaomat2" onclick="cs12()">SW</p>
                <p class="opcaomat" id="opcaomat3" onclick="cs13()">gcW</p>
            </li>
            <li><a href="https://github.com/ThorfDivine" class="opcao" id="op2" onclick="cs2()"></a></li>
            <li><a href="" class="opcao" id="op3" onclick="cs3()"></a></li>
        </ul>
    </div>
    <!--restante-->
    <div class="pai" id="pai">
       <div class="login2">
            <form action="#" method="POST" class="form_logar">

                <div class="title_login">
                    <h2>cadastro</h2> 
                    <p>por favor insira seus dados</p>
                </div>

                <div clas="cadastro">
                    <label for="nome">nome:</label>
                        <div class="rainbow"><input type="text" name="nome" maxlength="50" class="input_login input_login_nome" required></div><br>
                    <label>cpf:</label>
                        <div class="rainbow"><input type="text" name="cpf" maxlength="14" id="cpf" class="input_login" required></div><br>
                    <label>data de nascimento: </label>
                        <div class="rainbow"><input type="date" name="nascimento" class="input_login" required></div><br>
                    <label>telefone: </label>
                        <div class="rainbow"><input type="text" name="telefone" maxlength="14"  id="telefone" class="input_login" required></div> <br>
                    <label>email: </label>
                        <div class="rainbow"><input type="text" name="gmail" maxlength="50" class="input_login" required></div><br>
                    <label>senha:</label>
                        <div class="rainbow">
                            <div class="input_login">
                                <input type="password" maxlength="20" id="senhae" name="senha" class="input_login_senha" required>
                                <img src="../IMG/zoio_zoro_close.jpg" class="zoro" id="zoro" onclick="abrindo()" >
                            </div>
                        </div> <br>
                    <p>
                        para sua segurança, a sua senha deverá possuir : 
                    </p>
                       
                        <ul>
                            <li id="d6a10"><p>De 6-10 caracteres</p></li>
                            <li id="mai"><p>Letras maiúsculas(A..Z)</p></li>
                            <li id="min"><p>Letras minúsculas(a..z)</p></li>
                            <li id="num"><p>Números(1..9)</p></li>
                            <li id="esp"><p>Caracter especial($, %, @, ...)</p></li>
                        </ul>
                    <p id="erros"></p>
                    <div class="rainbow2" id="rainbow2" style="background-color: red;"><input class="logar" id="botao_cad" type="submit" value="logar" disabled></div>
                </div>
            </form>
       </div>
        
    </div>

</div>

<script src="../js/cadastro.js" defer></script>
</body>
</html>