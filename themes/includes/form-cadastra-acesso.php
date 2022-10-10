<?php
require_once '../../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable('../../');
$dotenv->load();
?>
<div class="modal fade " id="ModalAcesso" tabindex="-1" aria-labelledby="ModalAcessoLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 80%;">
        <div class="modal-content">
            <div class="modal-header bg-success text-light">
                <h5 class="modal-title" id="ModalAcessoLabel"> Controle de Acesso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="formAcesso">
                    <div class="col-md-6">
                        <label for="inputUsuario" class="form-label">Usuario</label>
                        <select id="inputUsuario" class="form-select" name="usuarioID">
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputSetor" class="form-label">Setor</label>
                        <select id="inputSetor" class="form-select" name="setorID">
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="acessoPermitido" id="acessoPermitido1" value="S">
                            <label class="form-check-label" for="acessoPermitido1">
                                Permitir Acesso
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="acessoPermitido" id="acessoPermitido2" value="N" checked>
                            <label class="form-check-label" for="acessoPermitido2">
                                Negar Acesso
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer col-md-12">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="cadastraAcesso(this.id)" id="btn-cadastra-acesso">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    get("<?php echo $_ENV['HOST_API'] ?>/api/v1/usuarios").then(element => {
        let html = "";
        element.forEach(data => {
            html += '<option value="' + data.ID + '">' + data.usuarioNome + '</option>';
        });
        document.getElementById("inputUsuario").innerHTML = html;
    });

    get("<?php echo $_ENV['HOST_API'] ?>/api/v1/setores").then(element => {
        let html = "";
        element.forEach(data => {
            html += '<option value="' + data.ID + '">' + data.setorNome + '</option>';
        });
        document.getElementById("inputSetor").innerHTML = html;
    });

    function showModalAcesso() {
        $('#ModalAcesso').modal('show');
    }
</script>