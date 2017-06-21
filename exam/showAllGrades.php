 <?php
    //$con = mysqli_connect('localhost', 'paie1803', 'root','exam');
    $con = mysqli_connect('localhost:3307', 'root', '','restanta');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    $sql = "SELECT * FROM grades";
    $result = mysqli_query($con,$sql);
    echo "<form>";
       echo "<table>
        <tr>
        <th>ID</th>
        <th>STUDENT ID</th>
        <th>COURSE ID</th>
        <th>GRADE</th>
        </tr>";
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['studentid'] . "</td>";
            echo "<td>" . $row['courseid'] . "</td>";
            echo "<td>" . $row['grade'] . "</td>";
            echo "<td> <input type=\"checkbox\" value=\" " . $row['id'] . "\"> </td>";
            echo "</tr>";
        }
        echo "</table>";
         echo "</form>";
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
                margin-left:  200px;
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
            
            input[type=submit] {
               font-family: 'Century Gothic';
            }
               
		</style>
    </head>
    <body>
       

        
    </body>
</html>
