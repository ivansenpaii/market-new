<!DOCTYPE html>
<html lang="ru">
<head>
     <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">      
</head>
<body>
<a onclick="javascript:history.back(); return false;">Назад</a>
<?php

    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    include "connect.php";

        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }else $page = 1;    
        $pagecount = 12;  //кол-во записей на странице
        $art = ($page * $pagecount) - $pagecount;
    
        
        $sql_product_category = mysqli_query($link, 
        'SELECT p.id as pid, cp.category_id as cid, p.category_id, c.name as cname, product_image_main_id, pimg.image as mainimg, pimg.alt_image as imgalt, p.name as pname, p.price_old, p.price, p.price_discount ,p.description as pdescription, p.active
        FROM product p 
        JOIN category__product cp ON cp.product_id = p.id
        JOIN product_image pimg ON pimg.id = p.product_image_main_id
        JOIN category c ON c.id = cp.category_id
        WHERE p.active = "1" AND cp.category_id = '.$_GET['id'].'
        LIMIT '.$art.','.$pagecount.'
        ');
?>

    <div class="layout">
        <h2>Товары категории</h2>

        <?php
        $cidd=$_GET['id'];
        
        $res = mysqli_query($link," SELECT COUNT(*) FROM category__product WHERE category_id =  '$cidd'");
        $row = mysqli_fetch_row($res);
        $total = $row[0];

        $str_pag = ceil($total / $pagecount);

        $result = mysqli_fetch_array($sql_product_category);
        do{
            echo " <div class=product_card >
            <a href=product.php?id={$result['pid']}>
                <div class=product_card__name>{$result['cname']} <br> <b>{$result['pname']}</b></div> 
                <div class=product_card__name></div></a> 
                    <div class=product_card__desc>                        
                        <img src=product-img/{$result['mainimg']} alt={$result['imgalt']}> 
                    </div>
                    </div>            
            ";
        } while ($result  = mysqli_fetch_array($sql_product_category));

    ?>

    <div class="pagecount">
        <?
            for ($i = 1; $i <= $str_pag; $i++){
            echo "<a href=category.php?id=".$_GET['id']."?page=".$i.">Страница ".$i." <br></a>";
            }
        ?>             
    </div>  

    </div>
</body>
