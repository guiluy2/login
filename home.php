<?php

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
    <title>Painel - <?php echo "$nome" ?>
    </title>
    <!-- Bootstrap core JavaScript-->
    <link href="./assets/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/normalize.css" rel="stylesheet">
</head>

<body style="background-color:#585858!important ;">
    <div class="px-4 py-5 my-5 text-center" style="padding-top: 80px!important;">
        <div class="col-lg-6 mx-auto bg-dark" style="border-radius: 8px; height: 300px; padding-top: 80px; ">
            <p class="lead mb-4">
                <font style="vertical-align: inherit;font-size:31px;color:white">
                    <font style="vertical-align: inherit;">
                        <?php

                        if ($adm == 'sim') {

                            echo 'Bem vindo ' . ucwords($nome) . ', você é um administrador';



                        } else {
                            echo 'Bem vindo ' . ucwords($nome) . ', você é um usuario padrão';


                        }

                        ?>
                    </font>
                </font>
            </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <?php

                if ($adm == 'sim') {

                    echo '
                            <a href ="adm.php"><button type="button" class="btn btn-outline-primary btn-lg">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Confirma</font>
                                </font>
                            </button></a>';
                } else {

                    echo '
                            <a href="user.php"><button type="button" class="btn btn-outline-primary btn-lg">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Confirma</font>
                                </font>
                            </button></a>';
                }

                ?>
            </div>
        </div>
    </div>

</body>

</html>