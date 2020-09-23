<?php
   $user = 'root';
   $password = 'cheng123';
   try{
        $db = new
   PDO('mysql:host=localhost;dbname=hair;charset=utf8',$user,$password);
       $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
   }catch(PDOException $e){
       Print бзERRORби . $e->message();
       die();
   }
?>