  <header>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="#">校园二手商城</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">首 页 <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="goodsList.php">商品<span class="sr-only">(current)</span></a>
          </li>          
          <li class="nav-item">
         	<a class="nav-link disabled" href="login.php">登录 </a>
          </li>
           <li class="nav-item">
            <a class="nav-link disabled" href="register.php">注册 </a>
          </li>
					<li class="nav-item disabled">
						<a class="nav-link" href="admin_index.php">后台管理<span class="sr-only">(current)</span></a>
					</li>
        </ul>
        <form method="get" action="goodsList.php" class="form-inline mt-2 mt-md-0">
          <input name="search" class="form-control mr-sm-2" type="text" placeholder="请输入商品名称关键字" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					<button class="btn btn-outline-success my-2 my-sm-0" type="button" data-toggle="modal" data-target="#myModal">购物车</button>
        </form>				
      </div>
    </nav>
 </header>
 <!-- 购物车弹出框 开始 -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">我的购物车</h4>
        </div>
        <div class="modal-body">
         
 				<!-- 内容 开始 -->
            当前登录用户：
				    <?php
				    if (isset($_SESSION['user_name'])) {
				        echo $_SESSION['user_name'];
				    } else {
				        echo '未登录';
				    }
				    ?>
				<table class="table table-bordered table-hover">
					<tr class="text-center">
						<th scope="col">id</th>
						<th scope="col w-25">商品名字</th>
						<th scope="col">数量</th>
						<th scope="col">价格</th>
					</tr>
				    <?php
						//判断有无购物车
						if(isset($_SESSION['shop_cart'])){
							$arr = $_SESSION['shop_cart'];  //从session中读取二维数组	
						}else{
							$arr =array(array('goods_id'=>'','goods_name'=>'','goods_num'=>'','goods_price'=>''));
						}
						//结束判断
						
						
					//遍历二维数组读取加入购物车的商品信息
				    foreach ($arr as $v => $val) {
				     ?>
				       <tr class="text-center">
				            <td width="50px"><?php echo $val['goods_id'] ?></td>
				            <td ><?php echo $val['goods_name'] ?></td>
				            <td ><?php echo $val['goods_num'] ?></td>
				            <td ><?php echo $val['goods_price'] ?></td>
				        </tr>
				    <?php } ?>
				</table>
				 
				<form name="myform" method="POST" action="finish.php">
				    <input type="hidden" name="goods_id" value=" $val['goods_id']" /><br/>
				    <input type="hidden" name="goods_name" value="$val['goods_name']" /><br/>
				    <input type="hidden" name="goods_num" value="$val['goods_num']" /><br/>
				    <input type="hidden" name="goods_price" value="$val['goods_price']" />
				    <input type="submit" name="sub" class="btn btn-primary" value="结算购物车" />
						<a href="clearCart.php?id=1" class="btn btn-secondary">清空购物车</a>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">继续购物</button>
				</form>
				<!-- 内容 结束 -->
 				
        </div>
      </div>
    </div>
  </div>
  	<!-- 购物车弹出框 结束 -->
 