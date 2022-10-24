<?php
require('./initialize.php');

class Operation
{

    function create($data)
    {
        try{
            $type = ucfirst($data['type']);
            self::createProduct(new $type,$data);
        }catch(error){

        }
    }

    function createProduct($product,$data)
    {
        $product->create($data);
        echo json_encode(['message'=>'data successfully deleted']);
    }

    function read()
    {
        $product = new Book();
        $res = $product->find_all();
        $res[0] ? self::send_data($res) : $this->response_error();
    }



    // function delete($data)
    // {
    //     $product = new Product();
    //     $product->id = $data['id'];
    //     $product->delete();
    //     echo json_encode(['message'=>'data successfully deleted']);
    // }

    function send_data($res)
    {
        $x = 0;
        while ($x < count($res)) {
            $response[$x] = $res[$x];
            $x++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }

    function response_error()
    {
        return "There was an error";
    }

    // function createFurniture($product,$data)
    // {
    //     $product->setHeight($_POST['height']);
    //     $product->setWidth($_POST['width']);
    //     $product->setLength($_POST['length']);
    //     $product->create();
    //     echo json_encode(['message'=>'data successfully inserted']);
    // }

    // function createDvd($product,$data)
    // {
    //     $product->setSize($_POST['size']);
    //     $product->create();
    //     echo json_encode(['message'=>'data successfully inserted']);
    // }

    // function createBook($product,$data)
    // {
    //     $product->setWeight($_POST['weight']);
    //     $product->create();
    //     echo json_encode(['message'=>'data successfully inserted']);
    // }

    // function invalidType()
    // {
    //     echo json_encode(['message' => 'type not found!']);
    // }
}
