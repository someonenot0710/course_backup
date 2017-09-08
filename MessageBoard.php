<?php
//header('Content-Type: application/json');
header('Content-type: text/json');
include_once('item.php');

class MessageBoard extends DB{
	var $information = array();
	var $messages = array();
	var $userdata = array();
	var $database = null;
	function __construct(){
		$db_server = parent::get_ip();
		$db_name = parent::get_name();
		$db_pwd = parent::get_pwd();
		$db_user = parent::get_user();
		$this->database= new mysqli($db_server,$db_user,$db_pwd,$db_name);
		if ($this->database->connect_error) {
                die("Connection failed: " . $conn->connect_error);
        	}
	}

	function receiveMessage(){
		if(count($_POST)!=0){
		$name = $_POST["name"];
                $content = $_POST["content"];
		date_default_timezone_set('Asia/Taipei');
                $T=date("Y-m-d G:i:s");
		$this->saveData($name,$content,$T);
		}
	}

	function saveData($n,$t,$c,$t_id){
		$my = "forum".$t_id;
		$sql = "INSERT INTO `$my`(`owner`, `time`, `content`,`numLikes`,`likesFrom`,`isAnswered`) VALUES ('$n','$t','$c','0','',0)";
		if(!$this->database) echo "why???";

		$this->database->query($sql);
	}

	function loadData($t_id){
		$my = "forum".$t_id;
		$sql = "SELECT * FROM `$my`";
		$result = $this->database->query($sql);
		while ($row = $result->fetch_assoc()){
			$myobj=new stdClass;
			$myobj->id=$row['ID'];	
			$myobj->username=$row["owner"];
			$myobj->times=$row["time"];
			$myobj->contents=$row["content"];
			$myobj->numLikes=$row["numLikes"];
			$myobj->likesFrom=$row["likesFrom"];
			$myobj->isAnswered=$row["isAnswered"];
		//	$myobj->curUser=$uu;
			array_push($this->messages,$myobj);

		}
	}

	function save_thumb($id,$num,$user,$likeorunlike,$t_id){
		$my = "forum".$t_id;
		$sql = "UPDATE `$my` SET `numLikes`='$num' WHERE `ID`='$id'";
		$this->database->query($sql);
		$sql = "SELECT `likesFrom` FROM `$my` WHERE `ID`='$id'";
		$result=$this->database->query($sql);
		$row = $result->fetch_assoc();
		if ($likeorunlike==1){
			if($row['likesFrom']=='')
				$updated_lkusers=$user;
			else
				$updated_lkusers=$row['likesFrom'].','.$user;
                }else{
    		    $lkusers = explode(",",$row['likesFrom']);
		    $updated_lkusers="";
		    $lkusers_len=count($lkusers);
		    for($i=0; $i<$lkusers_len; $i++){
		        if($lkusers[$i]==$user){
		            continue;
		        }
		        else{
		            if(strlen($updated_lkusers)>0)
		                $updated_lkusers=$updated_lkusers.','.$lkusers[$i];
			    else
                                $updated_lkusers=$lkusers[$i];
		        }
		    }
                }
		$sql = "UPDATE `$my` SET `likesFrom` = '$updated_lkusers' WHERE `ID`='$id'";
		$this->database->query($sql);
	}
	

	function showAllMessages(){
		foreach($this->messages as $m){
			$m->show();					
		}
	}

	function showForm(){

	}
	function get_lecture(){
		$sql = "SELECT * FROM `talks`";
		$this->database->query("SET NAMES UTF8");
                $result = $this->database->query($sql);
                while ($row = $result->fetch_assoc()){
                        $myobj=new stdClass;
                        $myobj->id=$row['ID'];
                        $myobj->lecturer=$row["lecturer"];
                        $myobj->date=$row["date"];
                        $myobj->syllabus=$row["syllabus"];
                        $myobj->link=$row["link"];
			$myobj->img=$row['img'];
                        array_push($this->information,$myobj);

                }
        }
	
	function update_userdata($acc,$u_thumb,$u_publish,$t_id){
//		$sql = "SELECT * FROM `user` where `acc` = '$acc'";
		$f_thumb = 'thumb'.$t_id;
		$f_publish = "publish".$t_id;
                $sql = "UPDATE `user` SET `$f_thumb`='$u_thumb',`$f_publish`='$u_publish' WHERE `acc`='$acc'";
		$this->database->query($sql);
//                $row = $result->fetch_assoc();
/*                while ($row = $result->fetch_assoc()){
                        $myobj=new stdClass;
                        $myobj->thumb=$row['thumb'];
			$myobj->publish=$row['publish'];
                        array_push($this->userdata,$myobj);

                }*/
	}
	function changePwd($id,$pwd){
		$newPwd=md5($pwd);
		$sql = "UPDATE `user` SET `pswd`='$newPwd' WHERE `acc`='$id'";
		$this->database->query($sql);
	}
}



$m = new MessageBoard();
if(count($_POST)!=0){
$registration = $_POST['registration'];
//$talk_id = $_POST['t_id'];

if ($registration == "success"){
$talk_id = $_POST['t_id'];
$id= $_POST['student_id'];
$content= $_POST['contents'];
$T=date("Y-m-d H:i:s",time());
$m->saveData($id,$T,$content,$talk_id);
$m->loadData($talk_id);
$arr = $m->messages;
echo json_encode($arr);
}

else if ($registration == "thumb"){
$talk_id = $_POST['t_id'];
$p_id= $_POST['para_id'];
$p_thumb= $_POST['para_thumb'];
$p_user= $_POST['para_user'];
$p_thumb_or_remove= $_POST['para_likeorunlike'];
$m->save_thumb($p_id,$p_thumb,$p_user,$p_thumb_or_remove,$talk_id);
$m->loadData($talk_id);
$arr = $m->messages;
echo json_encode($arr);
}

else if ($registration == "sylla"){

$m->get_lecture();
$arr = $m->information;
echo json_encode($arr);

}

else if ($registration == "user"){
$u_acc = $_POST['user_name'];
$u_thumb = $_POST['u_thumb'];
$u_publish = $_POST['u_publish'];
$t_id = $_POST['t_id'];
$m->update_userdata($u_acc,$u_thumb,$u_publish,$t_id);
//$m->get_userdata($u_acc);
//$arr = $m->userdata;
//echo json_encode($arr);
}

else if($registration == "chgpwd"){
$id= $_POST['student_id'];
$pwd= $_POST['password'];
$m->changePwd($id,$pwd);
echo json_encode("h1");
}


if ($registration == "init"){
$talk_id = $_POST['t_id'];
$m->loadData($talk_id);
$arr = $m->messages;
echo json_encode($arr);
}

}

/*
else{
$m->loadData();
$arr = $m->messages;
echo json_encode($arr);
}
*/
?>
