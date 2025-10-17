<?php
$poloczenie=mysqli_connect("localhost", "root", "", "piekarnia");

if (!$poloczenie){
    die("Błąd łączenia się z bazą: " . mysqli_connect_error());
}

$wybranyRodzaj=isset($_POST['rodzaj']) ? $_POST['rodzaj']: "";
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>PIEKARNIA</title>
</head>
<body>
<img src="wypieki.png">
    <nav>
<a href="">KWERENDA1</a>
<a href="">KWERENDA2</a>
<a href="">KWERENDA3</a>
<a href="">KWERENDA4</a>
    </nav>

    <header>
        <h1>WITAMY</h1>
        <H4>NA STRONIE PIEKARNI</H4>
        <P>Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne. Pieczemy wyłącznie wypieki na naturalnym zakwasie bez polepszaczy i zagęstników. Korzystamy wyłącznie z najlepszych ziaren pochodzących z ekologicznych upraw położonych w rejonach zgierskim i ozorkowskim.</P>
    </header>

<aside>
    <h4>Wybierz rodzaj wypieków</h4>
    
    <form method="post" action="">
        <select name="rodzaj">
            <option value="">-- wybierz --</option>
        <?php
        $qRodzaje="SELECT DISTINCT Rodzaj FROM wyroby ORDER BY Rodzaj DESC";
        $resRodzaje=mysqli_query($poloczenie, $qRodzaje);
        if ($resRodzaje){
            while ($r=mysqli_fetch_assoc($resRodzaje)){
                $rodzaje=$r['Rodzaj'];
                $sel=($rodzaje===$wybranyRodzaj) ? "selected" : "";
                echo "<option value=\"$rodzaje\" $sel>$rodzaje</option>>";
            }
            mysqli_free_result($resRodzaje);
        }

        ?>
</select> 
<button type="submit">Wybierz</button>
</form>

        <table>
            <thead>
      <tr>
        <th>Rodzaj</th>
        <th>Nazwa</th>
        <th>Gramatura</th>
        <th>Cena</th>
      </tr>
    </thead>
    <tbody>
        <?php
        if ($wybranyRodzaj !== "") {
            $qDane = "SELECT Rodzaj, Nazwa, Gramatura, Cena FROM wyroby WHERE Rodzaj = '$wybranyRodzaj'";
            $resDane = mysqli_query($poloczenie, $qDane);
            if ($resDane){
                while ($w = mysqli_fetch_assoc($resDane)) {
                    echo "<tr>";
                    echo "<td>{$w['Rodzaj']}</td>";
                    echo "<td>{$w['Nazwa']}</td>";
                    echo "<td>{$w['Gramatura']}</td>";
                    echo "<td>{$w['Cena']}</td>";
                    echo "</tr>";
                }
                mysqli_free_result($resDane);
            }
        }
        ?>
        </tbody>
    </table>
</aside>

<footer>

<p>AUTOR nr.zdającego</p>
<p>Data: 04.09.2025</p>

</footer>
</body>
</html>
<?php
mysqli_close($poloczenie);
?>