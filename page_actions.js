/*page_actions.js
*/
/*** Manage Dropdown
https://www.w3schools.com/howto/howto_js_dropdown.asp -- but of course I made it my own*/
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function showMenu() {
    document.getElementById("Item1").classList.add("moused_over");
    document.getElementById("MainDropDownMenu").classList.toggle("show");
}
// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.menu_item')) {
document.getElementById("Item1").classList.remove("moused_over");
    var dropdowns = document.getElementsByClassName("dropdown_guts");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
