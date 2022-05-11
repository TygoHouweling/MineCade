<?php

require_once "model/DataHandler.php";


class HomeLogic
{

    public function __construct()
    {
        $this->DataHandler = new Datahandler("web0088.zxcs.nl", "mysql", "sderijknl_minecade", "sderijknl", "vMVZEZsH2F");
    }

    public function __destruct()
    {
    }


    public function searchProducts($queryString)
    {
        try {
            $sql = "SELECT * FROM products WHERE product_name LIKE ?";
            $results = $this->DataHandler->preparedQuery($sql, [
                "%" . $queryString . "%",
            ]);

            return $results;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getAllBestselling()
    {
        $sql = "SELECT product_id as id, product_name, Replace(Replace(Concat('€ ', Format(`product_price`, 2)), ',', ''), '.', ',') AS `product_price`, product_categorie, product_title, product_name, product_thumbnail FROM products WHERE product_best_seller = 1";
        $results = $this->DataHandler->readsData($sql);
        $results = $results->fetchall(PDO::FETCH_ASSOC);

        return $results;
    }

    public function getAllCategories($array = false, $dropdown = false)
    {
        try {
            if ($array) {
                $sql = "SELECT * FROM  product_categories LIMIT 4";
            } else {
                $sql = "SELECT * FROM  product_categories";
            }
            $results = $this->DataHandler->readsData($sql);
            $categories = "";
            if ($array) {
                $row = $results->fetchall(PDO::FETCH_ASSOC);

                //          echo "<pre>";
                return $row;
            }
            while ($row = $results->fetchall(PDO::FETCH_ASSOC)) {
                foreach ($row as $item) {
                    if ($dropdown) {
                        $categories .= "<a class='dropdown-item' href='index.php?op=categories&select={$item['categorie_name']}'>{$item['categorie_name']}</a>";
                    } else {
                        $categories .= "<ul>";
                        $categories .= "<li><a href='index.php?op=categories&select={$item['categorie_name']}'>{$item['categorie_name']}</a></li>";
                        $categories .= "</ul>";
                    }
                }
            }

            return $categories;
        } catch (Exception $e) {
            throw $e;
        }
    }


    public function getProductsByGenre($categorie)
    {
        try {
            $sql = "SELECT * FROM `products` WHERE `product_categorie`='{$categorie}'";
            $result = $this->DataHandler->readsData($sql);

            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function readAllProductsList($items)
    {
        $html = "<div class='bestselling'><div class='container'>";
        foreach ($items as $key => $item) {
            $header = $item['categorie_name'];
            $html .= "<div class='cat_header'><h2>$header</h2></div>";
            $html .= "<div class='row'>";

//            die($header);
            //get sql statement and put in foreach
            $sql = "SELECT * FROM products WHERE product_categorie = '$header' limit 4";
            $items = $this->DataHandler->readsData($sql);
            $items = $items->fetchall(PDO::FETCH_ASSOC);

            foreach ($items as $key => $item) {
                $html .= "<div class=col-md-3>";
                $html .= "<div class='bestseller'>";
                $html .= "<div class='content_img'>";
                $html .= "<a href='/web-world'>";
                $image = $item['product_thumbnail'];
                $html .= "<img class='bestSellerImage' src='view/assets/image/$image' alt=''></a>";
                $html .= "<div><a href='/web-world'>Read more about this product</a></div></div>";
                $product_name = $item['product_name'];
                $html .= "<div class='product_title'><h4>$product_name</h4></div>";
                $product_price = $item['product_price'];
                $html .= "<div class='bottom_bestseller'><div class='price'><span>$product_price</span></div><div class='text-center d-md-inline'><button class='rounded-circle border-0 roundbutton'><i class='fas fa-plus fa-010' aria-hidden='true'></i></button></div></div>";
                $html .= "</div></div>";
            }
            $html .="</div>";
        }
        $html .= "</div></div>";

        return $html;
    }

    public function getAllProducts()
    {
        $sql = "SELECT * FROM products WHERE product_categorie = '{$_GET['select']}'";
        //        die($sql);
        $items = $this->DataHandler->readsData($sql);
        $items = $items->fetchall(PDO::FETCH_ASSOC);

        return $items;
    }
}
