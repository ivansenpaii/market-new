<!DOCTYPE html>
<html lang="ru">
<head>
     <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/blowup.js"></script>
    <script type="text/javascript" src="js/notify.js"></script>  
    <script src="js/script.js"></script>  
    <title>Lamoda</title>
</head>
<body>
<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include "connect.php";

$sql_product_category = mysqli_query($link, 
'SELECT p.id as pid, cp.category_id, p.category_id, c.name as cname, product_image_main_id, pimg.image as mainimg, pimg.alt_image as imgalt, p.name as pname, p.price_old, p.price, p.price_discount ,p.description, p.active
FROM product p 
JOIN category__product cp ON cp.product_id = p.id
JOIN product_image pimg ON pimg.id = p.product_image_main_id
JOIN product__product_image ppi ON ppi.product_id = p.id
JOIN category c ON c.id = cp.category_id      
WHERE p.id = '.$_GET['id'].'   
');
$result = mysqli_fetch_array($sql_product_category);

if(count($result['pid'])<=0){
    $new_url = '/404.php';
    header('Location: '.$new_url);
}

?>

<a onclick="javascript:history.back(); return false;">Назад</a>

<div class="layout">
    <div class="product">
       <div class="product__preview">
            <div class="product__preview-slider">
                <img class="product__preview-slid1" src="product-img/<? echo "{$result['mainimg']}" ?>" alt="<? echo "{$result_all['imgalt']}" ?>">
                <img class="product__preview-slid2" src="product-img/<? echo "{$result['mainimg']}" ?>" alt="<? echo "{$result_all['imgalt']}" ?>">
                <img class="product__preview-slid3" src="product-img/<? echo "{$result['mainimg']}" ?>" alt="<? echo "{$result_all['imgalt']}" ?>">
            </div>

            <div class="product__preview-zoom">
                <div class="product__preview-zoomed" id="zoom"><img src="product-img/<? echo "{$result['mainimg']}" ?>"></div>
            </div>            
       </div>

        <div class="product__description">
            
            <h2 class="product__title"><? echo "{$result['pname']}" ?></h2>

            <div class="product__categories">
                <a  href="https://www.lamoda.by/cb/2484-24385/clothes-rubashki-medicine/"><? echo "{$result['cname']}" ?> </a> 
                <a  href="https://www.lamoda.ru/b/24385/brand-medicine/">Все модели <? echo "{$result['pname']}" ?></a> 
                <a  href="https://www.lamoda.ru/c/515/clothes-muzhskie-rubashki-i-sorochki/"> <? echo "{$result['cname']}" ?> </a>    
            </div>

            <div class="product__price">
                <div class="product__price-actual">
                    <div class="product__price-old" ><? echo "{$result['price_old']}" ?> ₽</div> 
                    <div class="product__price-current"><? echo "{$result['price']}" ?> ₽</div>
                </div>
                <div class="product__price-discount"> 
                        <div class="product__discount-value"><? echo "{$result['price_discount']}" ?> ₽</div>
                        <div class="product__discount-text">— c промокодом</div>
                </div>        
            </div>    

            <div class="product__info">
                <div class="product__info-item">
                    <img src="icon/checkbox.svg">
                       В наличии в магазине
                    <a href="https://www.lamoda.ru">Lamoda</a>    
                </div>
                <div class="product__info-item">
                    <img src="icon/car.svg">
                      Бесплатная доставка
                </div>
            </div>

            <div class="product__buy">
                <button class="buy-custom-button-minus">—</button>
                <input id="id-buy-input" class="buy-input" value="1" type=number min="1" max="99" step="1" oninput="this.value = this.value.replace(/\./g, '')" required>
                <button class="buy-custom-button-plus">+</button>
            </div>

            <div class="product__action">
                <button class="custom-button custom-button--blue" >в корзину</button>
                <button class="custom-button" onclick="window.location.href = 'form.php';">обратная связь</button>
            </div>

            <div class="product__text">
                <? echo "{$result['description']}" ?></br>
            </div>

            <div class="product__share">
                <div>ПОДЕЛИТЬСЯ   </div>
                <a href="https://vk.com/id0" target="_blank" ><img src="icon/vk.svg" alt="vk"></a>
                <a href="https://plus.google.com/" target="_blank" ><img src="icon/g+.svg" alt="g+"></a>
                <a href="https://www.facebook.com" target="_blank" ><img src="icon/facebook.svg" alt="fb"></a>
                <a href="https://vk.com/id0" target="_blank" ><img src="icon/twitter.svg" alt="twtr"></a>
                <div class="product__share-count">123</div>
            </div>
        </div>
    </div>
</div>

<script src="js/script.js"></script>

</body>
</html>
