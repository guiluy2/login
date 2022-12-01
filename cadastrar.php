<?php

require_once('includes/db.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$admin = $_POST['admin'];

$insert_values = "INSERT INTO tb_usuarios(email,senha,nome,adm) VALUES(:email,:senha,:nome,:admin)";
$insert_cont = $conexao->prepare($insert_values);

$insert_cont->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
$insert_cont->bindParam(':senha', $_POST['senha'], PDO::PARAM_STR);
$insert_cont->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);
$insert_cont->bindParam(':admin', $_POST['admin'], PDO::PARAM_STR);

if($insert_cont->execute()) {
    $_SESSION['$texto'] = "<p style='color: green;'>Usuario cadastrado com sucesso!</p>";
        echo '$texto';
    header('Location: adm.php');
} else {
    $_SESSION['msg'] = "<p style='color: red;'>Erro ao cadastar usuario!</p>";
}
?>