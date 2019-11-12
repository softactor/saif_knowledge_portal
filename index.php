
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="ScriptsBundle">
        <title>Knowledge Q&A Dashboard Template</title>
        <!-- =-=-=-=-=-=-= Favicons Icon =-=-=-=-=-=-= -->
        <link rel="icon" href="frontend/images/favicon.ico" type="image/x-icon" />
        <!-- =-=-=-=-=-=-= Mobile Specific =-=-=-=-=-=-= -->
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <!-- =-=-=-=-=-=-= Bootstrap CSS Style =-=-=-=-=-=-= -->
        <link rel="stylesheet" href="frontend/css/bootstrap.css">
        <!-- =-=-=-=-=-=-= Template CSS Style =-=-=-=-=-=-= -->
        <link rel="stylesheet" href="frontend/css/style.css">
        <!-- =-=-=-=-=-=-= Font Awesome =-=-=-=-=-=-= -->
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
        <!-- =-=-=-=-=-=-= Et Line Fonts =-=-=-=-=-=-= -->
        <link rel="stylesheet" href="frontend/css/et-line-fonts.css">
        <!-- =-=-=-=-=-=-= Owl carousel =-=-=-=-=-=-= -->
        <link rel="stylesheet" type="text/css" href="frontend/css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="frontend/css/owl.style.css">
        <!-- =-=-=-=-=-=-= Google Fonts =-=-=-=-=-=-= -->
        <!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css">-->
        <!-- =-=-=-=-=-=-= Highliter Css =-=-=-=-=-=-= -->
        <link type="text/css" rel="stylesheet" href="frontend/css/styles/shCoreDefault.css" />
        <!-- =-=-=-=-=-=-= Hover Dropdown =-=-=-=-=-=-= -->
        <link type="text/css" rel="stylesheet" href="frontend/css/bootstrap-dropdownhover.min.css" />
        <!-- JavaScripts -->
        <script src="frontend/js/modernizr.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="frontend/http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="frontend/http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
              <![endif]-->
    </head>

    <body>

        <!-- =-=-=-=-=-=-= HEADER =-=-=-=-=-=-= -->
        <!-- <div class="top-bar">
              <div class="container">
                      <div class="row">
                              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-4">
                                      
                              </div>
                              <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                                      <ul class="top-nav nav-right">
                                              <li><a href="frontend/index.html">Home</a>
                                              </li>
                                              <li class="hidden-xs"><a href="frontend/blog.html">Blog</a>
                                              </li>
                                              <li  class="hidden-xs"><a href="frontend/contact.html">Contact Us</a>
                                              </li>
                                      </ul>
                              </div>
                      </div>
              </div>
      </div> -->
        <!-- =-=-=-=-=-=-= HEADER Navigation =-=-=-=-=-=-= -->
        <div class="navbar navbar-default">
            <div class="container">
                <!-- header -->
                <div class="navbar-header">
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- logo -->
                    <a href="frontend/index.html" class="navbar-brand"><img class="img-responsive" alt="" src="frontend/images/logo.png">
                    </a>
                    <!-- header end -->
                </div>
                <!-- navigation menu -->
                <div class="navbar-collapse collapse">
                    <!-- right bar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li class="dropdown"> <a class="dropdown-toggle " data-hover="dropdown" data-toggle="dropdown" data-animations="fadeInUp">Dropdown Menu <b class="caret"></b></a>
                          <ul class="dropdown-menu">
                            <li><a href="frontend/#">Item-01 </a></li>
                            <li><a href="frontend/#">Item-02</a></li>
                          </ul>
                        </li> -->
                        <li><div class="btn-nav"><a href="frontend/#" class="btn btn-primary btn-small navbar-btn">PRODUCTS</a></div></li>
                        <li><div class="btn-nav"><a href="frontend/#" class="btn btn-primary btn-small navbar-btn">SHOWROOMS</a></div></li>
                        <li><div class="btn-nav"><a href="frontend/#" class="btn btn-primary btn-small navbar-btn">FAQ</a></div></li>
                    </ul>
                </div>
                <!-- navigation menu end -->
                <!--/.navbar-collapse -->
            </div>
        </div>
        <!-- HEADER Navigation End -->
        <!-- =-=-=-=-=-=-= Search Bar =-=-=-=-=-=-= -->
        <div class="full-section search-section-listing">
            <div class="search-area container">
                <form autocomplete="off" method="get" class="search-form clearfix" id="search-form">
                    <input type="text" title="* Please enter a search term!" placeholder="Type your search terms here" class="search-term " autocomplete="off">
                    <input type="submit" value="Search" class="search-btn">
                </form>
            </div>
        </div>
        <!-- =-=-=-=-=-=-= Search Bar END =-=-=-=-=-=-= -->
        <!-- =-=-=-=-=-=-= Main Area =-=-=-=-=-=-= -->
        <div class="main-content-area">
            <!-- =-=-=-=-=-=-= Page Breadcrumb =-=-=-=-=-=-= -->
            <section class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                            <h1>All Questions</h1>
                        </div>
                        <!-- end col -->
                        <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                            <div class="bread">
                                <ol class="breadcrumb">
                                    <li><a href="frontend/#">Home</a></li>
                                    <li class="active">Listing</li>
                                </ol>
                            </div>
                            <!-- end bread -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </section>
            <!-- =-=-=-=-=-=-= Page Breadcrumb End =-=-=-=-=-=-= -->
            <!-- =-=-=-=-=-=-= Latest Questions  =-=-=-=-=-=-= -->
            <section class="section-padding-80 white" id="questions">
                <div class="container">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="listing">
                                <!-- Question Area Panel -->
                                <div class="listing-area">

                                    <!-- Question Listing -->
                                    <div class="listing-grid ">
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                                                <a data-toggle="tooltip" data-placement="bottom" data-original-title="Martina Jaz" href="frontend/#"><img alt="" class="correct img-responsive center-block" src="frontend/images/faq.png">
                                                </a>
                                            </div>
                                            <div class="col-md-7 col-sm-8  col-xs-12">
                                                <h3><a  href="frontend/#"> 	
                                                        Question title will come here</a></h3>
                                                <div class="listing-meta">
                                                    <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>

                                                </div>

                                            </div>
                                            <div class="col-md-10 col-sm-10  col-xs-12">
                                                <p>Question answer details will come here</p>
                                                <div class="pull-right tagcloud">
                                                    <a href="frontend/">tag 1</a>
                                                    <a href="frontend/">tag 2</a>
                                                    <a href="frontend/">tag 3</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Question Listing End -->

                                    <!-- Pagination View More -->
                                    <div class="text-center clearfix">
                                        <!--- <ul class="pagination ">
                                          <li>
                                            <a aria-label="Previous" href="frontend/#"> <span aria-hidden="true">&lt;</span> </a>
                                          </li>
                                          <li><a href="frontend/#">1</a>
                                          </li>
                                          <li class="active"><a href="frontend/#">2</a>
                                          </li>
                                          <li><a href="frontend/#">3</a>
                                          </li>
                                          <li>
                                            <a aria-label="Next" href="frontend/#"> <span aria-hidden="true">&gt;</span> </a>
                                          </li>
                                        </ul> -->
                                    </div>
                                    <!-- Pagination View More End -->

                                </div>

                                <!-- Question Area Panel End -->
                            </div>
                        </div>                        
                    </div>
                    <!-- Row End -->
                </div>
                <!-- end container -->
            </section>
            <!-- =-=-=-=-=-=-= Latest Questions  End =-=-=-=-=-=-= -->
        </div>
        <!-- =-=-=-=-=-=-= Main Area End =-=-=-=-=-=-= -->
        <!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
        <footer class="footer-area">
            <!--Footer-->
            <div class="footer-copyright">
                <div class="auto-container clearfix">
                    <!--Copyright-->
                    <div class="copyright text-center">Copyright 2019 &copy; Developed By <a target="_blank" href="frontend/#">Saif Powertec Ltd-IT Division</a> All Rights Reserved</div>
                </div>
            </div>
        </footer>
        <!-- =-=-=-=-=-=-= JQUERY =-=-=-=-=-=-= -->
        <script src="frontend/js/jquery.min.js"></script>
        <!-- Bootstrap Core Css  -->
        <script src="frontend/js/bootstrap.min.js"></script>
        <!-- Jquery Smooth Scroll  -->
        <script src="frontend/js/jquery.smoothscroll.js"></script>
        <!-- Jquery Easing -->
        <script type="text/javascript" src="frontend/js/easing.js"></script>
        <!-- Jquery Counter -->
        <script src="frontend/js/jquery.countTo.js"></script>
        <!-- Jquery Waypoints -->
        <script src="frontend/js/jquery.waypoints.js"></script>
        <!-- Jquery Appear Plugin -->
        <script src="frontend/js/jquery.appear.min.js"></script>
        <!-- Carousel Slider  -->
        <script src="frontend/js/carousel.min.js"></script>
        <!-- Jquery Parallex -->
        <script src="frontend/js/jquery.stellar.min.js"></script>
        <!--Style Switcher -->
        <script src="frontend/js/bootstrap-dropdownhover.min.js"></script>
        <!-- Include jQuery Syntax Highlighter -->
        <script type="text/javascript" src="frontend/scripts/shCore.js"></script>
        <script type="text/javascript" src="frontend/scripts/shBrushPhp.js"></script>
        <!-- Template Core JS -->
        <script src="frontend/js/custom.js"></script>
    </body>

</html>