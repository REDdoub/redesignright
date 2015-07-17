$(document).ready(function(){

  $('#mobile-header').on('click', '#mobile-btn', function(event){

    var menuText = $('#menu-text').html();

    if(menuText == "Menu"){
      $('#menu-text').empty();
      $('#remove').addClass('glyphicon glyphicon-remove');
    }else if (menuText == "") {
        $('#remove').removeClass('glyphicon glyphicon-remove');
        $('#menu-text').html('Menu');
    }

  });

});
