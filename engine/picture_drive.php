<?php
$title = "Поиск изображений по id";
require "../templates/layout.php";//шаблон страницы
require_once "../engine/menu.php";//верхнее меню
require_once "../engine/myfunctions.php";//библиотека вспомогательных функций
require_once "../config/thewaytosomewhere.php";//названия базы и таблицы, логин и пароль к БД

if (isset($_POST['file_index']) && ($_POST['file_index'] != "")) {
    $connection = new mysqli($theway, $theguest, $theringer, $thedata);//подключаемся к базе
    if ($connection->connect_error) {
        mysql_noconnection();//предупреждение, если подключение не удалось
    } else {
        $id_selected = clear_postdata($connection, 'file_index');//превентивно очищает данные от символов перед запросом к базе
        $id_selected = (int)$id_selected;//приводим ввод пользователя к целочисленному виду
        if ($id_selected == 0) {
            echo "<p>индекс файла должен быть целочисленным и больше 0</p>";
        } else {
            echo "<p>картинка с индексом " . $id_selected . "</p>";
            $request = "SELECT * FROM pictures WHERE id=$id_selected";//запрос к базе данных
            $requestResult = $connection->query($request);//отправка запроса к базе данных
            if (!$requestResult) {
                mysql_norequestresult();//предупреждение, если запрос к базе не удался 
            } else {
                $resultRowsNumber = $requestResult->num_rows;//получение количества строк в результате запроса
                echo "<p>количество файлов с заданным индексом: " . $resultRowsNumber . "</p>";//поиск идет по primary_index и более одного результата быть не может, но для универсальности добавлен перебор как если бы было много записей с заданным параметром
                for ($i = 0; $i < $resultRowsNumber; $i++) {
                    $requestRow = $requestResult->fetch_array(MYSQLI_ASSOC);//выборка параметров из строки в ассоциативный массив (ООП стиль)
                    $fileName = htmlspecialchars($requestRow['filename']);//имя файла
                    $filePath = htmlspecialchars($requestRow['path_large']);//путь к файлу
                    $imgAlt = htmlspecialchars($requestRow['description']);//описание картинки
                    $views = htmlspecialchars($requestRow['views']);//количество запросов картинки
                    $views = $views + 1;
                    echo <<<_END
                    <img src="$filePath/$fileName" alt="$imgAlt" style="width: 400px;">
_END;
                    $requestToAdd = "UPDATE `pictures` SET views=$views WHERE id=$id_selected";
                    $requestToAddResult = $connection->query($requestToAdd);
                    if (!$requestToAddResult) {
                        echo "<p>что-то пошло не так при попытке записи</p>";
                    } else {
                        echo "<p>общее количество просмотров этой картинки: $views</p>";
                    }
                }
                unset($id_selected);
                unset($views);
                $requestResult->close();
                $connection->close();
            }
        }
    }
}
echo <<<_END
<form action="picture.php" method="POST">
    <input type="text" name="file_index" placeholder="индекс картинки">
    <input type="submit" value="поиск">
</form>
_END;

// $content2 = "";
// $link = mysqli_connect("lesson5", "itsme", "figarotam", "test20210511");//обращение к базе lesson5
// $tableFromDB = mysqli_query($link, "SELECT * FROM pictures WHERE id > 0");//обращение к таблице pictures из базы lesson5
// $dataFromTable = array();
// while($row = mysqli_fetch_assoc($tableFromDB)) {
//     $dataFromTable[] = $row;
// }
// for ($i=0; $i< count($dataFromTable); $i++) {
//         $path1 = $dataFromTable[$i]['path_large'];
//         $path2 = $dataFromTable[$i]['path_small'];
//         $photoName = $dataFromTable[$i]['filename'];
//         $content2 = $content2 . "<a rel=\"gallery\" class=\"photo\" href=\"{$path1}/{$photoName}\" target=\"_blank\"><img src=\"{$path2}/{$photoName}\" width=\"150\" height=\"100\" /></a>";
// }
// mysqli_close($link);

// $content3 = "</div></div>";//окончание html блока
// $content = $content1 . $content2 . $content3;