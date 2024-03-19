<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Logowanie</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<h2 class="header">Logowanie</h2>
<div class="container" style="width: 50%">
    <form action="<?php print(_APP_ROOT); ?>/app/security/login.php" method="post">
        <fieldset>
            <div class = "row">
                <div class ="col-25">
                    <label for="id_login">login: </label>
                </div>
                <div class="col-75">
                    <input id="id_login" type="text" name="login" value="<?php out($form['login']); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="id_pass">password: </label>
                </div>
                <div class="col-75">
                    <input id="id_pass" type="password" name="pass" />
                </div>
            </div>
        </fieldset>
        <input type="submit" value="zaloguj"/>
    </form>
    <?php
    if (isset($messages)) {
        if (count ( $messages ) > 0) {
            echo '<ol style="padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
            foreach ($messages as $key => $msg) {
                echo '<li>'.$msg.'</li>';
            }
            echo '</ol>';
        }
    }
    ?>
</div>
</body>
</html>