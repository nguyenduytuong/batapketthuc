<?php session_start();?>
<!DOCTYPE HTML>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Website</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	
	<div id="body">
		<div class="article">
			
            <h3>Login</h3>
                <div id="contact" class="wrapper clearfix">
                    <div class="main">
                        <form method="post">
                            <ul>
                                <li>
                                    Enter your email address
                                    <input type="email" name="txtemail">
                                </li>
                                <li>
                                    Enter your password....
                                    <input type="password" name="txtpass">
                                </li>
                                <li>
                                    <input type="submit" value="LogIn" class="btn3" name="ok">
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
                   $us=$_POST['txtemail']; 
                   $pass=$_POST['txtpass'];
                   $dn_us=$acc->login_user($us);
                   $dn_pass=$acc->select_pass($us);
                  
                   if(empty($us)||empty($pass))
                        echo "<script>alert('Bạn chưa nhập dữ liệu')</script>";
				   else{
							if(($us=='admin@gmail.com') && ($pass=='admin')) 
							  {$_SESSION['user']=$us;	
							   header('location:All_account.php');
							  }
							else
                  			{     
								  if ($dn_us==0) 
								  echo "<script>alert('Bạn nhập sai username')</script>";
                       			 else
                         			{
										 foreach ($dn_pass as $dn)
										  { $dn['pass'];}
										 if($dn['pass']!=$pass)
										 echo "<script>alert('Bạn nhập sai password')</script>";
										 else 
										 {	
											$_SESSION['user']=$us;
											 header('location:Infor.php');//Chuyển trang nếu thỏa mãn
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