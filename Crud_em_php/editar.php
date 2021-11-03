<?php
session_start();

require_once 'Classes.php';

Update::preencherCampos();

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
        <label for="nome" >Nome</label>
        <input type="text" value="<?php echo $_SESSION['nome']//exibi o nome no form ?>" name="nome"><br>
        <label for="idade">Idade</label>
        <input type="text" value="<?php echo $_SESSION['idade'] ?>" name="idade"><br>
        <input type="hidden" value="<?php echo $_SESSION['id']?>" name="id">
        <input type="submit" name = "atualiza-dados" value="Atualizar">


    </form>
</body>





</html>