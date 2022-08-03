<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Связь с нами</title>
    <link rel="stylesheet" href="style.css"> 
</head>

  <body>
<!--Сохраняю данные в куки-->
    <?
    session_start();
    if(isset($_REQUEST['subbutton'])){
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["birthday"] = $_POST["birthday"];
    $_SESSION["theme"] = $_POST["theme"];
    $_SESSION["question"] = $_POST["question"];
    }
    
    ?>

  <!-- отдаю данные в БД-->
  <? if (isset($_POST["username"]) and isset($_POST["email"])) {include "form_action.php";}?>

  <a onclick="javascript:history.back(); return false;">Назад</a>    
  <div class="layout layout--form">
        <header >
            <h2>Оставьте свои данные для связи</h2>
        </header>

        <form method="POST" onsubmit="alert('Данные ушли хакерам')">  
            
                <div>ФИО:<br>
                    <input type="text" name="username" placeholder="Иванов Иван Иванович" value="<?=$_SESSION["username"]?>" pattern="[А-Яа-яЁё ]+" required>
                </div>

                <div>e-mail:<br>
                    <input type="email" name="email" placeholder="name@mail.ru"  value="<?=$_SESSION["email"]?>" required>
                </div>

                <div>Дата рождения:<br>
                    <input type="date" name="birthday" value="<?=$_SESSION["birthday"]?>" required>
                </div>
                
                <div> Пол: <br>
                    <fieldset required>
                        <input name="sex" type="radio" value="М"checked >Мужской
                        <input name="sex" type="radio" value="Ж">Женский               
                    </fieldset>
                </div>           

                <div> Тема обращения:<br>
                    <input name="theme" type="text" value="<?=$_SESSION["theme"]?>" required>
                </div>

                        
                <div>Суть вопроса:<br>
                    <textarea cols="60" rows="5" name="question" value="<?=$_SESSION["question"]?>" placeholder="Хочу спросить про товар..." required></textarea>
                </div>
                
                <div><input type="checkbox" required> Со всем согласен</div>

                <div>
                    <input class="formbutton formbutton--blue" name = "subbutton" type="submit" value="Отправить">
                    <input class="formbutton" type="reset" value="Очистить">
                </div>             
               
        </form>
        
        <footer>
            <h4>Спасибо за обращение!!!</h4>
        </footer>
    </div>
  </body>

</html>

