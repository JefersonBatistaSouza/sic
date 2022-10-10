<?php
require_once '../../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable('../../');
$dotenv->load();
?>
<div class="modal fade " id="ModalFornecedor" tabindex="-1" aria-labelledby="ModalFornecedorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-light">
                <h5 class="modal-title" id="ModalFornecedorLabel">Cadastro de Fornecedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="formFornecedor">
                    <div class="col-md-12">
                        <label for="fornecedorNome" class="form-label">Nome</label>
                        <input type="text" name="fornecedorNome" class="form-control" id="fornecedorNome">
                    </div>
                    <div class="col-12">
                        <label for="fornecedorCnpjCPF" class="form-label">CNPJ/CPF</label>
                        <input type="text" name="fornecedorCnpjCPF" class="form-control" id="fornecedorCnpjCPF">
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="fornecedorAtivo" id="fornecedorAtivo1" value="S">
                            <label class="form-check-label" for="fornecedorAtivo1">
                                Ativo
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="fornecedorAtivo" id="fornecedorAtivo2" value="N" checked>
                            <label class="form-check-label" for="fornecedorAtivo2">
                                Inativo
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="cadastraFornecedor(this.id)" id="btn-cadastra-fornecedor">Cadastrar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function showModalFornecedor() {
        $('#ModalFornecedor').modal('show');
    }
</script>