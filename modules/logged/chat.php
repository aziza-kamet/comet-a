
<?php

        if(isset($_GET['rid'])){
        
        		$u_id = $_GET['rid'];
        
        		if(is_numeric($u_id)){
        		    
        		    $tmp = mysql_query("SELECT * FROM users WHERE id=".$u_id);
        		    $ns = mysql_fetch_array($tmp);
?>


                    <h2><?php echo $ns['name'];?></h2>
                <div class="panel panel-default">
                    <div class="panel-body" style="min-height: 500px; max-height: 500px; overflow-y: scroll;">
                        
                        
<?php
        			$query = mysql_query("
        
        						SELECT m.*, u.name, u.avatar
        						FROM messages m
        						LEFT OUTER JOIN users u ON u.id = m.from_id
        						WHERE (m.from_id = ".$_SESSION['user_id']." AND m.to_id = ".$u_id." AND m.t_d = 0)
        						OR (m.to_id = ".$_SESSION['user_id']." AND m.from_id = ".$u_id." AND m.f_d = 0 )  
        						ORDER BY m.sent_date ASC 
        
        					");
        					
        					while($msg = mysql_fetch_array($query)){
							
						if($msg['from_id']==$u_id){
?>
 
                       
                        <div class="row">
                            <div class="col-md-2">
                                <img class="img-responsive img-circle" src="images/<?php echo $msg['avatar'];?>" width="100%"><br>
                            </div>
                            <div class="col-md-8" >
                                <table class="table" >
                                  <thead>
                                    <tr>
                                      <th><?php echo $msg['name'];?>
                                      <small style="float:right; color:#afafaf;"><?php echo $msg['sent_date'];?></small></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td><br><?php echo $msg['text'];?><br>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div> 
                            <div class="col-md-2"></div>
                        </div> 

<?php

            }else if($msg['from_id']==$_SESSION['user_id']){

?>

                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8" >
                                <table class="table" >
                                  <thead>
                                    <tr>
                                      <th><small  style="color:#afafaf;" ><?php echo $msg['sent_date'];?></small>
                                            <div style="float:right";>You</div></th>
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
                            <div class="col-md-2">
                                <img class="img-responsive img-circle" src="images/<?php echo $msg['avatar'];?>" width="100%"><br>
                            </div>
                        </div> 

<?php
            }
            
          }
        }
    }
?>                      
                        
                        
                    
                        
                    </div>
                </div>   
        <div class="container-fluid">        
            <div class="row">
                    <form class="form-group" action="?act=write_msg" method="post">
                        <div class="row">
                            <div class="col-md-10">
                                <textarea class="form-control" id="chat_text" row="10" name="text"></textarea>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" class="btn btn-default" style="float:right;" value="Send">
                                <input type="hidden" name="fid" value="<?php echo $u_id;?>">
                            </div>
                        </div>
                    </form>
            </div>
        </div>
      