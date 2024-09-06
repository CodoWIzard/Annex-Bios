<?php
session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = ""; // vul dit in

try {
    $con = new PDO(
        "mysql:host=$dbhost;dbname=..",
        $dbuser, $dbpass);

  echo "Connected succesfully";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage;  
}

// hieronder moeten beide links later veranderd worden.
define("BASEURL","http://localhost/web-module-4-jaar1/module-4-1-crud-wdv-CodoWIzard/");
define("BASEURL_CMS","http://localhost/web-module-4-jaar1/module-4-1-crud-wdv-CodoWIzard/admin/");

function prettyDump ($var) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}