<title>Home | Novo-Zhonghua</title>

<!-- 导航栏 -->
<?php include('header.php');?>


<style>
	table thead th[class*="1000g"] {
		background: #5cb85c;
	}
	table thead th[class^="novo"] {
		background: #5bc0de;
	}
	table thead th[class^="gnomad"] {
		background: #ef807e;
	}
	table thead th[class^="esp6500"] {
		background: #f4df49;
	}
	#result {
		margin: 10px 25px;
	}
</style>


<div class='container'>
	<!-- 查询部分 -->
	<div class='row'>
		<div class='col-md-6'>
			<form class ="form" action="" method="get">
				<div class="form-group">
					<textarea type="text" name="term" class="form-control" placeholder="input here ..." rows="3">
					</textarea>
				</div>

				<button id="example" class="btn btn-info" style="width:49%">示例</button>
				<button type="submit" class="btn btn-success" style="width:49%">查询</button>
			</form>
		</div>
		<div class="col-md-6">
			<p><b>支持的查询类型(可输入一行或多行)</b>
				<ul>
					<li>单个位置 <a href='?term=1-13284'>1-13284</a></li>
					<li>位置区间 <a href='?term=1-13424-13740'>1-13424-13740</a></li>
					<li>单个变异 <a href='?term=1-13896-C-A'>1-13896-C-A</a></li>
					<li>基因名称 <a href='?term=WASH7P'>WASH7P</a></li>
					<li>RS号 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='?term=rs531730856'>rs531730856</a></li>
				</ul>
			</p>
		</div>
	</div>

</div>

<!-- 结果部分 -->
<!-- 存在term时，导入结果页面 -->
<?php
if ( $_GET['term'] )
{
	include('result.php');
}
?>


<script>
	$(document).ready(function () {
		$('#example').click(function () {
			$('textarea[name="term"]').val('1-13424-13485');
		});
	});
</script>



