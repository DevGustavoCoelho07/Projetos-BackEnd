<?php

include 'Classes.php';

Update::salvarDados();

Delete::deletarDados();

Create::inserir();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome"><br>
        <label for="idade">Idade</label>
        <input type="text" name="idade"><br>
        <input type="submit" name = "insere-dados" value="Inserir">

        </form>

  
<?php
      
Read::listarDados();

?>

</body>

</html>