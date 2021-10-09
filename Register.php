<!DOCTYPE HTML>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title> Website</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="header">
		<div class="section">
			
			<ul>
				<li>
					<a href="index.html">home</a>
				</li>
				<li>
					<a href="about.html">about</a>
				</li>
				<li>
					<a href="hairstyle.html">hairstyles</a>
				</li>
				<li>
					<a href="news.html">news</a>
				</li>
				<li class="selected">
					<a href="Register.php">Register</a>
				</li>
			</ul>
		</div>
	</div>
	<div id="body">
		
            <h3>Register</h3>
                <div id="contact" class="wrapper clearfix">
                    <div class="main">
                        <form method="post">
                            <ul>
                                <li>
                                    Enter your full name
                                    <input type="text" name="txtname" >
                                </li>
                                <li>
                                    Enter your email address
                                    <input type="email" name="txtemail">
                                </li>
                                <li>
                                    Enter your password....
                                    <input type="password" name="txtpass">
                                </li>
                                <li>
                                    Enter repeat_password
                                    <input type="password" name="txtre_pass">
                                    <div class="checkbox">
                                        <label for="terms">
                                            <input type="checkbox" id="terms" name="txtcheck">
                                            I agree to the Terms and Conditions</label>
                                    </div>
                                    <input type="submit" value="Send Now" class="btn3" name="ok">
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
                <?php
                include("controls/control.php");
                $acc=new Account();
                    if(isset($_POST['ok']))
                     {
                        if(empty($_POST['txtemail'])|| empty($_POST['txtpass'])) echo "<script>alert('Bạn chưa nhập dữ liệu')</script>";
                        else
                        {
                         if(!isset($_POST['txtcheck'])) echo "<script> alert('Bạn chưa check')</script>";
                         else
                         { 
                          $se_acc=$acc->select_user($_POST['txtemail']);
                          if($_POST['txtpass']!=$_POST['txtre_pass']) echo "<script> alert('Hai mật khẩu không trùng nhau')</script>";
                          else
                          {
                            if($se_acc!=0) echo "<script> alert('user đã tồn tại')</script>";
                            else
                           {
                              $ad_acc=$acc->Adduser($_POST['txtemail'],$_POST['txtpass']);
                              $ad_infor=$acc->Addinfor($_POST['txtname'],'','','',$_POST['txtemail']);
                              if($ad_acc and $ad_infor) header('location:Login.php');
                              else echo "<script> alert('notfinish!')</script>";
                           }   
                          }
                        } 
                    }   
                }
                ?>
	    </div>	
	</div>
	
</body>
</html>