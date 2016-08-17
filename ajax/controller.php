<?php

    include '../init/db.php';
    session_start();
    
    
    if(isset($_GET['act'])){
        
        if($_GET['act']=='rate_wall'){
            
            if(isset($_POST['wid'])&&is_numeric($_POST['wid'])){
                
                $query_check = mysql_query("SELECT * FROM ratings WHERE u_id=".$_SESSION['user_id']." AND w_id=".$_POST['wid']);
                
                if(mysql_num_rows($query_check)>0){
                    
                    
                }else{
                    
                    mysql_query("INSERT INTO ratings (id, u_id, w_id, post_date)
                                            VALUES (NULL, ".$_SESSION['user_id'].", ".$_POST['wid'].", NOW())");
                    
                }
                
                $query_count = mysql_query("SELECT count(*) likes FROM ratings WHERE w_id=".$_POST['wid']);
                
                if($row=mysql_fetch_array($query_count)){
                 
                    echo $row['likes'];
                    
                }
                
            }
            
        }else if($_GET['act']=='rate_wall_group'){
            
            if(isset($_POST['wid'])&&is_numeric($_POST['wid'])){
                
                $query_check = mysql_query("SELECT * FROM ratings_group WHERE u_id=".$_SESSION['user_id']." AND wg_id=".$_POST['wid']);
                
                if(mysql_num_rows($query_check)>0){
                    
                    
                }else{
                    
                    mysql_query("INSERT INTO ratings_group (id, u_id, wg_id, post_date)
                                            VALUES (NULL, ".$_SESSION['user_id'].", ".$_POST['wid'].", NOW())");                                         
                    
                }
                
                $query_count = mysql_query("SELECT count(*) likes FROM ratings_group WHERE wg_id=".$_POST['wid']);
                
                if($row=mysql_fetch_array($query_count)){
                 
                    echo $row['likes'];
                    
                }
                
            }
        }
        else if($_GET['act']=='send_req'){
            
            $fid = $_POST['fid'];
            
            mysql_query("INSERT INTO requests (id, u_id, f_id, sent_date, state)
                        VALUES (NULL, ".$_SESSION['user_id'].", ".$fid.", NOW(), 1)    
                        ");          
            
        }else if($_GET['act']=='cancel_req'){
            
            $fid = $_POST['fid'];
            
            mysql_query("UPDATE requests SET state = 0 WHERE u_id=".$_SESSION['user_id']." 
                            AND f_id=".$fid);           
            
        }else if($_GET['act']=='accept_req'){
            
            $fid = $_POST['fid'];
            
            mysql_query("UPDATE requests SET state = 2 WHERE u_id=".$fid." 
                            AND f_id=".$_SESSION['user_id']);    
            
            mysql_query("INSERT INTO friends (id, u_id, f_id, state)
                                                VALUES(NULL, ".$_SESSION['user_id'].", ".$fid.",1)"); 
            mysql_query("INSERT INTO friends (id, u_id, f_id, state)
                                                VALUES(NULL, ".$fid.", ".$_SESSION['user_id'].",1)");                                     
            
        }else if($_GET['act']=='deny_req'){
            
            $fid = $_POST['fid'];
            
            mysql_query("UPDATE requests SET state = 0 WHERE u_id=".$fid." 
                            AND f_id=".$_SESSION['user_id']);           
            
        }else if($_GET['act']=='join'){
            
            $gid = $_POST['gid'];
            
            mysql_query("INSERT INTO subscriptions VALUES (NULL, ".$_SESSION['user_id'].", ".$gid.", 1)");           
            
        }else if($_GET['act']=='left'){
            
            $gid = $_POST['gid'];
            
                
                mysql_query("UPDATE subscriptions SET state = 0 WHERE g_id=".$gid." AND u_id=".$_SESSION['user_id']);
             
            
        }else if($_GET['act']=='delete_wall_group'){
            
            $wid = $_POST['wid'];
            
                
                mysql_query("UPDATE wall_group SET state = 0 WHERE id=".$wid);
             
            
        }else if($_GET['act']=='delete_wall_profile'){
            
            $wid = $_POST['wid'];
            
                
                mysql_query("UPDATE wall SET state = 0 WHERE id=".$wid);
             
            
        }else if($_GET['act']=='delete_comment_profile'){
            
            $cid = $_POST['cid'];
            
                
                mysql_query("UPDATE comments SET state = 0 WHERE id=".$cid);
             
            
        }else if($_GET['act']=='delete_comment_group'){
            
            $cid = $_POST['cid'];
            
                
                mysql_query("UPDATE comments_g SET state = 0 WHERE id=".$cid);
             
            
        }else if($_GET['act']=='delete_chat'){
            
            $uid = $_POST['uid'];
            
                mysql_query("UPDATE messages SET t_d = 1 WHERE from_id=".$_SESSION['user_id']." AND to_id=".$uid);
                mysql_query("UPDATE messages SET f_d = 1 WHERE to_id=".$_SESSION['user_id']." AND from_id=".$uid);
             
            
        }else if($_GET['act']=='check_login'){
            
            $login = $_POST['login']; 
            
            $query = mysql_query("SELECT count(*) rows FROM users WHERE login=\"".$login."\"");
            
            $row = mysql_fetch_array($query);
            
                echo $row['rows'];
            
        }
        
    }

?>