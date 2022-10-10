let htmlTableAnimais = "";
async function getAnimais(url) {
    let response = await fetch(url);
    let animalData = await response.json();
    let animal = Promise.resolve(animalData);
    animal.then((data) => {
        data.forEach(element => {
            htmlTableAnimais += "\n\
            <tr>\n\
            <td>"+ element.animalCodigo + "</td>\n\
            <td>"+ element.animalTipo + "</td>\n\
            <td>"+ element.animalNome + "</td>\n\
            <td>"+ element.animalRaca + "</td>\n\
            <td>"+ element.fornecedor[0].fornecedorNome + "</td>\n\
            <td>"+ element.categoria[0].categoriaNome + "</td>\n\
            <td>"+ element.categoria[0].categoriaPorte + "</td>\n\
            <td>"+ element.categoria[0].categoriaClassificacao + "</td>\n\
            </tr>";
        });

        document.getElementById("lista-animais").innerHTML = htmlTableAnimais;

        $(document).ready(function () {
            $('#table').DataTable({
                "processing": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
                }
            });
        });
    });
}

function showModalFornecedor() {
    $("#ModalFornecedor").modal("show");
}

function requestAnimal(method, host) {
    let formAnimal = $("#formAnimal").serialize();
    $.ajax({
        type: method,
        dataType: "json",
        data: formAnimal,
        url: host+"/api/v1/animais",
        beforeSend: function () {
            $("#btn-cadastra").html('<img src="../images/loading.gif" width="30px" height="auto" />');
        },
        success: function (data) {
            console.log(data);
        },
        error: function (data) {
            console.log(data.responseJSON);
        },
        complete: function () {
            $("#btn-cadastra").html("Cadastrar");
        }
    });
}