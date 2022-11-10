<?php
require_once 'db/conexao.php';
$matricula=$_GET['matricula'];
$sqlpr="select*from professor where matricula='$matricula'";
$query_pr=$conexao->query($sqlpr);
$row_prof= mysqli_affected_rows($conexao);
$sqlal="select*from aluno where matricula='$matricula'";
$query_al=$conexao->query($sqlal);
$row_alu=mysqli_affected_rows($conexao);
if($row_prof>0){
    $sql_del="delete from professor where matricula='$matricula'";
    $query_prof=$conexao->query($sql_del);
    $row_delete=mysqli_affected_rows($conexao);
    if($row_delete>0){
        echo '<center><p class="sucess"><i class="fa-solid fa-check"></i>Dados apagados com sucesso!</p></center>';
    }
    else{
        echo "<center><p class='warning'><i class='fa-solid fa-triangle-exclamation fa-1x'></i>&nbsp;Falha ao Deletar dados!</p></center>";
    }
}
else{
    if($row_alu>0){
    $sql_del="delete from aluno where matricula='$matricula'";
    $query_alunos=$conexao->query($sql_del);
    $row_delete=mysqli_affected_rows($conexao);
    if($row_delete>0){
        echo '<center><p class="sucess"><center><p class="sucess">Dados apagados com sucesso!</p></center>';
    }
    else{
        echo "<center><p class='warning'><i class='fa-solid fa-triangle-exclamation fa-1x'></i>&nbsp;Erro na Query de Deletar dados!</p></center>";
    }
}
else{
    echo $matricula;
    echo "<center><p class='warning'><i class='fa-solid fa-triangle-exclamation fa-1x'></i>&nbsp;Usuário não existe!</p></center>";
}
}
mysqli_close($conexao);