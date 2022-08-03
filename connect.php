<?php
$link= mysqli_connect('localhost','root','root','market7');
if(!$link)
    echo 'Ошибка соединения: ' . mysqli_connect_error() . '<br>';
