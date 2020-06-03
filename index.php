<?php 
//include connection file
require_once 'Config/connection.php';

//fetch all country
$stmt = $connection->query('SELECT * FROM country');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Using Google Chart with PHP</title>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Code', 'Continent', 'Region'],

          <?php
          //check if there is data in the table
            if (!empty($stmt)) {

              while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "['". $row['Code'] ."', '". $row['Continent'] ."', ['". $row['Region'] ."']],";
              }

            }
          ?>

        ]);

        var options = {
          chart: {
            title: 'World Database',
            subtitle: 'Shows the Country Code, Continent, and Region of the World',
            width: 4500,
            height: 900,
          }
        };

        var chart = new google.charts.Bar(document.getElementById('world'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
</head>
<body>

//load world data
<div id="world" style="margin: 0 auto; margin-top:30px;"></div>
  
</body>
</html>