<?php session_start();
include_once 'database.php' ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Macintosh App Ordering System : Login</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

 <?php include_once 'login_bar.php'; ?>



<body>
	 <?php
 try  
 {  
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["uname"]) && empty($_POST["pw"]))  
           {  
               echo "<div class='alert alert-danger margin-top-40' role='alert'>Please enter Username and Password!</div>";
            

             }
           
            else if(empty($_POST["uname"]) )  
           {  
                echo "<div class='alert alert-danger margin-top-40' role='alert'>Please enter Username!</div>";
           } 

            else if(empty($_POST["pw"]) )  
           {  
                echo "<div class='alert alert-danger margin-top-40' role='alert'>Please enter Password!</div>";
           } 
           else  
           {  
                $query = "SELECT * FROM tbl_staffs_a170997_pt3 WHERE fld_username = :uname AND fld_pw = :pw";  
                $statement = $conn->prepare($query);  
                $statement->execute(  
                     array(  
                          'uname'     =>     $_POST["uname"],  
                          'pw'     =>     $_POST["pw"]  
                     )  
                ); 
                 $result = $statement->fetchAll(); 
                $count = $statement->rowCount();  
                if($count > 0)  
                {  

                     $_SESSION["login_user"] = $_POST["uname"];  


                      foreach($result as $readrow) {
                      $_SESSION["user_level"]=$readrow["fld_position"];
                      $_SESSION["user_name"]=$readrow["fld_staff_fname"];
                }
          
              header("location:products.php"); 
                
                } 
                
              
                else  
                {  
                   echo "<div class='alert alert-danger margin-top-40' role='alert'>Username and Password invalid!</div>"; 
            
           }  
      }  
 } 

 }
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>  
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Welcome</h2>
      </div>
  	<form action="login.php" method="post" class="form-horizontal">
      <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">Username</label>
          <div class="col-sm-9">
          <input name="uname" type="text" class="form-control" id="uname" placeholder="Username"  >
        </div>
        </div>
      <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Password</label>
          <div class="col-sm-9">
          <input name="pw" type="password" class="form-control" id="pw" placeholder="Password"  >
        </div>
    	</div>
    <div class="form-group">
    	 <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" id="login" name="login" class=" btn btn-primary btn-block" value="Login" aria-hidden="true">Login</button> 
          </div>
            </div>
    </form>
</body>
</html>