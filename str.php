<?php
 setcookie("nameCookie", "Witam na mojej stronie", time()+3*60);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <?php
    if(isset($_COOKIE['theme'])) {
        echo "<link rel='stylesheet' href='".$_COOKIE['theme']."'>";
    } else {
        echo "<link rel='stylesheet' href='dark.css'>";
    }
    ?>
</head>
<body>
    <?php
    if(isset($_COOKIE['nameCookie'])) {
        echo "<h1>$_COOKIE[nameCookie]</h1>";
    } else {
        echo "<h1>Witamy pierwszy po raz pierwszy na tej stronie </h1>";
    }
?> 
    <form action="" method="POST">
    <button name="dark">Ciemno</button> 
    <button name="lig">Jasno</button>
</form>
    <?php
    if(isset($_POST['dark'])) {
        setcookie('theme', 'dark.css', time()+3*60);
        header('Location: str.php');
    }
    if(isset($_POST['lig'])) {
        setcookie('theme', 'light.css', time()+3*60);
        header('Location: str.php');
    }
    ?>
</body>
</html>