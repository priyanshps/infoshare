<?php require_once("lib/includes/header.php")?>
 
<?php include("./classes/user.php")?>

<?php
    if(isset($_POST['submit']))
    {
        $username=htmlentities($_POST['username']);
        $name=htmlentities($_POST['name']);
        $email=htmlentities($_POST['email']);
        $password=htmlentities($_POST['password']);
        $bio=htmlentities($_POST['bio']);

        //$hashpassword=hash('ripemd160', $password);

        try
        {
            $userObj=new user();
            $userData=$userObj->add($name,$email,$username,$password,$bio);
        }
        catch(Throwable $e)
        {
            echo $e;
        }





    }


?>



<div class="forminput">
    
    <div class="container-fluid col-sm-5 col-md-5">
        <div class="form-group">
            <header>
                <h1>Registration Form</h1>
            </header>
        </div>
        <form method="POST" action="register.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" name="username"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nickname">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">name</label>
                <input type="text" name="name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full Name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="something@domain.com">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">password</label>
                <input type="password" name="password"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="***********">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">bio</label>
                <input type="text" name="bio"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tell me something about yourself">
            </div>


            <button type="submit" name="submit" class="btn btn-primary">Create</button>
        </form>
        </div>
    
</div>



<?php require_once("lib/includes/footer.php")?>