<?php 

require_once('./initialize.php');

class Furniture extends ProductBase
{
    public $height;
    public $width;
    public $length;


    
    public function __construct($height = 0, $width = 0, $length = 0)
    {
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }

    public function create($data){
        $this->setName($data['name']);
        $this->setSku($data['sku']);
        $this->setPrice($data['price']);
        $this->setType($data['type']);
        $this->setLength($data['length']);
        $this->setWidth($data['width']);
        $this->setHeight($data['height']);
        // print_r($this);
        $this->saveToDb();

	}
    public function delete(){
        return 'delete';
    }
    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }


    public function saveToDb()
    {
        global $database;
        $attributes = $this->sanitized_atributes();

        $sql = "INSERT INTO " . self::$table_name . " (";
        $sql .= " sku, name, price, type,height, width, length, weight, size ";
        $sql .= ") values ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "','0','0')";

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

}
