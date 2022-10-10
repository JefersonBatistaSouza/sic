<?php include '../header.php';?>
<div class="container-fluid mt-5 d-none">
    <div class="row">
        <main role="main" class="col ml-sm-auto">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h4">Fornecedores</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button class="btn btn-sm btn-outline-secondary" onclick="showModalFornecedor()"><span data-feather="plus-circle"></span> Novo</button>
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
                            <th>CPF/CNPJ</th>
                            <th>SITUACAO</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    
                    <tbody id="lista-fornecedores">
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<?php include_once "../includes/form-cadastro-fornecedor.php"; ?>

<script type="text/javascript">
    get("<?php echo $_ENV['HOST_API'] ?>/api/v1/fornecedores").then(element => {
        let html = "";
        element.forEach(data => {
            if(data.fornecedorAtivo === 'N'){
                data.fornecedorAtivo = 'DESATIVADO'
            }else{
                data.fornecedorAtivo = 'ATIVO'
            }
            html += "\n\
            <tr>\n\
                <td>" + data.fornecedorNome + "</td>\n\
                <td>" + data.fornecedorCnpjCPF + "</td>\n\
                <td>" + data.fornecedorAtivo + "</td>\n\
                <td><button class=\"btn btn-sm btn-danger\">EXCLUIR</button>\n\
                <button class=\"btn btn-sm btn-info\">ALTERAR</button></td>\n\
            </tr>\n\
            ";
        });
        document.getElementById("lista-fornecedores").innerHTML = html;
    });

    async function cadastraFornecedor(id_element) {
        let data = $("#formFornecedor").serialize();
        let response = await post("<?php echo $_ENV['HOST_API'] ?>/api/v1/fornecedores", data, id_element);
        if (response !== null) {
            if(response.fornecedorAtivo === 'N'){
                response.fornecedorAtivo = 'DESATIVADO'
            }else{
                response.fornecedorAtivo = 'ATIVO'
            }
            let html = "\n\
            <tr>\n\
                <td>" + response.fornecedorNome + "</td>\n\
                <td>" + response.fornecedorCnpjCPF + "</td>\n\
                <td>" + response.fornecedorAtivo + "</td>\n\
                <button class=\"btn btn-sm btn-danger\">EXCLUIR</button>\n\
                <button class=\"btn btn-sm btn-info\">ALTERAR</button></td>\n\
            </tr>\n\
            ";
            $("#lista-fornecedores").append(html);
            $("#ModalFornecedor").modal('toggle');
        }

    }
</script>
<?php include '../footer.php';?>

