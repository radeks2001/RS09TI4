<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imie = $_POST['fimie'];
    $sql = "INSERT INTO tab (Imie)
        VALUES ('$imie')";
     if ($conn->query($sql) === TRUE) {
        echo "Dodano rezerwacje do bazy<br>";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $sql = "SELECT Id, Imie FROM tab";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "id: " . $row["Id"]. " Imie: " . $row["Imie"]. "<br>";
        }
      } else {
        echo "0 results";
      }
      $conn->close();
?>
