<html>
<head>
        <script type="text/javascript">
            history.pushState(null, null, location.href);
            history.back();
            history.forward();
            window.onpopstate = function () { history.go(1); };
        </script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
          .input-res
          {
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
          }
          .hero-text {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
          }
          .hero-image {
            background-image:  url("farm1.jpg");
            /* linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), */
            height: 75%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
          }
        </style>
        <script>
          function deleteItems() {
              sessionStorage.clear();
          }
        </script>
        <script>
          function save(){
          var i
          var j=cart.length
          var d = []
          for(i=0;i<j;i++){
            d.push(cart[i])
          }
          var e = []
          for(i=0;i<j;i++){
            e.push(d[i].name+" "+d[i].price+" "+d[i].count)
          }
          var ca = e.toString();
          console.log(ca); 
          var price = shoppingCart.totalCart();
          console.log(price);
          document.cookie = "ca = " + ca ;
          document.cookie = "pa = " + price ;
          
          
          alert("✔️ORDER PLACED")


          location.reload();
          }
          </script>
          <script type="text/javascript">
            window.history.forward(-1);
          </script>
</head>
<body>
<div id="dom-target" style="display: none;">
    <?php
    error_reporting(E_ALL ^ E_NOTICE); 
        session_start();
        //$myPhpVar= $_COOKIE['ca'];
        $output = $_SESSION['username']; // Again, do some operation, get the output.
        if($output==''){
          header("location: index.html");
        }
        echo htmlspecialchars($output); /* You have to escape because the result will not be valid HTML otherwise. */
        $php = "<script>document.write(sessionStorage.getItem('shoppingCart'))</script>";
        $myPhpVar = $_COOKIE['ca'];
        $price = $_COOKIE['pa'];
        //insert placed order details into DB
        $conn = new mysqli('localhost','root','','mini_project');
        if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
        }
        else{
        $sql = "INSERT INTO orderplaced (orderplaced,user,price) VALUES('$myPhpVar','$output','$price')";
        if ($conn->query($sql) === TRUE) {
          setcookie('ca',NULL,time()-3600);
          setcookie('pa',NULL,time()-3600);
        }
        }
      ?>
</div>
<script>
    var div = document.getElementById("dom-target");
    var myData = div.textContent;
    console.log(myData);
</script>

      <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #F8F9FA;" >
        <a class="navbar-brand" style="color: green;">
          <img src="farmzon.png" width="30" height="30" class="d-inline-block align-top"  alt="">
          Farm<i style="color:#FFBA00">Zon</i></a>
        <ul class="navbar-nav bd-navbar-nav flex-row">
          <li class="nav-item">
        <a class="btn btn-success" data-toggle="modal" data-target="#cart" style="color: white;"><img src="cart.png" width="30" height="30" class="d-inline-block align-top"  alt=""> Cart <span class="badge badge-light total-count"></span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        </li>
        </ul>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav w-100 justify-content-end">
            <li class="nav-item">
              <a class="nav-link active p-2" style="color: green;"><b><script>document.write("Welcome "+myData+"!");</script></b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active p-2" style="color: green;" href="#home">Home</a>
            </li>
            <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle p-2" style="color: green;" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Products
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item p-2" style="color: green;" href="#veg">Vegetables</a>
          <a class="dropdown-item p-2" style="color: green;" href="#fru">Fruits</a>
        </div>
        </li>
            <!-- <li class="nav-item">
              <a class="nav-link active p-2" style="color: green;" href="#product">Products</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link active p-2" style="color: green;" href="#abt">About</a>
            </li>
            
            <li class="nav-item">
                <a class="btn btn-success p-2" href="logout.php" onclick="deleteItems()">Logout</a>
            </li>
          </ul>
        </div>
        </nav>
</div>
<!-- Into Image -->
<div class="hero-image" id="home">
<!-- <img class="img-fluid" style="width: 100%;" height="575" alt="Responsive image" src="farm1.jpg" > -->
<h1  style="color:#28A745;"><b style="background-color:white;">Welcome to <i style="color:#28A745" >Farm</i><i style="color:#FFBA00">Zon</i></b></h1>
<h3 class="hero-text" style="background-color:white;color:#28A745">We strive to serve only the best!</h3>
</div>
<br>
<br>
<br>
<br>
<div class="container"> 
  <h1 style="color:green" id="product">Products</h1><br>
  <div class="container">
  <h4 style="color:#28A745;">We deliver a limited variety of fruits and vegetables. <br>Our executives are working hard on expanding the ranges of vegetables and fruits that we deliver.<br></h4>
</div>
</div>
<br>
<br>
<div  class="container">
<h1 style="color:green" id="veg">Vegetables</h1><br><br>
        <div class="container">
        <div class="card-deck">
  <div class="card">
    <img class="card-img-top" src="tomato.jpeg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title" style="color:green;"><b>Tomato</b></h5>
      <p class="card-text" style="color:green;">Capacity : 1 Kg<br>Price : 20.00 &#x20B9<br>Use by : 5 days from the date of delivery.<br><br><br><br></p>
      <button href="#" data-name="Tomato" data-price="20.00" class="add-to-cart btn btn-success">Add to cart</button>
    </div>
    <div class="card-footer">
      <small class="text" style="color:green;">In Stock</small>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="onion.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title" style="color:green;"><b>Onion</b></h5>
      <p class="card-text" style="color:green;">Capacity : 1 Kg<br>Price : 30.00 &#x20B9<br>Use by : 15 days from the date of delivery.<br><br><br><br></p>
      <a href="#" data-name="Onion" data-price="30.00" class="add-to-cart btn btn-success">Add to cart</a>
    </div>
    <div class="card-footer">
    <small class="text" style="color:green;">In Stock</small>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="carrot.jpeg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title" style="color:green;"><b>Carrot</b></h5>
      <p class="card-text" style="color:green;">Capacity : 1 Kg<br>Price : 50.00 &#x20B9<br>Use by : 8 days from the date of delivery.<br><br><br><br></p>
      <a href="#" data-name="Carrot" data-price="50.00" class="add-to-cart btn btn-success">Add to cart</a>
    </div>
    <div class="card-footer">
    <small class="text" style="color:green;">In Stock</small>
    </div>
  </div>
</div>
</div>
<br>

        <br>
        <!--Card-->
        <div class="container">
        <div class="card-deck">
  <div class="card">
    <img class="card-img-top" src="potatoo.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title" style="color:green;"><b>Potato</b></h5>
      <p class="card-text" style="color:green;">Capacity : 1 Kg<br>Price : 25.00 &#x20B9<br>Use by : 25 days from the date of delivery.<br><br><br><br></p>
      <a href="#" data-name="Potato" data-price="25.00" class="add-to-cart btn btn-success">Add to cart</a>
    </div>
    <div class="card-footer">
    <small class="text" style="color:green;">In Stock</small>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="curry.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title" style="color:green;"><b>Curry Leaves</b></h5>
      <p class="card-text" style="color:green;">Capacity : 1 Kg<br>Price : 15.00 &#x20B9<br>Use by : 4 days from the date of delivery.<br><br><br><br></p>
      <a href="#" data-name="CurryLeaves" data-price="15.00" class="add-to-cart btn btn-success">Add to cart</a>
    </div>
    <div class="card-footer">
    <small class="text" style="color:green;">In Stock</small>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="garlic1.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title" style="color:green;"><b>Garlic</b></h5>
      <p class="card-text" style="color:green;">Capacity : 1 Kg<br>Price : 230.00 &#x20B9<br>Use by : 25 days from the date of delivery.<br><br><br><br></p>
      <a href="#" data-name="Garlic" data-price="230.00" class="add-to-cart btn btn-success">Add to cart</a>
    </div>
    <div class="card-footer">
    <small class="text" style="color:green;">In Stock</small>
    </div>
  </div>
</div>
</div>
<br>
        <br>

        <!--Card-->
        <div class="container">
        <div class="card-deck">
  <div class="card">
    <img class="card-img-top" src="cauli.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title" style="color:green;"><b>Cauliflower</b></h5>
      <p class="card-text" style="color:green;">Capacity : 1 Kg<br>Price : 30.00 &#x20B9<br>Use by : 5 days from the date of delivery.<br><br><br><br></p>
      <a href="#" data-name="Cauliflower" data-price="30.00" class="add-to-cart btn btn-success">Add to cart</a>
    </div>
    <div class="card-footer">
    <small class="text" style="color:green;">In Stock</small>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="Ladyfinger.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title" style="color:green;"><b>Ladyfinger</b></h5>
      <p class="card-text" style="color:green;">Capacity : 1 Kg<br>Price : 40.00 &#x20B9<br>Use by : 3 days from the date of delivery.<br><br><br><br></p>
      <a href="#" data-name="Ladyfinger" data-price="40.00" class="add-to-cart btn btn-success">Add to cart</a>
    </div>
    <div class="card-footer">
    <small class="text" style="color:green;">In Stock</small>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="brinjal.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title" style="color:green;"><b>Brinjal</b></h5>
      <p class="card-text" style="color:green;">Capacity : 1 Kg<br>Price : 40.00 &#x20B9<br>Use by : 4 days from the date of delivery.<br><br><br><br></p>
      <button href="#" data-name="Brinjal" data-price="40.00" class="add-to-cart btn btn-danger" disabled>Add to cart</button>
    </div>
    <div class="card-footer">
    <small class="text" style="color:red;">Out of Stock. We will make sure to bring it back soon</small>
    </div>
  </div>
</div>
</div>
</div>
<br>
<br>
<br>
<div class="container" id="fru">
  <h1 style="color:green">Fruits</h1><br><br>
<div class="container">
<div class="card-deck">
  <div class="card">
    <img class="card-img-top" src="orange.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title" style="color:green;"><b>Orange</b></h5>
      <p class="card-text" style="color:green;">Capacity : 1 Kg<br>Price : 100.00 &#x20B9<br>Use by : 5 days from the date of delivery.<br><br><br><br></p>
      <button href="#" data-name="Orange" data-price="100.00" class="add-to-cart btn btn-success">Add to cart</button>
    </div>
    <div class="card-footer">
      <small class="text" style="color:green;">In Stock</small>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="banana.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title" style="color:green;"><b>Banana</b></h5>
      <p class="card-text" style="color:green;">Capacity : 1 Kg<br>Price : 40.00 &#x20B9<br>Use by : 6 days from the date of delivery.<br><br><br><br></p>
      <a href="#" data-name="Banana" data-price="40.00" class="add-to-cart btn btn-success">Add to cart</a>
    </div>
    <div class="card-footer">
    <small class="text" style="color:green;">In Stock</small>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="apple.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title" style="color:green;"><b>Apple</b></h5>
      <p class="card-text" style="color:green;">Capacity : 1 Kg<br>Price : 150.00 &#x20B9<br>Use by : 8 days from the date of delivery.<br><br><br><br></p>
      <br><a href="#" data-name="Apple" data-price="150.00" class="add-to-cart btn btn-success">Add to cart</a>
    </div>
    <div class="card-footer">
    <small class="text" style="color:green;">In Stock</small>
    </div>
  </div>
</div>
</div>
<br>
<br>
</div>


        <!--modal-->
        <div class="modal fade bd-example-modal-lg" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: green;">Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <table class="show-cart table">
                  
                </table>
                <div class="WebRupee" style="color: green;">Total price: &#x20B9;<span class="total-cart"></span></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                <button onclick="save() " type="button" class="btn btn-success">Place Order</button>
                
              </div>
            </div>
          </div>
        </div>
        
        
        
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<!--webstorage-->
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script><script  src="cart.js"></script>

<div id="abt">
<!-- Footer -->
<footer style="background-color:#F7F7F7" class="page-footer font-small unique-color-dark">

  <div style="background-color: #28A745;">
    <div class="container">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          <h4 class="mb-0" style="color:white">About FarmZon</h4>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center text-md-right">


        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>

  <!-- Footer Links -->
  <div  class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div  class="row mt-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

        <!-- Content -->
        <h6 style="color: #28A745" class="text-uppercase font-weight-bold">FarmZon</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p style="color: #28A745">We work for the benifit of the farmers by connecting you and them directly to ensure a large share of profit to them.</p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 style="color: #28A745" class="text-uppercase font-weight-bold">Products</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a style="color: #28A745"href="#veg">Vegetable</a>
        </p>
        <p>
          <a style="color: #28A745" href="#fru">Fruits</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 style="color: #28A745" class="text-uppercase font-weight-bold">Useful links</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a style="color: #28A745" href="#!">Your Account</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 style="color: #28A745" class="text-uppercase font-weight-bold">Contact</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p style="color: #28A745">Coimbatore, TN 641028, IN</p>
        <p style="color: #28A745">farmzon@gmail.com</p>
        <p style="color: #28A745">+91 8610021022</p>
        

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div style="color: #28A745" class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="index.php"> FarmZon.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</div>

</body>
</html>