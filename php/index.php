<?php

$uri = $_SERVER["REQUEST_URI"];

require_once './vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader);


if ('/' === $uri) {

    $template = $twig->load('index.html.twig');
    $tmp = ['python', 'php', 'node', 'java', 'golang'];
    echo $template->render(["tmp" => $tmp]);
} else if ("/php" === $uri) {

    $dir = 'sqlite:/home/qwe/Documents/mixing/Data.db';

    if (isset($_POST['create'])){

        if (isset($_POST['city'])){
            $dbh = new PDO($dir) or die("cannot open the database");

            $city = $_POST["city"];
            $query = "INSERT INTO Data (city) VALUES ('$city')";
            $dbh->exec($query);

        }


    }else if (isset($_POST['submit2'])) {
        echo 123;
    }


    require __DIR__ . "/templates/" . 'crud.htm';


    $dbh = new PDO($dir) or die("cannot open the database");
    $query = "SELECT * FROM Data";
    foreach ($dbh->query($query) as $row) {
        echo "{$row[0]} $row[1]<br>";
    }
    $dbh = null;

    print_r($dbh->query($query));

}