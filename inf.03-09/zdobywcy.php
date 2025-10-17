<?php
$connection = mysqli_connect('localhost', 'root', '', 'zdobywcy');
if (!$connection) {
    die("Wystąpił błąd połączenia: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZDOBYWCY GÓR</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Klub zdobywców gór polskich</h1>
    </header>

    <nav>
        <a href="kw1.png">kwerenda1</a>
        <a href="kw2.png">kwerenda2</a>
        <a href="kw3.png">kwerenda3</a>
        <a href="kw4.png">kwerenda4</a>
    </nav>

    <aside>
        <img src="logo.png" alt="logo zdobywcy">
        <h3>Razem z nami</h3>
        <ul>
            <li>wyjazdy</li>
            <li>szkolenia</li>
            <li>rekreacja</li>
            <li>wypoczynek</li>
            <li>wyzwanie</li>
        </ul>
    </aside>

    <main>
        <h2>Dolącz do naszego zespołu</h2>
        <p>Wpisz swoje dane do formularza:</p>

        <form action="" method="post">
            <label>Nazwisko: <input type="text" name="nazwisko"></label>
            <label>Imię: <input type="text" name="imie"></label>
            <label>Funkcja: <select name="funkcja" id="">
                <option value="uczestnik">uczestnik</option>
                <option value="przewodnik">przewodnik</option>
                <option value="zaopatrzeniowiec">zaopatrzeniowiec</option>
                <option value="organizator">organizator</option>
                <option value="ratownik">ratownik</option>
            </select>
            <label>Email: <input type="email" name="email"></label>
            <input type="submit" value="dodaj" name="dodaj">
        </form>
        <?php
        #skrypt 2
        if (isset($_POST['dodaj'])) {
            $nazwisko = $_POST['nazwisko'];
            $imie = $_POST['imie'];
            $funkcja = $_POST['funkcja'];
            $email = $_POST['email'];

            $querry_insert = "INSERT INTO osoby VALUES (NULL, '$nazwisko', '$imie', '$funkcja', '$email');";
            if (!mysqli_query($connection, $querry_insert)) {
                echo "błąd zapytania: ".mysqli_error($connection);
            };
        }
        ?>
        <table>
            <tr>
                <th>Nazwisko</td>
                <th>Imię</th>
                <th>Funkcja</th>
                <th>Email</th>
            </tr>

                <?php
                # skrypt 1
                $querry_request = "SELECT nazwisko, imie, funkcja, email FROM osoby";
                $result = mysqli_query($connection, $querry_request);
                while ($res = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$res['nazwisko']."</td>";
                    echo "<td>".$res['imie']."</td>";
                    echo "<td>".$res['funkcja']."</td>";
                    echo "<td>".$res['email']."</td>";
                    echo "</tr>";
                }
                ?>
        </table>
    </main>

    <footer>
        Stronę wykonała: 15
    </footer>
</body>
</html>

<?php
mysqli_close($connection);
?>