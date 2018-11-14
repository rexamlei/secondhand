<?php
$conf = include './inc/conf.php';
include './xiunophp/xiunophp.min.php';
session_start();   //开启session
//通过session['user_name']判断是否登录。如果已登录则把数据写入数据库,并提示成功跳转到商品展示页
//如果未登录 ，提示进行登录，并且跳转至登录页面

//判断有无购物车
	if(isset($_SESSION['shop_cart'])){
		$arr = $_SESSION['shop_cart'];  //从session中读取二维数组	
	}else{
		$arr =array(array('goods_id'=>'','goods_name'=>'','goods_num'=>'','goods_price'=>''));
	}

$totla=0;
$oId=date("Ymdhis").xn_rand(3);//生成订单编号

if (isset($_SESSION['user_name'])) {
	//通过用户名获取用户ID
	$arrUser = db_find_one('s_user', array('uUserName'=>$_SESSION['user_name']));

    //已经登录,从session中取出数据来写入数据库
    foreach ($arr as $v => $val) {
		//计算总金额
		$totla1=$val['goods_num']*$val['goods_price'];
		$totla=$totla1+$totla;
		//插入订单详情表
		$detailArr=array(
		'dGid'=>$val['goods_id'],
		'dOid'=>$oId,
		'dMoney'=>$totla1,
		'dNum'=>$val['goods_num']
		);
		$did = db_insert('s_detail', $detailArr);
    }
	//插入订单表	
	$orderArr=array(
	'oId'=>$oId,
	'oUid'=>$arrUser['uId'],
	'oCreatetime'=>date("Y/m/d h:i:s"),
	'oMoney'=>(float)$totla
	);
	$uid = db_insert('s_order', $orderArr);
	
    if((int)$uid>0) {
        echo "结算成功！！！正在返回首页！";
        header("refresh:2;url=index.php"); //两秒后跳转
    } else {
		echo $errstr;
        echo "结算失败，正在返回购物车！";
        header("refresh:2;url=index.php"); //两秒后跳转
    }
} else {
    echo "请进行登录后再进行结算！";
    header("refresh:2;url=login.php");
}
?>
