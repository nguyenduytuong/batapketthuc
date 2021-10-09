<?php
session_start();
include("controls/control.php");
$acc=new Account();
$se_all=$acc->select_infor($_SESSION['user']);
?>
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
					<a href="Register.html">Register</a>
				</li>
			</ul>
		</div>
	</div>
	<div id="body">
		<div class="article">
			<h3>Information</h3>
			<p>
			 <?php
			    if(empty($_SESSION['user']))header('location:login.php');
				else{
						foreach($se_all as $se)
					   {echo "Bạn ".$se['fullname']." đang đăng nhập ". "<a href='logout.php'>Thoát</a>";
				?>	
					<img src="images/<?php echo $se['picture'];?>" alt="No image" style='border-radius:50px' width="50px"; height="50px">
					<?php
					} 
					} 	
			?>	
			</p>
	
                <div id="contact" class="wrapper clearfix">
                    <div class="main"> 
                        <form method="post" enctype="multipart/form-data">
                            <ul>
                                <li>
                                    Full name
                                    <input type="text" name="txtname" value="<?php echo $se['fullname']?>" >
                                </li>
                                <li>
									Email add 
									<input type="text" name="txtemail" value="<?php echo $se['email']?>" readonly >
                                   
								</li>
								<li>
                                    Password....
                                    <input type="password" name="txtpass">
                                </li>
                                <li>
                                    Repassword
                                    <input type="password" name="txtre_pass">
								</li>
								<li>
                                    Picture
									<input type="file" name="txtpic">
								</li>
								<li>
                                    Birthday
									<input type="date" name="txtbirth">
								</li>
								<li>
									Gender
									<input type="radio" name="txtgender" value="Nam"> Nam
									<input type="radio" name="txtgender" value="Nữ"> Nữ
                                	<div class="checkbox">
                                        <label for="terms">
                                            <input type="checkbox" id="terms" name="txtcheck">
                                            I agree to the Terms and Conditions</label>
									</div>
								
							
                                    <input type="submit" value="Update Now" class="btn3" name="ok">
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
                <?php
                
				
				
                    if(isset($_POST['ok']))
                     {
						$up=move_uploaded_file($_FILES['txtpic']['tmp_name'],'images/'.$_FILES['txtpic']['name']);
						if($_POST['txtpass']!=$_POST['txtre_pass']) echo "<script> alert('Hai mật khẩu không trùng nhau')</script>";
                          else
                          {
							  $up_acc=$acc->update_infor($_POST['txtname'],$_FILES['txtpic']['name'],$_POST['txtgender'],$_POST['txtbirth'],$_SESSION['user']);
                              if($up_acc) header('location:All_infor.php');
                              else echo "<script> alert('notfinish!')</script>";
                             
                          }
                        } 
                  
                ?>
	    </div>	
	</div>

</body>
</html>