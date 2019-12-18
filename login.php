
<?php require_once("lib/includes/header.php") ?>
<?php require_once("classes/user.php")?>

<?php
    if(isset($_POST['login']))
    {
        unset($_SESSION["account"]);
        $username=htmlentities($_POST['username']);
        $pass=htmlentities($_POST['password']);
        try
        {
            $userObj=new user();
            $passObj=$userObj->getLogin($username);
            

        }
        catch(Throwable $e)
        {
            echo $e;
        }
        if($pass == $passObj['password'])
        {
            $_SESSION["account"]=$_POST['username'];
            $_SESSION['success']="Log in";
            $_SESSION['user'] = $passObj['name'];
            header('location: index.php');
            return;
        }
        else
        {
            $_SESSION['error']="Incorrect Password.";
            header('location: login.php');
        }
        
    }

?>







<div class="forminput">
    <div class="container-fluid col-sm-5 col-md-5">
        <div class="form-group">
            <header>
                <h1>Log in Form</h1>
            </header>
            <?php
                if(isset($_SESSION["error"]))
                {
                    echo('<p style="color:red>'.$_SESSION["error"]."</p>");
                    unset($_SESSION["error"]);
                }
                if(isset($_SESSION["succedd"]))
                {   
                    echo('<p style="color:red>'.$_SESSION["error"]."</p>");
                    unset($_SESSION["error"]);
                }



            ?>   






        </div>
        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
    
        </form>
    </div>
</div>

<?php require_once("lib/includes/footer.php")?>