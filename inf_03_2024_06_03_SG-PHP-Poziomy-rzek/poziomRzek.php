<?php
    $polacz = mysqli_connect("localhost","root","","rzeki");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poziomy rzek</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>

    <header class="baner-lewy">
        <img src="obraz1.png" alt="Mapa Polski">
    </header>
    <header class="baner-prawy">
        <h1>Rzeki w województwie dolnośląskim</h1>
    </header>
    <nav>
        <form action="" method="post">
            
            <label for="Wszystkie"><input type="radio" name="rzeki" value="Wszystkie">Wszystkie</label>
            <label for="Ponadstanostrzegawczy"><input type="radio" name="rzeki" value="Ponadstanostrzegawczy">Ponad stan ostrzegawczy</label> 
            <label for="Ponadstanalarmowy"><input type="radio" name="rzeki" value="Ponadstanalarmowy">Ponad stan alarmowy</label>
            <input type="submit" name="submit" valuer="Pokaż">
        </form>
    </nav>
    <section class="blok-lewy">
        <h3>Stany na dzień 2022-05-05</h3>
        <table>
            <tr>
                <th>Wodomierz</th>
                <th>Rzeka</th>
                <th>Sstrzegawczy</th>
                <th>Alarmowy</th>
                <th>Aktualny</th>
            </tr>
            <?php
            $opcja = $_POST['rzeki'] ?? 'Wszystkie';
            if($opcja == 'Ponadstanostrzegawczy') {
                $zapytanie = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy JOIN pomiary ON pomiary.wodowskazy_id = wodowskazy.id WHERE dataPomiaru = '2022-05-05' AND stanWody > stanOstrzegawczy;";
            } elseif($opcja == 'Ponadstanalarmowy') {
                $zapytanie = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy JOIN pomiary ON pomiary.wodowskazy_id = wodowskazy.id WHERE dataPomiaru = '2022-05-05' AND stanWody > stanAlarmowy;";
            } else {
                $zapytanie = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy JOIN pomiary ON pomiary.wodowskazy_id = wodowskazy.id WHERE dataPomiaru = '2022-05-05'";
            }
            $wynik = mysqli_query($polacz, $zapytanie);

            while($row = mysqli_fetch_assoc($wynik)) {
                echo "<tr>";
                echo "<td>".$row['nazwa']."</td>";
                echo "<td>".$row['rzeka']."</td>";
                echo "<td>".$row['stanOstrzegawczy']."</td>";
                echo "<td>".$row['stanAlarmowy']."</td>";
                echo "<td>".$row['stanWody']."</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </section>
    <section class="blok-prawy">
        <h3>Informacje</h3>
        <ul>
            <li>Brak ostrzeżeń o burzach z gradem</li>
            <li>Smog w mieście Wrocław</li>
            <li>Silny wiatr w Karkonoszach</li>            
        </ul>
        <h3>Średnie stany wód</h3>
        <?php
            $zapytanie = " SELECT pomiary.dataPomiaru, AVG(pomiary.stanWody) FROM pomiary GROUP BY dataPomiaru;";
            $wynik = mysqli_query($polacz,$zapytanie);
            while ($row = mysqli_fetch_row($wynik)) {
                echo "<p>".$row[0]."; ".$row[1]."</p>";
            }
        ?>
        <a href="https://komunikat.pl">Dowiedz się więcej</a>
        <img src="obraz2.jpg" alt="rzeka" class="obrazek">
    </section>
    <footer>
        <p>Stronę wykonał: 0000000000000</p>
    </footer>

</body>
</html>

<?php
mysqli_close($polacz);
?>