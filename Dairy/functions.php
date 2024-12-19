
<?php

    $dbname = 'Dairy';
    $hostname = 'localhost';
    $username = 'root';
    $password = '';

    $connection = new mysqli($hostname,$username,$password,$dbname);
    if ($connection->connect_error) die("Fatal Error");

    function queryMysql($query)
    {
        global $connection;
        $result = $connection->query($query);
        if (!$result) die("Fatal Error");
        return $result;
    }

    function destroySession()
    {
        $_SESSION=array();
        if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');
        session_destroy();
    }
   

?>