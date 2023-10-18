<?php

    // Połączenie z bazą danych (dostosuj te parametry)
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "kurs_php";

    $conn = new mysqli($db_host, $_db_user, $db_password, $db_name);

    if ($conn->connect_error) 
    {
        die("Połączenie nieudane: " . $conn->connect_error);
    }

    // Jeśli formularz został wysłany
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Weryfikacja danych
            // Sprawdz czy haslo jest przypisane do podanego loginu
        $query = "SELECT password FROM logi WHERE user_login = ?";
        
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        // Porównanie hasła
        if (password_verify($password, $row['user_haslo'])) 
        {
            // Logowanie udane, przekierowanie na stronę główną
            session_start();
            $_SESSION['username'] = $username;
            header("Location: romico.php");
            exit;
        } 
        else 
        {
            // Logowanie nieudane
            echo "Nieprawidłowa nazwa użytkownika lub hasło.";
        }
        $stmt->close();
    }
    $conn->close();

?>
