<?php include  '../header.php'?>
<div class="container-fluid mt-5 d-none">
    <div class="row">
        <main role="main" class="col ml-sm-auto">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h4">Setores</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button class="btn btn-sm btn-outline-secondary" onclick="showModalSetor()"><span data-feather="plus-circle"></span> Novo</button>
                        <button class="btn btn-sm btn-outline-secondary"><span data-feather="file-text"></span> Export PDF</button>
                        <button class="btn btn-sm btn-outline-secondary"><span data-feather="bar-chart"></span> Análise</button>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>NOME</th>
                            <th>DESCRICAO</th>
                            <th>SIGLA</th>
                            <th>SITUACAO</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    
                    <tbody id="lista-setores">
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<?php include_once "../includes/form-cadastro-setor.php"; ?>
<script type="text/javascript">
    get("<?php echo $_ENV['HOST_API'] ?>/api/v1/setores").then(element => {
        let html = "";
        element.forEach(data => {
            if(data.setorAtivo === 'N'){
                data.setorAtivo = 'DESATIVADO'
            }else{
                data.setorAtivo = 'ATIVO'
            }
            html += "\n\
            <tr>\n\
                <td>" + data.setorNome + "</td>\n\
                <td>" + data.setorDescricao + "</td>\n\
                <td>" + data.setorSigla + "</td>\n\
                <td>" + data.setorAtivo + "</td>\n\
                <td><button class=\"btn btn-sm btn-danger\">EXCLUIR</button>\n\
                <button class=\"btn btn-sm btn-info\">ALTERAR</button></td>\n\
            </tr>\n\
            ";
        });
        document.getElementById("lista-setores").innerHTML = html;
    });

    function cadastraSetor(id_element) {
        let data = $("#formSetor").serialize();
        let response = post("<?php echo $_ENV['HOST_API'] ?>/api/v1/setores", data, id_element);
        
        if (response !== null) {
            if(response.setorAtivo === 'N'){
                response.setorAtivo = 'DESATIVADO'
            }else{
                response.setorAtivo = 'ATIVO'
            }
            let html = "\n\
            <tr>\n\
                <td>" + response.setorNome + "</td>\n\
                <td>" + response.setorDescricao + "</td>\n\
                <td>" + response.setorSigla + "</td>\n\
                <td>" + response.setorAtivo + "</td>\n\
            </tr>\n\
            ";
            $("#lista-setores").append(html);
            $("#ModalSetor").modal('toggle');
        }
    }
</script>

<?php include  '../footer.php'?>
