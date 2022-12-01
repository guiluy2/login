<?php
require_once('includes/db.php');

session_start();

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$deletar = $conexao->prepare("DELETE FROM tb_usuarios WHERE id = $id");
$deletar->execute();

if($deletar):
    header('location: adm.php');
    echo '<p>Usuario deletado com sucesso</p>';
endif;

?>


