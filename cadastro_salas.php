<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de Salas</title>
        <script src="https://kit.fontawesome.com/c65d405071.js" crossorigin="anonymous"></script>
</head>
<body>
<picture>
        <source srcset="imagens/pqtopo_ifpi.png" media="(max-width: 600px)">
        <source srcset="imagens/topo_ifpi.png" media="(max-width: 1500px)">
        <source srcset="imagens/topo_ifpi.png">
        <img src="imagens/topo_ifpi.png" alt="ifpi">
    </picture>
<?php
    require_once 'db/conexao.php';
    if(isset($_POST['acao'])){
        $numero=$_POST['numero_sala'];
        $desc=$_POST['descricao'];
        $erro="select * from sala where numero=$numero";
        $execute=$conexao->query($erro);
        $line= mysqli_affected_rows($conexao);
        if ($line==0){
            $sql="insert into sala (numero,descricao) values('$numero','$desc')";
            $exe=$conexao->query($sql);
            $linhas=mysqli_affected_rows($conexao);
            if($linhas>0){
                echo '<center><p class="sucess"><i class="fa-solid fa-check"></i>Sala cadastrada com sucesso!</p></center>';
            }
        }
        else{
            echo "<center><p class='warning'><i class='fa-solid fa-triangle-exclamation fa-1x'></i>&nbsp;Sala já cadastrada</p></center>";
        }

    }
    mysqli_close($conexao);
    ?>
    <form class="formulario" method="POST">
        <p><b>Cadastro de Salas</b></p>
        
        <div class="field">
            <label for="numero"><b>Número:</b></label>
            <input type="text" id="numero_sala" name="numero_sala" placeholder="Digite o numero da sala*" required>
        </div>

        <div class="field">
            <label for="nome"><b>Descrição:</b></label>
            <input type="text" id="descricao" name="descricao" placeholder="Especifique que tipo de sala*" required>
        </div>
        <input type="submit" name="acao" value="Enviar">
    </form>
</body>
</html>