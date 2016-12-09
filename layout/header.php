<?php
include $pathToRoot . "classes/mailchimp.php";
$modal = "";
if($_POST['mode'] == 'footer'){
    if(isset($_POST['email']) && $_POST['email'] != '' && !isset($_POST['lname']) && !isset($_POST['fname'])){
        $modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button><h4 class="modal-title" id="myModalLabel">Sign Up Request</h4></div><div class="modal-body"><form method="post" action=""><table><tr><td>First Name:</td><td><input type="text" class="form-control" name="fname"></td></tr><tr><td>Last Name: </td><td><input type="text" name="lname" class="form-control"></td></tr></table><button class="btn btn-default">Submit</button><input type="hidden" name="email" value="' . $_POST['email'] . '"><input type="hidden" name="mode" value="footer"></form></div></div></div></div><script type="text/javascript">$(window).load(function(){$("#myModal").modal("show");});</script>';
    }
    if(isset($_POST['email']) && isset($_POST['lname']) && isset($_POST['fname'])){
        $MailChimp = new MailChimp('ca264afb069101d37691072be81e4ebd-us8');
        $result = $MailChimp->call('lists/subscribe', array(
                        'id'                => 'd08b3e2e69',
                        'email'             => array('email'=>$_POST['email']),
                        'merge_vars'        => array('FNAME'=>$_POST['fname'], 'LNAME'=>$_POST['lname']),
                    ));
        if(!isset($result['email'])){
            $modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button><h4 class="modal-title" id="myModalLabel">Sign Up Request</h4></div><div class="modal-body">Oops! Something went wrong!<br/> Here\'s why: ' . $result['error'] . '</div></div></div></div><script type="text/javascript">$(window).load(function(){$("#myModal").modal("show");});</script>';
        }else{
            $modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button><h4 class="modal-title" id="myModalLabel">Sign Up Request</h4></div><div class="modal-body">Thank you for signing up for our decorating tips!</div></div></div></div><script type="text/javascript">$(window).load(function(){$("#myModal").modal("show");});</script>';
        }
    }
}elseif($_POST['mode'] == 'contactform'){
    require_once "classes/recaptcha.php";
    $secret = "6LcePAATAAAAABjXaTsy7gwcbnbaF5XgJKwjSNwT";
    $response = null;
    $reCaptcha = new ReCaptcha($secret);
    if ($_POST["g-recaptcha-response"]) {
        $response = $reCaptcha->verifyResponse(
            $_SERVER["REMOTE_ADDR"],
            $_POST["g-recaptcha-response"]
        );
    }
     if ($response != null && $response->success) {
         //send email
         echo "CAPTCHA WORKED";
     }else{
         print_r($response);
         echo "CAPTCHA FAILED";
     }
}
?>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta property="og:title" content="">
        <meta property="og:site_name" content="">
        <meta property="og:url" content="">
        <meta property="og:description" content="">
        <meta property="og:image" content="">
        <meta name="description" content=''>
        <meta name="google-site-verification" content="RoiV9RLoYiiowCk23d9MzIweM-fCkm2IdZjLf0rofTw" />
        <link rel="stylesheet" type="text/css" href="<?php echo $pathToRoot; ?>css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $pathToRoot; ?>css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $pathToRoot; ?>css/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $pathToRoot; ?>css/jquery-ui.structure.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $pathToRoot; ?>css/jquery-ui.theme.min.css">
        <link rel="shortcut icon" href="">
        <script src="<?php echo $pathToRoot; ?>js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo $pathToRoot; ?>js/bootstrap.min.js"></script>
        <script src="<?php echo $pathToRoot; ?>js/jquery.lazyload.min.js"></script>
        <script src="<?php echo $pathToRoot; ?>js/menu-text.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Josefin+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo $pathToRoot; ?>css/style.css">
        <link rel="shortcut icon" href="<?php echo $pathToRoot; ?>images/favicon.ico">
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-53072635-2', 'auto');
            ga('send', 'pageview');

      </script>
        <div class="hidden-lg hidden-md hidden-sm navbar">
          <div class="container">
            <div class='hidden-lg hidden-md hidden-sm col-xs-12'>
              <div class="navbar-header" id='mobile-header'>
                <button type="button" id='mobile-btn' class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <h3 id='menu-text' class='text-center bump-up'>Menu</h3>
                  <p class='text-right bump-up'><span id='remove' ></span></p>
                </button>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <div class="hidden-lg hidden-md hidden-sm col-xs-12" id='smallNavHolder'>
                    <ul id='smallNav' class='nav'>
                        <li class="nav-header">Education Services</li>
                        <li role="presentation" class='small-item'><a href="<?php echo $pathToRoot; ?>redesign-staging-training-philadelphia.htm">5-Day Interior Redesign and Staging Program</a></li>
                        <li role="presentation" class='small-item'><a href="<?php echo $pathToRoot; ?>interior-redesign-training-philadelphia.html">3-Day Interior Redesign Program</a></li>
                        <hr />
                        <li class="nav-header">Design Services</li>
                        <li role="presentation" class='small-item'><a href="<?php echo $pathToRoot; ?>interior-redesign-west-chester-pa.htm">Home Redesign</a></li>
                        <li role="presentation" class='small-item'><a href="<?php echo $pathToRoot; ?>home-staging-pa.htm">Home Staging</a></li>
                        <li role="presentation" class='small-item'><a href="<?php echo $pathToRoot; ?>paint-color.htm">Color Consultation</a></li>
                        <hr />
                        <li role="presentation" class='small-item'><a href="<?php echo $pathToRoot; ?>about-debbie-correale.htm">About</a></li>
                        <li role="presentation" class='small-item'><a href="<?php echo $pathToRoot; ?>testimonials.php">Testimonials</a></li>
                        <li role="presentation" class='small-item'><a href="<?php echo $pathToRoot; ?>staging-portfolio.htm">Gallery</a></li>
                        <li role="presentation" class='small-item'><a href="<?php echo $pathToRoot; ?>contact-redesign-right-philadelphia-pa.htm">Contact</a></li>
                        <li role="presentation" class='small-item'><a href="<?php echo $pathToRoot; ?>wordpress">Blog</a></li>
                        <hr />
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class='container'>
            <?php echo $modal; ?>
            <div class="row headlineImage hidden-xs vertical-align">
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <a href="<?php echo $pathToRoot;?>index.php"><img class="img-responsive headlineImage" src="<?php echo $pathToRoot;?>images/logo.png"></a>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 rightHead text-center">
                    <div class="row" id="socialBar">
                        <div class="col-lg-3 col-xs-3">
                            <div class='row'>
                                <div class='col-lg-6 col-xs-6'>
                                    <a href =' https://www.instagram.com/redesignright/' target='_blank'><img class="img-responsive" src="<?php echo $pathToRoot; ?>images/instagram.png"></a>
                                </div>
                                <div class='col-lg-6 col-xs-6'>
                                    <a href ='http://www.facebook.com/RedesignRight' target='_blank'><img class="img-responsive" src="<?php echo $pathToRoot; ?>images/facebook.png"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3">
                            <div class='row'>
                                <div class='col-lg-6 col-xs-6'>
                                    <a href ='https://twitter.com/RedesignRight' target='_blank'><img class="img-responsive" src="<?php echo $pathToRoot; ?>images/twitter.png"></a>
                                </div>
                                <div class='col-lg-6 col-xs-6'>
                                    <a href ='https://plus.google.com/115797647665719346090' target='_blank'><img class="img-responsive" src="<?php echo $pathToRoot; ?>images/gplus.png"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3">
                            <div class='row'>
                                <div class='col-lg-6 col-xs-6'>
                                    <a href ='http://pinterest.com/redesignright/' target='_blank'><img class="img-responsive" src="<?php echo $pathToRoot; ?>images/pin.png"></a>
                                </div>
                                <div class='col-lg-6 col-xs-6'>
                                    <a href ='<?php echo $pathToRoot;?>videos.php'><img class="img-responsive" src="<?php echo $pathToRoot; ?>images/video.png"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3">
                            <div class='row'>
                                <div class='col-lg-6 col-xs-6'>
                                    <a href ='http://www.linkedin.com/pub/debbie-correale/b/481/804' target='_blank'><img class="img-responsive" src="<?php echo $pathToRoot; ?>images/linkedin.png"></a>
                                </div>
                                <div class='col-lg-6 col-xs-6'>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row banner-text">
                      <div class="col-md-12 hidden-sm hidden-xs">
                        <h1>Artfully enhance your home, with what you already own!</h1>
                      </div>
                      <div class="hidden-lg hidden-md col-sm-12 hidden-xs">
                        <h2>Artfully enhance your home, with what you already own!</h2>
                      </div>
                    </div>
                    <div class="row" id="contactInfo">
                        <div class="col-lg-4 col-xs-4 contactInfo shrink-text-sm">
                            <a href='tel:+1-610-955-8202'>610.955.8202</a>
                        </div>
                         <div class="col-lg-4 col-xs-4 contactInfo">
                            <a href ='http://www.houzz.com/pro/debbiecorreale/redesign-right-llc' target='_blank'><img class="img-responsive logo" src="<?php echo $pathToRoot; ?>images/houzz.png"></a>
                        </div>
                        <div class="col-lg-4 col-xs-4 contactInfo shrink-text-sm text-wrap">
                            <a onclick="window.location='mailto:debbie@redesignright.com'; return false;"  href='#'>debbie@redesignright.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row headlineImage hidden-lg hidden-md hidden-sm">
                <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs">
                    <a href="<?php echo $pathToRoot;?>index.php"><img class="img-responsive" src="<?php echo $pathToRoot;?>images/logo.png"></a>
                </div>
                <div class="hidden-lg hidden-md hidden-sm col-xs-12">
                    <a href="<?php echo $pathToRoot;?>index.php"><img class="img-responsive logo" src="<?php echo $pathToRoot;?>images/logo.png" style="width: 150px; height: auto;"></a>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 rightHead">
                    <div class="row" id="contactInfo">
                        <div class="col-lg-4 col-xs-12 text-center">
                            <a href='tel:+1-610-955-8202'>610.955.8202</a>
                        </div>
                        <div class="col-lg-4 col-xs-12 text-center">
                            <a onclick="window.location='mailto:debbie@redesignright.com'; return false;"  href='#'>debbie@redesignright.com</a>
                        </div>
                        <div class="col-lg-4 col-xs-12 contactInfo">
                            <a href ='http://www.houzz.com/pro/debbiecorreale/redesign-right-llc' target='_blank'><img class="img-responsive logo" src="<?php echo $pathToRoot; ?>images/houzz.png"></a>
                        </div>
                    </div>
                </div>
            </div>
          </div>

          <div class='xs-prevent-overlap'>
            <div class='hidden-xs'>
              <div class="navbar">
                <div class="container">
                  <div id="navbar" class="navbar-collapse collapse">
                    <div class="col-lg-12 hidden-xs mainNav">
                      <ul class="nav nav-pills nav-justified" id="bigNav">
                        <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $pathToRoot; ?>services.php#education" role="button" aria-expanded="false">
                                Education Services <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation"><a href="<?php echo $pathToRoot; ?>redesign-staging-training-philadelphia.htm">5-Day Interior Redesign and Staging Program</a></li>
                                <li role="presentation"><a href="<?php echo $pathToRoot; ?>interior-redesign-training-philadelphia.html">3-Day Interior Redesign Program</a></li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $pathToRoot; ?>services.php#design" role="button" aria-expanded="false">
                                Design Services <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation"><a href="<?php echo $pathToRoot; ?>interior-redesign-west-chester-pa.htm">Home Redesign</a></li>
                                <li role="presentation"><a href="<?php echo $pathToRoot; ?>home-staging-pa.htm">Home Staging</a></li>
                                <li role="presentation"><a href="<?php echo $pathToRoot; ?>paint-color.htm">Color Consultation</a></li>
                            </ul>
                        </li>
                        <li role="presentation" class="row-align"><a href="<?php echo $pathToRoot; ?>about-debbie-correale.htm">About</a></li>
                        <li role="presentation" class="row-align"><a href="<?php echo $pathToRoot; ?>testimonials.php">Testimonials</a></li>
                        <li role="presentation" class="row-align"><a href="<?php echo $pathToRoot; ?>staging-portfolio.htm">Gallery</a></li>
                        <li role="presentation" class="row-align"><a href="<?php echo $pathToRoot; ?>contact-redesign-right-philadelphia-pa.htm">Contact</a></li>
                        <li role="presentation" class="row-align"><a href="<?php echo $pathToRoot; ?>wordpress">Blog</a></li>
                      </ul>
                    </div>
                    <div class="hidden-lg hidden-md hidden-sm col-xs-12" id='smallNavHolder'>
                        <ul id='smallNav' class='nav'>
                            <li class="nav-header">Education Services</li>
                            <li role="presentation" class='small-item'><a href="<?php echo $pathToRoot; ?>redesign-staging-training-philadelphia.htm">5-Day Interior Redesign and Staging Program</a></li>
                            <li role="presentation" class='small-item'><a href="<?php echo $pathToRoot; ?>interior-redesign-training-philadelphia.html">3-Day Interior Redesign Program</a></li>
                            <hr />
                            <li class="nav-header">Design Services</li>
                            <li role="presentation" class='small-item'><a href="<?php echo $pathToRoot; ?>interior-redesign-west-chester-pa.htm">Home Redesign</a></li>
                            <li role="presentation" class='small-item'><a href="<?php echo $pathToRoot; ?>home-staging-pa.htm">Home Staging</a></li>
                            <li role="presentation" class='small-item'><a href="<?php echo $pathToRoot; ?>paint-color.htm">Color Consultation</a></li>
                            <hr />
                            <li role="presentation"><a href="<?php echo $pathToRoot; ?>about-debbie-correale.htm">About</a></li>
                            <li role="presentation"><a href="<?php echo $pathToRoot; ?>testimonials.php">Testimonials</a></li>
                            <li role="presentation"><a href="<?php echo $pathToRoot; ?>staging-portfolio.htm">Gallery</a></li>
                            <li role="presentation"><a href="<?php echo $pathToRoot; ?>contact-redesign-right-philadelphia-pa.htm">Contact</a></li>
                            <li role="presentation"><a href="<?php echo $pathToRoot; ?>wordpress">Blog</a></li>
                            <hr />
                        </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
