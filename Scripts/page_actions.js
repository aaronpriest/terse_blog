/*page_actions.js
*/
$(document).ready(function(){
  if($(window).width()< 1024){
    $('#overlay').css("width", "100%");
    $('#overlay').css("margin-left", "0%");
    $('#overlay').css("box-shadow", "none");
  }
  $('#Item1').click(function(){
    $('#MainDropDownMenu').slideDown('fast');
  });
  $('#MainDropDownMenu').mouseleave(function(){
    $('#MainDropDownMenu').slideUp('slow');
  });

});
