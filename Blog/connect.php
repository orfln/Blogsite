<?php
  $servername = "localhost";
  $username = "blogadmin";
  $password = "12345678";
  $dbname = "Blogdb2";

  // Створюємо з'єднання
  $con = new mysqli($servername, $username, $password, $dbname);




  // Перевіряємо з'єднання
  if ($conn->connect_error) {
      die("Помилка з'єднання: " . $con->connect_error);
    }
?>
