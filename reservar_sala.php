<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reserva de Salas</title>
        <script src="https://kit.fontawesome.com/c65d405071.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    require_once 'db/conexao.php';
    if(isset($_POST['acao'])){
        $matricula=$_POST['matricula'];
        $prof="select * from professor where matricula='$matricula'";
        $alunos="select * from aluno where matricula='$matricula'";
        $query_professores=$conexao->query($prof);
        $linhas_professores= mysqli_affected_rows($conexao);
        $query_alunos=$conexao->query($alunos);
        $linhas_alunos= mysqli_affected_rows($conexao);
        $nome=$_POST['nome'];
        $data_reserva=$_POST['data'];
        $hora_inicio=$_POST['horario_inicio'];
        $hora_fim=$_POST['horario_fim'];
        $numero=$_POST['numero'];
        #$sqlcheckprof="SELECT nome FROM reserva WHERE horario_inicio between '$hora_inicio' AND '$hora_fim' and horario_fim between '$hora_inicio' and '$hora_fim' data_reserva='$data_reserva' and Sala_numero='$numero'";
        $sqlcheckprof="SELECT * FROM reserva r WHERE data_reserva='$data_reserva' and Sala_numero='$numero' and (horario_inicio<='$hora_inicio' and horario_fim>='$hora_fim') or ((horario_inicio between '$hora_inicio' and '$hora_fim') and (horario_fim between '$hora_inicio' and '$hora_fim'));";
        $verifica=$conexao->query($sqlcheckprof);
        $rowprof= mysqli_affected_rows($conexao);
        if($linhas_professores>0){
            if ($rowprof==0){
                $sql="insert into reserva(Professor_matricula,Sala_numero,nome,data_reserva,horario_inicio,horario_fim) values ('$matricula',$numero,'$nome','$data_reserva','$hora_inicio','$hora_fim');";
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
                else {
                    if($linhas_alunos>0){
                     if ($rowprof==0){
                        
                            $sql="insert into reserva(Aluno_matricula,Sala_numero,nome,data_reserva,horario_inicio,horario_fim) values ('$matricula',$numero,'$nome','$data_reserva','$hora_inicio','$hora_fim');";
                            $exe=$conexao->query($sql);
                            $aff= mysqli_affected_rows($conexao);
                            if($aff>0){
                                echo '<center><p style="color:green;">Reservado com sucesso!</p></center>';
                            }
                        }
                        if($rowprof>0){
                            echo "<center><p class='warning'><i class='fa-solid fa-triangle-exclamation fa-1x'></i>&nbsp;Sala já Reservada</p></center>";
                    }
                    
                        }
                    else{
                        echo '<center><p style="color:red;"><i class="fa-solid fa-triangle-exclamation fa-1x"></i>Usuário Inválido</p></center>';
                    }
                }
            }
    mysqli_close($conexao);
    ?>
	<form class="formulario" ACTION="#" method="POST">
        <p><b>Reservas de Salas</b></p>
        
        <div class="field">
            <label for="matricula"><b>Matrícula:</b></label>
            <input type="text" id="matricula" name="matricula" placeholder="Digite a Matrícula*" required>
        </div>
        <div class="field">
            <label for="numero"><b>Número da Sala:</b></label>
            <input type="text" id="numero" name="numero" placeholder="Digite a Número da Sala*" required>
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
        <input type="submit" name="acao" value="Reservar">
    </form>
</body>
</html>