<?php
   include('connect.php');
   class Account
   {	 
	 public function Adduser($email,$pass)
	 {
		global $conn; 
		$sql="insert into `t_admin`(user,pass) values('$email','$pass')"; 
		$run=mysqli_query($conn,$sql);
		return $run;
	 } 
	 public function Addinfor($name,$img,$gender,$birthday,$mail)
	 {
		global $conn; 
		$sql="insert into `t_dangky`(fullname,picture,gender,birthday,email) values('$name','$img','$gender','$birthday','$mail')";
		$run=mysqli_query($conn,$sql);
		return $run;
	 } 
	 public function select_user($user)
	 {
		 global $conn;
		 $sql="select * from t_admin inner join t_dangky on t_admin.user=t_dangky.email where user='$user'";
		 $run=mysqli_query($conn,$sql);
		 $num=mysqli_num_rows($run); 
		return $num;
	 }
	 public function login_user($user)
	 {
		 global $conn;
		 $sql="select * from t_admin where user='$user'";
		 $run=mysqli_query($conn,$sql);
		 $num=mysqli_num_rows($run); 
		return $num;
	 }
	 public function login_pass($pass)
	 {
		 global $conn;
		 $sql="select * from t_admin where pass='$pass'";
		 $run=mysqli_query($conn,$sql);
		 $num=mysqli_num_rows($run); 
		return $num;
	 }

	  public function select_pass($email)
	 {
		 global $conn;
		 $sql="select * from t_admin where user='$email'";
		 $run=mysqli_query($conn,$sql);
		 $data=array();
		if($run)
		{
		  while($rows=mysqli_fetch_array($run))
		    { $data[]=$rows;}
		}
		return $data;
	 }
	 public function insert_infor($email,$name,$gender,$date,$picture)
	 {
		 global $conn; 
		$sql="insert into `t_dangky`(email,fullname,picture,gender,birthday) values('$email','$name','$picture','$gender','$date')";
		$run=mysqli_query($conn,$sql);
		return $run;
		 }
	public function update_infor($name,$picture,$gender,$date,$session)
	 {
		 global $conn; 
		$sql="update `t_dangky` set fullname='$name',picture='$picture',gender='$gender',birthday='$date' where email='$session'"; 
		$run=mysqli_query($conn,$sql);
		return $run;
		 }
	public function update_acc($name,$picture,$gender,$date,$id)
		 {
			 global $conn; 
			$sql="update `t_dangky` set fullname='$name',picture='$picture',gender='$gender',birthday='$date' where id='$id'"; 
			$run=mysqli_query($conn,$sql);
			return $run;
			 }
	public function delete_acc($id)
			 {
				 global $conn; 
				$sql="delete from `t_dangky` where id='$id'"; 
				$run=mysqli_query($conn,$sql);
				return $run;
				 }
	public function delete_infor($session)
	{
		 global $conn; 
		$sql="delete from `t_dangky` email='$session'"; echo $sql;
		$run=mysqli_query($conn,$sql);
		return $run;
	}
	  public function select_infor($session)
	 {
		global $conn; 
		$sql="select * from t_dangky where email='$session'"; echo $sql;
		$run=mysqli_query($conn,$sql);
		$data=array();
		if($run)
		{
		  while($rows=mysqli_fetch_array($run))
		    { $data[]=$rows;}
		}
		return $data;
	 } 
	 public function select_acc($id)
	 {
		global $conn; 
		$sql="select * from t_dangky where id=$id"; echo $sql;
		$run=mysqli_query($conn,$sql);
		$data=array();
		if($run)
		{
		  while($rows=mysqli_fetch_array($run))
		    { $data[]=$rows;}
		}
		return $data;
	 } 
   
   public function select_all()
	 {
		global $conn; 
		$sql="select * from t_dangky";
		$run=mysqli_query($conn,$sql);
		$data=array();
		if($run)
		{
		  while($rows=mysqli_fetch_array($run))
		    { $data[]=$rows;}
		}
		return $data;
	 } 
	}   

?>