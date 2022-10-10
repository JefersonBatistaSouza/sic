<?php 
    require_once '../../vendor/autoload.php';

    use Dotenv\Dotenv;
    
    $dotenv = Dotenv::createImmutable('../../');
    $dotenv->load();
?>
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 80%;">
        <div class="modal-content">
            <div class="modal-header bg-success text-light">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro de Animal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="formAnimal">
                    <div class="col-md-6">
                        <label for="inputNome" class="form-label">Nome</label>
                        <input type="text" name="animalNome" class="form-control" id="inputNome">
                    </div>
                    <div class="col-md-3">
                        <label for="inputCodigo" class="form-label">Codigo</label>
                        <input type="text" name="animalCodigo" class="form-control" id="inputCodigo">
                    </div>
                    <div class="col-3">
                        <label for="inputRaca" class="form-label">Raça</label>
                        <input type="text" class="form-control" name="animalRaca" id="inputRaca">
                    </div>
                    <div class="col-4">
                        <label for="inputPeso" class="form-label">Peso</label>
                        <input type="number" class="form-control" name="animalPeso" value="0.00" id="inputPeso">
                    </div>
                    <div class="col-4">
                        <label for="inputTipo" class="form-label">Tipo</label>
                        <input type="text" class="form-control" name="animalTipo" id="inputTipo">
                    </div>
                    <div class="col-md-4">
                        <label for="inputPesoLote" class="form-label">Peso do Lote</label>
                        <input type="number" class="form-control" name="animalPesoLote" value="0.00" id="inputPesoLote">
                    </div>
                    <div class="col-md-4">
                        <label for="inputLote" class="form-label">Lote</label>
                        <input type="text" class="form-control" name="animalLote" id="inputLote">
                    </div>
                    <div class="col-md-4">
                        <label for="inputPrecoLote" class="form-label">Preço do Lote</label>
                        <input type="number" class="form-control" name="animalPrecoLote" value="0.00" id="inputPrecoLote">
                    </div>
                    <div class="col-md-4">
                        <label for="inputPreco" class="form-label">Preço</label>
                        <input type="number" class="form-control" name="animalPreco" value="0.00" id="inputPreco">
                    </div>
                    <div class="col-md-4">
                        <label for="inputSexo" class="form-label">Sexo</label>
                        <select id="inputSexo" class="form-select" name="animalSexo">
                            <option value="" selected>Selecione</option>
                            <option value="M">MACHO</option>
                            <option value="F">FÊMEA</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputLactacao" class="form-label">Lactação</label>
                        <select id="inputLactacao" class="form-select" name="animalLactacao">
                            <option value="N/A" selected>NAO ATRIBUIDO</option>
                            <option value="M">LACTANTE</option>
                            <option value="F">SECA</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputPrenhez" class="form-label">Prenhez</label>
                        <select id="inputPrenhez" class="form-select" name="animalPrenhez">
                            <option value="N/A" selected>NAO ATRIBUIDO</option>
                            <option value="CHEIA">CHEIA</option>
                            <option value="VAZIA">VAZIA</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputPostura" class="form-label">Postura</label>
                        <select id="inputPostura" class="form-select" name="animalPostura">
                            <option value="" selected>Selecione</option>
                            <option value="SIM">SIM</option>
                            <option value="NAO">NÃO</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputCorte" class="form-label">Corte</label>
                        <select id="inputCorte" class="form-select" name="animalCorte">
                            <option value="" selected>Selecione</option>
                            <option value="SIM">SIM</option>
                            <option value="NAO">NÃO</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="inputOrigem" class="form-label">Origem</label>
                        <input type="text" class="form-control" id="inputOrigem" name="animalOrigem">
                    </div>
                    <div class="col-md-6">
                        <label for="inputFornecedor" class="form-label">Fornecedor <span onclick="showModalFornecedor()" data-feather="plus-circle"></span></label>
                        <select id="inputFornecedor" class="form-select" name="animalFornecedor">
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCategoria" class="form-label">Categoria <span onclick="showModalCategoriaAnimal()" data-feather="plus-circle" onclick></span></label>
                        <select id="inputCategoria" class="form-select" name="animalCategoriaAnimal">
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="animalSituacao" id="animalSituacao1" value="ABATIDO">
                            <label class="form-check-label" for="animalSituacao1">
                                ABATIDO
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="animalSituacao" id="animalSituacao2" value="EM VIDA" checked>
                            <label class="form-check-label" for="animalSituacao2">
                                EM VIDA
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer col-md-12">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="cadastraAnimal(this.id)" id="btn-cadastra-animal">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    get("<?php echo $_ENV['HOST_API'] ?>/api/v1/fornecedores").then(element => {
        let html = "";
        element.forEach(data => {
            html += '<option value="' + data.ID + '">' + data.fornecedorNome + '</option>';
        });
        document.getElementById("inputFornecedor").innerHTML = html;
    });

    get("<?php echo $_ENV['HOST_API'] ?>/api/v1/categorias-de-animais").then(element => {
        let html = "";
        element.forEach(data => {
            html += '<option value="' + data.ID + '">' + data.categoriaNome + '</option>';
        });
        document.getElementById("inputCategoria").innerHTML = html;
    });

    async function cadastraAnimal(id_element) {
        let data = $("#formAnimal").serialize();
        let response = await post("<?php echo $_ENV['HOST_API'] ?>/api/v1/animais", data, id_element);
        console.log(response);
    }

    function cadastraCategoriaAnimal(id_element) {
        let data = $("#formCategoriaAnimal").serialize();
        let response = post("<?php echo $_ENV['HOST_API'] ?>/api/v1/categorias-de-animais", data, id_element);

        if (response !== null) {
            $("#inputCategoria").append("<option value=" + response.id + ">" + response.categoriaNome + "</option>");
            $("#ModalCategoriaAnimal").modal('toggle');
        }
    }

    async function cadastraFornecedor(id_element) {
        let data = $("#formFornecedor").serialize();
        let response = await post("<?php echo $_ENV['HOST_API'] ?>/api/v1/fornecedores", data, id_element);

        if (response !== null) {
            $("#inputFornecedor").append("<option value=" + response.id + ">" + response.fornecedorNome + "</option>");
            $("#ModalFornecedor").modal('toggle');
        }

    }
</script>

<?php include_once "../includes/form-cadastro-fornecedor.php"; ?>
<?php include_once "../includes/form-cadastro-categoria-animal.php"; ?>