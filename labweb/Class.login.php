<?php
require_once("Class.Tools.php");
require_once("Class.Database.php");


class login
{
	static function checkIn($id,$password)
	{
		$id = Tools::cleanData($id);
		$password = Tools::cleanData($password);

		$pdo = Database::connect();
		$sql = "select * FROM patients  WHERE id = ? and password = ? and status='Active'";
		$q = $pdo->prepare($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC);//convert obj to array

		$q->execute(array($id,$password));
		$row=$q->fetch();

		if($row!=null)
		{			
			$_SESSION['login']=true;
			$_SESSION['id']=$row['id'];
			$_SESSION['name']=$row['name'];
			$_SESSION['email']=$row['email'];
			$_SESSION['phone']=$row['phone'];
			$_SESSION['date']=$row['date'];
			$_SESSION['img']=$row['img'];
            $_SESSION['role']=$row['role'];
			switch($row[role])
							 {
							  	case "admin":
							  		header("Location:admin/adminPageAllUsers.php");
									break;
								case "patient":	
							  		header("Location:patients/user.php");
									break;
																	
								default:
									header("Location: index.php?loginError=1");
								
							 }
			
		}
		else
		{
		    header("Location: index.php?loginError=1");
		}		
	}
}

?>