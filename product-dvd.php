<?php 

require_once('./initialize.php');

class Dvd extends ProductBase
{
    public $size;

    public function __construct($size = 0)
    {
        $this->size = $size;
    }

    public function create($data){
        
        $this->setName($data['name']);
        $this->setSku($data['sku']);
        $this->setPrice($data['price']);
        $this->setType($data['type']);
        $this->setSize($data['size']);
        $this->saveToDb();
	}

    
    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function saveToDb()
    {
        global $database;
        $attributes = $this->sanitized_atributes();

        $sql = "INSERT INTO " . self::$table_name . " (";
        $sql .= " sku, name, price, type, size, height, width, length, weight";
        $sql .= ") values ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "','0','0','0','0')";
        $database->query($sql) ? $this->successfullyInserted($database) : self::send_error();
    }

    public function send_error()
    {
        echo 'there was an error';
    }

    public function successfullyInserted($database)
    {
        $this->id = $database->insert_id();
        return true;
    }

    public function delete()
    {
        global $database;
        $sql = "DELETE FROM " . self::$table_name . " ";
        $sql .= " WHERE ID = " . $database->escape_value($this->id);
        $sql .= " LIMIT 1";
        $database->query($sql);
        return ($database->affected_rows() == 1) ? 'true' : 'false';
    }
}
?>