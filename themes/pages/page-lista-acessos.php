<?php include  '../header.php'?>
<div class="container-fluid mt-5 d-none">
    <div class="row">
        <main role="main" class="col ml-sm-auto">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h4">Acessos concedidos</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button class="btn btn-sm btn-outline-secondary" onclick="showModalAcesso()"><span data-feather="plus-circle"></span> Novo</button>
                        <button class="btn btn-sm btn-outline-secondary"><span data-feather="file-text"></span> Export PDF</button>
                        <button class="btn btn-sm btn-outline-secondary"><span data-feather="bar-chart"></span> Análise</button>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm" id="table-animais">
                    <thead>
                        <tr>
                            <th>USUARIO</th>
                            <th>SETOR</th>
                            <th>ACESSO</th>
                            <th>#</th>  
                        </tr>
                    </thead>

                    <tbody id="lista-acessos">
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<?php include_once "../includes/form-cadastra-acesso.php"; ?>
<script type="text/javascript">
    get("<?php echo $_ENV['HOST_API'] ?>/api/v1/acessos").then(element => {
        let html = "";
        element.forEach(data => {
            if (data.acessoPermitido === 'N') {
                data.acessoPermitido = 'NEGADO'
            } else {
                data.acessoPermitido = 'PERMITIDO'
            }
            html += "\n\
            <tr>\n\
                <td>" + data.usuarios[0].usuarioNome + "</td>\n\
                <td>" + data.setores[0].setorNome + "</td>\n\
                <td>" + data.acessoPermitido + "</td>\n\
                <td><button class=\"btn btn-sm btn-danger\">EXCLUIR</button>\n\
                <button class=\"btn btn-sm btn-info\">ALTERAR</button></td>\n\
            </tr>\n\
            ";
        });
        document.getElementById("lista-acessos").innerHTML = html;
    });

    function cadastraAcesso(id_element) {
        let data = $("#formAcesso").serialize();
        let response = post("<?php echo $_ENV['HOST_API'] ?>/api/v1/acessos", data, id_element);
        
        if (response !== null) {
            get("<?php echo $_ENV['HOST_API'] ?>/api/v1/acessos").then(element => {
                let html = "";
                element.forEach(data => {
                    if (data.acessoPermitido === 'N') {
                        data.acessoPermitido = 'NEGADO'
                    } else {
                        data.acessoPermitido = 'PERMITIDO'
                    }
                    html += "\n\
            <tr>\n\
                <td>" + data.usuarios[0].usuarioNome + "</td>\n\
                <td>" + data.setores[0].setorNome + "</td>\n\
                <td>" + data.acessoPermitido + "</td>\n\
            </tr>\n\
            ";
                });
                $("#lista-acessos").html(html);
                $("#ModalAcesso").modal('toggle');
            });
        }
    }
</script>

<?php include  '../footer.php'?>