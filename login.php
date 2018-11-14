<?php
session_start();
$conf = include './inc/conf.php';
include './xiunophp/xiunophp.min.php';
if($_POST){
	
	$uUserName=$_POST['user_name'];
	$uPwd=$_POST['user_password'];
	if(strlen($uUserName)>0 && strlen($uPwd)>0){
		
		if($uUserName!='admin'){
			
			$arrUser = db_find_one('s_user', array('uUserName'=>$uUserName));
			if($uUserName==$arrUser['uUserName'] && $uPwd==$arrUser['uPwd'] ){
				$_SESSION["user_name"]=$arrUser['uUserName'];
				echo "<script>alert('登录成功！');location.href='index.php'</script>";
				}else{
					echo "<script>alert('对不起，用户名或者密码错误。');</script>";
					}
					
			}else{
				
				$arrAdmin = db_find_one('s_admin', array('aUser'=>$uUserName));
				
				if($uUserName==$arrAdmin['aUser'] && $uPwd==$arrAdmin['aPwd'] ){					
					$_SESSION["admin_name"]=$arrAdmin['aUser'];
					echo "<script>alert('登录成功！');location.href='admin_index.php'</script>";
				}else{
					echo "<script>alert('对不起，用户名或者密码错误。');</script>";
				}
				
				
			}
			
		}
		
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>用户登录</title>
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
  <form method="post" class="form-signin">
        <h2 class="form-signin-heading">用户登录</h2>

        <input type="text" name="user_name" class="form-control" placeholder="用户名:admin" required autofocus>

        <input type="password" name="user_password" class="form-control" placeholder="密 码:admin" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> 记住我
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登  录</button>
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
