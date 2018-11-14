<?php
$conf = include './inc/conf.php';
include './xiunophp/xiunophp.min.php';

if($_POST){
	$uUserName=$_POST['uUserName'];
	$uPwd=$_POST['uPwd'];
	   if(strlen($uUserName)>0 && strlen($uPwd)>0){
			 $arrUser = db_find_one('s_user', array('uUserName'=>$uUserName));
			 if($uUserName==$arrUser['uUserName']){
				 echo "<script>alert('对不起，用户名已经存在，请更换。');</script>";
			 }else{
				 $uid = db_insert('s_user', $_POST);
				 if($uid === FALSE) {
				 	echo "<script>alert('".$errstr."');</script>";
				 }else{
				 	echo "<script>alert('注册成功~！');location.href='index.php'</script>";
				 }
			 }
			 			 
		 }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>注册新用户</title>
 <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

 <!-- Bootstrap core CSS -->
    <link href="./bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./bootstrap/album.css" rel="stylesheet">
    
</head>

<body>
<?php include 'header.php';?>
  <main role="main" class="container">
  
  
  <!-- container --> 
  <div class="container width">
  <form class="form-signin" method="post">
        <h2 class="form-signin-heading">注 册</h2><br />

        <input type="text" name="uUserName" class="form-control" placeholder="用户名" required autofocus><br />

        <input type="password" name="uPwd" class="form-control" placeholder="密 码" required><br />
        <input type="email" name="uEmail" class="form-control" placeholder="电子邮箱" required><br />

        <select class="form-control" name="uSex"><br />
            <option>男</option>
            <option>女</option>
        </select><br />
      <button class="btn btn-lg btn-primary btn-block" type="submit">注  册</button><br />
      </form>

    </div> 
   <!-- /container -->



  <footer class="footer fixed-bottom">
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
