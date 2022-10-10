<?php include  '../header.php'?>
<div class="container-fluid mt-5 d-none">
    <div class="row">
        <main role="main" class="col ml-sm-auto">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h4">Categorias dos Animais</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button class="btn btn-sm btn-outline-secondary" onclick="showModalCategoriaAnimal()"><span data-feather="plus-circle"></span> Novo</button>
                        <button class="btn btn-sm btn-outline-secondary"><span data-feather="file-text"></span> Export PDF</button>
                        <button class="btn btn-sm btn-outline-secondary"><span data-feather="bar-chart"></span> Análise</button>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>CATEGORIA</th>
                            <th>PORTE</th>
                            <th>ZOOTECNIA</th>
                            <th>CLASSIFICAÇÃO</th>
                            <th>STATUS</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    
                    <tbody id="lista-categorias-de-animais">
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<?php include_once "../includes/form-cadastro-categoria-animal.php"; ?>
<script type="text/javascript">
    get("<?php echo $_ENV['HOST_API'] ?>/api/v1/categorias-de-animais").then(element => {
        let html = "";
        element.forEach(data => {
            if(data.categoriaAtiva === 'N'){
                data.categoriaAtiva = 'DESATIVADA'
            }else{
                data.categoriaAtiva = 'ATIVA'
            }
            html += "\n\
            <tr>\n\
                <td>" + data.categoriaNome + "</td>\n\
                <td>" + data.categoriaPorte + "</td>\n\
                <td>" + data.categoriaZootecnica + "</td>\n\
                <td>" + data.categoriaClassificacao + "</td>\n\
                <td>" + data.categoriaAtiva + "</td>\n\
                <td><button class=\"btn btn-sm btn-danger\">EXCLUIR</button>\n\
                <button class=\"btn btn-sm btn-info\">ALTERAR</button></td>\n\
            </tr>\n\
            ";
        });
        document.getElementById("lista-categorias-de-animais").innerHTML = html;
    });

    function cadastraCategoriaAnimal(id_element) {
        let data = $("#formCategoriaAnimal").serialize();
        let response = post("<?php echo $_ENV['HOST_API'] ?>/api/v1/categorias-de-animais", data, id_element);
        
        if (response !== null) {
            if(Response.categoriaAtiva === 'N'){
                Response.categoriaAtiva = 'DESATIVADA'
            }else{
                Response.categoriaAtiva = 'ATIVA'
            }
            let html = "\n\
            <tr>\n\
                <td>" + response.categoriaNome + "</td>\n\
                <td>" + response.categoriaPorte + "</td>\n\
                <td>" + response.categoriaZootecnica + "</td>\n\
                <td>" + response.categoriaClassificacao + "</td>\n\
                <td>" + response.categoriaAtiva + "</td>\n\
                <button class=\"btn btn-sm btn-danger\">EXCLUIR</button>\n\
                <button class=\"btn btn-sm btn-info\">ALTERAR</button></td>\n\
            </tr>\n\
            ";
            $("#lista-categorias-de-animais").append(html);
            $("#ModalCategoriaAnimal").modal('toggle');
        }
    }
</script>

<?php include  '../footer.php'?>