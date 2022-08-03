<!DOCTYPE html>
<html lang="ru">
<head>
     <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
          
</head>
<body>

    <?php
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);;
    
    include "connect.php";
    
        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }else $page = 1;    
        $pagecount = 12;  //кол-во записей для вывода
        $art = ($page * $pagecount) - $pagecount;
        
   
    $sql_category = mysqli_query($link, 
    'SELECT c.id, c.name, c.description, COUNT(category_id) as count_product
     FROM category c
     JOIN category__product cp ON cp.category_id = c.id
     GROUP BY c.id
     HAVING count_product >= 1
     ORDER BY count_product DESC
     LIMIT '.$art.','.$pagecount.'');
    
    

    ?>
   
   <div class="layout">
        <h2 >Категории</h2>
       
        <div class= category-page>
        <?php

$res = mysqli_query($link,"SELECT COUNT(id) FROM `category`");
$row = mysqli_fetch_row($res);
$total = $row[0];

$str_pag = ceil($total / $pagecount);

$result = mysqli_fetch_array($sql_category);
do{
    echo " <div class=card >
          <a href=category.php?id={$result['id']}>
           <div class=card__name><b >{$result['name']}</b></div> <br>
            <div class=card__desc>                        
                    {$result['description']} <br>
                </a> Всего в категории: {$result['count_product']} товар/а 
            </div>
        </div>           
    ";
} while ($result  = mysqli_fetch_array($sql_category));
?>    
 
        <div class="pagecount">
        <?    
        for ($i = 1; $i <= $str_pag; $i++){
            echo "<a href=index.php?page=".$i.">Страница ".$i." <br></a>";
            }
        ?>             
        </div>    
        
        
    </div>
</div> 
    
</body>
    