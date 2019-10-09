<!-- ./php/index.php -->

<html>
    <head>
        <title>Smart City</title>
        <link rel="stylesheet" type="text/css" href="css/mystyle.css">
        <link href="https://fonts.googleapis.com/css?family=Notable|Quicksand&display=swap" rel="stylesheet">
    </head>

    <body>
        <!--HEADER-->
        <div class='header'>
            <a href='index.html'>
                <img class='left' src='img/city1.jpeg'/>
                <img class='right' src='img/city2.jpeg'>
                <div class='titulo'>Welcome to <br/>
                    SmartCity of Iasi!<br/>
                </div>
            </a>
        </div>

        <!--NAVBAR-->
        <table id="tablaNav">
          <tr id="barraNav">
            <td class="textoBlanco"><a href="index.html">Home</a></td>
            <td class="marked"><a href="sensors.php">SmartCity</a></td>
            <td class="textoBlanco"><a href="aboutMe.html">About Me</a></td>
            <td class="textoBlanco"><a href="contact.html">Contact</a></td>
          </tr>
        </table>

        <!--CONTENT-->
        <div class='database'>
            <?php
                $servername='localhost';
                $username='root';
                $password='';
                $schema='best19';

                $conn = new mysqli($servername, $username, $password, $schema);

                if ($conn->connect_error) {
        			die("Connection failed: " . $conn->connect_error);
    			}

    			$sql = "SELECT * FROM sensors";
                echo "<h2 class='sectionTitle'>Sensors</h2>";
    			$result = $conn->query($sql);

    			if ($result->num_rows > 0) {
                    echo "<table class='tabla'>";
                        echo "<tr class='firstRow'>";
                            echo "<th>Id</td>";
                            echo "<th>Sensor name</td>";
                            echo "<th>Sensor type</td>";
                            echo "<th>Measurement unit</td>";
                            echo "<th>View measurements</td>";
                        echo "</tr>";
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr class='row'>";
    			             echo "<td>" . $row["id"] . "</td>";
                             echo "<td>" . $row["sensor_name"] . "</td>";
                             echo "<td>" . $row["sensor_type"] . "</td>";
                             echo "<td>" . $row["measurement_unit"] . "</td>";
                             echo "<td>" . "<a href=measurements.php?id=". $row["id"] ."><img class='image' src='img/view.png'/></a>" . "</td>";
                             echo "</tr>";
    			    }
                    echo "</table>";
    			} else {
    			    echo "0 results";
    			}
    			$conn->close();
            ?>
        </div>

        <!--FOOTER-->
        <div id="footerPrincipal">
          <p id="textoFooter"><br/>BEST Summer Course &copy; 2019</p>
        </div>

    </body>
</html>