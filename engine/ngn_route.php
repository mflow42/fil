<?php
function redirect($url, $target = '_self') {
    echo "<script type='text/javascript'>window.open('{$url}', '{$target}');</script>";
}

