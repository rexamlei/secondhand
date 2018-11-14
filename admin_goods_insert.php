<?php
$conf = include './inc/conf.php';
include './xiunophp/xiunophp.min.php';

//获取'http://www.hao.com/doc.html?id=1'url地址中的文件后缀名的函数，结果：html
//getExt即可获取文件的后缀名函数
function getExt($url)
{
$path=parse_url($url);
$str=explode('.',$path['path']);
return end($str);//获取该数组最后一个元素值即html
}
if($_POST){
	if(isset($_POST['gName']) and isset($_POST['gPrice']) and isset($_POST['gNum'])){
	//图片上传
	if ($_FILES["file"]["error"] > 0){
		echo "错误: " . $_FILES["file"]["error"] . "<br />";
	}else{
		$mimetype =getExt($_FILES["file"]["name"]);
		if ($mimetype == 'gif' || $mimetype == 'jpg' || $mimetype == 'png' || $mimetype == 'bmp')
		{
		 	$_FILES["file"]["name"]=time().'.'.$mimetype;
			move_uploaded_file($_FILES["file"]["tmp_name"],
			"upload/" . $_FILES["file"]["name"]);
			//echo "文件已经被存储到: " . "./upload/" . $_FILES["file"]["name"];
			$_POST['gImg']="/upload/" . $_FILES["file"]["name"];
		}else{			
			echo "你上传的不是图片，请上传图片文件";			
		}
	}
	$_POST['gCreateTime']=date("Y/m/d h:i:s");

	//准备插入数据库
	$uid = db_insert('s_goods', $_POST);
	if($uid === FALSE) {
		//echo $errstr;
		echo "<script>alert('".$errstr."');</script>";
	} else {
		//echo "创建成功，uid : $uid";
		echo "<script>alert('插入成功~！');</script>";
	}
	}else{
		echo "<script>alert('商品名称、价格、数量必须填写！');</script>";
	}
}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>增加商品</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
		<!-- Bootstrap core CSS -->
		<link href="./bootstrap/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="./bootstrap/album.css" rel="stylesheet">
	</head>

	<body>
		<div class="container-fluid">

			<div class="row">
				<div class="col-md-12">
					<!--表单信息-->
					<form action="admin_goods_insert.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="gName">商品名称</label>
							<input type="text" class="form-control" name="gName" placeholder="输入商品名称及相关信息" required="required">
							<small class="form-text text-muted">请输入商品的名称+特色+名牌+性质等信息更吸引人哦。</small>
						</div>

						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="">销售价格</span>
							</div>
							<input type="text" class="form-control w-25" name="gPrice" placeholder="请输入价格" required="required">元
						</div>
						<br />
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="">库存数量</span>
							</div>
							<input type="text" class="form-control w-25" name="gNum" placeholder="请输入数量" required="required">个/件/台/组/盒/套
						</div>
						<br />

						<div class="input-group">
							<div class="input-group-append">
								<span class="input-group-text" id="">商品图片</span>
							</div>
							<div class="custom-file">
								<input type="file" id="file" name="file">
								
						</div>
						
						</div>
						<br />
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="">商品成色</span>
							</div>
							<input type="text" class="form-control w-25" name="gQuality" placeholder="请输入成色，例如：九成新" required="required">
						</div>
						<br />
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="">商品颜色</span>
							</div>
							<input type="text" class="form-control w-25" name="gColor" placeholder="请输入商品颜色" required="required">
						</div>
						<br />
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="">商品品牌</span>
							</div>
							<input type="text" class="form-control w-25" name="gBrand" placeholder="请输入商品品牌" required="required">
						</div>
						<br />
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="">商品重量</span>
							</div>
							<input type="text" class="form-control w-25" name="gWeight" placeholder="请输入商品重量" required="required">kg
						</div>
						<br />

						<div class="form-group">
							<label for="gName">商品详情</label>
							<textarea name="gText" id="gText" aria-label="With textarea"></textarea>
						</div>

						<button type="submit" class="btn btn-primary">提交</button>
					</form>
				</div>
			</div>

		</div>
		
		

							
		
		
		
<script type="text/javascript" charset="utf-8" src="./ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="./ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="./ueditor/lang/zh-cn/zh-cn.js"></script>
<script>    
    var ue = UE.getEditor('gText',{
        toolbars: [
    [
        'anchor', //锚点
        'undo', //撤销
        'bold', //加粗
        'indent', //首行缩进
        'italic', //斜体
        'formatmatch', //格式刷
        'source', //源代码
        'preview', //预览
        'removeformat', //清除格式
        'fontsize', //字号
        'paragraph', //段落格式
        'simpleupload', //单图上传
        'link', //超链接
        'emotion', //表情
        'justifyleft', //居左对齐
        'justifyright', //居右对齐
        'justifycenter', //居中对齐
        'justifyjustify', //两端对齐
        'forecolor', //字体颜色
        'insertorderedlist', //有序列表
        'insertunorderedlist', //无序列表
        'imageleft', //左浮动
        'imageright', //右浮动
        'imagecenter', //居中
        'lineheight', //行间距
        'autotypeset', //自动排版
        'touppercase', //字母大写
        'tolowercase', //字母小写
        'template', //模板
        'inserttable' //插入表格
    ]],
    autoHeightEnabled: true,
    autoFloatEnabled: true
    });
</script>
		<!-- Bootstrap core JavaScript    ================================================== -->
		<script src="./bootstrap/jquery-3.2.1.slim.min.js"></script>
		<script>
			window.jQuery || document.write('<script src="./bootstrap/jquery-slim.min.js"><\/script>')
		</script>
		<script src="./bootstrap/popper.min.js"></script>
		<script src="./bootstrap/bootstrap.min.js"></script>
		<script src="./bootstrap/vendor/holder.min.js"></script>
	</body>

</html>