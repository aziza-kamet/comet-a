<?php

    session_start();
    
    include "init/db.php";

    $page="login";
    $log = "not_logged/";
    $pre="modules/".$log;
    $online = false;
    

    if(isset($_SESSION['user_id'])){

        $online = true;
        
    }
    
    if($online){
        
        $log = "logged/";
        $pre="modules/".$log;
        $page="my_profile";
        
        if(isset($_GET['page'])){
        
            if($_GET['page']=='my_profile'){
                
                $pre="modules/".$log;
                $page='my_profile';
                
            }else if($_GET['page']=='news'){
                
                $pre="modules/".$log;
                $page='my_news';
                
            }else if($_GET['page']=='friends'){
                
                $pre = 'templates/';
                $page='friends_menu_bar';
                
            }else if($_GET['page']=='messages'){
                
                $pre = 'templates/';
                $page='messages_menu_bar';
                
            }else if($_GET['page']=='my_groups'){
                
                $pre = 'templates/';
                $page='groups_menu_bar';
                
            }else if($_GET['page']=='profile'){
                
                $pre="modules/".$log;
                $page='profile';
                
            }else if($_GET['page']=='my_group'){
                
                $pre="modules/".$log;
                $page='my_group_profile';
                
            }else if($_GET['page']=='group'){
                
                $pre="modules/".$log;
                $page='group_profile';
                
            }else if($_GET['page']=='delete_acc'){
                
                $pre="modules/".$log;
                $page='delete_acc';
                
            }else if($_GET['page']=='delete_group'){
                
                $pre="modules/".$log;
                $page='delete_group';
                
            }
        }
        
        if(isset($_GET['act'])){
            
            if($_GET['act']=='add_wall_my'){
                
                if($_POST['checkbox_img']=='img'){
                    
                    $img_conc = "";
                    $check_query=mysql_query("SELECT * FROM wall WHERE author_id=".$_SESSION['user_id']);
                    
                    if(mysql_num_rows($check_query)>0){
                        
                        $img_conc = mysql_num_rows($check_query);
                        
                    }else{
                        
                        $img_conc = "0";
                        
                    }
        
                    
                    $text = mysql_real_escape_string($_POST['wall_text']);
                    $target = "images/";
                    $temp = explode(".",$_FILES["image"]["name"]);
                    $new_file = $_SESSION['user_id']."w".$img_conc.".".end($temp);
                    
                    $ok=1;
                    $type = pathinfo($target.$new_file, PATHINFO_EXTENSION);
                    
                    $check = getimagesize($_FILES['image']['tmp_name']);
        			if($check){
        				$ok=1;
        			}else{
        				$ok=0;
        			}
                    
                    if($type!="jpg" && $type!="jpeg" && $type!="png" && $type!="gif"){
    
        				$ok=0;
    			    }
                    
                    if($ok==1){
                        move_uploaded_file($_FILES['image']['tmp_name'],$target.$new_file);
                        
                        $sql_query = mysql_query("INSERT INTO wall (id, user_id, author_id, text, post_date, image, state, with_img) 
                                                        VALUES (NULL, ".$_SESSION['user_id'].", ".$_SESSION['user_id'].",
                                                                \"".$text."\", NOW(), \"".$new_file."\", 1, 1)");  
                        header("Location:?page=my_profile");                                        
                    }else{
                        header("Location:?page=my_profile&error=1");
                    }
                    
                }else{
                    
                    $text = mysql_real_escape_string($_POST['wall_text']);
                    
                    $sql_query = mysql_query("INSERT INTO wall (id, user_id, author_id, text, post_date, image, state, with_img) 
                                                        VALUES (NULL, ".$_SESSION['user_id'].", ".$_SESSION['user_id'].",
                                                                \"".$text."\", NOW(), \"default.png\", 1, 0)");  
                        header("Location:?page=my_profile"); 
                    
                }
                
                
                
                
            }else if($_GET['act']=='log_out'){
                
                unset($_SESSION['user_id']);
                header("Location:?page=login");
                
            }else if($_GET['act']=='post_comment_mp'){
                
                $text = mysql_real_escape_string($_POST['comment_txt']);
                $wid = $_POST['wid'];
                
                mysql_query("INSERT INTO comments (id, user_id, wall_id, comment, post_date, state)
                                             VALUES (NULL, ".$_SESSION['user_id'].", ".$wid.", \"".$text."\", NOW(), 1) ");
                header("Location:?page=my_profile");                             
                
            }else if($_GET['act']=='post_comment_mg'){
                
                
                $text = mysql_real_escape_string($_POST['comment_txt']);
                $wid = $_POST['wid'];
                $gid = $_POST['gid'];
                
                if($_POST['checkbox']=='admin'){
                    mysql_query("INSERT INTO comments_g (id, user_id, wall_id, comment, post_date, state, as_admin)
                                             VALUES (NULL, ".$_SESSION['user_id'].", ".$wid.", \"".$text."\", NOW(), 1, 1) ");
                }else{
                    mysql_query("INSERT INTO comments_g (id, user_id, wall_id, comment, post_date, state, as_admin)
                                             VALUES (NULL, ".$_SESSION['user_id'].", ".$wid.", \"".$text."\", NOW(), 1, 0) ");
                }
                
                header("Location:?page=my_group&gid=".$gid);                             
                
            }else if($_GET['act']=='post_comment_g'){
                
                
                $text = mysql_real_escape_string($_POST['comment_txt']);
                $wid = $_POST['wid'];
                $gid = $_POST['gid'];
                
                mysql_query("INSERT INTO comments_g (id, user_id, wall_id, comment, post_date, state, as_admin)
                                         VALUES (NULL, ".$_SESSION['user_id'].", ".$wid.", \"".$text."\", NOW(), 1, 0) ");
                
                header("Location:?page=group&gid=".$gid);                             
                
            }else if($_GET['act']=='change_ava'){
                
                $target = "images/";
                $temp = explode(".", $_FILES["image"]["name"]);
                $new_file = $_SESSION['user_id'].".".end($temp);
                
                move_uploaded_file($_FILES['image']['tmp_name'],$target.$new_file);
                
                $query_ava = mysql_query("UPDATE users SET avatar=\"".$new_file."\" WHERE id=".$_SESSION['user_id']);
                
                header("Location:?page=my_profile");
                
            }else if($_GET['act']=='post_comment_p'){
                
                $text = mysql_real_escape_string($_POST['comment_txt']);
                $wid = $_POST['wid'];
                
                $query_profile = mysql_query("SELECT * FROM wall WHERE id=".$wid);
                $row=mysql_fetch_array($query_profile);
                
                mysql_query("INSERT INTO comments (id, user_id, wall_id, comment, post_date, state)
                                             VALUES (NULL, ".$_SESSION['user_id'].", ".$wid.", \"".$text."\", NOW(), 1) ");
                                             
                header("Location:?page=profile&uid=".$row['user_id']);                             
                
            }else if($_GET['act']=='post_comment_n'){
                
                
                $text = mysql_real_escape_string($_POST['comment_txt']);
                $wid = $_POST['wid'];
                $gid = $_POST['gid'];
                
                mysql_query("INSERT INTO comments_g (id, user_id, wall_id, comment, post_date, state, as_admin)
                                         VALUES (NULL, ".$_SESSION['user_id'].", ".$wid.", \"".$text."\", NOW(), 1, 0) ");
                
                header("Location:?page=news");                             
                
            }else if($_GET['act']=='add_wall_u'){
            
                if($_POST['checkbox_img']=='img'){
                    
                    $img_conc = "";
                    $check_query=mysql_query("SELECT * FROM wall WHERE author_id=".$_SESSION['user_id']);
                    
                    if(mysql_num_rows($check_query)>0){
                        
                        $img_conc = mysql_num_rows($check_query);
                        
                    }else{
                        
                        $img_conc = "0";
                        
                    }
        
                    $text = mysql_real_escape_string($_POST['wall_text']);
                    $uid =  $_POST['uid'];
                    
                    $target = "images/";
                    $temp = explode(".",$_FILES["image"]["name"]);
                    $new_file = $_SESSION['user_id']."w".$img_conc.".".end($temp);
                    
                    move_uploaded_file($_FILES['image']['tmp_name'],$target.$new_file);
                    
                    $sql_query = mysql_query("INSERT INTO wall (id, user_id, author_id, text, post_date, image, state, with_img) 
                                                    VALUES (NULL, ".$uid.", ".$_SESSION['user_id'].",
                                                            \"".$text."\", NOW(), \"".$new_file."\", 1, 1)");                                         
                    header("Location:?page=profile&uid=".$uid); 
                    
                }else{
                    
                    $text = mysql_real_escape_string($_POST['wall_text']);
                    $uid =  $_POST['uid'];
                    
                    $sql_query = mysql_query("INSERT INTO wall (id, user_id, author_id, text, post_date, image, state, with_img) 
                                                    VALUES (NULL, ".$uid.", ".$_SESSION['user_id'].",
                                                            \"".$text."\", NOW(), \"default.png\", 1, 0)");                                         
                    header("Location:?page=profile&uid=".$uid); 
                    
                }
                
            
                                                      
                
                
            }else if($_GET['act']=='write_msg'){
                
                $text = mysql_real_escape_string($_POST['text']);
                $tid = $_POST['fid'];
                
                
                mysql_query("INSERT INTO messages (id, from_id, to_id, text, f_d, t_d, sent_date, t_readen)
                                             VALUES (NULL, ".$_SESSION['user_id'].", ".$tid.", \"".$text."\", 0, 0, NOW(), 0)");
                                                                          
                header("Location:?page=messages&m_page=chat&rid=".$tid);                             
                
            }else if($_GET['act']=='create_group'){
                
                $desc = mysql_real_escape_string($_POST['desc']);
                $name = $_POST['name'];
                
                
                mysql_query("INSERT INTO groups (id, a_id, name, description, create_date, state)
                                             VALUES (NULL, ".$_SESSION['user_id'].", \"".$name."\", \"".$desc."\", NOW(), 1)");
                                             
                $query = mysql_query("SELECT * FROM groups WHERE a_id=".$_SESSION['user_id']." AND state = 1 ORDER BY id DESC"); 
                $arr=mysql_fetch_array($query);
                
                mysql_query("INSERT INTO subscriptions (id, u_id, g_id, state)
                                             VALUES (NULL, ".$_SESSION['user_id'].", ".$arr['id'].", 1)");                             
                                                                          
                header("Location:?page=my_groups");                             
                
            }else if($_GET['act']=='add_wall_g'){
            
                if($_POST['checkbox_img']=='img'){
                    
                    $img_conc = "";
                    $check_query=mysql_query("SELECT * FROM wall_group WHERE author_id=".$_SESSION['user_id']);
                    
                    if(mysql_num_rows($check_query)>0){
                        
                        $img_conc = mysql_num_rows($check_query);
                        
                    }else{
                        
                        $img_conc = "0";
                        
                    }
        
                    $text = mysql_real_escape_string($_POST['wall_text']);
                    $gid =  $_POST['gid'];
                    
                    $target = "images/";
                    $temp = explode(".",$_FILES["image"]["name"]);
                    $new_file = $_SESSION['user_id']."wg".$img_conc.".".end($temp);
                    
                    move_uploaded_file($_FILES['image']['tmp_name'],$target.$new_file);
                    
                    $sql_query = mysql_query("INSERT INTO wall_group (id, group_id, author_id, text, post_date, image, with_img, state) 
                                                    VALUES (NULL, ".$gid.", ".$_SESSION['user_id'].",
                                                            \"".$text."\", NOW(), \"".$new_file."\", 1, 1)");  
                    $check_g = mysql_fetch_array(mysql_query("SELECT * FROM groups WHERE id=".$gid));
                    echo "SELECT * FROM groups WHERE id=".$gid;
                    
                    if($check_g['a_id']==$_SESSION['user_id']){
                    
                        header("Location:?page=my_group&gid=".$gid);   
                        
                    }else{
                        
                      header("Location:?page=group&gid=".$gid);   
                        
                    }
                    
                }else{
                    
                    $text = mysql_real_escape_string($_POST['wall_text']);
                    $gid =  $_POST['gid'];
                    
                     $sql_query = mysql_query("INSERT INTO wall_group (id, group_id, author_id, text, post_date, image, with_img, state) 
                                                    VALUES (NULL, ".$gid.", ".$_SESSION['user_id'].",
                                                            \"".$text."\", NOW(), \"default.png\", 0, 1)");  
                    $check_g = mysql_fetch_array(mysql_query("SELECT * FROM groups WHERE id=".$gid));

                    if($check_g['a_id']==$_SESSION['user_id']){
                    
                        header("Location:?page=my_group&gid=".$gid);   
                        
                    }else{
                        
                      header("Location:?page=group&gid=".$gid);   
                        
                    }
                    
                }
            
                
                
            }else if($_GET['act']=='edit_profile'){
                
                $pwd_old = $_POST['pwd_old'];
                $pwd = $_POST['pwd'];
                $pwd_confirm = $_POST['pwd_confirm'];
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $city = $_POST['city'];
                $age = $_POST['age'];  
                
                echo "UPDATE users SET password=\"".$pwd."\", name=\"".$name."\", surname=\"".$surname."\",  
                                                            city=\"".$city."\", age=\"".$age."\"
                                                            WHERE id=".$_SESSION['user_id'];
                
                $key="";
                if($pwd!=""&&pwd_confirm!=""){
                    
                    $key="password=\"".$pwd."\",";
                    
                }
                    
                    if($pwd==$pwd_confirm && $pwd==$pwd_old){
                        
                        mysql_query("UPDATE users SET ".$key." name=\"".$name."\", surname=\"".$surname."\",  
                                                            city=\"".$city."\", age=\"".$age."\"
                                                            WHERE id=".$_SESSION['user_id']); 
                            header("Location:?page=my_profile");
                            
                    }else {
                        
                         header("Location:?page=my_profile");
                    }
                
            }else if($_GET['act']=='delete_acc'){
                  
                
                mysql_query("UPDATE users SET state=0 WHERE id=".$_SESSION['user_id']);
                unset($_SESSION['user_id']);
                header("Location:?page=login");
                
                
            }else if($_GET['act']=='edit_group'){
                  
                
                $name = $_POST['name'];
                $desc = mysql_real_escape_string($_POST['desc_text']);
                $gid = $_POST['gid'];
                
                mysql_query("UPDATE groups SET name= \"".$name."\", description=\"".$desc."\" WHERE id=".$gid);
                header("Location:?page=my_group&gid=".$gid);
                
            }else if($_GET['act']=='change_group_ava'){
                
                $gid=$_POST['gid'];
                $target = "images/";
                $temp = explode(".", $_FILES["image"]["name"]);
                $new_file = $gid."g.".end($temp);
                
                move_uploaded_file($_FILES['image']['tmp_name'],$target.$new_file);
                
                $query_ava = mysql_query("UPDATE groups SET avatar=\"".$new_file."\" WHERE id=".$gid);
                
                header("Location:?page=my_group&gid=".$gid);
                
            }else if($_GET['act']=='delete_group'){
                  
                
                mysql_query("UPDATE groups SET state=0 WHERE id=".$_POST['gid']);
                header("Location:?page=my_groups");
                
                
            }
            
        }
        
    }else{
        
        $log = "not_logged/";
        $pre="modules/".$log;
        
        if(isset($_GET['page'])){
        
            if($_GET['page']=='login'){
                
                $pre="modules/".$log;
                $page='login';
                
            }else if($_GET['page']=='reg'){
                
                $pre="modules/".$log;
                $page='reg';
                
            }else if($_GET['page']=='controller'){
                
                $pre="ajax/";
                $page='controller';
                
            }
        }
        
        
        if(isset($_GET['act'])){
        
            if($_GET['act']=='reg'){
                
                $login = $_POST['login'];
                $pwd = $_POST['pwd'];
                $pwd_confirm = $_POST['pwd_confirm'];
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $city = $_POST['city'];
                $age = $_POST['age'];
                
                if($login!='' && $pwd!='' && $pwd_confirm!='' && $name!='' && $surname!='' && $city!='' && $age!=''){
                    
                    if($pwd==$pwd_confirm){
                        
                        mysql_query("INSERT INTO users (id, login, password, name, surname, city, age, state, avatar) 
                                            VALUES (NULL, \"".$login."\", \"".$pwd."\", \"".$name."\", \"".$surname."\",  
                                                            \"".$city."\", \"".$age."\", 1, \"default.png\")"); 
    
                        header("Location:?page=login");
                    }
                    
                }
                
                
            }else if($_GET['act']=='auth'){
                
                $login = $_POST['login'];
                $pwd = $_POST['pwd'];
                
                if($login!=''&& $pwd!=''){
                    
                    $query= mysql_query("SELECT * FROM users WHERE login=\"".$login."\" AND password= \"".$pwd."\" AND state=1");
                    
                    if(mysql_num_rows($query)>0){
                        
                        $sql_query = mysql_fetch_array($query);
                            $_SESSION['user_id']=$sql_query['id'];
                            header("Location:?page=my_profile");
                    }else{
                            header("Location:?page=login&error=1");
                        }
                }
                
            }
            
        }   
        
    }

    


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Comet-A</title>
        <link rel="stylesheet" href="bootstrap-3.3.4/dist/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="bootstrap-3.3.4/dist/css/customized.css" type="text/css" />
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
        <link href='//fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="w3.css">
    </head>
    
    <body style="background-color: #efefef;">
        
        <?php 
            include "templates/menu_bar_".($online?"log":"notlog").".php";
            include $pre.$page.".php";
        ?>
        
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src = "bootstrap-3.3.4/dist/js/bootstrap.min.js"></script>
    </body>
</html>
