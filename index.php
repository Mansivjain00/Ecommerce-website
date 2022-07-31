<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spree</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body style="margin-bottom:200px">
    <!--Header-->
    <?php
include 'includes/header_menu.php';
include 'includes/check-if-added.php';
?>
    <!--Header ends-->
    <div id="content">
        <div id="bg" class=" ">
            <div class="container" style="padding-top:150px">
            <div class="mx-auto p-5 text-white" id="banner_content" style="border-radius: 0.5rem;" >
            <h1>We sell Happiness :)</h1>
            <p>Flat 40% OFF on premium brands </p>
            <a href="products.php" class="btn btn-warning btn-lg text-white">Shop Now</a>

            </div>
            </div>

        </div>
    </div>
    <div class="text-center pt-4 h3">
        * Welcome! *
    </div>
    <!--menu highlights start-->
 <div class="container pt-3">
        <div class="row text-center ">
            <div class="col-6 col-md-3 py-3">
                <a href="products.php#watch"> <img src="images/watch.jpg" class="img-fluid " alt="" style="border-radius:0.5rem">
                <!-- https://images.unsplash.com/photo-1523170335258-f5ed11844a49?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fm=jpg&w=400&fit=max-->
                    <div class="h5 pt-3 font-weight-bolder">
                      Watches
                   </div>
                 </a>
             </div>
            <div class="col-6 col-md-3 py-3 " >
                <a href="products.php#shirt"  >
                  <img src="images/clothing.jpg" class="img-fluid zoom" alt="" style="border-radius:0.5rem" >
                     <div class="h5 pt-3 font-weight-bolder">
                        Clothing
                     </div>
                  </a>
             </div>
            <div class="col-6 col-md-3 py-3">
                <a href="products.php#shoes">
                 <img src="images/shoes.jpg" class="img-fluid   " alt="" style="border-radius:0.5rem">
                <div class="h5 pt-3 font-weight-bolder">
                    Shoes
                 </div>
             </a>
             </div>
            <div class="col-6 col-md-3 py-3">
                <a href="products.php#headphones">
                 <img src="images/headphones.jpg" class="img-fluid  " alt="" style="border-radius:0.5rem">
                 <div class="h5 pt-3 font-weight-bolder">
                    Headphones
                 </div>
              </div>
            </a>
        </div>
    </div>

    <?php
    
        require ("includes/common.php");
        $sql = "SELECT * from `feedback`";
        $result = mysqli_query($con,$sql);
        
        $index=0;
        while($row = mysqli_fetch_assoc($result)){
            $array[$index]=$row;
            $index++;
        }

        // Find the number of records returned
        $num = mysqli_num_rows($result);

        // Display row returned by the sql query
        if($num>0){
            echo "<h3 class='text-center my-5'>Customer reviews</h3>";

            $random1=random_int(0,$num-1);
            $random2=random_int(0,$num-1); 
            $random3=random_int(0,$num-1); 

            $row1 = $array[$random1];
            $row2 = $array[$random2];
            $row3 = $array[$random3];

            $name1 = $row1['name'];
            $message1 = $row1['message'];
            $date1 = $row1['date_time'];
            $name2 = $row2['name'];
            $message2 = $row2['message'];
            $date2 = $row2['date_time'];
            $name3 = $row3['name'];
            $message3 = $row3['message'];
            $date3 = $row3['date_time'];

            echo "<div class='card-group my-3'>
            <div class='card mx-3' id='one'>
              <div class='card-body'>
                <h5 class='card-title'>$name1</h5>
                <p class='card-text'>$message1</p>
              </div>
              <div class='card-footer'>
                <small class='text-muted'>$date1</small>
              </div>
            </div>
            <div class='card mx-3' id='two'>
              <div class='card-body '>
                <h5 class='card-title'>$name2</h5>
                <p class='card-text'>$message2</p>
              </div>
              <div class='card-footer'>
                <small class='text-muted'>$date2</small>
              </div>
            </div>
            <div class='card mx-3' id='three'>
              <div class='card-body'>
                <h5 class='card-title'>$name3</h5>
                <p class='card-text'>$message3</p>
              </div>
              <div class='card-footer'>
                <small class='text-muted'>$date3</small>
              </div>
            </div>
          </div>";
            
        }

    ?>


    <!--menu highlights end-->
    <!--footer -->
    <?php include 'includes/footer.php'?>
    <!--footer end-->


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></scrip>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></cript>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
$(document).ready(function() {

if(window.location.href.indexOf('#login') != -1) {
  $('#login').modal('show');
}

});
</script>
<?php if (isset($_GET['error'])) {$z = $_GET['error'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#signup').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>
    
<?php if (isset($_GET['errorl'])) {$z = $_GET['errorl'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#login').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>

</html>