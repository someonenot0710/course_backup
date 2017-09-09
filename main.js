/*
function init(){
	console.log("in init");
          $.ajax({
            url:"MessageBoard.php", //the page containing php script
            type: "POST", //request type,
            datatype: 'json',
	    data: {registration: "lecture"},
            success:function(result){
		console.log(result);
		rank_id(result);
           }
    })
}

*/

function init(){
             console.log("init");
	   $.ajax({
            url:"MessageBoard.php", //the page containing php script
            type: "POST", //request type,
            datatype: 'json',
           data: {registration: "sylla"},
            success:function(result){
             console.log(result);
               // show(result);
		rank_id(result);
           }
    })

}

/*
function getMessage () {
	
	var student_poi = document.getElementById('name');
	var datas_poi = document.getElementById('content');
	var student = student_poi.value;
	var datas = datas_poi.value;
	student_poi.value="";
	datas_poi.value="";	
	console.log(student+"  "+datas);	
          $.ajax({
            url:"MessageBoard.php", //the page containing php script
            type: "POST", //request type,
            datatype: 'json',
           data: {registration: "success", student_id: student, contents: datas},
            success:function(result){
		rank_thumb(result);
           }
    })
}
*/


function show(result){
var board = document.querySelector("#board");
var list = document.getElementsByClassName('one');
//console.log(result[0]);
for(var i = list.length - 1; 0 <= i; i--)
 if(list[i] && list[i].parentElement)
 list[i].parentElement.removeChild(list[i]);


for (i=0;i<result.length;i++){
	image = document.createElement("img");
	para = document.createElement("div");
	person = document.createElement("h1");
	dates = document.createElement("p");
	about = document.createElement("p");
	links = document.createElement("a");
	person_con = document.createTextNode(result[i]['lecturer']);
	dates_con = document.createTextNode(result[i]['date']);
	about_con = document.createTextNode(result[i]['syllabus']);		
	links_con = document.createTextNode("發問區");
	image.src = result[i]['img'];
	person.appendChild(person_con);
	dates.appendChild(dates_con);
	about.appendChild(about_con);
	links.appendChild(links_con);
	console.log(curUser);
	if(curUser!=null){
	    links.href = result[i]['link'];
	}else{
            links.setAttribute( "onClick", "alert('Please login.')");
        }
	person.className+= 'main';
	dates.className+= 'date';
	about.className+= 'content';
	links.className+= 'link';
	para.appendChild(image);
	para.appendChild(person);
	para.appendChild(about);
	para.appendChild(dates);
	para.appendChild(links);
	para.className+= 'one';	
	board.appendChild(para);
	console.log(result[i]['link']);
}

}
function rank_id(result){

result.sort(compare);

show(result);

}


function compare(a,b) {
  if (parseInt(a.id) < parseInt(b.id))
    return 1;
  if (parseInt(a.id) > parseInt(b.id))
    return -1;
  return 0;
}


window.onload = function(){
init();
}
