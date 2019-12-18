<?php require("lib/includes/header.php")?>  

<?php

    $user_id=$_SESSION['user'];
    if(isset($_POST['add']))
    {
        $title=htmlentities($_POST['heading']);
        $category_id=htmlentities($_POST['category']);
        $body=htmlentities($_POST['body']);
        try
        {
            $topicObj=new topics();
            $topicData=$topicObj->addtopic($category_id,$user_id,$title,$body);
        }
        catch(Error $e)
        {
            echo $e;
        }

    }
?>
<?php
    try
    {
        $catObj=new category();
        $cat=$catObj->getcat();
    }
    catch(Throwable $e)
    {
        echo "Error   ".get_class($e).' on line'.$e->getLine().' of '.$e->getFile().' : '.$e->getMessage();
    }
?>






<div class="forminput">
    <div class="container-fluid col-sm-5 col-md-5">
        <form method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Heading</label>
                <input type="text" name="heading"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Blog Heading">
            </div>
            <div class="form-group">
            <label for="exampleFormControlSelect2">Category</label>
                <select  class="form-control" id="exampleFormControlSelect2" name="category">
                    <?php foreach($cat as $c) :?>
                    <option><?php echo $c['name'];?></option>
                    <?php endforeach ;?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Blog body </label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="body" rows="3"></textarea>
            </div>
            <button type="submit" name="add" class="btn btn-primary">Add</button>
        </form>
        
        </div>
</div>



<?php require_once("lib/includes/footer.php")?>