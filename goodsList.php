<?php
session_start();
$conf = include './inc/conf.php';
include './xiunophp/xiunophp.min.php';
//创建一个条件数组
$cond=array();
//每页显示数据条数
$pageSize=6;
//从第一页开始显示
$page=1;
//搜索
if(isset($_GET['search'])){
	$search=array_trim($_GET['search']);
	//改变条件
	$cond=array('gName'=>array('LIKE'=>$search));	
}
//获取列表
$arrlist = db_find(
's_goods',$cond, array('gId'=>-1), $page, $pageSize, 'gId',
array('gId','gName','gPrice','gNum','gImg','gState','gCreateTime','gUpdateTime')
);
//$total为总记录数
$total=db_count('s_goods',$cond);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>商品列表页</title>
 <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <!-- Bootstrap core CSS -->
    <link href="./bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./bootstrap/album.css" rel="stylesheet">        
</head>

<body>
<?php include 'header.php';?>
 <main role="main" class="container">

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
<table class="table table-bordered table-hover">
				<tr class="text-center">
				  <th scope="col">#</th>
				  <th scope="col" class="w-25">名称</th>
				  <th scope="col">价格</th>
				  <th scope="col">数量</th>
				  <th scope="col">图片</th>
				  <th scope="col">创建日期</th>
				  <th scope="col">操作</th>
				</tr>
			  <tbody>
				<?php
				  $tabId=0;
					foreach($arrlist as $k=>$v){
						$tabId++;
				   ?>				
				<tr class="text-center">
				  <td scope="row"><?=$tabId?></td>
				  <td class="text-left"><?=$v['gName']?></td>
				  <td>¥ <?=$v['gPrice']?> 元</td>
				  <td><?=$v['gNum']?></td>
				  <td><a href="show.php?gId=<?=$v['gId']?>"><img src=<?=$v['gImg']?> width='200px' hieght='200px' class="rounded"></a></td>
				  <td><?=date("Y/m/d h:i:s",strtotime($v['gCreateTime']))?></td>
				  <td class="text-center">
						<a href="shop_cart.php?goods_id=<?=$v['gId']?>&goods_name=<?=$v['gName']?>" class="btn btn-sm btn-outline-secondary border-primary">加入购物车</a>
					</td>
				</tr>
				<?php							
					}
				?>
				<tr>				
					<td colspan="8">
					 <nav aria-label="Page navigation example">
						<ul class="pagination justify-content-end">
						<?php
							echo pagination("?page={page}", $total, 1, $pageSize);
						?>
						 </ul>
					 </nav>
					</td>
				</tr>
			  </tbody>
			</table>
		 

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
