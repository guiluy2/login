<?php
require_once('includes/db.php');

$id = $_POST['id'];
$email = $_POST['email'];
$senha = $_POST['senha']; 
$nome = $_POST['nome']; 
$adm = $_POST['adm'];

echo $id,$email,$senha,$nome,$adm;

$update = $conexao->prepare("UPDATE tb_usuarios SET email=:email, senha=:senha, nome=:nome, adm=:adm WHERE id=:id");
$update->bindValue(":email", $_POST['email']);
$update->bindValue(":senha", $_POST['senha']);
$update->bindValue(":nome", $_POST['nome']);
$update->bindValue(":adm", $_POST['adm']);
$update->bindValue(":id", $_POST['id']);


$update->execute();

if($update):
    header('location: adm.php');
    echo '<p>Usuario editado com sucesso</p>';
endif;

?>
