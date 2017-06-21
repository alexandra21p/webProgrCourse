<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <style>
        body, p {
            font-family: "Century Gothic", sans-serif;
            color: midnightblue;
        }
        h1, h2, h3 {
            font-family: "Century Gothic", sans-serif;
            margin-top: 30px;
            text-align: center;
            color: midnightblue;
        }
            
        #form1 {

            width: 60%;
            margin-top: 50px;
            margin-left: 100px;
        }
        
        #form2 {
            width: 50%;
            margin-top: 110px;
            margin-left: 100px;
            margin-bottom: 50px;
        }

        fieldset {
            width:  50%;
            margin-top: 50px;

        }
        input, legend {
            margin-bottom: 15px;
            padding: 5px;
        }
        legend {
            font-family: "Futura PT", sans-serif;
            text-transform: uppercase;
            font-style: oblique;
        }

        input[type=submit] {
            width: 100%;
        }
    </style>
    </head>
    <body>
        <?php
		if($_POST) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$role = 'teacher';

			$con = mysqli_connect('localhost:3307', 'root', '','exam');
			if (!$con) {
				die('Could not connect: ' . mysqli_error($con));
			}
	 

			$sql = "SELECT * FROM users WHERE username= '".$username."' AND password= '".$password."'";
			$result = mysqli_query($con, $sql);
			//var_dump($result);
			//return;
			if (mysqli_num_rows($result) == 0) {
				echo "<h2>Welcome, teacher " . $username .  " !</h2>";
	
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

    <div id="form1">
    <form method="POST" action="setNrStudents.php">
        <fieldset>
            <legend>SET MAX NUMBER OF STUDENTS FOR A COURSE</legend>
        Course: <input id="course" type="text" name="course">
        <br/>
        Max. nr of students: <input id="nrStud" type="text" name="nrStud" />
        <input type="submit" class="submit1" value="Submit"/>
        </fieldset>
    </form>
    </div>

    <div id="form2">
    <form method="POST" action="banStudent.php">
        <fieldset>
            <legend>BAN A STUDENT FOR A COURSE</legend>
        Course: <input id="course" type="text" name="course">
        <br/>
        Student: <input id="studName" type="text" name="studName" />
        <input type="submit" class="submit2" value="Submit"/>
        </fieldset>
    </form>
    </div>

    </body>
</html>
