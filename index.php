<?php require_once("lib/includes/header.php")?>
<?php require_once("./classes/user.php")?>
<?php require_once("./classes/topics.php")?>


<?php 

    if(isset($_SESSION["success"]))
    {
        echo('<p style="color:green">'.$_SESSION["success"]."</p>\n");
        unset($_SESSION["success"]);
    }
    try
    {
        $userObj=new user();
        $userinfo=$userObj->index();
        $topicObj=new topics();
        $topicInfo=$topicObj->getData();
    }
    catch(Throwable $e)
    {
        echo $e;
                
    }
?>
<!--###############################################View##########################################################-->
<?php if(isset($_SESSION["account"]))  { ?>
<div class="container">


    <header class="jumbotron">
        <div class="container">
            <h1>InfoSHARE</h1>
            <p>An investment in knowledge always pays the best interest</p>
            <p>
                <a class="btn btn-primary btn-large" href="create.php">Add Topics</a>
            </p>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row  text-center" style="display:flex; flex-wrap:wrap;">
        <?php foreach($topicInfo as $tifo) :?>
            <div class="col-md-6">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">

                    <strong class="d-inline-block mb-2 text-primary"><?php echo $tifo['category_id'];?></strong>
                    <h3 class="mb-0"><?php echo $tifo['title'];?></h3>
                    <div class="mb-1 text-muted"><?php echo $tifo['userid'];?></div>
                    <p class="card-text mb-auto caption"><?php echo $tifo['title'];?></p>                  
                    <?php if($_SESSION['user']==$tifo['userid']) {?>
                    <div>
                        <a href="edit.php?id=<?php echo $tifo['id'];?>" class="btn btn-outline-dark">Edit </a>
                        <a href="delete.php?id=<?php echo $tifo['id'];?>" class="btn btn-outline-danger">Delete</a>
                    </div>
                    <?php }?>                  
                    </div>
                </div>
            </div>  
        
    <?php endforeach;?> 
            
        </div>    
        
    </div>
</div>
<?php } else{ header("location: login.php") ?>
    
<?php } ?>


<?php require_once("lib/includes/footer.php")?>