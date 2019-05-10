<html>
<head>
    <link rel="stylesheet" href="stylesheet.css">
    <title>On the fly!</title>
</head>

<body>
<?php include ("databaseconnectie.php"); ?>

<div class="topnav">
    <a class="active">Vliegtuigen</a>
    <a href="planning.php">Planning</a>
</div>

<div class="center">

    <h1>Nieuw vliegtuig toevoegen:</h1>
    <br>
    <form method='POST'>

        <p>Nummer</p>		    <p><input type="text" name="nummer"/></p>
        <p>Type</p>  		    <p><input type="text" name="type"/></p>
        <p>Maatschappij</p>     <p><input type="text" name="maatschappij"/></p>
        <p>Status</p> 	        <p><input type="text" name="status"/></p>
        <p><input type="submit" name="btnVersturen" value="Verzenden"/></p>
    </form>

    <?php
    error_reporting(0);

    if(isset($_POST["btnVersturen"]))
    {
        $nummer = $_POST["nummer"];
        $type = $_POST["type"];
        $maatschappij = $_POST["maatschappij"];
        $status = $_POST["status"];

        $query = "INSERT INTO airplanes (number, type, airline, status) ".
            "VALUES ('$nummer' , '$type' , '$maatschappij' , '$status')";

        $stm = $con->prepare($query);

        if($stm->execute()){
            echo "Het vliegtuig is succesvol opgeslagen in de database.";
        } else {
            echo "Er is helaas iets mis gegaan!";
        }
    }
    ?>
    <br>
    <br>
    <br>
    <table align="center">
        <thead>
        <tr>
            <th>Vliegtuignummer</th>
            <th>Type</th>
            <th>Maatschappij</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $query = "SELECT * FROM airplanes";
        $stm = $con->prepare($query);
        if($stm->execute()){
            $airplanes = $stm->fetchAll(PDO::FETCH_OBJ);
            foreach($airplanes as $airplane){
                echo "<tr>";
                echo "<td>$airplane->number</td>";
                echo "<td>$airplane->type</td>";
                echo "<td>$airplane->airline</td>";
                echo "<td>$airplane->status</td>";
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
