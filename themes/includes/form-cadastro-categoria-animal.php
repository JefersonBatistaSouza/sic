<?php
require_once '../../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable('../../');
$dotenv->load();
?>
<div class="modal fade " id="ModalCategoriaAnimal" tabindex="-1" aria-labelledby="ModalCategoriaAnimalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-light">
                <h5 class="modal-title" id="ModalCategoriaAnimalLabel">Cadastro de Cateogorias</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="formCategoriaAnimal">
                    <div class="col-md-12">
                        <label for="categoriaNome" class="form-label">Nome</label>
                        <input type="text" name="categoriaNome" class="form-control" id="categoriaNome">
                    </div>
                    <div class="col-12">
                        <label for="categoriaPorte" class="form-label">Porte</label>
                        <input type="text" name="categoriaPorte" class="form-control" id="categoriaPorte">
                    </div>
                    <div class="col-md-6">
                        <label for="categoriaZootecnica" class="form-label">Zootecnia</label>
                        <input type="text" name="categoriaZootecnica" class="form-control" id="categoriaZootecnica">
                    </div>
                    <div class="col-6">
                        <label for="categoriaClassificacao" class="form-label">Classificação</label>
                        <input type="text" name="categoriaClassificacao" class="form-control" id="categoriaClassificacao">
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="categoriaAtiva" id="categoriaAtiva1" value="S">
                            <label class="form-check-label" for="categoriaAtiva1">
                                Ativa
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="categoriaAtiva" id="categoriaAtiva2" value="N" checked>
                            <label class="form-check-label" for="categoriaAtiva2">
                                Inativa
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" onclick="cadastraCategoriaAnimal(this.id)" id="btn-cadastra-categoria">Cadastrar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function showModalCategoriaAnimal() {
        $('#ModalCategoriaAnimal').modal('show');
    }

    
</script>