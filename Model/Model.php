<?php
require_once __DIR__ . '/../DB/Connection.php';
require_once __DIR__ . '/../interface/ModelInterface.php';
abstract class Model extends Connection implements ModelInterface
{
    public function Create($datas, $table)
    {
        //var_dump($data);
        //ambil data bedasarkan
        $key = array_keys($datas);
        $value = array_values($datas);
        //memisahkan data bedasarkan
        $key = implode(',', $key);
        $value = implode("','", $value);
        // echo $key;
        // echo $value;
        $query = "INSERT INTO $table ($key) VALUES ('$value')";
        $result = mysqli_query($this->db, $query);
        if ($result) {
            return $datas;
        } else {
            return false;
        }
        return $result;
    }
    public function Table($table)
    {
        $query = "SELECT * FROM $table";
        $result = mysqli_query($this->db, $query);
        return $this->Convert($result);
    }
    public function Convert($datas)
    {
        $data = [];
        while ($row = mysqli_fetch_assoc($datas)) {
            $data[] = $row;
        }
        return $data;
    }
    public function Find($id, $table)
    {
        $query = "SELECT * FROM $table WHERE id = $id";
        $result = mysqli_query($this->db, $query);
        $data = $this->Convert($result);
        return $data;
    }
    public function Update($id, $datas, $table)
    {
        $key = array_keys($datas);
        $value = array_values($datas);
        $query = "UPDATE $table SET ";
        for ($i = 0; $i < count($key); $i++) {
            $query .= $key[$i] . " = '" . $value[$i] . "'";
            if ($i != count($key) - 1) {
                $query .= ", ";
            }
        }
        $query .= " WHERE id = $id";
        $result = mysqli_query($this->db, $query);
        if ($result) {
            return $datas;
        } else {
            return false;
        }
        return $result;
    }

    public function Delete($id, $table)
    {
        $query = "DELETE FROM $table WHERE id = $id";
        $result = mysqli_query($this->db, $query);
        if ($result) {
            return $id;
        } else {
            return false;
        }
        return $result;
    }
}
