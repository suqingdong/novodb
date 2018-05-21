<?php

  ini_set('memory_limit', '-1');
  // ini_set("memory_limit","2048M");

  $dbname = 'novodb.sqlite3';

  class MyDB extends SQLite3
  {
    function __construct()
    {
      $this->open($GLOBALS['dbname']);
    }
  }
  
  $db = new MyDB();

  if ( ! $db )
  {
    $msg = $db->lastErrorMsg();
  } else {
    $msg = 'open database successfully!';
  }
  printf( "<script>console.log('%s');</script>", $msg);


  include('tables.php');
//   print_r($href_maps['rsid']);
//   exit();


  // save result to an array
  $row = array();

  $terms = $_GET['term'];
  $terms = explode("\r\n", $terms);
  // print_r($terms);
  // exit();

  // 多行依次处理
  foreach ($terms as $term) 
  {
    // 分割每行成数组
    $term_list = preg_split('/[,;:-]|\t|(\ )+/', $term);
    // 根据数组长度进行不同查询
    $term_len = count($term_list);

    if ( $term_len == 1 )
    {
      if ( preg_match('/^rs\d+$/', $term) )
      {
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
  } 

  // printf('===%s===<br>', $sql);

  $result = $db->query($sql);

  while ( $res = $result->fetchArray(SQLITE3_ASSOC) )
  {
  // 用于存储去重的全部结果
    if ( ! in_array($res, $row) )
    {
      array_push($row, $res);
    }
  }

  if ( ! $row )
  {
    printf("
    <script>
      $('#result tbody').append('<p class=\"alert alert-warning text-center\">no result for your input: %s</p>');
    </script>", $term);
  } else {
    // 填充表头
    printf("<script>");
    foreach ( $header_list as $head )
    {
      printf("
      var th = document.createElement('th');
      th.innerText = '%s';
      $('#result thead tr').append(th);", mb_strtoupper($head));
    }

    // print_r($row);
  
    // // 填充每行
    foreach ( $row as $res )
    {
      $code = sprintf("var tr = document.createElement('tr');");
      
      foreach ( $header_list as $head )
      {
        $code .= sprintf("
        var td = document.createElement('td');");
        
        if ( in_array($head, ['genename', 'rsid']) && $head != '.' )
        {
          $code .= sprintf("
          var a = document.createElement('a');
          a.innerText = '%s';
          a.href = '%s';
          a.target = '_blank';
          td.append(a);", $res[$head], $href_maps[$head].$res[$head]);
        } else {
          $code .= sprintf("td.innerText = '%s';", $res[$head]);
        }
        
        $code .= sprintf("tr.append(td);");
      }

      $code .= sprintf("$('#result tbody').append(tr);");

      echo $code;
    }
    printf("</script>");
  }
  

  

  $db->close();
  ?>

<script>
  $('#result').DataTable({
  scrollY: "400px",
  scrollX: true,
  scrollCollapse: true, 
  lengthMenu: [[5,10,50,100,-1], [5,10,50,100,'All']], 

  dom: '<"top"Bf>rt<"bottom"ip><"clear">',
  buttons: [
    'pageLength', 
    'copy', 
    'print',
    'csv',
    'excelHtml5',
  ],
  });
</script>