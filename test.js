//curUser: current user account
//user_thumb , user_publish
var thumb_poi = document.getElementById('thumb');
var publish_poi = document.getElementById('publish');
function init(){
          $.ajax({
            url:"MessageBoard.php", //the page containing php script
            type: "POST", //request type,
            datatype: 'json',
	    data: {registration: "init",t_id: talk_id},
            success:function(result){
//                show(result);
		rank_thumb(result);
           }
    })
}

function getMessage(){	
	var datas_poi = document.getElementById('content');
        var datas = datas_poi.value;
	if (datas==""){
		alert("You need to write something");
	}
	else if(parseInt(publish_poi.innerHTML)>1000){
        datas_poi.value="";
	alert("You have no right to post");
	}
	else{
	saveUserdata(curUser,parseInt(thumb_poi.innerHTML),parseInt(publish_poi.innerHTML)+1);
	publish_poi.innerHTML = parseInt(publish_poi.innerHTML)+1;
	var datas_poi = document.getElementById('content');
	var datas = datas_poi.value;
	datas_poi.value="";	
          $.ajax({
            url:"MessageBoard.php", //the page containing php script
            type: "POST", //request type,
            datatype: 'json',
           data: {registration: "success", student_id: curUser, contents: datas,t_id: talk_id},
            success:function(result){
		rank_thumb(result);
           }
    })
	}
}




function saveUserdata(user_name,u_thumb,u_publish){

     $.ajax({
           url:"MessageBoard.php", //the page containing php script
            type: "POST", //request type,
            datatype: 'json',
           data: {registration: "user", user_name: user_name, u_thumb:u_thumb, u_publish:u_publish,t_id:talk_id},
            success:function(result){
           }
    })
}




function show(result){
var board = document.querySelector("#board");
var list = document.getElementsByClassName('one');
for(var i = list.length - 1; 0 <= i; i--)
 if(list[i] && list[i].parentElement)
 list[i].parentElement.removeChild(list[i]);

for (i=0;i<result.length;i++){
	liked=0;
        question = document.createElement("div");
        question_top = document.createElement("div");
        question_content = document.createElement("div");
        question_content_bg = document.createElement("div");
        question_likes = document.createElement("div");

        icon = document.createElement("img");
        icon.style.width= "60px";
        icon.src="images/icon/ask_icon.png";

        user=document.createElement("font");
        user.size=5;

        time=document.createElement("font");

        content=document.createElement("font");

        thumb = document.createElement("img");
        thumb.style.width = "20px";
        thumb_num = document.createElement("font");
        thumb_num.size=5;
        u_con = document.createTextNode(result[i]['username']);
        t_con = document.createTextNode(result[i]['times']);
        c_con = document.createTextNode(result[i]['contents']);
        liked=check_if_liked(result[i]['likesFrom']);
        thumb.className = result[i]['id'];
        thumb_num.id = result[i]['id'];
        if(liked==0){
            thumb.src="images/icon/unlike.png";
            thumb.title="按讚";
            thumb.setAttribute( "onClick", "press_thumb(this.className)");
        }else{
            thumb.src="images/icon/like.png";
            thumb.title="收回讚";
            thumb.setAttribute( "onClick", "unpress_thumb(this.className)");
        }
        br=document.createElement("br");
        br2=document.createElement("br");
        br3=document.createElement("br");
        thumb_num_con = document.createTextNode(" "+result[i]['numLikes']);
        user.appendChild(u_con);
        time.appendChild(t_con);
        user.style.position="relative";
        user.style.left="10px";
        time.style.paddingLeft="60px";
        time.style.position="relative";
        time.style.left="60px";
        time.size=2;
        time.style.color="#888888";

        question_top.appendChild(user);
        question_top.appendChild(br);
        question_top.appendChild(time);
        question_top.style.position="relative";
        question_top.style.height="50px";
        question_top.style.borderStyle="solid";
        question_top.style.borderSize="1px";
        question_top.style.borderColor="#DDDDDD";
        question_top.style.backgroundColor="#DDDDDD";
        question_top.style.borderRadius="10px";
        question_top.style.width="270px";
        question_top.style.boxShadow="5px 5px 5px #888888";
        question_top.style.zIndex=2;


        content.appendChild(c_con);
        content.size=5;
        question_content.appendChild(content);

        thumb_num.appendChild(thumb_num_con);
        thumb_num.size=3;
        thumb_num.style.position="relative";
        thumb_num.style.left="95%";
        thumb.style.position="relative";
        thumb.style.left="95%";
        question_content.appendChild(br2);
        question_content.appendChild(thumb_num);
        question_content.appendChild(thumb);
        question_content.style.position="relative";
        question_content.style.margin="20px";
	question_content.style.wordWrap="break-word";

        question_content_bg.appendChild(question_content);
        question_content_bg.style.position="relative";
        question_content_bg.style.borderStyle="solid";
        question_content_bg.style.borderSize="1px";
        question_content_bg.style.borderColor="#EEEEEE";
        question_content_bg.style.zIndex=1;
        question_content_bg.style.backgroundColor="#FFFFFF";
        question_content_bg.style.boxShadow="5px 5px 5px #888888";


        question_content_bg.style.left="15px";
        question_content_bg.style.top="-10px";
        question_content_bg.style.width="95%";

        question.appendChild(question_top);
        question.appendChild(question_content_bg);
	question.appendChild(br3);

        question.className+= 'one';
        board.appendChild(question);
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
result.sort(compare);

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
if(parseInt(thumb_poi.innerHTML)>1000){
alert("You have no right to press thumb");
}

else{
saveUserdata(curUser,parseInt(thumb_poi.innerHTML)+1,parseInt(publish_poi.innerHTML));
thumb_poi.innerHTML = parseInt(thumb_poi.innerHTML)+1;
var num = document.getElementById(class_name);

count = parseInt(num.innerHTML);
count = count+1;

num.innerHTML = count;
save_thumb(class_name,count,1);
}
}

function unpress_thumb(class_name){
saveUserdata(curUser,parseInt(thumb_poi.innerHTML)-1,parseInt(publish_poi.innerHTML));
thumb_poi.innerHTML = parseInt(thumb_poi.innerHTML)-1;
var num = document.getElementById(class_name);

count = parseInt(num.innerHTML);
count = count-1;

num.innerHTML = count;

save_thumb(class_name,count,0);
}



function save_thumb(m_id,m_num,likeorunlike){
 	//console.log('save thumb '+likeorunlike);
         $.ajax({
            url:"MessageBoard.php", //the page containing php script
            type: "POST", //request type,
            datatype: 'json',
           data: {registration: "thumb", para_id: m_id, para_thumb: m_num,para_user: curUser, para_likeorunlike: likeorunlike, t_id: talk_id},
            success:function(result){
               // show(result);
		//console.log('success')
		rank_thumb(result);
           }
    })
}


window.onload = function(){
init();
}
