<?php
    session_start();
    include('./conexao.php');
    include('./upload.php');

    if (!empty($_POST)) {
        # code...
        $category = $_POST['category'];
        $nome = $_POST["identity"];
        $cep= $_POST["cep"];
        $fone = $_POST["fone"];
        $email = $_POST["email"];
        $senha = $_POST["password"];
        $senhaCripto = base64_encode($senha);

        if ($category == "trabalhador") {
            
            echo $category."entrei trabalhador";
            $cpf = $_POST["cpf"];
            $birth =$_POST["birth"];
            

            $gravar = mysqli_query($con, "insert into usuario(email, nome, senha, telefone,  cpf, nascimento, cep) values('$email','$nome', '$senhaCripto', '$fone','$cpf', '$birth', '$cep')");
            if ($gravar){
                echo "<script>alert('cadastrado com sucesso'); window.location.href = '../HTML/login.html';</script>";

            }else{
                echo "<br/> erro de gravação";
            } 

        }else{
            echo $category."entrei empresa";
            $cnpj = $_POST["cnpj"];
            $imgUploaded =  "../contents/imgs/logoEmpresa/".$_FILES["imagem"]["name"];
            move_uploaded_file($_FILES["imagem"]["tmp_name"], $imgUploaded);     

            $gravar = mysqli_query($con, "insert into empresa(cnpj, nome, gmail, senha, telefone, logo) values('$cnpj', '$nome', '$email','$senhaCripto','$fone', '$imgUploaded')");
            
            if ($gravar){
                echo "<script>alert('cadastrado com sucesso'); window.location.href = '../HTML/login.html';</script>";
               
            }else{
                echo "<br/> erro de gravação";
            } 
        }


        
    }
?>
?>