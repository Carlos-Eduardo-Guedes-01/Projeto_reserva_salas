<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/c65d405071.js" crossorigin="anonymous"></script>
	<title>Lista de Usuários</title>
</head>
<body>
<center>
        <picture>
        <source srcset="imagens/pqtopo_ifpi.png" media="(max-width: 600px)">
        <source srcset="imagens/topo_ifpi.png" media="(max-width: 1500px)">
        <source srcset="imagens/topo_ifpi.png">
        <img src="imagens/topo_ifpi.png" alt="ifpi">
	    </picture>
		<div class="field">
		<h1>Usuários Cadastrados</h1>
                    <?php
                require_once 'db/conexao.php';
                $sql = "SELECT * FROM professor";
                $professores = $conexao->query($sql);
                
                if ($professores->num_rows > 0) {
                    echo '<h1>Professores</h1>';
                  while($l = $professores->fetch_assoc()) { 
                      $matricula=$l['matricula'];
                      $nome=$l['nome'];
                      $area=$l['area'];
                    ?>
                <form class="formulario" method="POST" action="alterar_professor.php">
            
                                
                    <div class="field">
                        <label for="matricula" id="salas_reservadas"><b>Número:</b></label>
                        <input type="text" id="matricula" name="matricula" value="<?php echo $matricula;?>"width="20%" readonly>
                    </div>
                    <div class="field">
                        <label for="nome"><b>Nome:</b></label>
                        <input type="text" id="nome" name="nome" value="<?php echo $nome;?>"readonly>
                    </div>
                    <div class="field">
                        <label for="area"><b> Área:</b></label>
                        <input type="text" id="area" name="area" value="<?php echo $area;?>"readonly>
                        <br></br>
                    <input type="submit" name="acao" value="Alterar">
                    <br>
                    <?php echo"<a href='deletar.php?matricula=$matricula'>Deletar</a>";?>
                    </div>
                </form>
                  <?php 
                  if(isset($_POST['acao'])){
                      header("Location:alterar_professor.php");
                  }
                  }}?>
    <?php
                require_once 'db/conexao.php';
                $sql1 = "SELECT * FROM aluno";
                $aluno = $conexao->query($sql1);
                
                if ($aluno->num_rows > 0) {
                    echo '<h1>Alunos</h1>';
                  while($l = $aluno->fetch_assoc()) { 
                      $matricula=$l['matricula'];
                      $curso=$l['curso'];
                      $nome=$l['nome'];
    ?>       
    <form class="formulario" method="POST" action="alterar_aluno.php">
        <div class="field">
            <label for="numero" id="salas_reservadas"><b>Matricula:</b></label>
            <input type="text" id="matricula" name="matricula" value="<?php echo $matricula;?>"width="20%" readonly>
        </div>
        <div class="field">
            <label for="nome"><b>Nome do Aluno:</b></label>
            <input type="text" id="nome" name="nome" value="<?php echo $nome;?>"readonly>
            
        </div>
        <div class="field">
            <label for="curso"><b>Curso:</b></label>
            <input type="text" id="curso" name="curso" value="<?php echo $curso;?>"readonly>
            <br></br>
            <input type="submit" name="acaoaluno" value="Alterar">
        </div><br>
            <?php echo"<a href='deletar.php?matricula=$matricula'>Deletar</a>";?>
    </form>
                <?php }}mysqli_close($conexao);
                ?>
</body>
</html>