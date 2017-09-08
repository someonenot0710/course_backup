function changePassword(){
        var newPswd1=document.getElementById('chgpwd1');
        var newPswd2=document.getElementById('chgpwd2');
	pswd1=newPswd1.value;
	pswd2=newPswd2.value;
	newPswd1.value='';
	newPswd2.value='';
        if(pswd1==pswd2){
	    console.log(pswd1);
            $.ajax({
                url:"MessageBoard.php", //the page containing php script
                type: "POST", //request type,
                datatype: 'json',
                data: {registration: "chgpwd", student_id: curUser, password: pswd1},
                success:function(result){
                    console.log(result);
                    alert('改變密碼成功!');
                }
            });
        }else{
                alert('兩組密碼不同，請重新輸入新密碼');
        }
}

