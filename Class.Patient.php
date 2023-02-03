<?php
require_once("Class.Tools.php");

class Patient
{
	static function getAllPatients()
	{
		$pdo=Database::connect();
		$query=$pdo->prepare("select * from patients where role='patient'");
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();
        return $query;
	}
	
	static function getPatient($id)
	{
		$pdo=Database::connect();
		$query=$pdo->prepare("select * from patients where id=? and role='patient'");
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute(array(Tools::cleanData($id)));
        return $query;
	}
		
	static function updatePatient($id,$name,$password,$email,$phone,$date)
	{
	   $id=Tools::cleanData($id);
	   $name=Tools::cleanData($name);
	   $password=Tools::cleanData($password);
	   $email=Tools::cleanData($email);
	   $phone=Tools::cleanData($phone);
	   $date=Tools::cleanData($date);

		$pdo=Database::connect();
		$query=$pdo->prepare("update patients set name=?,password=?,email=?,phone=?, date=? where id=?");
		$test= $query->execute(array($name,$password,$email,$phone,$date,$id));
	
	}

    static function addImg($id,$file)
	{
		$fileName=$id.".png";
		
		$pdo=Database::connect();
		$query=$pdo->prepare("update patients set img=? where id=?");
		if($query->execute(array($fileName,$id)))
		move_uploaded_file($file['tmp_name'],'C:\xampp\htdocs\basic\labweb\img\\'.$fileName);//img/555.png

	}	
		
	

	static function addPatient($id,$name,$password,$email,$phone,$date,$img)
	{
	   $id=Tools::cleanData($id);
	   $name=Tools::cleanData($name);
	   $password=Tools::cleanData($password);
	   $email=Tools::cleanData($email);
	   $phone=Tools::cleanData($phone);
	   $date=Tools::cleanData($date);
	   	
       $pdo=Database::connect();
	   $query=$pdo->prepare("insert into patients (id,name,password,email,phone,date) values(?,?,?,?,?,?)");
       $test=$query->execute(array($id,$name,$password,$email,$phone,$date));
	   $lastID=$pdo->lastInsertId();
		if($test)
		{
			if(isset($img['name'])&& $img['name']!='')
			self::addImg($id,$img);
		}

		return $test;
    }
    static function deletePatient($id){
        $id=Tools::cleanData($id);
        $pdo=Database::connect();
        $query = $pdo->prepare("DELETE FROM patients WHERE id=?");
        return $query->execute(array($id));
    }
	
}
?>