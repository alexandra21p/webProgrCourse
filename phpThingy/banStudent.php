
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
            
            input[type=submit] {
               font-family: 'Century Gothic';
            }
               
		</style>

    </head>
    <body>
        <?php
		if($_POST) {
			$course = $_POST['course'];
			$studName = $_POST['studName'];

			$con = mysqli_connect('localhost:3307', 'root', '','exam');
			if (!$con) {
				die('Could not connect: ' . mysqli_error($con));
			}
			$sql = "UPDATE courses SET bannedStudents=CONCAT(bannedStudents, ',','". $studName ."') WHERE course= '". $course ."'";
			$result = mysqli_query($con, $sql);

			if (mysqli_num_rows($result) == 0) {
				$stmt = "SELECT * FROM courses";
				$res = mysqli_query($con, $stmt);

				echo "<table>
					<tr>
					<th>ID</th>
					<th>COURSE</th>
					<th>NUMBER OF STUDENTS</th>
					<th>PROFESSOR ID</th>
					<th>BANNED STUDENTS</th>
					</tr>";
				  
				while($row = mysqli_fetch_array($res)) {
					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['course'] . "</td>";
					echo "<td>" . $row['numberOfStudents'] . "</td>";
					echo "<td>" . $row['professorID'] . "</td>";
					echo "<td>" . $row['bannedStudents'] . "</td>";
					echo "</tr>";
				}
				echo "</table>";

			mysqli_close($con);
			
			} 
			 else {
			$output = json_encode(
				array(
					'type' => 'error',
					'text' => 'This user does not exist! Please try again.'
			));

			die($output);
			}
		}

		?>
        
    </body>
</html>
