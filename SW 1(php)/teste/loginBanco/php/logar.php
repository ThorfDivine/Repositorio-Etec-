<?php
    //session
    //tem que ser logo abaixo do php OBRIGATORIO
    session_start();
    //session_start sempre na primeira linha do código! OBRIGATORIO!!

    include('conectarPhp.php');
    if (!empty($_POST)) {
        # code...
    $gmail = $_POST["gmail"];
    $senha = $_POST["senha"];

    $senhaCripto = base64_encode($senha);


    $busca = mysqli_query($conexao, "select * from usuario where gmail = '$gmail' and senha ='$senhaCripto'"); //pega os resultados do banco

    if(mysqli_num_rows($busca)>0){ // tem mais de uma linha de sql logo ele tem login

        $_SESSION['PUDIMLogado7w7']=1;
        $result = mysqli_fetch_array($busca);
        $_SESSION['usuario']=$result[2];
        $_SESSION['cpf']=$result[1];

        echo "<script>window.location.href = '../html/index.php'</script>";
    }else{ // não voltou nenhuma linha, logo não esta registrado!
        $_SESSION['PUDIMLogado7w7']=0;
       echo "<script>alert('Email ou senha não cadastrados'); window.location.href = '../html/login.php'</script>";
    }}
?>