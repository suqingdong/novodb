<?php

  ini_set('memory_limit', '-1');
  // ini_set("memory_limit","2048M");

  $dbname = 'novodb.sqlite3';

  class MyDB extends SQLite3 {
    function __construct() {
      $this->open($GLOBALS['dbname']);
    }
  }
  
  $db = new MyDB();

  if ( ! $db ) {
    $msg = $db->lastErrorMsg();
  } else {
    $msg = 'open database successfully!';
  }
  printf( "<script>console.log('%s');</script>", $msg);


  // save result to an array
  $row = array();

  $terms = $_GET['term'];
  $terms = explode("\r\n", $terms);
  // print_r($terms);
  // exit();


  foreach ($terms as $term) {

    $term_list = preg_split('/[,;:-]|\t|(\ )+/', $term);

    $term_len = count($term_list);

    if ( $term_len == 1 ) {
      if ( preg_match('/^rs\d+$/', $term) ) {
        $sql = sprintf("SELECT * FROM novodb WHERE rsid='%s'", $term);
      } else {
        $sql = sprintf("SELECT * FROM novodb WHERE genename='%s'", $term);
      }
    } else if ( $term_len == 2 ) {
      $sql = sprintf(
        "SELECT * FROM novodb WHERE chrom='%s' and pos='%s'",
        $term_list[0], $term_list[1]);
    } else if ( $term_len == 3 ) {
      $sql = sprintf(
        "SELECT * FROM novodb WHERE chrom='%s' and pos>=%s and pos<=%s",
        $term_list[0], $term_list[1], $term_list[2]);
    } else if ( $term_len == 4 ) {
      $sql = sprintf(
        "SELECT * FROM novodb WHERE chrom='%s' and pos='%s' and ref='%s' and alt='%s'",
        $term_list[0], $term_list[1], $term_list[2], $term_list[3]);
    }

    // printf('a%sb<br>', $sql);

    $result = $db->query($sql);

    while ( $res = $result->fetchArray(SQLITE3_ASSOC) ) {
      if ( ! in_array($res, $row) ) {
        array_push($row, $res);
      }
    }
  }
  
  // print_r($row);
  // exit();
  if ( $row ) {
    $data = json_encode($row);
  } else {
    $data = sprintf('{"error": "no data for your input: %s"}', $term);
  }

  print_r($data);
  exit();

  $db->close();
?>
