/*page_actions.js
*/
$(document).ready(function(){
  if($(window).width() < 1000){
    $('#res-based-container').css("width", "100%");
    $('#res-based-container').css("margin-left", "0%");
    $('#res-based-container').css("box-shadow", "none");
  }
  $('#Item1').click(function(){
    $('#MainDropDownMenu').slideDown('fast');
  });
  $('#MainDropDownMenu').mouseleave(function(){
    $('#MainDropDownMenu').slideUp('slow');
  });

});
