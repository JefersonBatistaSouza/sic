<?php include  '../header.php';
require_once '../../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable('../../');
$dotenv->load();

$codigoAnimal = filter_input(1, 'codigo_animal', FILTER_DEFAULT);
?>

<div class="container-fluid mt-5 d-none">
    <div class="row">
        <main role="main" class="col ml-sm-auto">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h4">Detalhes da produção</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button class="btn btn-sm btn-outline-secondary"><span data-feather="file-text"></span> Export PDF</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr id="dados-animal">
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="container text-center">
                <div class="row g-2" id="dados-producao">
                    
                </div>
            </div>
        </main>
    </div>
</div>
<script type="text/javascript">
    get("<?php echo $_ENV['HOST_API'] ?>/api/v1/producao/animais/<?php echo $codigoAnimal ?>").then(element => {
        let html = "";
        let htmlProducao = "";
        element.forEach(data => {
            console.log(data);
            if (data.tipoProducaoAtivo === 'N') {
                data.tipoProducaoAtivo = 'DESATIVADO'
            } else {
                data.tipoProducaoAtivo = 'ATIVO'
            }
            html += "\n\
                <td><strong>CODIGO: </strong>" + data.animalCodigo + "</td>\n\
                <td><strong>NOME: </strong>" + data.animalNome + "</td>\n\
                <td><strong>TIPO: </strong>" + data.animalTipo + "</td>\n\
            ";
            data.producao.forEach((producao) => {
                htmlProducao += '\n\
                <div class="col-4">\n\
                        <div class="p-4 border bg-light">\n\
                            <ul class="list-group">\n\
                                <li class="list-group-item" style="text-align:left;"><strong>Data: </strong>'+producao.producaoData+'</li>\n\
                                <li class="list-group-item" style="text-align:left;"><strong>Descrição: </strong>'+producao.producaoDescricao+'</li>\n\
                                <li class="list-group-item" style="text-align:left;"><strong>Quantidade: </strong>'+producao.producaoQuantidade+'</li>\n\
                                <li class="list-group-item" style="text-align:left;"><strong>Valor Estimado:</strong>'+producao.producaoValorEstimado+'</li>\n\
                            </ul>\n\
                        </div>\n\
                    </div>\n\
                ';
            });

        });
        document.getElementById("dados-animal").innerHTML = html;
        document.getElementById("dados-producao").innerHTML = htmlProducao;
    });
</script>
<?php include  '../footer.php' ?>