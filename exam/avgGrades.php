<?php
    $con = mysqli_connect('localhost:3307', 'root', '','restanta');
    $gradeAvg;
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    $sql = "SELECT AVG(grade) as avg FROM grades;";
    $result = mysqli_query($con,$sql);

   echo "<table>
    <tr>
  
    <th>Grade</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['avg'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($con);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>

        <style>
            table {
                width: 55%;
                border-collapse: collapse;
                margin-left:  350px;
                margin-bottom: 10px;
            }

            table, td {
                border: 1px solid black;
                margin-top: 60px;
                padding: 5px;
                background-color: #f1f1f1;
                color:  teal;
            }
        
            th {
                border: 1px solid black;
                font-family: Consolas, sans-serif;
                color:  black;
                padding: 8px;
                font-size: 14px;
                font-style: oblique;
                text-transform: uppercase;
            }

            th {text-align: left;}
    </style>
    </head>
    <body>
        
    </body>
</html>
