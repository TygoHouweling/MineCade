<?php

require_once "model/DataHandler.php";
require_once "model/Display.php";


class HomeLogic
{

    public function __construct()
    {
        $this->DataHandler = new Datahandler("web0088.zxcs.nl", "mysql", "sderijknl_minecade", "sderijknl_minecade", "stan2022");
        $this->Display = new Display();
    }

    public function __destruct()
    {
    }


    public function searchProducts($queryString)
    {
        try {
            $sql = "SELECT product_id as id, product_name, Replace(Replace(Concat('€ ', Format(`product_price`, 2)), ',', ''), '.', ',') AS `product_price`, product_categorie, product_title, product_name, product_thumbnail FROM products WHERE product_name LIKE ?";
            $results = $this->DataHandler->preparedQuery($sql, [
                "%" . $queryString . "%",
            ]);

            return $results;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getearliestEvents($sql){
        $get_sql_back = $this->DataHandler->readData($sql);
        $result = $get_sql_back->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
