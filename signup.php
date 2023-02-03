<?php
      require("Class.Patient.php");

      if($_SERVER['REQUEST_METHOD']=='POST')
            {
        $test =patient::addPatient($_POST['id'],$_POST['name'],$_POST['password'],$_POST['email'],$_POST['phone'],$_POST['date'],$_FILES['img']);
        if($test)
        {	
        header("Location:/basic/labweb/sign.php");
        Tools::printSuccess("One Record Inserted Successfully");
        }
        else
        {
          Tools::printError("Inserting Failed for some ERROR");
        }  
      }
?>

