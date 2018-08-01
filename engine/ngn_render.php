<?php
include_once __DIR__ . '/../config/cfg_main.php';
require_once ENGINE_DIR . "/ngn_db.php";

function getComments($conn) {
    $getComments = mysqli_query($conn, "SELECT * FROM comments ORDER BY id ASC");
    return $getComments;
}

function getFilesFromDB($conn) {
    $filesFromDB = mysqli_query($conn, "SELECT * FROM images ORDER BY visitedCount DESC");
    return $filesFromDB;
}

function getGallery(){
    return queryAll("SELECT * FROM images ORDER BY `visitedCount` DESC");
}

function uploadFileToFolder($uploadName, $destination, $callback = null) {
    $destinationFile = false;
    if (isset($_FILES[$uploadName])) {
        $uploadFile = $_FILES[$uploadName];
        $destinationFile = $destination . $uploadFile['name'];
        if ($uploadFile['size'] >= 200000) {
            echo "<h1 style='color:red'>Размер файла превышает 200кб.</h1>";
        } elseif ($uploadFile['type'] != 'image/jpeg') {
            echo "<h1 style='color:red'>Тип файла должен быть jpg, jpeg, png.</h1>";
        } else {
            move_uploaded_file($uploadFile['tmp_name'], $destinationFile);
            uploadFileToDB($conn, 'img');
            redirect('/gallery.php');
//            if ($callback) {
//                $callback($destination, $uploadFile['name']);
//            }
        }
    }
    return $destinationFile;
}

function uploadFileToDB($conn, $uploadName) {
    $uploadFile = $_FILES[$uploadName];
    $uploadFileName = $uploadFile['name'];
    //апдейтим базу данных
    mysqli_query($conn,
                 "INSERT INTO images (`name`, `pathToNormal`, `pathToThumbnail`, `size`, `visitedCount`) VALUES ('{$uploadFileName}', '/img/normal/{$uploadFileName}', '/img/thumbnail/{$uploadFileName}', '{$uploadFile['size']}', '0')"
    );
//    перезагружаем страницу
    redirect('/');
}




function displayHello() {
    echo "hello, World!";
}

function render($template, array $params = [], $useLayout = true) {
    $content = renderTemplate($template, $params);
    if ($useLayout) {
        $content = renderTemplate('layouts/tpl_main', ['content' => $content]);
    }
    return $content;
}


function renderTemplate($template, array $params = []) {
    extract($params);
    ob_start();
    include TEMPLATES_DIR . $template . ".php";
    return ob_get_clean();
}


