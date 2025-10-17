<?php
$polonczenie=mysqli_connect("localhost", "root", "", "konkurs");

if (!$polonczenie){
    die ("Nie ma możliwości połączenia się z bazą, spróbój ponownie za chwilę." . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WOLONTARIAT SZKOLNY</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>

<header>
    <h1>KONKURS - WOLONTARIAT SZKOLNY</h1>
</header>


<aside>
    <h3>Konkursowe nagrody</h3>
    <button type="submit">Losuj nowe nagrody</button>
    <table>
        <tr>
            <th>Nr</th>
            <th>Nazwa</th>
            <th>Opis</th>
            <th>Wartość</th>
        </tr>

            <?php
            $zapytanie= "SELECT Nazwa, Opis, Cena FROM nagrody ORDER BY RAND() LIMIT 5";
            $wynik=mysqli_query($polonczenie, $zapytanie);
            $numer= 1;

            if($zapytanie)
                while($odp=mysqli_fetch_assoc($wynik)) {
           
            echo "<tr>";
                echo "<td>{$numer}</td>";
                echo "<td>{$odp['Nazwa']}</td>";
                echo "<td>{$odp['Opis']}</td>";
                echo "<td>{$odp['Cena']}</td>";
            echo "</tr>";
            $numer++;
     }

            ?>
    </table>

</aside>

<main>
    <img src="puchar.png" alt="Puchar dla wolontariusza">
    <h4>Polecane linki</h4>
    <ul>
        <li><a href=""> Kwerenda1</a></li>
        <li><a href=""> Kwerenda2</a></li>
        <li><a href=""> Kwerenda3</a></li>
        <li><a href="">Kwerenda4</a></li>
    </ul>
</main>

<footer>
    <p>Numer zdającego: 15</p>
</footer>

</body>
</html>

<?php
mysqli_close($polonczenie);
?>