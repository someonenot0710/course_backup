import MySQLdb
import sys
import hashlib

def md5 (s, raw_output = False):
   
    res = hashlib.md5 (s)
    if raw_output:
        return res.digest ()
    return res.hexdigest ()

user_file=open(sys.argv[1],'r');
db = MySQLdb.connect("localhost","course","nmslinnthu","seminar_106fall" )
cursor = db.cursor()
lines=user_file.readlines()[1:]
for i in range(len(lines)):
	arr=lines[i].strip().split(',')
	print arr
	userid=arr[0]
	username=arr[1]
	insert = ("INSERT INTO user (acc,pswd,name,isAdmin,thumb1,publish1,thumb2,publish2,thumb3,publish3) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)")
	data = (userid,md5(userid),username,0,0,0,0,0,0,0)
#	data = ('103062555',md5('103062555'),'103062555', 0,0,0,0,0,0,0)
	cursor.execute(insert, data)
	db.commit()
	
