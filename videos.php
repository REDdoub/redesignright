<?php
$pathToRoot = "";
$title = "Video Directory";
include 'layout/header.php';
?>
<div class="row">
    <div class="col-xs-12 text-center">
        <h1><span class="glyphicon glyphicon-play"></span> Video Directory</h1>
    </div>
</div>
<div class="row">
    <!--<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="thumbnail">
            <a href='videos_training.php#video'><img src="images/videos/5daytrainingvid.jpg"></a>
            <div class="caption">
                <h3 class="video-title">Redesign and Staging Training</h3>
                <p>Learn more about Redesign Right's education services!</p>
                <p><a href='videos_training.php#video'><button class='btn btn-red'><span class='glyphicon glyphicon-play'></span> Watch</button></a></p>
            </div>
        </div>
    </div>-->
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="thumbnail">
            <a href='videos_redesign.php#video'><img src="images/videos/int.jpg"></a>
            <div class="caption">
                <h3 class="video-title">Interior Redesign Services</h3>
                <p>Watch to find out more about Redesign Right's amazing interior redesign services!</p>
                <p><a href='videos_redesign.php#video'><button class='btn btn-red'><span class='glyphicon glyphicon-play'></span> Watch</button></a></p>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="thumbnail">
            <a href='videos_staging.php#video'><img src="images/videos/staging.jpg"></a>
            <div class="caption">
                <h3 class="video-title">Home Staging Services</h3>
                <p>Discover how Redesign Right can help you prepare your home for sale!</p>
                <p><a href='videos_staging.php#video'><button class='btn btn-red'><span class='glyphicon glyphicon-play'></span> Watch</button></a></p>
            </div>
        </div>
    </div>
</div>
<?php
include 'layout/footer.php';
