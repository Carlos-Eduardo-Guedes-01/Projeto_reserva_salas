<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de Professores</title>
        <script src="https://kit.fontawesome.com/c65d405071.js" crossorigin="anonymous"></script>
</head>

<body>
    <picture>
        <source srcset="imagens/pqtopo_ifpi.png" media="(max-width: 600px)">
        <source srcset="imagens/topo_ifpi.png" media="(max-width: 1500px)">
        <source srcset="imagens/topo_ifpi.png">
        <img src="imagens/topo_ifpi.png" alt="ifpi">
    </picture>
    <form class="formulario" method="POST">
        <?php
    require_once 'db/conexao.php';
    if(isset($_POST['acao'])){
        $matricula=$_POST['matricula'];
        $area=$_POST['area'];
        $nome=$_POST['nome'];
        $telefone=$_POST['telefone'];
        $email=$_POST['email'];
        $endereco=$_POST['endereco'];
        $erro="select * from professor where matricula='$matricula'";
        $execute=$conexao->query($erro);
        $line= mysqli_affected_rows($conexao);
        if ($line==0){
            $sql="insert into professor (matricula,area,nome,telefone,email,endereco) 
            values('$matricula','$area','$nome','$telefone','$email','$endereco')";
            $exe=$conexao->query($sql);
            $linhas=mysqli_affected_rows($conexao);
            if($linhas>0){
                echo '<center><p class="sucess"><i class="fa-solid fa-check"></i>Professor cadastrado com sucesso!</p>';
            }
        }
        else{
            echo "<center><p class='warning'><i class='fa-solid fa-triangle-exclamation fa-1x'></i>&nbsp;Professor(a) já cadastrado(a)</p></center>";
        }
        
    }
    mysqli_close($conexao);
    ?>
        <p><b>Cadastro de Professores</b></p>
        
        <div class="field">
            <label for="matricula"><b>Matrícula:</b></label>
            <input type="text" id="matricula" name="matricula" placeholder="Digite a Matrícula*" required>
        </div>

        <div class="field">
            <label for="nome"><b>Nome do Professor:</b></label>
            <input type="text" id="nome" name="nome" placeholder="Digite o Nome*" required>
        </div>

        <div class="field">
            <label for="area"><b>Área:</b></label>
            <input type="endereco" id="area" name="area" placeholder="Digite a Área*" required>
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
            <input type="text" id="endereco" name="endereco" placeholder="Digite o Endereço*" required>
        </div>
        <input type="submit" name="acao" value="Enviar">
    </form>
</body>
</html>