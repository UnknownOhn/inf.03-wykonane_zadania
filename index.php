<?php
$connect = mysqli_connect('localhost', 'root', '', 'sklep');

if(isset($_POST['submit_dodaj'])) {
    $nazwaProduktu = $_POST['prodkt'];
    $cenaProduktu = $_POST['cena'];
    $iloscProduktu = $_POST['ilosc'];

    $sql_isert = "INSERT INTO produkt (nazwa, cena, ilosc) 
                VALUES ('$nazwaProduktu', '$cenaProduktu', '$iloscProduktu');";
    mysqli_query($connect, $sql_isert);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista zakupów</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <main>
        <section>
            <form action="index.php" method="POST">
            <label for="produkt">Produkt</label>
            <input type="text" id="produkt">
            <label for="cena">Cena</label>
            <input type="number" id="cena">
            <label for="ilosc">Ilość</label>
            <input type="number" id="ilosc"> <br>
            <input type="submit" value="dodaj" name=submit_dodaj>
        
        </form>
        </section>
        <section>
            <h1>LISTA PODUKtów</h1>

            <ol id="lista_produktow">
                <?php
                while($row = mysqli_frtch)
                ?>
            </ol>
        </section>
    </main>
</body>
</html>
<?php
mysqli_close($connect)
?>