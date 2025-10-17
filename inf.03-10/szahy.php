<?php
$poloczenie=mysqli_connect("localhost", "root", "", "szachy");

if (!$poloczenie){
    die ("Nie ma możliwości połączenia się z bazą, spróbój ponownie za chwilę." . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOŁO SZACHOWE</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <header>
    <h2><i>Koło szachowe gambit piona</i></h2>
    </header>

    <main>

    <h4>Polecane linki</h4>
    
    <ul>
        <li><a href=""> kwerenda1</li></a>
        <li><a href=""> kwerenda2</li></a>
        <li><a href=""> kwerenda3</li></a>
        <li><a href=""> kwerenda4</li></a>
    </ul>
<img src="logo.png" alt="Logo koła">
    </main>

    <aside>

 <h3>Najlepsi gracze naszego koła</h3>
    <table>
        <tr>

        <th>Pozycja</th>
        <th>Pseudonim</th>
        <th>Tytuł</th>
        <th>Ranking</th>
        <th>Klasa</th>
        </tr>
    <?php
        $zapyt="SELECT pseudonim, tytul, ranking, klasa FROM zawodnicy WHERE ranking > 2787 ORDER BY ranking DESC;";
        $zada=mysqli_query($poloczenie, $zapyt);
        $num=1;

        if ($zada){
            while ($rec=mysqli_fetch_assoc($zada)){
                
                echo "<tr>";
                echo "<td>".$num."</td>";
                echo "<td>".$rec['pseudonim']."</td>";
                echo "<td>".$rec['tytul']."</td>";
                echo "<td>".$rec['ranking']."</td>";
                echo "<td>".$rec['klasa']."</td>";
                echo "</tr>";

                $num++;
            }
        }

    ?>
    </table>
    <form  method="post" action="szahy.php" >
    <button type="submit">Losuj nową parę graczy</button>
</form>
    <?php
        $zapytanie="SELECT pseudonim, klasa FROM zawodnicy ORDER BY RAND() LIMIT 2;";
        $zadanie=mysqli_query($poloczenie, $zapytanie);
            echo "<h4>";
        if($zadanie){
            while ($reca=mysqli_fetch_assoc($zadanie)){
                echo "{$reca['pseudonim']} {$reca['klasa']} ";
            }
        }
    echo "</h4>";
    ?>

    <p>Legenda: AM - Absolutny Mistrz, SM - Szkolny Mistrz, PM - Mistrz Poziomu, KM - Mistrz Klasowy</p>
    </aside>

    <footer>
    <p>Stronę wykonał: 15</p>
    </footer>

</body>
</html>

<?php
mysqli_close($poloczenie);
?>