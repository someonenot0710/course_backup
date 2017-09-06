//curUser: current user account
//user_thumb , user_publish
var thumb_poi = document.getElementById('thumb');
var publish_poi = document.getElementById('publish');
function init(){
	  console.log(user_thumb+"__"+user_publish);
          $.ajax({
            url:"MessageBoard.php", //the page containing php script
            type: "POST", //request type,
            datatype: 'json',
	    data: {registration: "init",t_id: talk_id},
            success:function(result){
                console.log("sucess");
//                show(result);
		rank_thumb(result);
           }
    })
	console.log("init");
}

//function getMessage () {
function getMessage(stu){	
	if(parseInt(publish_poi.innerHTML)<1){
	var datas_poi = document.getElementById('content');
        var datas = datas_poi.value;
        datas_poi.value="";
	alert("You have no right to post");
	}
	else{
	saveUserdata(stu,parseInt(thumb_poi.innerHTML),parseInt(publish_poi.innerHTML)-1);
	publish_poi.innerHTML = parseInt(publish_poi.innerHTML)-1;
//	console.log(user_data.thumb+"  ======   "+user_data.publish);
//	console.log(data_user);
	var datas_poi = document.getElementById('content');
	var datas = datas_poi.value;
	datas_poi.value="";	
	console.log(stu+"  "+datas);	
          $.ajax({
            url:"MessageBoard.php", //the page containing php script
            type: "POST", //request type,
            datatype: 'json',
           data: {registration: "success", student_id: stu, contents: datas,t_id: talk_id},
            success:function(result){
		rank_thumb(result);
           }
    })
	}
//	window.location.reload();
}




function saveUserdata(user_name,u_thumb,u_publish){

     $.ajax({
           url:"MessageBoard.php", //the page containing php script
            type: "POST", //request type,
            datatype: 'json',
           data: {registration: "user", user_name: user_name, u_thumb:u_thumb, u_publish:u_publish},
            success:function(result){
	//	getUserresult(result);
//		callback(result);
           }
    })
}


//}


function show(result){
console.log("show");
var board = document.querySelector("#board");
var list = document.getElementsByClassName('one');
//console.log(result[0]);
for(var i = list.length - 1; 0 <= i; i--)
 if(list[i] && list[i].parentElement)
 list[i].parentElement.removeChild(list[i]);

console.log("before for");
for (i=0;i<result.length;i++){
	liked=0;
	para = document.createElement("div");
	u = document.createElement("h1");
	t = document.createElement("h1");
	c = document.createElement("h1");
	thumb = document.createElement("button");
	thumb_num = document.createElement("p");
	u_con = document.createTextNode(result[i]['username']);
	t_con = document.createTextNode(result[i]['times']);
	c_con = document.createTextNode(result[i]['contents']);		
//	thumb_con = document.createTextNode("讚");
//	thumb_num_con = document.createTextNode(result[i]['numLikes']);
//	thumb.className = result[i]['id'];
//	thumb_num.id = result[i]['id'];
	liked=check_if_liked(result[i]['likesFrom']);
//	console.log(liked);
	thumb.className = result[i]['id'];
	thumb_num.id = result[i]['id'];
	if(liked==0){
            thumb_con = document.createTextNode("讚");
	    thumb.setAttribute( "onClick", "press_thumb(this.className)");
	}else{
            thumb_con = document.createTextNode("收回讚");
	    thumb.setAttribute( "onClick", "unpress_thumb(this.className)");
	}
        thumb_num_con = document.createTextNode(result[i]['numLikes']);
	u.appendChild(u_con);
	t.appendChild(t_con);
	c.appendChild(c_con);
	thumb.appendChild(thumb_con);
	thumb_num.appendChild(thumb_num_con);
	
	para.appendChild(u);
	para.appendChild(t);
	para.appendChild(c);
	para.appendChild(thumb);
	para.appendChild(thumb_num);
	para.className+= 'one';	
//	para.id = result[i]['id'];
	board.appendChild(para);
}
}

function check_if_liked(likefrom){
	var likedusers=new Array();
	likedusers=likefrom.split(',');
	for (var likeduser in likedusers){
	    if (likedusers[likeduser]==curUser)
	        return 1;
	}
	return 0;
}

function rank_thumb(result){
//result.sort(function(a,b) {return (parseInt(a.thumbs) < parseInt(b.thumbs)) ? 1 : ((parseInt(b.thumbs) > parseInt(a.thumbs)) ? -1 : 0);} );
result.sort(compare);
//console.log(result);

show(result);

}


function compare(a,b) {
  if (parseInt(a.numLikes) < parseInt(b.numLikes))
    return 1;
  if (parseInt(a.numLikes) > parseInt(b.numLikes))
    return -1;
  return 0;
}


function press_thumb(class_name){
//console.log(thumb_poi.innerHTML);
if(parseInt(thumb_poi.innerHTML)<1){
alert("You have no right to press thumb");
}

else{
saveUserdata(curUser,parseInt(thumb_poi.innerHTML)-1,parseInt(publish_poi.innerHTML));
thumb_poi.innerHTML = parseInt(thumb_poi.innerHTML)-1;
var num = document.getElementById(class_name);

count = parseInt(num.innerHTML);
count = count+1;

num.innerHTML = count;
console.log("add "+curUser);
save_thumb(class_name,count,1);
}
}

function unpress_thumb(class_name){
saveUserdata(curUser,parseInt(thumb_poi.innerHTML)+1,parseInt(publish_poi.innerHTML));
thumb_poi.innerHTML = parseInt(thumb_poi.innerHTML)+1;
var num = document.getElementById(class_name);

count = parseInt(num.innerHTML);
count = count-1;

num.innerHTML = count;

save_thumb(class_name,count,0);
}



function save_thumb(m_id,m_num,likeorunlike){
 	console.log('save thumb '+likeorunlike);
         $.ajax({
            url:"MessageBoard.php", //the page containing php script
            type: "POST", //request type,
            datatype: 'json',
           data: {registration: "thumb", para_id: m_id, para_thumb: m_num,para_user: curUser, para_likeorunlike: likeorunlike, t_id: talk_id},
            success:function(result){
 //            console.log(result);
               // show(result);
		console.log('success')
		rank_thumb(result);
           }
    })
}


window.onload = function(){
//console.log(talk_id);
init();
//console.log(curUser);
//getUserdata(curUser);
}
