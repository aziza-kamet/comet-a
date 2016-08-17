<?php

  if(isset($_SESSION['user_id'])){
    
    if($_SESSION['user_id']){
      
      if(isset($_GET['gid'])&&is_numeric($_GET['gid'])){
        
        $gid = $_GET['gid'];
        
      }
      
      $query=mysql_query("SELECT * FROM groups WHERE id=".$_GET['gid']);
    
      if(mysql_num_rows($query)>0){
        
        $group = mysql_fetch_array($query);
      }

    }

  }
        
?>
       
<div class="container-fluid">
  
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6" >
            <div class="container-fluid">
              <div class="jumbotron" style="background-color:#ffffff; border-radius:0px; border-right:3px solid #dfdfdf; border-bottom:3px solid #dfdfdf;">
                <div class="row">
                    <div class="col-md-4">
                        <img class="img-responsive img-thumbnail" src="images/<?php echo $group['avatar'];?>" width="300px"> <br><br>
                        <h4>Change avatar:</h4>
                        <form action="?act=change_group_ava" method="post" enctype="multipart/form-data">
                            <span class="btn btn-default btn-file">
        			                Browse <input class="btn" type="file" name = "image">
        			              </span>   
                						<input class="btn btn-default" type="submit" value="Upload">
                						<input type="hidden" name="gid" value="<?php echo $group['id'];?>" />
                        </form>
                    </div>
                    <div class="col-md-8">
                      
                        <table class="table">
                            <thead>
                              <tr>
                                <th><h2><?php echo $group['name'];?></h2></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Description: <?php echo $group['description'];?></td>
                              </tr>
                            </tbody>
                         </table><br>
                        <button type="button" class="btn btn-link btn-lg" data-toggle="modal" data-target="#groupModal">
                          Edit group
                        </button>
                        
                         <?php include "modules/logged/edit_group_profile.php";?>
                        <button type="button" class="btn btn-default " data-toggle="modal" data-target="#addModal">
                           Add post
                        </button>
                          <?php include "modules/logged/add_post_g.php";?>
                        
                    </div>
              </div> 
            </div>
          </div>
        </div>
        <div class="col-md-3"></div>
    </div>

<?php

                    $wall = mysql_query("SELECT w.*, u.name, u.surname, u.avatar
                                          FROM wall_group w
                                          LEFT OUTER JOIN users u ON u.id = w.author_id
                                          WHERE w.group_id=".$gid." AND w.state=1 
                                          ORDER BY w.post_date DESC
                                          ");                    
                                          
                    if(mysql_num_rows($wall)>0){
                      
                      while($posts = mysql_fetch_array($wall)){


?>
                      
                      
                          
    <div class="row" id="w<?php echo $posts['id'];?>">
        <div class="col-md-3"></div>
        <div class="col-md-6" >
            <div class="container-fluid">
              <div class="jumbotron" style="background-color:#ffffff; border-radius:0px; border-right:3px solid #dfdfdf; border-bottom:3px solid #dfdfdf;">
                <div class="row">
                    <div class="col-md-2">
                        <img class="img-responsive img-thumbnail" src="images/<?php if($posts['author_id']==$group['a_id']){ echo $group['avatar']; }else{ echo $posts['avatar'];}?>" width="100px"><br>
                    </div>
                    <div class="col-md-10">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>
                                <h4><b>
                                  <?php if($posts['author_id']==$group['a_id']){
                                            echo  $group['name'];
                                            }else{ echo $posts['name']." ".$posts['surname'];}?>
                                </b></h4>
                              </th>
                              <th>
                                <small style="float:right; color:#838383;"><?php echo $posts['post_date'];?>&nbsp&nbsp&nbsp 
                                <button class="btn btn-link" onclick="delete_wall(<?php echo $posts['id'];?>)">
                                  <span class="glyphicon glyphicon-remove-sign"></span>
                                </button>
                                </small>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td colspan="2">
                              <?php 
                              
                                $like_query = mysql_query("SELECT count(*) likes FROM ratings_group WHERE wg_id=".$posts['id']); 
                                
                                $like_count = 0;
                                
                                if($like_row = mysql_fetch_array($like_query)){
                                  
                                  $like_count = $like_row['likes'];
                                  
                                }
                                
                                $my_likes_query = mysql_query("SELECT * FROM ratings_group WHERE wg_id=".$posts['id']." AND u_id=".$_SESSION['user_id']);
                                
                                  $bg_color = "#ffffff";
                                  $color = "#cc0000";
                                  
                                
                                if(mysql_num_rows($my_likes_query)>0){
                                  
                                  $bg_color = "#cc0000";
                                  $color = "#ffffff";
                                  
                                }
                              
                              ?>  
                                
                               <?php if($posts['with_img']==1){ ?>
                                 <img class="img-responsive img-thumbnail" src="images/<?php echo $posts['image'];?>" width="100%">
                               <?php } ?>                                 
                               <br><h4><?php echo $posts['text'];?></h4><br>
                                    <form action="?act=post_comment_mg" method="post">
                                				<textarea style="width:100%;height:80px;" name="comment_txt" ></textarea><br>
                                				<input type="hidden" name = "wid" value = "<?php echo $posts['id']?>"><br>
                                				<div class="containe">						  	
                              						  <button type="button" class="btn btn-default btn-sm" style="background-color:<?php echo $bg_color;?>; 
                              						          color:<?php echo $color;?>; float:right;" onclick="like(<?php echo $_SESSION['user_id'];?>,<?php echo $posts['id'];?>)"; id="btn_heart<?php echo $posts['id'];?>">
                                                <span class="glyphicon glyphicon-heart" style="color:<?php echo $color;?>" id="heart<?php echo $posts['id'];?>"></span> <span id="rating<?php echo $posts['id'];?>"><?php echo $like_count;?></span> 
                                            </button>
                      								        <input type="submit" class="btn btn-default btn-sm" style="float:right;" value="ADD COMMENT"> 
                                  			</div>
                      								        <div class="checkbox">
                                                <label style="float:right;"><input type="checkbox" name="checkbox" value="admin" checked>as admin</label>
                                              </div>
                                              <input type="hidden" name = "gid" value = "<?php echo $group['id']?>"><br>
                      						  </form><br>
                              </td> 
                            </tr>
                            <tr>
                              <td colspan="2">
                                

<script type="text/javascript">
  
  function like(user_id, wall_id){
    
    $.post("ajax/controller.php?act=rate_wall_group",{
        
        uid: user_id,
        wid: wall_id
        
      },
      function(data){
        
        $("#rating"+wall_id).html(data); 
        
      }
    );
    
    document.getElementById("heart"+wall_id).style.color = "#ffffff";
    document.getElementById("btn_heart"+wall_id).style.color = "#ffffff";
    document.getElementById("btn_heart"+wall_id).style.backgroundColor = "#cc0000";
  }
  
  function delete_wall(wall_id){
    
    $.post("ajax/controller.php?act=delete_wall_group",{
      
        wid: wall_id
      
      },
      function(data){}
    );
    
    document.getElementById("w"+wall_id).style.display = "none";
    
  }
  
</script>                                
<?php

                              $query_comm = mysql_query("SELECT c.*, u.name, u.surname, u.avatar
                                                        FROM comments_g c
                                                        LEFT OUTER JOIN users u ON u.id=c.user_id
                                                        WHERE c.wall_id=".$posts['id']." AND c.state=1
                                                        ");
                                                        
                                if(mysql_num_rows($query_comm)>0){
                                  
                                    while($comm=mysql_fetch_array($query_comm)){
                                                        
?>                              
                              <div class="row" id="comm<?php echo $comm['id'];?>"> 
                                <div class="col-md-2">
                                  <img class="img-responsive img-thumbnail" src="images/<?php if($comm['as_admin']==1){ echo $group['avatar']; } else{ echo $comm['avatar'];}?>" width="100%"><br>
                                </div>
                                <div class="col-md-10">
                                  <table class="table">
                                    <thead>
                                      <tr>
                                        <th><?php if($comm['as_admin']==1){echo $group['name'];} else{ echo $comm['name']." ".$comm['surname'];}?> 
                                        <small style="float:right; color:#838383;"><?php echo $comm['post_date']?> 
                                        <?php if($comm['user_id']==$_SESSION['user_id']){ ?>
                                          <button class="btn btn-link" onclick="delete_comm(<?php echo $comm['id'];?>)">
                                            <span class="glyphicon glyphicon-remove"></span>
                                          </button> <?php } ?>
                                        </small></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>
                                            <?php echo $comm['comment']?> 
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              
<script type="text/javascript">
  
 function delete_comm(comm_id){
    
    $.post("ajax/controller.php?act=delete_comment_group",{
      
        cid: comm_id
      
      },
      function(data){}
    );
    
    document.getElementById("comm"+comm_id).style.display = "none";
    
  }
</script>                          
                        
<?php
                         
                                    
                            }
                            
                          } 
?>

                
                                          </td>
                                          
                                        </tr>
                                      </tbody>
                                    </table>  
                                </div>
                          </div> 
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3"></div>
                  </div>


<?php
                      }
                     }

              


?>
 </div>
                       






