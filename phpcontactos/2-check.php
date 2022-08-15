<?php

session_start();


if (isset($_POST["user"]) && !isset($_SESSION["user"])) {

  $users = [
    "user1" => "123456",
    "user2" => "654321",
    "user" => "987654"
  ];


  if (isset($users[$_POST["user"]])) {
    if ($users[$_POST["user"]] == $_POST["password"]) {
      $_SESSION["user"] = $_POST["user"];
    }
  }


  if (!isset($_SESSION["user"])) { $failed = true; }
}

if (isset($_SESSION["user"])) {
  header("Location: contactos.php"); 
  exit();
}
