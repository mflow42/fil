<?php


function getConnection() {
    include CONFIG_DIR . "cfg_db.php";
    static $conn = null;
    if (!$conn) {
        $conn = mysqli_connect($config['server'], $config['login'], $config['password'], $config['dbName']
        );
    }
    return $conn;
}

function queryAll($sql) {
    return mysqli_fetch_all(execute($sql), MYSQLI_ASSOC);
}

function queryOne($sql) {
    return queryAll($sql)[0];
}

function execute($sql) {
    return mysqli_query(getConnection(), $sql);
}

function closeConnection() {
    mysqli_close(getConnection());
}
