<?php
require_once('includes/db.php');

session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {

    $adm = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];

} else {

    echo "<script>window.location = './index.html' </script>";

}

?>
<html>

<head>
    <title>USER</title>
    <link href="./assets/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/normalize.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">

        <header>
        <a style="float:right ;" href="logout.php"><button style="color:white" type="button" class="btn btn-warning btn-lm">Sair</button><a>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4">
            </div>

            <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                <h1 class="display-4 fw-normal">Planos</h1>
                <p class="fs-5 text-muted">Estes são os nossos planos disponiveis!!!</p>
            </div>
        </header>

        <main>
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Gratis</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$0<small class="text-muted fw-light">/mês</small>
                            </h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>10 usuários </li>
                                <li>2 GB de armazenamento</li>
                                <li>Suporte</li>
                                <li>Area de ajuda</li>
                            </ul>
                            <button type="button" class="w-100 btn btn-lg btn-outline-primary">Assinar de graça</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Profissional</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$15<small class="text-muted fw-light">/mês</small>
                            </h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>20 usuários</li>
                                <li>10 GB de armazenamento</li>
                                <li>Prioridade no suporte</li>
                                <li>Area de ajuda</li>
                            </ul>
                            <button type="button" class="w-100 btn btn-lg btn-primary">Get started</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm border-primary">
                        <div class="card-header py-3 text-bg-primary border-primary">
                            <h4 class="my-0 fw-normal">Empresarial</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$29<small class="text-muted fw-light">/mês</small>
                            </h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>30 usuarios</li>
                                <li>15 GB de armazenamento</li>
                                <li>Suporte 24h</li>
                                <li>Area de ajuda</li>
                            </ul>
                            <button type="button" class="w-100 btn btn-lg btn-primary">Contato</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

</html>