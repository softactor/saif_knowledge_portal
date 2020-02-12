<?php
session_start();
date_default_timezone_set('Asia/Dhaka');
if (!isset($_SESSION['logged']['status'])) {
    header("location: index.php");
    exit();
} 
include 'admin/connection/connect.php';
include './admin/helper/utilities.php';
$link = $_SERVER['PHP_SELF'];
$link_array = explode('/',$link);
$page = end($link_array);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="ScriptsBundle">
        <title>Knowledge Portal</title>
        <!-- =-=-=-=-=-=-= Favicons Icon =-=-=-=-=-=-= -->
        <link rel="shortcut icon" type="image/x-icon" href="admin/images/icon/port.png" />
        <!-- =-=-=-=-=-=-= Mobile Specific =-=-=-=-=-=-= -->
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <!-- =-=-=-=-=-=-= Bootstrap CSS Style =-=-=-=-=-=-= -->
        
        <!-------------------------------------Datatables----->
        <link rel="stylesheet" href="frontend/css/bootstrap.min.css">
        <link rel="stylesheet" href="frontend/css/dataTables.bootstrap.min.css">
        <!--<link rel="stylesheet" href="frontend/css/dataTable.custom.css">-->
        <!-------------------------------------Datatables----->
        
        <!-- =-=-=-=-=-=-= Template CSS Style =-=-=-=-=-=-= -->
        <link rel="stylesheet" href="frontend/css/style.css">
        <!-- =-=-=-=-=-=-= Font Awesome =-=-=-=-=-=-= -->
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
        <!-- =-=-=-=-=-=-= Et Line Fonts =-=-=-=-=-=-= -->
        <link rel="stylesheet" href="frontend/css/et-line-fonts.css">
        <!-- =-=-=-=-=-=-= Owl carousel =-=-=-=-=-=-= -->
        <link rel="stylesheet" type="text/css" href="frontend/css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="frontend/css/owl.style.css">
        <link rel="stylesheet" type="text/css" href="frontend/css/site_custom_style.css">
        <link rel="stylesheet" type="text/css" href="frontend/css/custom_table_style.css">
        <!-- =-=-=-=-=-=-= Google Fonts =-=-=-=-=-=-= -->
        <!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css">-->
        <!-- =-=-=-=-=-=-= Highliter Css =-=-=-=-=-=-= -->
        <link type="text/css" rel="stylesheet" href="frontend/css/styles/shCoreDefault.css" />
        <!-- =-=-=-=-=-=-= Hover Dropdown =-=-=-=-=-=-= -->
        <link type="text/css" rel="stylesheet" href="frontend/css/bootstrap-dropdownhover.min.css" />
        <!-- JavaScripts -->
        <script src="frontend/js/modernizr.js"></script>
        <link rel="stylesheet" href="admin/css/sweetalert.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="frontend/http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="frontend/http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
              <![endif]-->
    </head>

    <body>
        <!-- =-=-=-=-=-=-= HEADER Navigation =-=-=-=-=-=-= -->
        <div class="navbar navbar-default custom-navbar-style">
            <div class="container">
                <!-- header -->
                <div class="navbar-header">
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- logo -->
                    <a href="faq.php" class="navbar-brand">
                        <img class="img-responsive" alt="" src="frontend/images/logo.png">
                    </a>
                    <!-- header end -->
                </div>
                <!-- navigation menu -->
                <div class="navbar-collapse collapse">
                    <!-- right bar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li><div class="btn-nav"><a href="faq.php" class="btn btn-primary btn-small navbar-btn<?php if($page == 'faq.php'){ echo ' active-menu'; } ?>">FAQ</a></div></li>
                        <li><div class="btn-nav"><a href="product.php" class="btn btn-primary btn-small navbar-btn<?php if($page == 'product.php'){ echo ' active-menu'; } ?>">PRODUCTS</a></div></li>
                        <li><div class="btn-nav"><a href="showroom.php" class="btn btn-primary btn-small navbar-btn<?php if($page == 'showroom.php'){ echo ' active-menu'; } ?>">SHOWROOMS</a></div></li>
                        <li><div class="btn-nav"><a href="admin/function/frontend_logout.php" class="btn btn-danger btn-small navbar-btn">LOGOUT</a></div></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- HEADER Navigation End -->
        <!-- =-=-=-=-=-=-= Search Bar =-=-=-=-=-=-= -->
<!--        <div class="full-section search-section-listing">
            <div class="search-area container">
                <form autocomplete="off" method="get" class="search-form clearfix" id="search-form">
                    <input type="text" title="* Please enter a search term!" placeholder="Type your search terms here" class="search-term " autocomplete="off">
                    <input type="submit" value="Search" class="search-btn">
                </form>
            </div>
        </div>-->
        <!-- =-=-=-=-=-=-= Search Bar END =-=-=-=-=-=-= -->