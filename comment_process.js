/*Attaches Listener to Form Buttons/Fields(future case)*/
function listenToForm(){
	 
	if(!document.forms.userComment.submitComment){alert("Warning: Comments are broken. Error Code 1."); return;}
	
	var commentFormObj=document.forms.userComment.submitComment;
	
	if(commentFormObj.addEventListener){
		commentFormObj.addEventListener("click", getInfo, false);
		}
	
	else if(commentFormObj.attachEvent){
		commentFormObj.attachEvent("onclick", getInfo);
		}
	else return;
	
}
function createRequest(){
if (window.XMLHttpRequest)
	  {//IE7+, Firefox, Chrome, Opera, Safari
	  var resource=new XMLHttpRequest();
	  }
	else
	  {//IE6, IE5
	  var resource=new ActiveXObject("Microsoft.XMLHTTP");
	  }
return resource; 
}
/*Gathers name and message from input fields and calls addComment to post it*/
function getInfo(){
	
	var formObject=document.forms.userComment;
	
	var name=formObject.commentername.value;
	var message=formObject.comment.value;
	
	//Correct and validate entries. Users are allowed to be Anonymous
	if(!name) name="Anonymous";
	if(!message) message="No comment.";
	
	//put this into a variable to clean up code
	var pid=formObject.pid.value;
	
	//add the comment to the server
	addComment(name, message, pid);
	
	//clear the form
	formObject.commentername.value="";
	formObject.comment.value="";
	}

function addComment(name, message, pid){
	var parameters="comment_adder.php?commentername="+name+"&comment="+message+"&pid="+pid;
	
	var resource = createRequest(); 
	
	resource.open("GET",parameters,false);
	resource.send();
	placeComments(pid);
	
}

function placeComments(pid){
	
	if(!document.getElementById("storedComments")) {return;}

	//If the page is the about page or the thanks page turn off comments
	toggleComments();
	
	//this makes a random number to work around the fact that the browser wants to cache the file
	//making it hard to update
	var renewId=Math.round(Math.random()*10000);
	
	commentXML = createRequest(); 
	
	 	//when I open the file I attach the id to make it load a fresh copy
	commentXML.open("GET","comments_xml.php?pid="+pid+"&fid="+renewId,false);
	commentXML.send();
	var commentsList=commentXML.responseXML;
	var commentElements=commentsList.getElementsByTagName("comment");
	//alert(commentsList.getElementsByTagName("comment")[0]);
	//If no one comments this will be a black XML
	if(!commentsList.getElementsByTagName("comment")[0]) return;
	//If there have been comments we'll remove any children first
	var commentContainer=document.getElementById("storedComments");
	while(commentContainer.firstChild){
		oldNodes=commentContainer.firstChild;
		commentContainer.removeChild(oldNodes);
	}
	//This prepares the table to add comments to
		var commentTable=document.createElement("table");
		commentTable.setAttribute("class", "comments");
	for(var i=0; i<commentElements.length; i++){
	//First, I will retrieve the comment information	
		var nameNode=commentElements[i].firstChild;
		var name=nameNode.firstChild.nodeValue;
		
		
		var commentTextNode=nameNode.nextSibling;
		var commentText=commentTextNode.firstChild.nodeValue;
		var commentText=commentTextNode.firstChild.nodeValue;
		
		var dateNode=commentTextNode.nextSibling;
		var date=dateNode.firstChild.nodeValue;
		
		var numNode=dateNode.nextSibling;
		var num=numNode.firstChild.nodeValue;
	//now the html elements used to create the table and its contents
	//rows
		var row=document.createElement("tr");
	//cells	
		var cell=document.createElement("td");
		cell.setAttribute("class", "commentcells");
	//breaks	
		var htmlBR1=document.createElement("br");
		var htmlBR2=document.createElement("br");
		var htmlBR3=document.createElement("br");
	//span to format comment number	
		var cell2=document.createElement("td");
		cell2.setAttribute("class", "commentnum");
		
	//text to fill cells	
		var comment=document.createTextNode(commentText);
		//alert(comment.nodeValue);
		var dateAndName=document.createTextNode("On "+date+", "+name+" said:");
		var commentNumber=document.createTextNode(num);
	//appendages
		cell2.appendChild(commentNumber);
		row.appendChild(cell2);
		cell.appendChild(dateAndName);
		
	
		cell.appendChild(htmlBR1);
		cell.appendChild(htmlBR2);
		cell.appendChild(comment);
		cell.appendChild(htmlBR3);
		
		row.appendChild(cell);		
		
	    commentTable.appendChild(row);
	    commentContainer.appendChild(commentTable);
	    
	}
	

}

function toggleComments(){	
	if(!document.getElementById("comment_toggle"))
	{
		document.getElementById("commentPortion").style.display='';
		return;
	}
}

window.onload=function(){
	
	listenToForm();
			
	var formObject=document.forms.userComment;
	var pid=formObject.pid.value;
	
	placeComments(pid);	
	
	//get the number of posts to display on the top
	
	
	var stats = document.getElementById("stats");
	var post_num = document.createTextNode(document.getElementById("num_posts").value);
	stats.appendChild(post_num );
	
}