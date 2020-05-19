<?php

namespace Model;

use mysqli;

class DbTable implements CRUDInterface
{
    private $mysqli;
    private $tableName;

    public function __construct(mysqli $mysqli, $tableName)
    {
        $this->mysqli = $mysqli;
        $this->tableName = $tableName;
    }

    public function get(): array
    {
        $result = $this->mysqli->query("SELECT * FROM $this->tableName;");

        $array = [];
        while ($row = $result->fetch_assoc()) {
            $array[] = $row;
        }
        return $array;
    }

    public function add(array $data):int
    {
        //INSERT INTO w1019 (`text`, `name`) VALUES ("Привет", "Паша")
        $fildNames = [];

        foreach (array_keys($data) as $value){
            $fildNames[] = $value;
        }

        $sql = "INSERT INTO `$this->tableName` (`".implode("`, `", $fildNames)."`) VALUES ('".implode("', '", $data)."');";

        $this->mysqli->query($sql);

        return $this->mysqli->insert_id;
    }

    
        //UPDATE w1019 SET `name` = 'Petya', `text` = 'Пока' WHERE id = 4;
        public function edit(int $id, array $data)
    {
        $editData = [];
        foreach ($data as $key => $value) {
            $editData[] = " `$key` = '$value' ";
        }

        $sql = "UPDATE `$this->tableName` SET " . implode(", ", $editData) . " WHERE id = $id;";

        $this->mysqli->query($sql);

        return $this;
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM `$this->tableName` WHERE id=$id;";

        $this->mysqli->query($sql);
        
        return $this;
    }
}