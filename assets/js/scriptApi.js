
async function get(url) {
    let response = await fetch(url);
    let res = await response.json();

    $(document).ready(function () {
        setTimeout(function () {
            $('#loading').attr('class', 'd-none');
            $(".container-fluid").attr('class', 'container-fluid mt-5 d-block')
        }, 1000);
    });

    return res;
}

function post(url, data, id) {
    let response = null;
    $.ajax({
        type: 'post',
        dataType: "json",
        data: data,
        url: url,
        async: false,
        beforeSend: function () {
            $("#" + id).html('<img src="../images/loading.gif" width="30px" height="auto" />');
        },
        success: function (data) {
            response = data;
        },
        error: function (data) {
            alert(data.responseText);
        },
        complete: function (data) {
            $("#" + id).html("Cadastrar");
        }
    });

    return response;
}
