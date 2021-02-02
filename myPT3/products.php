<?php
  include_once 'products_crud.php';
?>
 <script src="jquery-3.5.1.min.js"></script>

 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Macintosh App Ordering System : Products</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
      .input-group {
        padding-bottom: 10px;
      }
    </style>
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
   
  <?php include_once 'nav_bar.php'; ?>
 <?php if ($_SESSION["user_level"]=="Admin") { ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Create New Product</h2>
      </div>
    <form action="products.php" method="post" class="form-horizontal">
      <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">ID</label>
          <div class="col-sm-9">
          <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_num']; ?>" required>
        </div>
        </div>
      <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
          <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>" required>
        </div>
        </div>
        <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label">Price</label>
          <div class="col-sm-9">
          <input name="price" type="number" class="form-control" id="productprice" placeholder="Product Price" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>" required>
        </div>
        </div>
      <div class="form-group">
          <label for="producttype" class="col-sm-3 control-label">Type</label>
          <div class="col-sm-9">
          <select name="type" class="form-control" id="producttype" required>
           <option value="Audio" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Audio") echo "selected"; ?>>Audio</option>
        <option value="Chat" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Chat") echo "selected"; ?>>Chat</option>
        <option value="Email Client" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Email Client") echo "selected"; ?>>Email Client</option>
        <option value="3D Computer Graphics" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="3D Computer Graphics") echo "selected"; ?>>3D Computer Graphics</option>
        <option value="Mathematical" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Mathematical") echo "selected"; ?>>Mathematical</option>
        <option value="Media" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Media") echo "selected"; ?>>Media</option>
        <option value="Networking & Telecommunications" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Networking & Telecommunications") echo "selected"; ?>>Networking & Telecommunications</option>
        <option value="News" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Audio") echo "selected"; ?>>Audio</option>
        <option value="Office & Productivity" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Office & Productivity") echo "selected"; ?>>Office & Productivity</option>
        <option value="Utilities" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Utilities") echo "selected"; ?>>Utilities</option>
      </select>
        </div>
        </div>
         <div class="form-group">
          <label for="productdeveloper" class="col-sm-3 control-label">Developer</label>
          <div class="col-sm-9">
          <input name="developer" type="text" class="form-control" id="productdev" placeholder="Product Developer" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_developer']; ?>" required>
        </div>
        </div> 
         <div class="form-group">
          <label for="productsize" class="col-sm-3 control-label">Size</label>
          <div class="col-sm-9">
          <input name="size" type="text" class="form-control" id="productsize" placeholder="Product Size" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_size']; ?>" required>
        </div>
        </div>    
       <div class="form-group">
          <label for="launchdate" class="col-sm-3 control-label">Launch Date</label>
          <div class="col-sm-9">
          <input name="ldate" type="date" class="form-control" id="launchdate" placeholder="" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_date']; ?>" required>
        </div>
        </div> 
      <div class="form-group">
          <label for="productq" class="col-sm-3 control-label">Quantity</label>
          <div class="col-sm-9">
          <input name="quantity" type="number" class="form-control" id="productq" placeholder="Product Quantity" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_quantity']; ?>" min="0" required>
        </div>
        </div>

    
        <div class="form-group">
          <label for="imgupload" class="col-sm-3 control-label">Image</label>
          <div class="col-sm-9">
         
       <div class="input-group">
        <input type="text" class="form-control" id="pdf-name" placeholder="Upload Product's Photo Here" readonly>
        <label class="input-group-btn">
            <span class="btn btn-primary">
               <input type="file" id="pdf-file" name="pdf_file" style="display: none;">  Choose File 
            </span>
        </label>
    </div>
        </div>
        </div>
        <div class="form-group">


          <div class="col-sm-offset-3 col-sm-9">
          <?php if (isset($_GET['edit'])) { ?>
          <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_num']; ?>">
          <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
          <?php } else { ?>
          <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
          <?php } ?>
          <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
        </div>
      </div>
    </form>
    </div>
  </div>
     <?php } ?>

    <script>
  $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#my tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


    <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Products List</h2>
      </div>

       
      <div class="input-group input-group-lg">
        <label class="input-group-addon " ><i class="glyphicon glyphicon-search"></i></label>
      <input type="Search" id="myInput" placeholder="Search for products here"  class="form-control ">
      </div>
      
     
      <table class="table table-striped table-bordered" id="my">
        <tr>
        <th>Product ID</th> 
        <th>Name</th>
        <th>Price (RM)</th>
        <th>Type</th>
       <!--  <th>Developer</th>
        <th>Size</th>
        <th>Launch Date</th>
        <th>Quantity</th> -->
        <th></th>
        </tr>
      <?php
      // Read
       $per_page = 10;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("select * from tbl_products_a170997_pt3 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>   
      <tr>
        <td id="try1"><?php echo $readrow['fld_product_num']; ?></td>
        <td id="try2"><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php echo $readrow['fld_product_price']; ?></td>
        <td><?php echo $readrow['fld_product_type']; ?></td>
       <!--  <td><?php echo $readrow['fld_product_developer']; ?></td>
        <td><?php echo $readrow['fld_product_size']; ?></td>
        <td><?php echo $readrow['fld_product_date']; ?></td>
        <td><?php echo $readrow['fld_product_quantity']; ?></td> -->
        <td>
          <a href="products_details.php?pid=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-warning btn-xs"  target="_blank" >Details</a>         
           <?php if ($_SESSION["user_level"]=="Admin") {?>
          <a href="products.php?edit=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="products.php?delete=<?php echo $readrow['fld_product_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a> <?php } ?>
        </td>
      </tr>
      <?php } ?>
 
    </table>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a170997_pt3");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page==1) { ?>
            <li class="disabled"><span aria-hidden="true">«</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </div>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 
</body>
</html>