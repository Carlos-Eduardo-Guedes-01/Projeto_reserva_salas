<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Alterar Reserva de Salas</title>
        <script src="https://kit.fontawesome.com/c65d405071.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    require_once 'db/conexao.php';
    if(isset($_POST['acao'])){
        $id=$_GET['id'];
        $nome=$_POST['nome'];
        $data_reserva=$_POST['data'];
        $hora_inicio=$_POST['horario_inicio'];
        $hora_fim=$_POST['horario_fim'];
        $numero=$_POST['numero'];
        #$sqlcheckprof="SELECT nome FROM reserva WHERE horario_inicio between '$hora_inicio' AND '$hora_fim' and horario_fim between '$hora_inicio' and '$hora_fim' data_reserva='$data_reserva' and Sala_numero='$numero'";
        $sqlcheckprof="SELECT * FROM reserva r WHERE data_reserva='$data_reserva' and Sala_numero='$numero' and ((horario_inicio between '$hora_inicio' and '$hora_fim') and (horario_fim between '$hora_inicio' and '$hora_fim'));";
        $verifica=$conexao->query($sqlcheckprof);
        $rowprof= mysqli_affected_rows($conexao);
            if ($rowprof==0){
                $sql="update reserva set nome='$nome',data_reserva='$data_reserva', horario_inicio='$hora_inicio', horario_fim='$hora_fim' where id='$id';";
                $exe=$conexao->query($sql);
                $aff= mysqli_affected_rows($conexao);
                if($aff>0){
                    echo '<center><p class="sucess"><i class="fa-solid fa-check"></i>Reservado com sucesso!</p></center>';
                }
                else{
                    echo "<center><p class='warning'><i class='fa-solid fa-triangle-exclamation fa-1x'></i>&nbsp;Não foi possível reservar</p></center>";
                }
            }
            else{
                echo "<center><p class='warning'><i class='fa-solid fa-triangle-exclamation fa-1x'></i>&nbsp;Sala já Reservada</p></center>";
            }
                }
    mysqli_close($conexao);
    ?>
	<form class="formulario" ACTION="#" method="POST">
        <p><b>Atualiza Reserva</b></p>
        <div class="field">
            <label for="numero"><b>Número da Sala:</b></label>
            <input type="text" id="numero" name="numero" placeholder="Digite a Matrícula*" required>
        </div>
        <div class="field">
            <label for="nome"><b>Nome do Responsável:</b></label>
            <input type="text" id="nome" name="nome" placeholder="Digite o Nome*" required>
        </div>

        <div class="field">
            <label for="horario"><b>Horário:</b></label>

            <label for="horario">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Início-Fim:</label>

            <input type="time" id="horario_inicio" name="horario_inicio" min="07:00" max="22:00" required>&nbsp;-&nbsp;

            <input type="time" id="horario_fim" name="horario_fim" min="07:00" max="22:00" required>

            </div>
        
        <div class="field">
            <label for="telefone"><b>Data:</b></label>
            <input type="date" id="data" name="data">
        </div>
        <input type="submit" name="acao" value="Atualizar">
    </form>
</body>
</html>