<?php include  '../header.php'?>
<div class="container-fluid mt-5 d-none">
    <div class="row">
        <main role="main" class="col ml-sm-auto">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h4">Tipos de produção</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button class="btn btn-sm btn-outline-secondary" onclick="showModalTipoProducao()"><span data-feather="plus-circle"></span> Novo</button>
                        <button class="btn btn-sm btn-outline-secondary"><span data-feather="file-text"></span> Export PDF</button>
                        <button class="btn btn-sm btn-outline-secondary"><span data-feather="bar-chart"></span> Análise</button>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>TIPO</th>
                            <th>UN. DE MEDIDA</th>
                            <th>STATUS</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    
                    <tbody id="lista-tipos-producao">
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<?php include_once "../includes/form-cadastro-tipo-producao.php"; ?>

<script type="text/javascript">
    get("<?php echo $_ENV['HOST_API'] ?>/api/v1/tipos-de-producao").then(element => {
        let html = "";
        element.forEach(data => {
            if(data.tipoProducaoAtivo === 'N'){
                data.tipoProducaoAtivo = 'DESATIVADO'
            }else{
                data.tipoProducaoAtivo = 'ATIVO'
            }
            html += "\n\
            <tr>\n\
                <td>" + data.tipoProducao+ "</td>\n\
                <td>" + data.unidadeMedida + "</td>\n\
                <td>" + data.tipoProducaoAtivo + "</td>\n\
                <td><button class=\"btn btn-sm btn-danger\">EXCLUIR</button>\n\
                <button class=\"btn btn-sm btn-info\">ALTERAR</button></td>\n\
            </tr>\n\
            ";
        });
        document.getElementById("lista-tipos-producao").innerHTML = html;
    });

    function cadastraTipoProducao(id_element) {
        let data = $("#formTipoProducao").serialize();
        let response = post("<?php echo $_ENV['HOST_API'] ?>/api/v1/tipos-de-producao", data, id_element);
        
        if (response !== null) {
            if(response.tipoProducaoAtivo === 'N'){
                response.tipoProducaoAtivo = 'DESATIVADO'
            }else{
                response.tipoProducaoAtivo = 'ATIVO'
            }
            let html = "\n\
            <tr>\n\
                <td>" + response.tipoProducao + "</td>\n\
                <td>" + response.unidadeMedida + "</td>\n\
                <td>" + response.tipoProducaoAtivo + "</td>\n\
            </tr>\n\
            ";
            $("#lista-tipos-producao").append(html);
            $("#ModalTipoProducao").modal('toggle');
        }
    }
</script>
<?php include_once "../includes/form-cadastro-setor.php"; ?>
</script>
<?php include  '../footer.php'?>
