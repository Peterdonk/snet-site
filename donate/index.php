<?php

session_start();

 require_once 'db/db.php';
// require_once 'uuid_generater.php';

if(isset($_POST['btn-process-form'])){
   $hasErrors = false;
   $get_amount = $_POST['modal-data-bundle'];
   $get_label = $_POST['modal-data-label'];

    $get_contactNumber = mysqli_real_escape_string($mainDbString,$_POST['contactNumber']);

   setcookie("u_n",$get_contactNumber, time() + (86400 * 30), '/');
   setcookie("u_a",$get_amount, time() + (86400 * 30), '/');

   $get_amount *= 100;

   if($hasErrors){
      echo "<script>window.location.href = '/';</script>"; 
   }else{
$curl = curl_init();

// url to go to after payment
 $callback_url = 'https://snetgh.org/donate/verify.php';  
//$callback_url = 'http://localhost/payment/verify.php';  

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$get_amount,
    'label'=>'Affordable Bundles With Quality Speed',
    'email'=>'peterdonk17@gmail.com',
    'callback_url' => $callback_url,
    'channels' => ['mobile_money']
    
  ]),
  CURLOPT_HTTPHEADER => [
    "authorization: Bearer sk_test_63e4c4c85d46cb9e64c90c7f56db10284110b850", //replace this with your own test key
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the Paystack API
  die('Curl returned error: ' . $err);
}

$tranx = json_decode($response, true);

if(!$tranx['status']){
  // there was an error from the API
  print_r('API returned error: ' . $tranx['message']);
}

// comment out this line if you want to redirect the user to the payment page
print_r($tranx);
// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $tranx['data']['authorization_url']);

}

//    $selected_value = mysqli_real_escape_string($mainDbString,$_POST['checker_value']);

//    $get_cards = mysqli_query($mainDbString,"SELECT * FROM cards_tbl WHERE card_status = 'unused'")or die(mysqli_error($mainDbString));

//    if(mysqli_num_rows($get_cards) < $selected_value){
//       echo "<script>alert('No card available at the moment, Kindly contact Administrator on : 024 0577 999');</script>";
//    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="P-NET Zone" />

    <title>Samreboi Community Network</title>
     <!-- site metas -->
   <meta name="title" content="Samreboi Community Network">
   <meta name="description"
      content="Samreboi Community Network is a community-owned network. It is an alternative to your current internet connection. Samreboi Community Network is owned by the community. You join by donating (GHc2 & GHc5)">
   <meta name="keywords"
      content="Buy Affordable Internet Bundles">
   <meta name="robots" content="index, follow">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="language" content="English">
   <meta name="revisit-after" content="1 days">
   <meta name="author" content="Geo">
    
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="./assets/img/logo.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg text-uppercase fixed-top shadow" id="mainNav" style="background-color:#f9fafb">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="./assets/img/logo.png" height="53px" /></a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="https://portal.ptechgh.net:8003/index.php?zone=town&redirurl=http%3A%2F%2Fdonate.ptechgh.net%2F">Login</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#bundles">Donate</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#about">About</a></li>
                             <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="./locations.html">Stores</a></li>
                </ul>
            </div>
        </div>
    </nav>

 <!-- Navigation End -->

<!-- Banner Start -->
<div style="height:150px;background-color:tomato;color:white;width:100%;position:relative">
<marquee scrollamount="5" style="position:absolute;top:79%"><h6>Didn't get your code after donating, Contact Us on : <a href="tel:0247923910" style='font-weight:bold;color:#2bdef5'><u>0247 923 910 </u></a> or <a href="tel:0244443898" style='font-weight:bold;color:#2bdef5'><u>0244 443 898 </u></a></h6></marquee>
</div>
<!-- Banner End -->


    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0">SAMREBOI COMMUNITY WI-FI</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <center>
                <a href="https://portal.ptechgh.net:8003/index.php?zone=town&redirurl=http%3A%2F%2Fdonate.ptechgh.net%2F" class="btn btn-lg btn-primary">Login To Go Online</a>
            </center>
        </div>
    </header>
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="bundles">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">DONATE TO SUPPORT THE PROJECT</h2>
            <h5 class="text-center text-secondary my-3">Your little support can help maintain and expand the network to other areas</h5>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="widget stacked widget-table action-table">

                <div class="widget-header">
                    <i class="icon-th-list"></i>
                    <!-- <h3>Table</h3> -->
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Amount (GHC)</th>
                                <th>Data</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr class="text-center" style="color:white;font-weight:bold;background-color:#0a76e0">
                                <td colspan="3" class="font-weight-bold">Special Donation</td>
                            </tr>

                            <tr>
                                <td>2.00</td>
                                <td>2 days (Unlimited)</td>
                                <td><button class="btn btn-sm btn-danger buy-data" data-bundle='2.00' data-amount='2.0'
                                        data-label='special-bundle'>Get Code</button></td>
                            </tr>

                            <tr>
                                <td>5.00 </td>
                                <td>6 days (Unlimited)</td>
                                <td><button class="btn btn-sm btn-danger buy-data" data-bundle='5.00' data-amount='2.0'
                                        data-label='special-bundle'>Get Code</button></td>
                            </tr>

                        </tbody>
                    </table>

                </div> <!-- /widget-content -->

            </div> <!-- /widget -->
        </div>
    </section>
    <!-- About Section-->
    <section class="page-section bg-primary text-white mb-0" id="about">
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- About Section Content-->
            <div class="row">
                <div class="col-lg-12 ms-auto text-center">
                    <p class="lead">Samreboi Community Network is a community-owned network. It is an alternative to your current internet connection. Samreboi Community Network is owned by the community. You join by donating (GHc2 & GHc5)
                     </p>

                </div>
            </div>
            <!-- About Section Button-->
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enter your contact</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <label>Contact Number</label>
                        <input type="text" name="contactNumber" class="form-control" style="height: 46px;font-size:23px"
                            required maxLength="10" />
                        <input id="modal-bundle" type="hidden" name="modal-data-bundle" value="" />
                        <input id="modal-amount" type="hidden" name="modal-data-amount" value="" />
                        <input id="modal-label" type="hidden" name="modal-data-label" value="" />

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="btn-process-form" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Location</h4>
                    <p class="lead mb-0">
                        Samreboi Province
                        <br />
                        <a href="tel:0247923910" class="font-weight-bold text-white">0247923910</a><br/>
                        <a href="tel:0244443898" class="font-weight-bold text-white">0244443898</a><br/>
                        <a href="tel:0248544032" class="font-weight-bold text-white">0248544032</a>
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Around the Web</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="javascript:void(0);"><i
                            class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="javascript:void(0);"><i
                            class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="javascript:void(0);"><i
                            class="fab fa-fw fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="javascript:void(0);"><i
                            class="fab fa-fw fa-dribbble"></i></a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">About Samreboi Community Network</h4>
                    <p class="lead mb-0">
                        Providing reliable internet access to all whiles maintaining top notch network speed.
                    </p>
                </div>
            </div>
        </div>
    </footer>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/616dd5c9f7c0440a591eda65/1fiagm78a';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->



    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy;2021 Developed By <a href='https://snetgh.net' target='_blank'> Step Network </a></small></div>
    </div>
    <!-- Portfolio Modals-->
    <!-- Bootstrap core JS-->
    <script src="./js/bootstrap.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="js/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.buy-data').click(function (e) {
                e.preventDefault();
                const dataBundle = $(this).attr('data-bundle');
                const dataAmount = $(this).attr('data-amount');
                const dataLabel = $(this).attr('data-label');

                $('#modal-bundle').val(dataBundle);
                $('#modal-amount').val(dataAmount);
                $('#modal-label').val(dataLabel);
                console.log(dataAmount);
                $('#contactModal').modal('show');

            });
        })
    </script>
</body>

</html>