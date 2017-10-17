<?php

require_once('./resources/variables.php');

class DBHelper {

    public $db;

    public function __construct()
    {
        $this->db = new mysqli(HOST, USER, PASSWORD, DB_NAME, PORT);

        if ($this->db->connect_error) {
            die('DB Connection failed');
        }
    }

    public function getAll($table)
    {
        $select_sql = "SELECT * FROM $table;";
        
        $result = $this->db->query($select_sql);
    
        $records = [];
        while($row = $result->fetch_assoc()) {
        $records[] = $row;
        }
    
        return $records;
    }

    public function getById($table, $id)
    {
        $select_sql = "SELECT * FROM $table WHERE id = $id;";
        
        $result = $this->db->query($select_sql);
    
        return $result->fetch_assoc();
    }

    public function create($table, $data)
    {
        $length = count($data);
        $count = 0;
        $sql = "INSERT INTO $table (";
        $value_string = "VALUES (";
      
        foreach ($data as $key => $value) {
          $count++;
          if ($count < $length) {
            $sql .= $key.', ';
            $value_string .= "'$data[$key]'".", ";
          }
          else {
            $sql .= $key.') ';
            $value_string .= "'$data[$key]'".")";
          }
        }
        $sql = $sql . $value_string;
      
        $result = $this->db->query($sql);
        return $result;
    }

    public function update($table, $id, $data)
    {
        $length = count($data);
        $count = 0;
        $sql = "UPDATE $table SET ";
      
        foreach ($data as $key => $value) {
          $count++;
          if ($count < $length) {
            $sql .= $key.' = '."'$value'".', ';
          }
          else {
            $sql .= $key.' = '."'$value'".' ';
          }
      
        }
      
        $sql .= " WHERE id = $id";
      
        $result = $this->db->query($sql);
        return $result;
    }

    public function delete($table, $id)
    {
        $delete_sql = "DELETE FROM $table where id=$id";
        $result = $this->db->query($delete_sql);
        return $result;
    }
}