//$("img.lazy").lazyload({
    //failure_limit : 100
//});

$(document).ready(function(){
    $(".galleryImage").on('click touch', loadMod);
});

function loadMod(){
    var path = $(this).data('path');
    console.log(path);
    $('#imageView').attr('src', "images/gallery/" + path);
    $('#largeImg').modal('show');
}
