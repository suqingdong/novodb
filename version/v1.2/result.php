<?php

  ini_set('memory_limit', '-1');

  // 获取查询结果数组 $row
  include('search.php');
  
  // 获取展示表格的表头 $header_list
  // 和特殊字段的映射   $href_maps
  include('tables.php');


  // 结果展示
  if ( ! $row )
  {
    printf('<p class="alert alert-danger text-center container"><b>NO RESULT FOR YOUR INPUT!<b><br><br>%s</p>', $term);
  } else {
    printf('<div class="row" id="result">');
    printf('<table id="result_table" 
      class="table table-bordered table-striped table-hover table-responsive table-condensed"
      cellspacing="0" width="100%%">');
    printf('<thead><tr>');
    foreach ( $header_list as $head )
    {
      printf('<th class="%s">%s</th>', $head, mb_strtoupper($head));
    }
    printf('</tr></thead>');
    printf('<tbody>');
    foreach ( $row as $res )
    {
      printf('<tr>');
      foreach ( $header_list as $head )
      {
        // 增加跳转链接
        if ( in_array($head, ['genename', 'rsid', 'omim']) && $res[$head] != '.' )
        {
          $href = $href_maps[$head].$res[$head];
          if ($head == 'omim' && $res[$head] != '.' ) {
            $href = $href_maps[$head] . explode(', ', $res[$head])[1];
          }
          printf('<td><a href="%s" target="_blank">%s</a></td>', $href, $res[$head]);
        } else {
          printf('<td>%s</td>', $res[$head]);
        }
      }
      printf('</tr>');
    }
    printf('</tbody>');
    printf('</table></div>');
  }

  
  ?>

<script>

  var d = new Date();
  var title = 'result.' + d.getFullYear() + '_' + d.getMonth() + '_' + d.getDate();

  $('#result_table').DataTable({
  scrollY: "400px",
  // scrollY: false,
  scrollX: true,
  scrollCollapse: true, 
  lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']], 
  dom: '<"top"Bf>rt<"bottom"ip><"clear">',
  // buttons: [
  //   {
  //     'extend': 'pageLength',
  //     'text': '显示行数'
  //   },
  //   {
  //     'extend': 'collection',
  //     'text': '导出结果',
  //     'buttons': [
  //       'copy',
  //       // 'print',
  //       {
  //         'extend': 'excel',
  //         'title': title
  //       },
  //       {
  //         'extend': 'csv',
  //         'title': title
  //       }
  //       // {
  //       //   'extend': 'pdf',
  //       //   'title': title
  //       // }
  //     ]
  //   }
  // ],
  buttons: [
    'pageLength',
    'copy',
      {
        'extend': 'excel',
        'title': title
      },
      {
        'extend': 'csv',
        'title': title
      }
  ],

  fixedColumns: {
    leftColumns: 5
  },

  // rowReorder: true,
  select: true,
  stateSave: true

  // keys: true
  });
</script>