<?php
require_once '../../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable('../../');
$dotenv->load();
?>
<div class="modal fade " id="ModalSetor" tabindex="-1" aria-labelledby="ModalSetorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-light">
                <h5 class="modal-title" id="ModalSetorLabel">Cadastro de Setores</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="formSetor">
                    <div class="col-md-6">
                        <label for="setorNome" class="form-label">Nome</label>
                        <input type="text" name="setorNome" class="form-control" id="setorNome">
                    </div>
                    
                    <div class="col-md-6">
                        <label for="setorSigla" class="form-label">Sigla</label>
                        <input type="text" name="setorSigla" class="form-control" id="setorSigla">
                    </div>
                    <div class="col-12">
                        <label for="setorDescricao" class="form-label">Descricao</label>
                        <input type="text" name="setorDescricao" class="form-control" id="setorDescricao">
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="setorAtivo" id="setorAtivo1" value="S">
                            <label class="form-check-label" for="setorAtivo1">
                                Ativo
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="setorAtivo" id="setorAtivo2" value="N" checked>
                            <label class="form-check-label" for="setorAtivo2">
                                Inativo
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" onclick="cadastraSetor(this.id)" id="btn-cadastra-setor">Cadastrar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function showModalSetor() {
        $('#ModalSetor').modal('show');
    }

    
</script>