//$("img.lazy").lazyload({
    //failure_limit : 100
//});

$(document).ready(function(){
    $(".galleryImage").click(loadMod);
});

function loadMod(){
    var $path = $(this).data('path');
    $('#imageView').attr('src', "image/gallery/". $path);
    $('#largeImg').modal('show');
}
