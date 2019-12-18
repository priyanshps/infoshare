<?php
    require_once("./classes/database.php");
    require_once("./classes/topics.php");
    
    try
    {
        $id=$_GET['id'];
        $topicObj=new topics();
        $topicInfo=$topicObj->Delete($id);
    }
    catch(Throwable $e)
    {
        echo $e;
                
    }

?>