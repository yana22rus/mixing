<?php

$uri = $_SERVER["REQUEST_URI"];

require_once './vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader);

$template = $twig->load('index.html.twig');
$template_crud = $twig->load('crud.html.twig');

define('JS_PATH', 'static/js/');


if ('/' === $uri) {


    $tmp = ['python', 'php', 'node', 'java', 'golang'];
    echo $template->render(["tmp" => $tmp]);
} else if ("/php" === $uri) {

    $dir = 'sqlite:/home/qwe/Documents/mixing/Data.db';

    if (isset($_POST['create'])) {

        if (isset($_POST['city'])) {
            $dbh = new PDO($dir) or die("cannot open the database");

            $city = $_POST["city"];
            $query = "INSERT INTO Data (city) VALUES ('$city')";
            $dbh->exec($query);

        }


    } else if (isset($_POST['submit2'])) {
        echo 123;
    }


    $db = new SQLite3('/home/qwe/Documents/mixing/Data.db');

    $res = $db->query('SELECT * FROM Data');

    $arr = [];

    while ($row = $res->fetchArray()) {
        $arr[$row['id']] = $row['city'];
    }

    echo $template_crud->render(["arr" => $arr]);


}