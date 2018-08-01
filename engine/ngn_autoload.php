<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21.07.2018
 * Time: 2:25
 */

function autoload() {
    $files = scandir(ENGINE_DIR);
    foreach ($files as $file){
        if (!in_array($file, ['..', '.'])) {
            if (substr($file, -4) == '.php') {
                include_once ENGINE_DIR . DIRECTORY_SEPARATOR . $file;
            }
        }
    }
}

autoload();