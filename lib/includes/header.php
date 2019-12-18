<?php include("./classes/database.php")?> 
<?php include("./classes/category.php")?>
<?php require_once("./classes/topics.php")?>
<?php session_start();?>
<html>
    <head>
        <link href="./lib/css/bootstrap.css" rel="stylesheet">
        <link href="./lib/css/style.css" rel="stylesheet">
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                    <a class="navbar-brand" href="index.php">InfoSHARE</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="nav navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="register.php">Create Account </a>
                        </li>   
                        <?php if(!isset($_SESSION["account"])) { ?>
                        <li class="nav-item rightitem">
                            <a class="nav-link" href="login.php">Log-in</a>
                        </li>
                        <?php } else {?>
                        <li class="nav-item rightitem">
                            <a class="nav-link" href="logout.php" tabindex="-1" >logout</a>
                        </li>
                        <?php }?>
                        </ul>
                    </div>
            </nav>
        <header>
        
            
