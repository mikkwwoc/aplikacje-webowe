<!DOCTYPE html>
<html lang="pl">
<meta charset="UTF-8">
<title>Kalkulator kredytowy</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">

<body>
    <div class="header">
        <h1>Kalkulator kredytowy</h1>
                <p>Możesz obliczyć miesięczną ratę kredytu. Musisz wybrać kwotę, ilość lat oraz oprocentowanie.</p>
    </div>
        <br><br>
    <div class="container">
        <form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="id_amount">Kwota [zł]: </label>
                </div>
                <div class="col-75">
                    <input id="id_amount" type="text" name="amount" placeholder="Wpisz kwotę"/>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="id_years">Na ile lat: </label>
                </div>
                <div class="col-75">
                    <input id="id_years" type="text" name="years" placeholder="Wpisz lata"/>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="id_percent">Oprocentowanie [%]:</label>

                </div>
                <div class="col-75">
                    <input id="id_percent" type="text" name="percent" placeholder="Wpisz oprocentowanie w skali roku"/>
                </div>
            </div>
            <input type="submit" value="Oblicz" />
            <input type="reset" value="Reset">

        </form>
        <?php
        //wyświeltenie listy błędów, jeśli istnieją
        if (isset($messages)) {
            if (count ( $messages ) > 0) {
                echo '<ol class="error-box">';
                foreach ( $messages as $key => $msg ) {
                    echo '<li>'.$msg.'</li>';
                }
                echo '</ol>';
            }
        }
        ?>
        <?php
            if (isset($onePayment)){ ?>
        <div class="result-box">
        <?php   echo 'Miesięczna rata: '.$paymentText;} ?>

        </div>

    </div>
</body>
</html>