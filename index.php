<?php

$pathToRoot = "";
$title = "Redesign Right";
include 'layout/header.php';
?>
<div class="row slideshow badgeRow">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 xs-small-buffer">
        <div class="carousel slide" data-ride="carousel" id="mainShow">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img class='show-image img-rounded' src='images/slide1.jpg' alt='Room 1'>
                </div>
                <div class="item">
                    <img class='show-image img-rounded' src='images/slide2.jpg' alt='Room 2'>
                </div>
                <div class="item">
                    <img class='show-image img-rounded' src='images/slide3.jpg' alt='Room 3'>
                </div>
                <div class="item">
                    <img class='show-image img-rounded' src='images/slide4.jpg' alt='Room 4'>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row midRow vertical-align">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h2><strong>Our Mission:</strong></h2>
        <div class="row vertical-align">
            <div class="col-lg-3 col-md-3 col-sm-3  hidden-xs">
                <img class="img-circle img-responsive" src="images/debbie.jpg">
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <p>Redesign Right specializes in Interior Decorating, Redesign, Home Staging and is a Premier Color Consultant. We take care of all your interior redesign or real estate staging needs with the goal of starting with what you already own!</p>
                <p>As a ten-time award winning interior designer and home stager, Debbie Correale is a leader in the industry! Whether your goal is to decorate and redesign your home affordably with what you own or sell your home quickly at top dollar. Debbie is the go-to professional to help you realize your dreams!</p>
                <p>Redesign Right is currently serving Chester and Delaware counties in Pennsylvania and select areas in Delaware. <a href="about-debbie-correale.htm">Learn more.</a></p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="row bottom-pad text-center">
            <h2><strong>Video Directory: </strong> <small>(Click play to browse)</small></h2>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <a href="videos.php"><img src="images/video.png" class="img img-responsive img-center"></a>
            </div>
        </div>
        <div class="row text-center top-pad">
            <h3>Sign Up for our Decorating Tips:</h3>
          <form method='post' action=''>
              <input type="hidden" name="mode" value="footer">
              <div class='input-group'><span class='input-group-addon'><span class='glyphicon glyphicon-envelope'></span></span><input type='text' class='form-control' placeholder='Enter Email Address' name='email'><span class='input-group-btn'><button class='btn btn-default'>Go!</button></span></div>
              <a class='small-link' target='_blank' href='https://redesignright.us8.list-manage.com/unsubscribe?u=25e4e3d6346952b833afcdc65&id=d08b3e2e69'>Unsubscribe</a>
          </form>
        </div>
    </div>
</div>

<script src="js/index.js"></script>
<?php
include 'layout/footer.php';
