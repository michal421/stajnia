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

    // Pobieranie wiadomości
    $query = "SELECT nazwa, wiadomosc FROM chat ORDER BY mess_id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        {
            echo "<p><strong>" . $row['nazwa'] . ":</strong> " . $row['wiadomosc'] . "</p>";
        }
    } 
    else 
    {
        echo "<p>Brak wiadomości</p>";
    }
    $conn->close();

?>