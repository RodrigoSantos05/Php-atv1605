<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['txtlogin'];
    $senha = $_POST['txtsenha'];

    $conn = new PDO('mysql:host=localhost;dbname=aula1605', 'root', 'rms84750222');
   
   

    $query = $conn->prepare("SELECT * FROM tbUser WHERE nmUser = :usuario AND dsSenha = :senha");
    $query->bindParam(':usuario', $usuario);
    $query->bindParam(':senha', $senha);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
  
    if ($result) {
        $_SESSION['usuario'] = $usuario; 
        header("Location: pagina.html");
        exit();
    } else {
        $_SESSION['usuario'] != $usuario; 
        header("Location: pagina2.html");
        exit();
    }
}
?>