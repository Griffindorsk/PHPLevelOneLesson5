<?php
$title = "Галерея изображений PHP + JS";
require "../templates/layout.php";
require_once "../engine/menu.php";
echo <<<_END
<div id="main">
    <div class="post_title">
        <h2>Моя галерея</h2>
    </div>
    <div class="gallery">
_END;

$link = mysqli_connect("lesson5", "itsme", "figarotam", "test20210511");//обращение к базе lesson5
$tableFromDB = mysqli_query($link, "SELECT * FROM `pictures` WHERE `id`>0");//обращение к таблице pictures из базы lesson5
//попытка сортировки по частоте просмотров не удалась
//$tableFromDB = mysqli_query($link, "SELECT * FROM `pictures` WHERE `id`>0 ORDER BY `views` DESC");
//вышеприведенная строка выдает ошибку
$dataFromTable = array();
while($row = mysqli_fetch_assoc($tableFromDB)) {
    $dataFromTable[] = $row;
}
$content = "";//html код со ссылками на изображения
for ($i=0; $i< count($dataFromTable); $i++) {
        $path1 = $dataFromTable[$i]['path_large'];
        $path2 = $dataFromTable[$i]['path_small'];
        $photoName = $dataFromTable[$i]['filename'];
        $content = $content . 
<<<_END
    <a rel="gallery" class="photo" href="$path1/$photoName" target="_blank">
        <img src="$path2/$photoName" width="150" height="100">
    </a>
_END;
}
mysqli_close($link);
echo $content . "</div></div>";