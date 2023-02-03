<?php
require_once("Class.Tools.php");
class Test
{
	static function getAllTests($id)
	{
		$pdo=Database::connect();
        $query=$pdo->prepare("select * from tests where id=?");
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute(array(Tools::cleanData($id)));
		return $query;
 
	}
	
	static function insertTest($id,$name,$file)
	{
		$fileName=$id.".pdf";
		
		$pdo=Database::connect();
		$query=$pdo->prepare("insert into tests(id,name,test) values (?,?,?)");
		if($query->execute(array($id,$name,$fileName)))
		move_uploaded_file($file['tmp_name'],'C:\xampp\htdocs\basic\labweb\tests\\'.$fileName);//tests/555.pdf
    }

}

?>