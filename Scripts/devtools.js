/* Dev Tools
Functions for help with development
*/
function markAllBorders(){

    var colors = ["Crimson","DarkBlue","DarkGreen","BlueViolet","DeepPink","Green","MediumSlateBlue","Tomato","Navy","OliveDrab","Purple","SeaGreen","MediumVioletRed"];
var divs = document.getElementsByTagName("article");
var j = 0; //see note within the for
    for(i=0; i<divs.length; i++){

        if(j>colors.length-1) j=i-j;
        //we want i and j to be the same as long as there
        //are not more divs than colors, but when colors run
        //out we want to set the index for colors back to 0
        //and continue through the array.

        divs[i].style.border="1px  dotted "+colors[j];
        j++;
    }
}
//<input type="button" name="ShowBorders" value="See Borders" onclick="markAllBorders()"/>
