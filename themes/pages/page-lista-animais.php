<?php include  '../header.php'?>
<div class="container-fluid mt-5 d-none">
    <div class="row">
        <main role="main" class="col ml-sm-auto">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h4">Animais</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal"><span data-feather="plus-circle"></span> Novo</button>
                        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#ModalProducao"><span data-feather="package"></span> Produção</button>
                        <button class="btn btn-sm btn-outline-secondary"><span data-feather="file-text"></span> Export PDF</button>
                        <button class="btn btn-sm btn-outline-secondary"><span data-feather="bar-chart"></span> Análise</button>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm" id="table">
                    <thead>
                        <tr>
                            <th>IDENTIFICAÇÃO</th>
                            <th>TIPO</th>
                            <th>NOME</th>
                            <th>RAÇA</th>
                            <th>FORNECEDOR</th>
                            <th>CATEGORIA</th>
                            <th>PORTE</th>
                            <th>CLASSIFICAÇÃO</th>
                            <th>SITUAÇÃO</th>
                            <th>#</th>
                        </tr>
                    </thead>

                    <tbody id="lista-animais"></tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<?php include_once "../includes/form-cadastro-animal.php"; ?>
<?php include_once "../includes/form-cadastro-producao.php"; ?>

<script type="text/javascript">
    get("<?php echo $_ENV['HOST_API'] ?>/api/v1/animais/fornecedores/categorias").then(element => {
        let html = "";
        element.forEach(data => {
            html += "\n\
            <tr>\n\
            <td>" + data.animalCodigo + "</td>\n\
                <td>" + data.animalTipo + "</td>\n\
                <td>" + data.animalNome + "</td>\n\
                <td>" + data.animalRaca + "</td>\n\
                <td>" + data.fornecedor[0].fornecedorNome + "</td>\n\
                <td>" + data.categoria[0].categoriaNome + "</td>\n\
                <td>" + data.categoria[0].categoriaPorte + "</td>\n\
                <td>" + data.categoria[0].categoriaClassificacao + "</td>\n\
                <td>" + data.animalSituacao + "</td>\n\
                <td><a href='producao-animal?codigo_animal="+data.animalCodigo+"'<button class=\"btn btn-sm btn-primary\">PRODUÇÃO</button></a>\n\
                <button class=\"btn btn-sm btn-danger\">EXCLUIR</button>\n\
                <button class=\"btn btn-sm btn-info\">ALTERAR</button></td>\n\
            </tr>\n\
            ";
        });
        document.getElementById("lista-animais").innerHTML = html;
    });
</script>
<?php include '../footer.php'; ?>

