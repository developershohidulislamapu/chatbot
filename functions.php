<?php

error_reporting(0);
session_start();
class admin_post{

    private $dbconn;


    public function __construct()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "chatbot";

        $this->dbconn= mysqli_connect($host,$user,$pass,$db);

        if(!$this->dbconn){
            die("database not found");
        }
    }

    public function chat_data_insert($data,$id,$name){

        $user_sms = $data['user_sms'];
        

        $q = "INSERT INTO `sms`(`sms_text`, `user_id_sms`,`user_sms_name`) VALUES ('$user_sms','$id','$name')";

        if(mysqli_query($this->dbconn,$q)){

            header("location:index.php");
        }

    }

    public function chat_data_read($data){
        
        $user_name = $data['user_name'];
        

        $q = "SELECT * FROM `user` WHERE username='$user_name'";

        if(mysqli_query($this->dbconn,$q)){

            $row = mysqli_query($this->dbconn,$q);
            $rows = mysqli_fetch_assoc($row);
            if($rows['username']==$user_name){
                $_SESSION['user_sms_id'] = $rows['user_id'];
                $_SESSION['user_sms_name'] = $rows['username'];
                header("location:index.php");
            }else{
                echo "Please Enter Right Username";
            }
            
           
        }

    }
    public function chat_data_row(){
        
        $q = "SELECT * FROM `user` WHERE user_id != ".$_SESSION['user_sms_id'];

        if(mysqli_query($this->dbconn,$q)){

            $row = mysqli_query($this->dbconn,$q);
            return $row;
            
           
        }

    }

    public function chat_data_sms_show_user(){

        $q = "SELECT * FROM `sms`";

        if(mysqli_query($this->dbconn,$q)){

           $row = mysqli_query($this->dbconn,$q);
           return $row;
           
        }

    }

}