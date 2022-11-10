
<?php
require_once 'db/conexao.php';
$id=$_GET['id'];
$sql_del="delete from reserva where id='$id'";
$query_prof=$conexao->query($sql_del);
$row_delete=mysqli_affected_rows($conexao);
if($row_delete>0){
    echo '<center><p class="sucess"><i class="fa-solid fa-check"></i>Dados apagados com sucesso!</p></center>';
    header("Location:salas_reservadas.php");
}
else{
    echo "<center><p class='warning'><i class='fa-solid fa-triangle-exclamation fa-1x'></i>&nbsp;Falha ao Deletar dados!</p></center>";
}
