 <!doctype html>
 <head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Microfinance Online</title>

    <!-- Bootstrap core CSS -->
 

    <!-- Custom styles for this template -->
    
 <link href="../css/css.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="../js/jquery.js"></script>
	</head>
    <body>
        <div class="wrapper">
            
        <div class="header">
		
            <img src="../img/h-img.jpg" width="100%" height="120px" />
            </div>
            <div class="navbar">
                
            <ul>
            <li><a href="../index.php">Home </a></li>
            <li><a href="../properties/properties.php">Buy Properties </a></li>
                     <li><a href="../loan/loan.php">Get a Micro loan </a></li>
           <?php if(isset($_SESSION['customer_login'])):?>

		   <li><a href="../customer/customer_account_summary.php">Profile</a></li>
<?php endif; ?>
            <li id="last"><a href="../contact/contact.php">Contact Us</a></li>
            </ul>
            </div>
                      