<?php
function mysql_noconnection() {//сообщение, если подключение к базе не удалось
    echo <<<_END
    <p>Fatal Connection Error</p>
    <p>Connection to DB was not succcessfull. Please, try again.</p>
_END;
}
function mysql_norequestresult() {//сообщение, если запрос к базе не удалось выполнить
    echo <<<_END
    <p>Fatal Request Error</p>
    <p>Request to DB was not succcessfull. Please, try again.</p>
_END;
}
function clear_postdata($connection,$stringdata) {
    return $connection->real_escape_string($_POST[$stringdata]);
}
?>