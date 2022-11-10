<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastro de Professores</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
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
    $matricula=$_POST['matricula'];
    if(isset($_POST['atualizar'])){
        $area=$_POST['area'];
        $nome=$_POST['nome'];
        $telefone=$_POST['telefone'];
        $email=$_POST['email'];
        $endereco=$_POST['endereco'];
        $erro="select*from professor where matricula='$matricula';";
        $execute=$conexao->query($erro);
        $line= mysqli_affected_rows($conexao);
        if ($line>0){
            $sql="update professor set nome='$nome',telefone='$telefone',email='$email',endereco='$endereco',area='$area' where matricula='$matricula'";
            $exe=$conexao->query($sql);
            $linhas=mysqli_affected_rows($conexao);
            if($linhas>0){
                echo '<center><p class="sucess"><i class="fa-solid fa-check"></i>Professor alterado com sucesso!</p>';
            }
            else{
                echo "<center><p class='warning'><i class='fa-solid fa-triangle-exclamation fa-1x'></i>&nbsp;Falha na query de Atualização!</p></center>";
            }
        }
        else{
            echo "<center><p class='warning'><i class='fa-solid fa-triangle-exclamation fa-1x'></i>&nbsp;Usuário não existe!</p></center>";
        }
    }
    ?>
        <?php
    require_once 'db/conexao.php';
        $matricula=$_POST['matricula'];
        $erro2="select * from professor where matricula='$matricula';";
        $execute2=$conexao->query($erro2);
        $line2= mysqli_affected_rows($conexao);
        if ($line2>0){
            ?>
        <form class="formulario" method="POST">
                <p><b>Alteração de Professores</b></p>

            <div class="field">
                <label for="matricula"><b>Matrícula:</b></label>
                <input type="text" id="matricula" name="matricula" value="<?php echo $matricula?>" readonly>
            </div>

            <div class="field">
                <label for="nome"><b>Nome do Professor:</b></label>
                <input type="text" id="nome" name="nome" placeholder="Digite o Nome*" required>
            </div>

            <div class="field">
                <label for="area"><b>Área:</b></label>
                <input type="text" id="area" name="area" placeholder="Digite a Área*" required>
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
                <input type="submit" name="atualizar" value="Atualizar">
        </form>
        <?php }     mysqli_close($conexao);?>
    
</body>
</html>