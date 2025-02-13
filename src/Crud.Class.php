<?php
require_once('DB.class.php');

class Crud
{
    use DB;

    public $tableName;
    private $db;

    public function __construct($tableName)
    {
        $this->tableName = $tableName;
        $this->db = $this->connectToDB();
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM " . $this->tableName;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id): array
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->tableName . " WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
    public function create(array $data)
    {
        $columns = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        // print "<pre>";
        // print_r($columns);
        // print "</pre>";
        // print "<pre>";
        // print_r($values);
        // print "</pre>";

        $sql = "INSERT INTO " . $this->tableName . " ($columns) VALUES ($values)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute($data);
    }


    public function update($id, array $data)
    {
        $set = "";
        foreach ($data as $key => $value) {
            $set .= $key . " = :" . $key . ", ";
        }

        // print "<pre>";
        // print_r($set);
        // print "</pre>";
        //removes the last comma and space (", ") at the end of the $set string coming from foreach
        $set = substr($set, 0, -2);

        // print "<pre>";
        // print_r($set);
        // print "</pre>";

        $sql = "UPDATE " . $this->tableName . " SET $set WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        print "<pre>";
        print_r(array_merge($data, ['id' => $id]));
        print "</pre>";
        return $stmt->execute(array_merge($data, ['id' => $id]));
    }
}
