<?php
error_reporting(E_ERROR);
session_start();

// 登录验证
if ( $_SESSION['login'] != 1 )
{
    printf('<script>window.location.href="../auth/login.php";</script>');
}
?>

<meta charset="utf-8">

<link rel="icon" href="../src/images/logo.png">

<link rel="stylesheet" type="text/css" href="../src/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="../src/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../src/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="../src/css/buttons.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="../src/css/fixedColumns.bootstrap.min.css" />
  
<header class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/novodb" style="color: green;font-size: 24px; font-weight: bold;">
        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>  <i>Novo-Zhonghua</i>
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="navbar-form navbar-left">
        <a class="btn btn-info" href="#">基本查询</a>
        <a class="btn btn-warning" href="#">高级查询</a>
      </ul>

      <ul class="nav navbar-nav navbar-right">

        <li><a>Hi, <?php echo $_SESSION['username'];?></a></li>
        <li><a href="document.php">Document</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="../auth/logout.php">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</header>

<script src="../src/js/jquery.min.js"></script>
<script src="../src/js/bootstrap.min.js"></script>
<script src="../src/js/jquery.dataTables.min.js"></script>
<script src="../src/js/dataTables.bootstrap.min.js"></script>
<script src="../src/js/dataTables.buttons.min.js"></script>
<script src="../src/js/buttons.print.min.js"></script>
<script src="../src/js/jszip.min.js"></script>
<script src="../src/js/buttons.html5.min.js"></script>
<script src="../src/js/dataTables.fixedColumns.min.js"></script>

<!-- <link rel="stylesheet" type="text/css" href="../src/css/rowReorder.bootstrap.min.css" /> -->
<!-- <link rel="stylesheet" type="text/css" href="../src/css/keyTable.bootstrap.min.css" /> -->
<!-- <script src="../src/js/dataTables.rowReorder.min.js"></script> -->
<!-- <script src="../src/js/dataTables.keyTable.min.js"></script> -->
<link rel="stylesheet" type="text/css" href="../src/css/select.bootstrap.min.css" />
<script src="../src/js/dataTables.select.min.js"></script>

<!-- <script type="text/javascript" src="../src/js/pdfmake.min.js"></script> -->
<!-- <script type="text/javascript" src="../src/js/vfs_fonts.js"></script> -->


<script src="../src/js/rainbow.js"></script>

<script>
  // Title文字滚动效果
  $(document).ready(function () {
    var s = (document.title + " ... ").split("");
    function title_move(){  
        s.push(s[0]);  
        s.shift();// 去掉数组的第一个元素  
        document.title = s.join("");  
    }  
    setInterval(title_move, 500);//设置时间间隔运行  

    var msg = [
      " _   _                _______                       _                 ",
      "| \\ | |              |___  / |                     | |                ",
      "|  \\| | _____   _____   / /| |__   ___  _ __   __ _| |__  _   _  __ _ ",
      "| . ` |/ _ \\ \\ / / _ \\ / / | '_ \\ / _ \\| '_ \\ / _` | '_ \\| | | |/ _` |",
      "| |\\  | (_) \\ V / (_) / /__| | | | (_) | | | | (_| | | | | |_| | (_| |",
      "|_| \\_|\\___/ \\_/ \\___/_____|_| |_|\\___/|_| |_|\\__, |_| |_|\\__,_|\\__,_|",
      "                                               __/ |                  ",
      "                                              |___/                   "
    ].join('\n');


    var css = "";
    css += "color:green;";
    css += "font-weight:bold;";
    // css += "background-image: linear-gradient(to right, yellow, #ffeeee, yellow, #ffeeee, yellow);";
    // css += "-webkit-background-clip: text;color: transparent;";
    console.log('%c' + msg, css);
    console.log('%cA genomic database of Chinese.', rainbow_css);
    console.log('%ccontact: suqingdong@novogene.com', 'color:grey;font-size:14px;font-style:italic;margin:10px 0px;');


  });
</script>

