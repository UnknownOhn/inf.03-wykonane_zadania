<?php
$conn = mysqli_connect("localhost", "root", "", "dziennik_elektroniczny");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Dziennik Elektroniczny</h1>
    </header>
    <section>
        <form action="" method="post">
        <label for="idu">Id ucznia:</label>
        <input type="number" id="idu">
        <label for="ocena">Wpisz ocene: </label>
        <input type="number" id="ocena">
        <button>Dodaj</button> 
        </form>
        <?php
        if(isset($_POST['dodaj'])){
            $idu = $_POST['idu'];
            $ocena = $_POST['ocena'];

            $zapytanie_dodaj = "INSERT INTO oceny (oceny.id_ucznia, oceny.ocena) 
            VALUES ('".$idu."','".$ocena."', '1');";
            echo $zapytanie_dodaj;
            mysqli_query($conn, $zapytanie_dodaj);
            }
        ?>
        <table>
                <tr>
                    <th>Imie:</th>
                    <th>Nazwisko:</th>
                    <th>Śr. ocen:</th>
                </tr>
                <?php
                $zap = "SELECT uczniowie.imie, uczniowie.nazwisko, ROUND(AVG(oceny.ocena), 2)
                        FROM uczniowie
                        JOIN oceny ON oceny.id_ucznia = uczniowie.id_ucznia
                        GROUP BY uczniowie.id_ucznia
                        ORDER BY uczniowie.imie, uczniowie.nazwisko;";
                $wynik = mysqli_query($conn, $zap);
                while ($w = mysqli_fetch_row($wynik)) {
                    echo "
                    <tr>
                        <td>'".$w[0]."'</td>
                        <td>'".$w[1]."'</td>
                        <td>'".$w[2]."'</td>
                        </tr>
                        ";
                }
                ?>
        </table>
    </section>
    <footer>
        <p>Stronę zrobił: 15</p>
    </footer>
</body>
</html>
<?php
mysqli_close($conn);
?>