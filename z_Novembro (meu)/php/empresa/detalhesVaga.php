<?php
session_start();
if (!isset($_SESSION) || $_SESSION =="" || $_SESSION == null) {header('Location: ../../html/login.html');}
else{
include('../conexao.php');

$resposta="";

$idVaga = $_GET['idVaga'];

$buscaVaga = mysqli_query($con, "SELECT * FROM vaga where id_vaga = '$idVaga'");
$resultadoVaga = mysqli_fetch_row($buscaVaga);

$cnpj = $resultadoVaga[7];

$buscaEmp = mysqli_query($con, "SELECT * FROM empresa where cnpj = '$cnpj'");
$resultadoEmp = mysqli_fetch_row($buscaEmp);

$buscaLogo = $resultadoEmp[5];
$dataLimite = $resultadoVaga[5];

$dataLimite = implode("/",array_reverse(explode("-",$dataLimite)));
if ($buscaLogo=="" || $buscaLogo==null || $buscaLogo == " ") {
    $buscaLogo = "../../contents/imgs/3106921.png";
}

$busca= mysqli_query($con, "SELECT * from competencia_vaga where id_vaga = '$idVaga'");
$resultado;
$resultado2;
    if( mysqli_num_rows($busca)>= 1) {
        while($resultado = mysqli_fetch_row($busca)){
            echo "<script>console.log('entrei no primeiro while')</script>";
            $idComp = $resultado[2];
            $busca2 = mysqli_query($con, "SELECT * from competencia where id_competencia = $idComp");

            while($resultado2= mysqli_fetch_row($busca2)){
                echo "<script>console.log('entrei no segundo while')</script>";
                $resposta = $resposta."<a href=\"../../html/competencias.html\" target=\"_Blank\"><button>".$resultado2[1]."</button></a>";
            }
        }
    }
    else{
        $resposta = "<a href=\"#\"><button>sem nenhum requisito</button></a>";
    }
    




?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Material Icons -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <!-- End -->
    <!-- ==================================================================================== -->
        <!-- CSS -->
            <link rel="stylesheet" href="../../style/home.css">
            <link rel="stylesheet" href="../../style/style.css">
            <link rel="stylesheet" href="../../style/header.css">
            <link rel="stylesheet" href="../../style/home_empresa.css">
            <link rel="stylesheet" href="../../style/detalhesVaga.css">
        <!-- End -->
    <title>BartoHelp - Detalhes</title>
</head>
<body>
    
    <header id="topo">
    </header>

    <div class="topo">
        <div class="img">
            <img src="<?php echo $buscaLogo; ?>" alt="" class="logoEmp">
        </div>
        

        <div class="titulo">
            <h1> <?php echo $resultadoVaga[1]; ?></h1>
            <hr/>
            <h4> <?php echo $resultadoEmp[1]?></h4>
            <h4> <?php echo $resultadoVaga[9]?> </h4>
            <h4> <?php echo "R$ ".$resultadoVaga[8]?> </h4>
            <h4> <?php echo $resultadoVaga[4]." - ".$dataLimite;?> </h4>
        </div>
        <a <?php echo "href=\"./editarVaga.php?id=".$resultadoVaga[0]."\"" ?> >
            <button class="editarVaga">
                editar        
            </button>
        </a>

    </div>
    <div class="contedor">
        <div>
            <h1>
                Sobre a empresa
                <hr style=" width:20vw; "/>
            </h1>
            
        </div>        

        <div>
            <h1>
                Responsabilidades
                <hr style=" width:22vw; "/>
            </h1>

            
                    <?php echo "<br/>".$resultadoVaga[2]?>;
                    <br/>
        </div>
        

        <div>
            <h1>
                Benefícios
                <hr style=" width:13vw; "/>
            </h1>
                    <?php echo "<br/>".$resultadoVaga[3]?>
                    <br/>
        </div>

                

        <div>
            <h1>
                Requisitos
                <hr style=" width:13vw; "/>
            </h1>

            <div id="requisitosCards">
                <?php 
                    echo $resposta;
                ?>
            </div>

        </div>

    </div>
   
    <footer>
    </footer>
    
</body>
    <script src="../../js/header.js"></script>
    <script src="../../js/footer.js"></script>
    <script src="../../js/confirmDelet.js"></script>
</html> <?php } ?>