<?php
require_once('includes/db.php');

if (isset($_POST["email"]) && isset($_POST["senha"]) && $conexao != null) {

    $log = $conexao->prepare("SELECT * FROM tb_usuarios WHERE email = ? AND senha = ?");
    $log->execute(array($_POST["email"], $_POST["senha"]));

    if ($log->rowCount()) {
        $user = $log->fetchAll(PDO::FETCH_ASSOC)[0];

        session_start();
        $_SESSION["usuario"] = array($user["nome"], $user["adm"]);

        echo "<script>window.location = 'home.php' </script>";
    } else {

        echo "<script>window.location = 'senhaincorreta.html' </script>";

    }

} else {

    echo "<script>window.location = 'error.html'</script>";

}
?>