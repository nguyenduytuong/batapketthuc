<?php
session_start();
require_once "controls/control.php";
$acc=new Account();
$se_ac=$acc->select_infor($_SESSION['user']);
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
			
			<p>
			 <?php
			    if(empty($_SESSION['user']))header('location:login.php');
				else{
						echo $_SESSION['user']." đang đăng nhập ". "<a href='logout.php'>Thoát</a>";
			?>
            <?php	
                   foreach($se_ac as $se) {$se['picture'];}?>
					<img src="images/<?php echo $se['picture'];?>" alt="No image" style='border-radius:50px' width="50px"; height="50px">
					<?php } ?>	
			</p> 
			
		  <div id="contact" class="wrapper clearfix">
             <div class="main"> 
                <h3> All Account</h3> 
				 <ul>
				   <li>
				   <table>
                    <tr>
                        <td> ID</td>
                        <td> Fullname</td>
                        <td> Picture</td>
                        <td> Gender</td>
                        <td> Birthday</td>
                        <td> Tùy chọn </td>
                    </tr>
                    <?php
                    $se_all=$acc->select_all();
                    foreach ($se_all as $all_value)
                    {
					?>
					<tr>
                        <td> <?php echo $all_value['id'];?></td>
                        <td> <?php echo $all_value['fullname'];?></td>
                        <td> <img src="images/<?php echo $all_value['picture'];?>" alt="No Picture"></td>
                        <td> <?php echo $all_value['gender'];?></td>
                        <td> <?php echo $all_value['birthday'];?></td>
                        <td><a href="Up_acc.php?up=<?php echo $all_value['id'] ?>">Sửa</a>
						<a href="Del_acc.php?del=<?php echo $all_value['id'] ?>" onclick="if(confirm('Bạn có chắc chắn xóa không?')) return true; else return false;">Xóa</a></td>
                    </tr>
                    <?php }?>
				   </table>
				   </li>
				</ul>
                    
             </div>                                    
	    </div>	
	</div>
</div>

</body>
</html>