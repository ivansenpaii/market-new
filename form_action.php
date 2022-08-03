    <?php
    $username = trim(strip_tags($_POST['username']));
    $email = trim(strip_tags($_POST['email']));
    $birthday = trim(strip_tags($_POST['birthday']));
    $sex = trim(strip_tags($_POST['sex']));
    $theme = trim(strip_tags($_POST['theme']));
    $question = trim(strip_tags($_POST['question']));

    include "connect.php";

    $sql = mysqli_query($link, "INSERT INTO `customers_question` (`username`, `email`, `birthday`, `sex`, `theme`, `question`) 
    VALUES ('$username', '$email', '$birthday', '$sex', '$theme', '$question')");    
  
    ?>


