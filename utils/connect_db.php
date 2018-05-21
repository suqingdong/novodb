<?php

function connect($dbname)
{
    // class MyDB extends SQLite3
    // {
    //     function __construct($dbname)
    //     {
    //         // printf("opening database: %s ...<br>", $dbname);
    //         $this->open($dbname);
    //     }
    // }
    // $db = new MyDB($dbname);
    // echo $db->lastErrorMsg();
    
    // if ( ! $db )
    // {
        //     $msg = $db->lastErrorMsg();
        //     echo $db->lastErrorMsg();
        //     exit();
        // } else {
            //     $msg = 'open database successfully!';
            //     printf( "<script>console.log('%s');</script>", $msg);
            // }
    
    if ( ! file_exists($dbname) )
    {
        echo '[error] database not exists: ' . $dbname;
        exit(1);
    }
    
    $db = new SQLite3($dbname);
    
    return $db;
}
?>