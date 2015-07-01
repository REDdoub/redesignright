//$("img.lazy").lazyload({
    //failure_limit : 100
//});

function loadMod($path){
    $('#imageView').attr('src', $path);
    $('#largeImg').modal('show');
}
