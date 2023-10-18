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

    // Usuwanie wszystkich wiadomości
    $query = "DELETE FROM wiadomosci";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt->close();

    $conn->close();

    header("Location: chat.php"); // Przekierowanie z powrotem do czatu
    exit;

?>
