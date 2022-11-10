<!DOCTYPE html>
<html lang="pt-br">
<head>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadastro Aluno</title>        
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
        $matricula=$_POST['matricula'];
        $curso=$_POST['curso'];
        $nome=$_POST['nome'];
        $telefone=$_POST['telefone'];
        $email=$_POST['email'];
        $endereco=$_POST['endereco'];
        $erro="select * from aluno where matricula='$matricula'";
        $execute=$conexao->query($erro);
        $line= mysqli_affected_rows($conexao);
        if ($line==0){
            $sql="insert into aluno (matricula,curso,nome,telefone,email,endereco) 
            values('$matricula','$curso','$nome','$telefone','$email','$endereco')";
            $exe=$conexao->query($sql);
            $linhas=mysqli_affected_rows($conexao);
            if($linhas>0){
                echo '<center><p class="sucess"><i class="fa-solid fa-check"></i>Aluno cadastrado com sucesso!</p></center>';
            }
        }
        else{
            echo "<center><p class='warning'><i class='fa-solid fa-triangle-exclamation fa-1x'></i>&nbsp;Aluno(a) já cadastrado(a)</p></center>";
        }
    mysqli_close($conexao);
    }
    ?>
    <form class="formulario" method="POST">
        <p><b>Cadastro de Aluno</b></p>
        
        <div class="field">
            <label for="matricula"><b>Matrícula:</b></label>
            <input type="text" id="matricula" name="matricula" placeholder="Digite a Matrícula*" required>
        </div>

        <div class="field">
            <label for="nome"><b>Nome do Aluno:</b></label>
            <input type="text" id="nome" name="nome" placeholder="Digite o Nome*" required>
        </div>
        
        <div class="field">
            <label for="telefone"><b>Telefone:</b></label>
            <input type="text" id="telefone" name="telefone" placeholder="Digite o Telefone">
        </div>

        <div class="field">
            <label for="email"><b>E-Mail:</b></label>
            <input type="email" id="email" name="email" placeholder="Digite o E-Mail*" required>
        </div>
        <div class="field">
            <label for="endereco"><b>Endereço:</b></label>
            <input type="endereco" id="endereco" name="endereco" placeholder="Digite o Endereço*" required>
        </div>
        <div class="field">
            <label for="curso"><b>Curso:</b></label>
            <input type="endereco" id="curso" name="curso" placeholder="Digite o Endereço*" required>
        </div>
        <input type="submit" name="acao" value="Enviar">
    </form>
</body>
</html>