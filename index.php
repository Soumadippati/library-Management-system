<?php
// session_start(); 
// session_destroy();
// if (!(isset($_SESSION['auth']) && $_SESSION['auth'] === true)) {
// 	header("Location: admin.php?access=false");
// 	exit();
// }
// else {
 	// $admin = $_SESSION['admin'];
// }
require 'includes/snippet.php';
require 'includes/db-inc.php';
 include "includes/header.php";

	// if(isset($_SESSION['admin'])){
	// 	$admin = $_SESSION['admin'];
	// 	// echo "Hello $user";
	// }

 if(isset($_POST['submit'])){

    $news = sanitize(trim($_POST['news']));

    $sql = "INSERT into news (announcement) values ('$news')"; 

    $query = mysqli_query($conn,$sql);
    $error = false;

       if($query){
       $error = true;
      }
      else{
        echo "<script>alert('Not successful!! Try again.');
                    </script>"; 
      }
 }

     if(isset($_POST['UpDat'])){
		$id = sanitize(trim($_POST['id']));
        $text = sanitize(trim($_POST['text']));

        $sql_up = "UPDATE news set announcement = '$text' where newsId = '$id'";
		echo mysqli_error($sql_up);
         $result = mysqli_query($conn,$sql_del);
                if ($result)
                {
                    echo "<script>
            
           
                   alert('Update successful');

         </script>";
                }


     }

     if(isset($_POST['del'])){

        $id = sanitize(trim($_POST['id']));

        $sql_del = "DELETE from news where newsId = $id"; 

        $result = mysqli_query($conn,$sql_del);
                if ($result)
                {
         //            echo "<script>
            
         //    var response = confirm('Would you like to delete the user');
         //    if (response == true) {
         //        alert('User was successfully deleted from the database');
         //            location.href ='admin.php';
         //    }   

         //    else
         //        {
         //            alert('Could not delete user');
         //        }
            

         // </script>";
                }

     }






  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="flickity/flickity.css">
	<script type="text/javascript" src="flickity/flickity.js"></script>
	<title>Library Management</title>

</head>
<body>
<div class="container">
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example">
					<span class="sr-only">:</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Library Management System</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#"> <i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
										
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="login.php"> <i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
				</ul>
			</div>
		</div>
	</nav>

</div>

		<div class="container-fluid slide">
			
	  		<div class="slider">
	  			<!-- <h1>Flickity - wrapAround</h1> -->


					<div class="carousel" data-flickity='{ "autoPlay": true }'; >
                          <div class="carousel-cell" auto-play>
						  	<img src="ify/adamasApplicant2.png">

						  </div>
						  <div class="carousel-cell" auto-play >
						  	<img src="ify/11.jpg">
						  </div>
						  <div class="carousel-cell" auto-play>
						  	 <img src="ify/10.jpg">
						  </div>
						  
						  <div class="carousel-cell" auto-play >
						  	<img src="ify/14.jpg">
						  </div>
						   <div class="carousel-cell" auto-play>
						  	<img src="ify/15.jpg">
						  </div>

					</div>

					

	  		</div>
		</div>

			  <!-- Default panel contents -->
	





		<div class="container slide2">
			
			  <div class="panel-heading">
		  	<div class="row">
		  		<h3 class="center-block" style="font-size: 30px; color: white; background-image:linear-gradient(135deg,black,grey); font-style: italic; border-radius:10px; width: 50%; padding:5px 8px;" >Published <span>Announcements</span></h3>
			</div>
		  </div>
		  <table class="table table-bordered" style="font-size: 18px;">
         

      		<thead>
                <tr style="background-color:lightgrey">
                    <th style="color:brown;">News-Id</th>
                         <th style="color:brown;">Announcement</th>
                          
                        
                </tr>
          </thead>

           <?php 

          $sql2 = "SELECT * from news";

      $query2 = mysqli_query($conn, $sql2);
      $counter = 1;
      while ($row = mysqli_fetch_array($query2)) {  ?>


        <tbody >
          <td><?php echo $counter++; ?></td>
          <td><?php echo $row['announcement']; ?></td>
        
        </tbody>

     <?php }
           ?>
		        
		         </tbody> 
		   </table>
		 
	  </div>

			
			</div>
	</div>



	  		<div class="row">
	  			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 column">
		  			<div class="page-header col-lg-offset-1">
		  				<h2>Welcome to our portal</h2>
		  			</div>
	  				We’re excited to offer you a smart and seamless way to manage your library’s books, users, and resources. Our system simplifies everything from cataloging new arrivals to tracking book loans, ensuring a smooth experience for both librarians and users. Whether you're searching for a book, managing overdue returns, or keeping track of your inventory, our platform makes it easier than ever to access and organize knowledge. Dive into a more efficient and user-friendly way to run your library!


	  				<a href="addstudent.php"><p class="slide2"><button class="btn btn-success">Sign Up</button></p></a>
	  			</div>
	  			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 column">
		  			<div class="page-header col-lg-offset-1">
		  				<h2>24/7 Operational Support</h2>
		  			</div>
	  				We’re here to ensure you have continuous, around-the-clock assistance whenever you need it. Our dedicated support team is always available to help resolve any issues, answer your questions, and provide guidance to keep everything running smoothly. Whether it's troubleshooting, technical help, or just a quick query, we're committed to offering reliable support at any time, day or night. Your success is our priority, and we’re here to make sure everything works seamlessly for you!
	  			</div>
	  			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 column">
	  				<div class="page-header col-lg-offset-1">
	  				<h2>Why Us?</h2>
	  			</div>
	  				Choosing the right solution for your library is crucial, and here’s why we stand out. Our Library Management System combines innovation, ease of use, and robust features to deliver a seamless experience for both staff and users. With our 24/7 operational support, a user-friendly interface, and advanced features like real-time tracking, inventory management, and automated book issuing, we ensure your library operates efficiently and effortlessly. Our system is designed with your unique needs in mind, offering unmatched reliability, security, and scalability. Join us and discover why we’re the trusted partner for libraries everywhere!
	  			</div>
	  		</div>
		</div> -->

		<div class="container-fluid slide3" style="background-color: #282828">
			<div class="container">
				<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a href="#" class="thumbnail">
						<img src="ify/16.jpg">
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a href="#" class="thumbnail">
						<img src="ify/17.jpg">
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a href="#" class="thumbnail">
						<img src="ify/13.webp">
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a href="#" class="thumbnail">
						<img src="ify/8.jpeg">
					</a>
				</div>
			</div>
			</div>
			
		</div>
		


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>