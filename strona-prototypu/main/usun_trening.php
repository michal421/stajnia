<?php

    // Połączenie z bazą danych (dostosuj te parametry)
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "kurs_php";

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    if ($conn->connect_error) 
    {
        die("Połączenie nieudane: " . $conn->connect_error);
    }

    // Usuwanie wszystkich treningów
    $query = "DELETE FROM treningi";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt->close();

    $conn->close();

    header("Location: trening.php"); // Przekierowanie z powrotem do Planu Treningów
    exit;

?>
