
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>

        <style>
            table {
                width: 80%;
                border-collapse: collapse;
                margin-left:  300px;
            }

            table, td {
                border: 1px solid black;
                margin-top: 30px;
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
        <?php
        $courseid = intval($_POST['courses']);
        $studid = intval($_POST['students']);

        $con = mysqli_connect('localhost:3307', 'root', '','restanta');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }

        $sql = "DELETE FROM grades WHERE studentid = '".$studid."'" "AND courseid = '" .$courseid. "'";
        $result = mysqli_query($con,$sql);
        if (mysqli_num_rows($result) == 0) {
            echo "all good!!";
        }
        else echo "not good.";
        /*
        $sql = "SELECT * FROM grades";
        $result = mysqli_query($con, $sql);
        echo "<table>
            <tr>
            <th>ID</th>
            <th>Location</th>
            <th>Country</th>
            <th>Description</th>
            <th>Tourist Target</th>
            <th>Cost/Day</th>
            </tr>";
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['locationName'] . "</td>";
                echo "<td>" . $row['country'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['touristTarget'] . "</td>";
                echo "<td>" . $row['costPerDay'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
          */
            mysqli_close($con);
      

        ?>

        
    </body>
</html>
