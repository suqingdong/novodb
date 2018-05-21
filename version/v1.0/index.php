<title>Home | Novo-Zhonghua</title>

<!-- 导航栏 -->
<?php include('header.php');?>

<div class='container'>
  <!-- 查询部分 -->
  <div class='row'>
    <div class='col-md-6'>
      <form class ="form" action="" method="get">
        <div class="form-group">
          <textarea type="text" name="term" class="form-control" placeholder="search here ..." rows="3"></textarea>
        </div>

        <button id="example" class="btn btn-info" style="width:49%">示例</button>
        <button type="submit" class="btn btn-success" style="width:49%">查询</button>
      </form>
    </div>
    <div class="col-md-6">
      <p><b>支持的查询类型(可输入一行或多行)</b>
        <ul>
          <li>单个位置 <a href='?term=13-19020013-C-A'>13-19020013</a></li>
          <li>位置区间 <a href='?term=13-19020013-19020155'>13-19020013-19020155</a></li>
          <li>单个变异 <a href='?term=13-19020013-C-A'>13-19020013-C-A</a></li>
          <li>基因名称 <a href='?term=TUBA3C'>TUBA3C</a></li>
          <li>RS号 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='?term=rs3764135'>rs3764135</a></li>
        </ul>
      </p>
    </div>
  </div>

  <!-- 结果部分 -->
  <div class="row" style="margin-top: 20px;">
    <table id="result" class="table table-bordered table-striped table-hover table-responsive" cellspacing="0" width="100%">
      <thead>
        <tr>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>


</div>


<script>
  $(document).ready(function () {
    $('#example').click(function () {
      $('textarea[name="term"]').val('13-19020013');
    });
  });
</script>


<!-- 存在term时，导入search.php页面 -->
<?php
  if ( $_GET['term'] )
  {
    include('result3.php');
  }
?>
