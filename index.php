<?php
session_start();
$conf = include './inc/conf.php';
include './xiunophp/xiunophp.min.php';
$cond2=array();
//搜索
if(isset($_GET['search'])){
	$search=array_trim($_GET['search']);
	//改变条件
	$cond2=array('gName'=>array('LIKE'=>$search));	
}

$pageSize=6;
$arrlist = db_find(
's_goods',$cond2, array('gId'=>-1), 1, $pageSize, 'gId',
array('gId','gName','gPrice','gNum','gImg','gQuality')
);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>校园二手商城首页</title>
 <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <!-- Bootstrap core CSS -->
    <link href="./bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./bootstrap/album.css" rel="stylesheet">        
</head>

<body>
 <?php include 'header.php';?>
 <main role="main" class="container">
	 <!-- 登录用户 -->
	<div class="alert alert-link text-lg-right p-0"> 
    当前用户：
	 	<?php
	 	if(isset($_SESSION['user_name']))
	 	echo $_SESSION['user_name'] . " ";
	 	else
	 	echo '未登录';
	 	?>
	 	<a href="login.php">(登录)</a>
	 </div>
	 
 <!-- 幻灯片开始 -->
      <div id="demo" class="carousel slide" data-ride="carousel">
  <!-- 指示符 -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <!-- 轮播图片 -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./img/02.jpg">
    </div>
    <div class="carousel-item">
      <img src="./img/01.jpg">
    </div>
    <div class="carousel-item">
      <img src="./img/03.jpg">
    </div>
  </div>
  <!-- 左右切换按钮 -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
	
</div>	

<!-- 幻灯片结束 -->
<!-- 商品列表开始 -->
 <div class="album py-5 bg-light">
        <div class="container">
          <div class="row"> 
						<?php
						 foreach($arrlist as $k=>$v){
						?>
                <div class="col-md-4">
                  <div class="card mb-4 box-shadow">
                   <a href="show.php?gId=<?=$v['gId']?>"> <img class="card-img-top" src="<?=$v['gImg']?>" alt="Card image cap"></a>
                    <div class="card-body">
                      <p class="card-text"><?=$v['gName']?></p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
													<span type="text" class="btn btn-sm btn-outline-secondary border-primary">¥ <?=$v['gPrice']?> 元</span>
													<a href="shop_cart.php?goods_id=<?=$v['gId']?>&goods_name=<?=$v['gName']?>" class="btn btn-sm btn-outline-secondary border-primary">加入购物车</a>
                        </div>
                        <small class="text-muted"><?=$v['gQuality']?></small>
                      </div>
                    </div>
                  </div>
                </div>
							<?php
							 }
							?>             
          </div>
        </div>
      </div>
<!--商品列表结束 -->

 </main>
  <footer class="text-muted">
      <div class="container">
        <p>校园二手商城 &copy;广州商学院，电子商务管理学院电子商务专业</p>
        <p>Campus second-hand mall <a href="index.php">Visit the homepage</a> or get into <a href="admin_index.php">Back-stage management</a>.</p>
      </div>
    </footer>
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
