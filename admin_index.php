<?php
session_start();
	 	if(!isset($_SESSION['admin_name']))
		header("Location:login.php"); 
	 	?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>后台管理</title>
 <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
 <!-- Bootstrap core CSS -->
    <link href="./bootstrap/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
    <link href="./bootstrap/album.css" rel="stylesheet">
    <script type="text/jscript">
    	// document.domain = "caibaojian.com";
		function setIframeHeight(iframe) {
		if (iframe) {
		var iframeWin = iframe.contentWindow || iframe.contentDocument.parentWindow;
		if (iframeWin.document.body) {
		iframe.height = iframeWin.document.documentElement.scrollHeight || iframeWin.document.body.scrollHeight;
		}
		}
		};
		
		window.onload = function () {
		setIframeHeight(document.getElementById('external-frame'));
		};
    </script>
</head>

<body>
<div class="container">

<div class="row">
	<nav class="navbar navbar-light bg-light w-100">
		<a class="navbar-brand" href="javaScript:;">后台管理页面</a>
		<a class="navbar-brand btn btn-outline-secondary" href="index.php" target="_blank">返回前台首页</a>
	</nav>	
</div>
<div class="row">
  <div class="col-md-2  col-sm-3 col-xs-4 m-0 p-0">
    <div class="list-group">
      <a href="#" class="list-group-item active">功能链接</a>
      <a href="admin_goods_admin.php" target="myframe" class="list-group-item">商品管理</a>
      <a href="admin_goods_insert.php" target="myframe" class="list-group-item">增加商品</a>
      <a href="javascript:;" target="myframe" class="list-group-item" data-toggle="modal" data-target=".bd-example-modal-sm">会员管理</a>
      <a href="javascript:;" target="myframe" class="list-group-item" data-toggle="modal" data-target=".bd-example-modal-sm">订单管理</a>
      <a href="javascript:;" target="myframe" class="list-group-item" data-toggle="modal" data-target=".bd-example-modal-sm">充值管理</a>
      <a href="javascript:;" target="myframe" class="list-group-item" data-toggle="modal" data-target=".bd-example-modal-sm">修改密码</a>
    </div>
		<!-- 弹出提示框 开始-->
		<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<!-- 弹出内容 开始-->
					<div class="card text-center">
						<div class="card-header">
							温馨提示：演示版本暂时没有开放
						</div>
					</div>
					<!-- 弹出内容 结束-->
				</div>
			</div>
		</div>
		<!-- 弹出提示框 结束-->
  </div>
  <div class="col-md-10 col-sm-9 col-xs-8">
  	<iframe name="myframe" src="admin_goods_admin.php" width="96%" scrolling="no" frameborder="0" id="external-frame" onload="setIframeHeight(this)"></iframe>
  </div>
</div>

</div>
<!-- Bootstrap core JavaScript    ================================================== -->
  <script src="./bootstrap/jquery-3.2.1.slim.min.js"></script>
  <script>window.jQuery || document.write('<script src="./bootstrap/jquery-slim.min.js"><\/script>')</script>
  <script src="./bootstrap/popper.min.js"></script>
  <script src="./bootstrap/bootstrap.min.js"></script>
  <script src="./bootstrap/vendor/holder.min.js"></script>
</body>
</html>
