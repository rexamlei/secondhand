<?php
$conf = include './inc/conf.php';
include './xiunophp/xiunophp.min.php';

/*
1.查询数据库，成功返回二维数组（多条记录），失败返回 FALSE，并且自动记录到错误日志。
db_find($table, $cond = array(), $orderby = array(), $page = 1, $pagesize = 10, $key = '', $col = array(), $d = NULL)
$table：表名
$cond：条件
$orderby：排序方式
$page： 页数
$pagesize：每页记录条数
$key：返回的数组用那一列的值作为 key
$col：查询哪些列
$d：$db 实例

2.统计满足条件的行数，成功返回总行数，失败返回 FALSE。
db_count($table, $cond = array(), $d = NULL)
$table：表名
$cond：条件
$d：$db 实例

3.翻页函数，生成翻页的 HTML 代码字符串。
pagination($url, $totalnum, $page, $pagesize = 20)
$url：需要生成的 URL 模板，包含 {page}，会被替换。
$totalnum：总记录数
$page：页码
$pagesize：每页条数
*/

//创建一个条件数组
$cond=array();
//每页显示数据条数
$pageSize=25;
//从第一页开始显示
$page=1;
//把$_GET赋给page
if(isset($_GET['page'])){
	$page=(int)$_GET['page'];
	$page= $page<=0 ? 1 : $page;
}

//搜索
if(isset($_GET['search'])){
	$search=array_trim($_GET['search']);
	//改变条件
	$cond=array('gName'=>array('LIKE'=>$search));	
}

$arrlist = db_find(
's_goods',$cond, array('gId'=>-1), $page, $pageSize, 'gId',
array('gId','gName','gPrice','gNum','gImg','gState','gCreateTime','gUpdateTime')
);
//$total为总记录数
$total=db_count('s_goods',$cond);

//删除
if(isset($_GET['c'])){
	if(isset($_GET['cid'])){
		$cid=$_GET['cid'];
		// 删除单条
		$r = db_delete('s_goods', array('gId'=>$cid));
		// 删除多条
		//$r = db_delete('s_goods', array('uid'=>array(1, 2, 3));
		if($r === FALSE) {
			echo $errstr;
		} else {
			echo "<script>alert('删除成功！');location.href='admin_goods_admin.php'</script>";
		}		
	}
}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>商品管理</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
		<!-- Bootstrap core CSS -->
		<link href="./bootstrap/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="./bootstrap/album.css" rel="stylesheet">
	</head>

	<body>
		<div class="alert">
			<form method="get" class="form-inline mt-2 mt-md-0">
				<input class="form-control mr-sm-2" type="text" name="search" placeholder="请输入商品名称关键字" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
		<div class="container-fluid">
			<table class="table table-bordered table-hover">
			  <caption>商品列表</caption>
			  <thead>
				<tr class="text-center">
				  <th scope="col">#</th>
				  <th scope="col" class="w-25">名称</th>
				  <th scope="col">价格</th>
				  <th scope="col">数量</th>
				  <th scope="col">图片</th>
				  <th scope="col">状态</th>
				  <th scope="col">创建日期</th>
				  <th scope="col">操作</th>
				</tr>
			  </thead>
			  <tbody>
				<?php
				  $tabId=0;
					foreach($arrlist as $k=>$v){
						$tabId++;
				   ?>				
				<tr class="text-center">
				  <td scope="row"><?=$tabId?></td>
				  <td class="text-left"><?=$v['gName']?></td>
				  <td><?=$v['gPrice']?></td>
				  <td><?=$v['gNum']?></td>
				  <td><img src=<?=$v['gImg']?> width='100px' hieght='100px' class="rounded"></td>
				  <td><?=($v['gState']==1?'正常':'下架')?></td>
				  <td><?=date("Y-m-d",strtotime($v['gCreateTime']))?></td>
				  <td class="text-center"><a class="text-muted" href="admin_goods_update.php?gId=<?=$v['gId']?>">编辑</a>   <a class="text-muted" href="?cid=<?=$v['gId']?>&c=1" onclick="return confirm('你确定要删除吗？')">删除</a></td>
				</tr>
				<?php							
					}
				?>
				<tr>				
					<td colspan="8">
					 <nav aria-label="Page navigation example">
						<ul class="pagination justify-content-end">
						<?php
							echo pagination("?page={page}", $total,$page, $pageSize);
						?>
						 </ul>
					 </nav>
					</td>
				</tr>
			  </tbody>
			</table>
		</div>
</script>
		<!-- Bootstrap core JavaScript    ================================================== -->
		<script src="./bootstrap/jquery-3.2.1.slim.min.js"></script>
		<script>
			window.jQuery || document.write('<script src="./bootstrap/jquery-slim.min.js"><\/script>')
		</script>
		<script src="./bootstrap/popper.min.js"></script>
		<script src="./bootstrap/bootstrap.min.js"></script>
		<script src="./bootstrap/vendor/holder.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function () {
			$('.pagination > li').click(function () {
				var j = $('.pagination > li').index($(this)[0]);//获取点击的连接索引
				$('.pagination > li').eq(j).addClass("active").siblings().removeClass();
			});
		});
		</script>
	</body>

</html>
