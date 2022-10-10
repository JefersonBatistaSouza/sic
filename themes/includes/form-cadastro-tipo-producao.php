<?php
require_once '../../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable('../../');
$dotenv->load();
?>
<div class="modal fade " id="ModalTipoProducao" tabindex="-1" aria-labelledby="ModalTipoProducaoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-light">
                <h5 class="modal-title" id="ModalTipoProducaoLabel">Tipos de producão animal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="formTipoProducao">
                    <div class="col-md-6">
                        <label for="tipoProducao" class="form-label">Nome</label>
                        <input type="text" name="tipoProducao" class="form-control" id="tipoProducao">
                    </div>

                    <div class="col-md-6">
                        <label for="unidadeMedida" class="form-label">Unidade de Medida</label>
                        <input type="text" name="unidadeMedida" class="form-control" id="unidadeMedida">
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipoProducaoAtivo" id="tipoProducaoAtivo1" value="S">
                            <label class="form-check-label" for="tipoProducaoAtivo1">
                                Ativo
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipoProducaoAtivo" id="tipoProducaoAtivo2" value="N" checked>
                            <label class="form-check-label" for="tipoProducaoAtivo2">
                                Inativo
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" onclick="cadastraTipoProducao(this.id)" id="btn-cadastra-tipoProducao">Cadastrar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function showModalTipoProducao() {
        $('#ModalTipoProducao').modal('show');
    }
</script>