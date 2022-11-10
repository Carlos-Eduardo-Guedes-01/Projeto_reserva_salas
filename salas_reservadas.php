<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Salas Reservadas</title>
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
		<h1>Salas Reservadas</h1>
                    <?php
                require_once 'db/conexao.php';
                $sql = "SELECT professor_matricula,id,r.nome,descricao,Sala_numero,DATE_FORMAT(data_reserva,'%d/%m/%Y') as data_reserva,horario_inicio,horario_fim FROM reserva r,sala s,professor p where r.Sala_numero=s.numero and data_reserva>=date('Y/m/d') and professor_matricula=p.matricula;";
                $professores = $conexao->query($sql);

                if ($professores->num_rows > 0) {
                  while($l = $professores->fetch_assoc()) { 
                      $numero=$l['Sala_numero'];
                      $descricao=$l['descricao'];
                      $nome=$l['nome'];
                      $data=$l['data_reserva'];
                      $hora_inicio=$l['horario_inicio'];
                      $hora_fim=$l['horario_fim'];
                      $id=$l['id'];
                    ?>  
        <form class="formulario" method="POST">
            
                    <h1>Professores</h1>
        <div class="field">
            <label for="numero" id="salas_reservadas"><b>Número:</b></label>
            <input type="text" id="numero_sala" name="numero_sala" value="<?php echo $numero;?>"width="20%" readonly>
        </div>

        <div class="field">
            <label for="descricao"><b>Descrição:</b></label>
            <input type="text" id="descricao" name="descricao" value="<?php echo $descricao;?>"readonly>
        </div>
        <div class="field">
            <label for="nome"><b>Responsável:</b></label>
            <input type="text" id="nome" name="nome" value="<?php echo $nome;?>"readonly>
        </div>
        <div class="field">
            <label for="nome"><b> Data:</b></label>
            <input type="text" id="data" name="data" value="<?php echo $data;?>"readonly>
            <br></br>
        </div>
        <div class="field">
            <label for="nome"><b>Horário:</b></label>
            <input type="text" id="horario" name="horario" value="<?php echo $hora_inicio;?> - <?php echo $hora_fim;?>"readonly>
            <br><br>
        </div>
            <div class="field">
                <?php echo "<a href='altera_reserva.php?id=$id'>Alterar</a><br><br><br>";
                  echo "<a href='deleta_reserva.php?id=$id'>Deletar</a>"?>
            </div>
    </form>
                  <?php }}?>
    <?php
                require_once 'db/conexao.php';
                $sql = "SELECT aluno_matricula,id,r.nome,descricao,Sala_numero,DATE_FORMAT(data_reserva,'%d/%m/%Y') as data_reserva,horario_inicio,horario_fim FROM reserva r,sala s,aluno a where r.Sala_numero=s.numero and data_reserva>=date('Y/m/d') and aluno_matricula=a.matricula;";
                $aluno = $conexao->query($sql);

                if ($aluno->num_rows > 0) {
                  while($l = $aluno->fetch_assoc()) { 
                      $numero=$l['Sala_numero'];
                      $descricao=$l['descricao'];
                      $nome=$l['nome'];
                      $data=$l['data_reserva'];
                      $hora_inicio=$l['horario_inicio'];
                      $hora_fim=$l['horario_fim'];
                      $id=$l['id'];
?>       <h1>Alunos</h1>
        <form class="formulario" method="POST">
        <div class="field">
            <label for="numero" id="salas_reservadas"><b>Número:</b></label>
            <input type="text" id="numero_sala" name="numero_sala" value="<?php echo $numero;?>"width="20%" readonly>
        </div>

        <div class="field">
            <label for="descricao"><b>Descrição:</b></label>
            <input type="text" id="descricao" name="descricao" value="<?php echo $descricao;?>"readonly>
        </div>
        <div class="field">
            <label for="nome"><b>Responsável:</b></label>
            <input type="text" id="nome" name="nome" value="<?php echo $nome;?>"readonly>
        </div>
        <div class="field">
            <label for="nome"><b> Data:</b></label>
            <input type="text" id="data" name="data" value="<?php echo $data;?>"readonly>
            <br></br>
        </div>
        <div class="field">
            <label for="nome"><b>Horário:</b></label>
            <input type="text" id="horario" name="horario" value="<?php echo $hora_inicio;?> - <?php echo $hora_fim;?>"readonly>
        </div>
            <div class="field">
                <?php echo "<a href='altera_reserva.php?id=$id'>Alterar</a><br><br><br>";
                  echo "<a href='deleta_reserva.php?id=$id'>Deletar</a>"?>
            </div>
    </form>
                <?php }}mysqli_close($conexao);?>
</body>
</html>