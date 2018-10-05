<?php
$link = $_GET["inputLink"]
?>
<!doctype HTMl>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="/main.css">
        <title>YT Stat</title>
    </head>
    <body>
        <nav class="navbar navbar-light bg-primary">
            <a class="navbar-brand" href="/">
                <h1>Kxrie.me</h1>
            </a>
        </nav>
        <h2 class="container p-3">ur link is <?php echo $link; ?></h2>
    </body>
    <footer class="footer"><div class="container" style="text-align: center;">
         &copy; Jayden Zhang 2018
    </div></footer>
</html>