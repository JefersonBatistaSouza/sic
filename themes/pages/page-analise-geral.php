<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    get("<?php echo $_ENV['HOST_API'] ?>/api/v1/controle-patrimonial").then(element => {
            element.forEach(data => {
                drawChart(data);
            });
        });

    function drawChart() {cd
        
        var data = google.visualization.arrayToDataTable();

        var options = {
            title: 'Análise patrimonial dos Animais'
        };

        var chart = new google.visualization.PieChart(document.getElementById('grafico-categoria-animais'));

        chart.draw(data, options);
    }
</script>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div id="grafico-mortalidade-animais" style="width: 900px; height: 500px;"></div>
        </div>
        <div class="col-6">
            <div id="grafico-categoria-animais" style="width: 900px; height: 500px;"></div>
        </div>
    </div>
</div>