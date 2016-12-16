$(document).ready(function() {
    $('#mainShow').carousel({
        interval: 2500
    });
    $('.carousel').carousel('next');
    $('#heightMatcher').height($('#heightMatchee').height());
    
});