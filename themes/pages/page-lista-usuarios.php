<?php include  '../header.php'?>
<div class="container-fluid mt-5 d-none">
    <div class="row">
        <main role="main" class="col ml-sm-auto">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h4">Usuários</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button class="btn btn-sm btn-outline-secondary"><span data-feather="lock"></span> Permissões</button>
                        <button class="btn btn-sm btn-outline-secondary"><span data-feather="plus-circle"></span> Novo</button>
                        <button class="btn btn-sm btn-outline-secondary"><span data-feather="file-text"></span> Export PDF</button>
                    </div>
                </div>
            </div>  

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>NOME</th>
                            <th>E-MAIL</th>
                            <th>TIPO</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    
                    <tbody id="lista-usuarios">
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<?php
require_once '../../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable('../../');
$dotenv->load();
?>
<script type="text/javascript">
    get("<?php echo $_ENV['HOST_API'] ?>/api/v1/usuarios").then(element => {
        let html = "";
        element.forEach(data => {
            html += "\n\
            <tr>\n\
                <td>" + data.usuarioNome + "</td>\n\
                <td>" + data.usuarioEmail + "</td>\n\
                <td>" + data.usuarioTipo + "</td>\n\
                <td><button class=\"btn btn-sm btn-danger\">EXCLUIR</button>\n\
                <button class=\"btn btn-sm btn-info\">ALTERAR</button></td>\n\
            </tr>\n\
            ";
        });
        document.getElementById("lista-usuarios").innerHTML = html;
    });
</script>
<?php include  '../footer.php'?>
