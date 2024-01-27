<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="/myapp/php_dev/user/img/logoeaut.jpg" type="image/x-icon">
    <link rel="stylesheet" href="home.css">
    <script src="home.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>

<body>
    <div class="container" id="chart-container">
        <canvas id="graph"></canvas>
    </div>
    <script>
        $(document).ready(function () {
            showGraph();
        });

        function showGraph() {
            $.post("dataChart.php",
                function (data) {
                    var labels = [];
                    var result = [];
                    for (var i in data) {
                        labels.push(data[i].tentrangthai);
                        result.push(data[i].so_tt);
                    }
                    var line = $("#graph");
                    var myChart = new Chart(line, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                fill: true,
                                lineTension: 0,
                                backgroundColor: "rgba(51, 153, 255, 1.0)",
                                borderColor: "rgba(0, 0, 0, 0.5)",
                                data: result
                            }]
                        },
                        options: {
                            title: {
                                display: true,
                                text: "Biểu đồ tỷ lệ trúng tuyển"
                            },
                            legend: { display: false },
                            scales: {
                                yAxes: [{ ticks: { min: 0, max: 10 } }],
                            }
                        }
                    });
                });
        }
    </script>
</body>

</html>