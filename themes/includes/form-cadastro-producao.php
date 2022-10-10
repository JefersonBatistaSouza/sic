<?php
require_once '../../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable('../../');
$dotenv->load();
?>
<div class="modal fade " id="ModalProducao" tabindex="-1" aria-labelledby="ModalProducaoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-light">
                <h5 class="modal-title" id="ModalProducaoLabel">Produção Animal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="formProducao">
                    <div class="col-md-6">
                        <label for="inputAnimal" class="form-label">Animal</label>
                        <select id="inputAnimal" class="form-select" name="producaoAnimal">
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputTipoProducao" class="form-label">TipoProducao <span onclick="showModalTipoProducao()" data-feather="plus-circle"></span></label>
                        <select id="inputTipoProducao" class="form-select" name="producaoTipo">
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="inputDescricao" class="form-label">Descriçao</label>
                        <input type="text" class="form-control" id="inputDescricao" name="producaoDescricao">
                    </div>
                    <div class="col-md-4">
                        <label for="inputUnidadeMedida" class="form-label">Un. Medida</label>
                        <input type="text" class="form-control" id="inputUnidadeMedida" name="unidadeMedida" disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="inputQuantidade" class="form-label">Quantidade</label>
                        <input type="number" class="form-control" id="inputQuantidade" name="producaoQuantidade">
                    </div>
                    <div class="col-md-4">
                        <label for="inputValorEstimado" class="form-label">Valor Estimado</label>
                        <input type="number" class="form-control" id="inputValorEstimado" name="producaoValorEstimado">
                    </div>
                    <div class="modal-footer col-md-12">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="cadastraProducao(this.id)" id="btn-cadastra-producao">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once "../includes/form-cadastro-tipo-producao.php"; ?>

<script type="text/javascript">
    get("<?php echo $_ENV['HOST_API'] ?>/api/v1/tipos-de-producao").then(element => {
        let html = "<option value=\"\">Selecione</option>";
        element.forEach(data => {
            html += '<option value="' + data.ID + '" data-unmedida="'+data.unidadeMedida+'">' + data.tipoProducao + '</option>';
        });
        document.getElementById("inputTipoProducao").innerHTML = html;
    });

    get("<?php echo $_ENV['HOST_API'] ?>/api/v1/animais").then(element => {
        let html = "<option value=\"\">Selecione</option>";
        element.forEach(data => {
            html += '<option value="' + data.ID + '"> '+data.animalCodigo+' - ' + data.animalNome + '</option>';
        });
        document.getElementById("inputAnimal").innerHTML = html;
    });

    function cadastraTipoProducao(id_element) {
        let data = $("#formTipoProducao").serialize();
        let response = post("<?php echo $_ENV['HOST_API'] ?>/api/v1/tipos-de-producao", data, id_element);

        if (response !== null) {
            $("#inputTipoProducao").append("<option value=" + response.id + "  data-unmedida="+response.unidadeMedida+">" + response.tipoProducao + "</option>");
            $("#ModalTipoProducao").modal('toggle');
        }
    }

    
    async function cadastraProducao(id_element) {
        let data = $("#formProducao").serialize();
        let response = await post("<?php echo $_ENV['HOST_API'] ?>/api/v1/producao", data, id_element);
        $("#ModalProducao").modal('toggle');
    }

   $("#inputTipoProducao").change(function() {
        let unidadeMedia  = $("option:selected", this).attr("data-unmedida");
        $("#inputUnidadeMedida").val(unidadeMedia);
   });

</script>
