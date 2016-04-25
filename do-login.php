 <?php $flag=1;
 if(isset($_POST['login'])){
    $email=strip_tags(trim($_POST['email']));
    $pass=md5($_POST['password']);
    $res=$shared->checkExsitUser($email); 
      $user_id=$res[0]['user_id'];
      $user_name=$res[0]['name'];
      $usertype=$res[0]['user_type'];
      $userpass=$res[0]['password'];
    if(!empty($usertype)&&!empty($user_id)){   
      if($userpass==$pass){
        $_SESSION['user_id']=$user_id;
        $_SESSION['name']=$user_name;
        $_SESSION['usertype']=$usertype;
        if(!empty($_POST['remember'])){
         if($_POST['remember']=='on'){
            setcookie("user_id", $_SESSION['user_id'], time()+3600);
          }
        }
        //echo $_SESSION['user_id'];
        //echo $_SESSION['name'];
        header('location:index.php'); 
      }else{
        echo"<p class='error red'>password not validate  try again</p>";
        $flag=0; 
      }
    }else{
      echo"<p class='error red'>email not exsits  try again</p>";
      $flag=0; 
    }
  }?>
