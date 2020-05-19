<?php

use W1019\DbTable;

include "src/autoload.php";

$table = new DbTable(
    new mysqli(
        "localhost",
        "root",
        "",
        "bd123"
    ),
    "W1019"
);

print_r($table->get());

// echo $table->add(["text"=>"Привет", "name"=>"Вася"]);

// echo $table->add(["text"=>"Прив", "name"=>"Yarick"]);

$table->edit(5, ["text"=>"Прив", "name"=>"Yarick"]);