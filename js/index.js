$(document).ready(function() {
    $('#mainShow').carousel({
        interval: 5000
    });
    $('.carousel').carousel('next');
    $('#heightMatcher').height($('#heightMatchee').height());
    
});