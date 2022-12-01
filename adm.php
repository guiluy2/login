<?php
require_once('includes/db.php');


session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"], )) {

    $adm = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];

} else {

    echo "<script>window.location = './index.html' </script>";

}
?>
<html>

<head>
    <title>ADM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="./assets/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="./assets/css/normalize.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body style="background-color: #585858!important;">
    <div class="centered" style="text-align: center; padding-top:15px ;">
        <h2>Tabela de usuarios cadastrados</h2>
    </div>
    <div class="d-line p-3">
        <div>
            <button type="button" class="btn btn-success btn-lm" data-bs-toggle="modal" data-bs-target="#cadUsuarioModal">Cadastrar</button>
            <a href="logout.php"><button style="color:white" type="button" class="btn btn-warning btn-lm">Sair</button><a>
        </div>
    </div>

    <div style="padding:12px ;">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Adm</th>
                    <th scope="col">Id</th>
                    <th scope="col" style="width:100px"></th>
                    <th scope="col" style="width:100px"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $log = $conexao->prepare("SELECT * FROM tb_usuarios");
                $log->execute();

                $users = $log->fetchAll(PDO::FETCH_ASSOC);

                for ($x = 0; $x < sizeof($users); $x++):
                    $usuarioAtual = $users[$x];

                ?>
                <tr>
                    <td scope="row">
                        <?php echo $usuarioAtual["nome"]; ?>
                    </td>
                    <td>
                        <?php echo $usuarioAtual["email"]; ?>
                    </td>
                    <td>
                        <?php echo $usuarioAtual["senha"]; ?>
                    </td>
                    <td>
                        <?php echo $usuarioAtual["adm"]; ?>
                    </td>
                    <td>
                        <?php echo $usuarioAtual["id"]; ?>
                    </td>
                    <td>
                        <a href='apagar.php?id=<?php echo $usuarioAtual["id"] ?>'><button
                                class="btn btn-danger btn-sm">Apagar</button></i></a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-bs-whatever="<?php echo $usuarioAtual["id"] ?>"
                            data-bs-whatevernome="<?php echo $usuarioAtual["nome"] ?>"
                            data-bs-whateveremail="<?php echo $usuarioAtual["email"] ?>"
                            data-bs-whateversenha="<?php echo $usuarioAtual["senha"] ?>"
                            data-bs-whateveradm="<?php echo $usuarioAtual["adm"] ?>">Editar</button>
                    </td>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="editar.php">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Id:</label>
                            <input name="id" type="number" class="form-control" id="recipient-name" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Nome:</label>
                            <input name="nome" type="text" class="form-control" id="nome"></input>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Email:</label>
                            <input name="email" type="email" class="form-control" id="email"></input>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Senha:</label>
                            <input name="senha" type="senha" class="form-control" id="senha"></input>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Adm:</label>
                            <input name="adm" type="text" class="form-control" id="adm"></input>
                        </div>
                        <input name="id" class="id" type="hidden" id="id"></input>
                        <div>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Salvar</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cadUsuarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cadUsuarioModal">Cadastrar usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" id="cad-usuario-form" action="cadastrar.php" method="POST">
                        <div class="col-12">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome completo"
                                required>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                                required>
                        </div>
                        <div class="col-12">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha"
                                required>
                        </div>
                        <div class="col-12">
                            <label for="admin" class="form-label">Admin</label>
                            <input type="text" name="admin" class="form-control" id="admin" placeholder="sim ou nao"
                                required>
                        </div>
                        <div class="col-12">
                            <input type="submit" class="btn btn-outline-success btn-sm" id="cadastrar"
                                value="Cadastrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    const exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', event => {
        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const recipient = button.getAttribute('data-bs-whatever')
        const recipientnome = button.getAttribute('data-bs-whatevernome')
        const recipientemail = button.getAttribute('data-bs-whateveremail')
        const recipientsenha = button.getAttribute('data-bs-whateversenha')
        const recipientadm = button.getAttribute('data-bs-whateveradm')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        const modalTitle = exampleModal.querySelector('.modal-title')
        const modalBodyInput = exampleModal.querySelector('.modal-body input')

        modalTitle.textContent = `Editar dados do usuario ${recipient}`
        modalBodyInput.value = recipient
        document.getElementById('nome').value = recipientnome
        document.getElementById('email').value = recipientemail
        document.getElementById('senha').value = recipientsenha
        document.getElementById('adm').value = recipientadm
        document.getElementById('id').value = recipient
    })
</script>

</html>