<?php
 session_start();
 $conf = include './inc/conf.php';
 include './xiunophp/xiunophp.min.php';
/* shop_cart.php
 * 该文件主要功能为接受用户来自shop_list.php通过GET方式提交的添加购物车商品数据
 * 并且创建商品的session数据，或者更新session中用户需要商品的数量
 * 最后跳转到购物车内容页buy.php
 * */
 
//主要逻辑为：利用session存储加入购物车的数据，从而来区别每一个人用户各自的购物车，
//而session存储的内容是一个二维数组，格式为array【‘商品的名字’】['商品的具体数据']
//其中商品的具体数据有两个1、用户选择的商品ID 2、用户选择的数量
if(isset($_GET["goods_id"])){
	$GET_name = $_GET["goods_name"]; //从GET提交的数据提取goods_name
	$GET_id = $_GET["goods_id"];
	$GET_price = $_GET["goods_price"];   //从GET提交的数据提取goods_id
	$arr = $_SESSION['shop_cart'];    //把session赋值给一个二维数组
	//$_SESSION['shop_cart']=array($GET_name=>array('goods_id'=>$GET_id,'goods_num'));//将二维数组储存在session里面
	//$arr=$_SESSION["shop_cart"];
	//现在判断二维数组$arr的内容是否存在现添加购物车的商品的名字来实现判断该商品是否第一次添加入购物车，
	//如果是第一次，则为该商品创建session的二维数组中添加商品的全部数据
	//否则不是第一次，则为该商品的session年中二维数据中goods_num增加数目为1件
	if (array_key_exists($GET_id, $arr)) {
		//该商品添加过购物车，进行数量加1的操作
		$a = $arr[$GET_id]['goods_num'] ++;
		echo '存在该商品' . $arr[$GET_id]['goods_num'];
	} else { //该商品为新商品添加到购物车
	//     $sql = "select * from goods where `goods_id` = " . $GET_id;  //建立查找对应商品的具体信息的SQL语句
	//     $result = mysql_query($sql);    //商品的具体信息查找结果
	//     $row = mysql_fetch_array($result);
	$row=db_find_one('s_goods', array('gId'=>$GET_id));
	 
	//arr0为要添加已存在购物车数组arr的新购物车数组
		$arr0 = array($GET_id => array('goods_id' => $GET_id, 'goods_num' => 1, 'goods_name' => $GET_name, 'goods_price' => $row['gPrice']));
	//arr0赋值到arr1
	 
	 
		foreach ($arr0 as $key => $value) {
			$arr[$key] = $value;
		}
	}
	//添加完成后，重新把二维数组更新到session
	$_SESSION['shop_cart'] = $arr;
	//成功添加完成，进行跳转页面
	header("location:index.php"); //跳转到购物车内容界面
}else{
	header("location:index.php"); //跳转到购物车内容界面
}
?>