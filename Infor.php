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
			<div class="logo">
				<a href="index.html"></a>
			</div>
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
                                    <input type="text" name="txtname" value="<?php echo $se['fullname']?>"  readonly>
                                </li>
                                <li>
									Email add 
									<input type="text" name="txtemail" value="<?php echo $se['email']?>" readonly >
                                   
								</li>
								<li>
                                    Image
									<img src="images/<?php echo $se['picture'];?>" alt="No image" width=40% height=40% >
								</li>
								<li>
												
                                    <input type="submit" value="Update Now" class="btn3" name="ok">
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
                <?php
                
				
				
                    if(isset($_POST['ok']))
                     {
						header('location:Up_infor.php');
                        } 
                  
                ?>
	    </div>	
	</div>
	<div id="footer">
		<div>
			<div class="connect">
				<a href="http://freewebsitetemplates.com/go/twitter/" id="twitter">twitter</a>
				<a href="http://freewebsitetemplates.com/go/facebook/" id="facebook">facebook</a>
				<a href="http://freewebsitetemplates.com/go/googleplus/" id="googleplus">googleplus</a>
				<a href="http://pinterest.com/fwtemplates/" id="pinterest">pinterest</a>
			</div>
			<p>
				&copy; copyright 2020 | all rights reserved.
			</p>
		</div>
	</div>
</body>
</html>