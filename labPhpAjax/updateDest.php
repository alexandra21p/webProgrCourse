<?php
     if($_POST) {
        $loc = $_POST['location'];
        $country = $_POST['country'];
        $descr = $_POST['descr'];
        $tourist = $_POST['tour'];
        $cost = intval($_POST['cost']);

        //$con = mysqli_connect('localhost', 'paie1803', 'paie1803','paie1803');
        $con = mysqli_connect('localhost', 'root', 'password','my_db');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }

        // prepare and bind
        $stmt = $con->prepare("UPDATE destination SET description=?, touristTarget=?, costPerDay=? WHERE locationName=? AND country=?");
        $stmt->bind_param("ssiss", $descr, $tourist, $cost, $loc, $country);
        $stmt->execute();
    

        //mysqli_select_db($con,"ajax_demo");
        $sql = "SELECT locationName, country, description, touristTarget, costPerDay FROM destination";
        $result = mysqli_query($con, $sql);

        
        echo "<table>
        <tr>
        <th>Location</th>
        <th>Country</th>
        <th>Description</th>
        <th>Tourist Target</th>
        <th>Cost/Day</th>
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
      
        $stmt->close();
        mysqli_close($con);
    
    } else $output = json_encode(
            array(
                'type' => 'error',
                'text' => 'COULD NOT EXECUTE.'
        ));

        die($output);

 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>

        <style>
            table {
                width: 60%;
                border-collapse: collapse;
                margin-left:  320px;
            }

            table, td {
                border: 1px solid black;
                margin-top: 20px;
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
