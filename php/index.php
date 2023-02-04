<?php

$uri = $_SERVER["REQUEST_URI"];

if ('/' === $uri){
    echo "root";
}else if ("/test" === $uri){


    require __DIR__ . "/templates/" . 'crud.htm';

    $dir = 'sqlite:/home/qwe/Documents/mixing/Data.db';
    $dbh  = new PDO($dir) or die("cannot open the database");
    $query =  "SELECT * FROM Data";
    foreach ($dbh->query($query) as $row)
    {
        echo "{$row[0]} $row[1]<br>";
    }
    $dbh = null;

}