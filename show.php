<?php
session_start();
$conf = include './inc/conf.php';
include './xiunophp/xiunophp.min.php';
$gId=0;
if(isset($_GET['gId'])){
	$gId=(int)$_GET['gId'];
}
$arr2 = db_find_one('s_goods', array('gId'=>$gId));
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>商品详情页</title>
 <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

 <!-- Bootstrap core CSS -->
    <link href="./bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./bootstrap/album.css" rel="stylesheet">
</head>

<body>
<?php include 'header.php';?>
 <div class="alert"></div>
  <main role="main" class="container">
  
  
   <!-- container --> 
    <div class="row">
      <div class="col-sm-4">
      	<img src="<?=$arr2['gImg'] ?>" class="img-fluid">
      </div>
      <div class="col-sm-8 font-weight-bold">
      <div class="alert"> </div>
      	<ul class="list-group">
          <li class="list-group-item disabled">商品详情</li>
          <li class="list-group-item">商品名称：<?=$arr2['gName'] ?></li>
          <li class="list-group-item">商品价格：<?=$arr2['gPrice'] ?>元</li>
          <li class="list-group-item">商品成色：<?=$arr2['gQuality'] ?></li>
          <li class="list-group-item">商品库存：<?=$arr2['gNum'] ?></li>
        </ul>       
				<span type="button" class="btn btn-dark" onclick="javascript:history.back(-1);">返 回</span> 				
							<a href="shop_cart.php?goods_id=<?=$arr2['gId']?>&goods_name=<?=$arr2['gName']?>" class="btn btn-dark">加入购物车</a>
      </div>

    </div>
    <div class="alert"> </div>
     <div class="row">
      <div class="col-sm-12">
         <div class="alert alert-info">商品具体信息：</div>
         <div class="container">
					 <?=$arr2['gText'] ?>
        </div>         
      </div>

    </div>
   <!-- /container -->



  <footer class="footer">
      <div class="container">
        <span class="text-muted">广州商学院 版权所有</span>
      </div>
    </footer>

 </main>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./bootstrap/jquery-3.2.1.slim.min.js"></script>
    <script>window.jQuery || document.write('<script src="./bootstrap/jquery-slim.min.js"><\/script>')</script>
    <script src="./bootstrap/popper.min.js"></script>
    <script src="./bootstrap/bootstrap.min.js"></script>
    <script src="./bootstrap/vendor/holder.min.js"></script>
</body>
</html>
