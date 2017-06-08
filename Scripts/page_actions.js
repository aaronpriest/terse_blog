/*page_actions.js
*/
$(document).ready(function(){
  $('#Item1').click(function(){
    $('#MainDropDownMenu').slideDown('fast');
  });
  $('#MainDropDownMenu').mouseleave(function(){
    $('#MainDropDownMenu').slideUp('slow');
  });

});
