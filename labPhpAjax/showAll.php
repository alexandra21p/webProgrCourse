<?php
    //$con = mysqli_connect('localhost', 'paie1803', 'root','exam');
    $con = mysqli_connect('localhost', 'root', 'password','my_db');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }
    //echo "hacker voice: i'm in.";
    mysqli_select_db($con,"ajax_demo");
    $sql = "SELECT * FROM destination";
    $result = mysqli_query($con,$sql);

   echo "<table>
    <tr>
    <th>LOCATION</th>
    <th>COUNTRY</th>
    <th>DESCRIPTION</th>
    <th>TOURIST TARGET</th>
    <th>COST/DAY</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['locationName'] . "</td>";
        echo "<td>" . $row['country'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['touristTarget'] . "</td>";
        echo "<td>" . $row['costPerDay'] . "</td>";
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
