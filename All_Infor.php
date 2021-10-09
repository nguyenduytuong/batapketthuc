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
					<a href="Register.php">Register</a>
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
                                    <input type="text" value="<?php echo $se['fullname']?>"  readonly>
                                </li>
                                <li>
									Email add 
									<input type="text" value="<?php echo $se['email']?>" readonly >
                                   
                                </li>
                                <li>
									Birthday... 
									<input type="text" value="<?php echo $se['birthday']?>" readonly >
                                   
                                </li>
                                <li>
									Gender... 
									<input type="text" value="<?php echo $se['gender']?>" readonly >
                                   
								</li>
								<li>
                                    Image
									<img src="images/<?php echo $se['picture'];?>" alt="No image" class="img1">
								</li>
								<li>				
									<input type="submit" value="Update" class="btn3" name="ok">
				                </li>
                                    <input type="submit" value="Delete" class="btn3" name="ok">
                                </li>
                               
                            </ul>
                        </form>
                    </div>
                </div>
                
                <?php
                    if(isset($_POST['ok']))
                    {
                        if($_POST['ok']=='Update') header('location:Up_Infor.php');
                        if($_POST['ok']=='Delete') header('location:Del_Infor.php');
                    }
                
                ?>
				
				
                   
	    </div>	
	</div>
	
</body>
</html>