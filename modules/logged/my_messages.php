<?php

			$query_check = mysql_query("SELECT * FROM users WHERE id!=".$_SESSION['user_id']);

			if(mysql_num_rows($query_check)>0){

				while($chat_user = mysql_fetch_array($query_check)){


					$query = mysql_query("

								SELECT m.*, u.name, u.surname, u.avatar
								FROM messages m
								LEFT OUTER JOIN users u ON u.id = m.from_id
								WHERE (m.from_id = ".$_SESSION['user_id']." AND m.to_id = ".$chat_user['id']." AND m.t_d = 0)
								OR (m.to_id = ".$_SESSION['user_id']." AND m.from_id = ".$chat_user['id']." AND m.f_d = 0 )  
								ORDER BY m.sent_date DESC 

							");


					if(mysql_num_rows($query)>0){

						$msg = mysql_fetch_array($query);

						if($msg['from_id']==$_SESSION['user_id']){ 
?>
						  
						  
        <div class="row" id="<?php echo $msg['id'];?>">
            <div class="col-md-3">
                <img class="img-responsive img-thumbnail" src="images/<?php echo $chat_user['avatar'];?>" width="100%"><br>
                <h4><?php echo $chat_user['name']." ".$chat_user['surname'];?></h4>
            </div>
            <div class="col-md-8">
                <table class="table">
                  <thead>
                    <tr>
                      <th>
                      <a href="?page=messages&m_page=chat&rid=<?php echo $msg['to_id'];?>" style="color:black;"><br>   
                      You</a>
                  <small style="float:right; color:#838383;"><?php echo $msg['sent_date'];?>
                   <button class="btn btn-link" onclick="delete_chat(<?php echo $msg['id'];?>,<?php echo $msg['to_id'];?>)">
                      <span class="glyphicon glyphicon-remove"></span>
                    </button>
                  </small></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><br><?php echo $msg['text'];?> <br>
                      </td>
                    </tr>
                  </tbody>
                </table>
            </div> 
            <div class="col-md-1"></div>
        </div> 
<br>
						  
						  
<script type="text/javascript">
  
 function delete_chat(chat_id, u_id){
    
    $.post("ajax/controller.php?act=delete_chat",{
      
        uid: u_id
      
      },
      function(data){}
    );
    
    document.getElementById(chat_id).style.display = "none";
    
  }
</script>
						  
<?php
						}else if($msg['from_id']==$chat_user['id']){
						  ?>
 
        <div class="row" id="<?php echo $msg['id'];?>">
            <div class="col-md-3">
                <img class="img-responsive img-thumbnail" src="images/<?php echo $msg['avatar'];?>" width="100%"><br>
                <h4><?php echo $msg['name']." ".$msg['surname'];?></h4>
            </div>
            <div class="col-md-8">
                <table class="table">
                  <thead>
                    <tr>
                      <th>
                        <a href="?page=messages&m_page=chat&rid=<?php echo $msg['from_id'];?>" style=" color:black;">                   
                          <?php echo $msg['name']?></a>    
                      <small style="float:right; color:#838383;"><?php echo $msg['sent_date'];?>
                        <button class="btn btn-link" onclick="delete_chat(<?php echo $msg['id'];?>,<?php echo $msg['from_id'];?>)">
                          <span class="glyphicon glyphicon-remove"></span>
                        </button>
                      </small></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><br><?php echo $msg['text'];?> <br>
                      </td>
                    </tr>
                  </tbody>
                </table>
            </div> 
            <div class="col-md-1"></div>
        </div>
<br>						  
						  
<script type="text/javascript">
  
 function delete_chat(chat_id, u_id){
    
    $.post("ajax/controller.php?act=delete_chat",{
      
        uid: u_id
      
      },
      function(data){}
    );
    
    document.getElementById(chat_id).style.display = "none";
    
  }
</script>						  
						  
						  <?php
						  
						}
					}
				}
			}
			

?>
