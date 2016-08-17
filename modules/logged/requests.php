<table class="table">
<?php

        $query_req=mysql_query("SELECT r.*, u.name, u.surname, u.avatar
																 FROM requests r
																 LEFT OUTER JOIN users u ON u.id = r.u_id
																 WHERE r.f_id=".$_SESSION['user_id']." AND r.state=1 AND u.state = 1");

       
        
        if(mysql_num_rows($query_req)){

											while($req = mysql_fetch_array($query_req)){
											 
											 
		?>
          
                      <thead  id="req<?php echo $req['u_id'];?>">
                        <tr>
                          <td><br>
                              <div class="row">
                                  <div class="col-md-4">
                                    <img class="img-responsive img-thumbnail" src="images/<?php echo $req['avatar'];?>" width="100%"><br>
                                  </div>
                                  <div class="col-md-8">
                                      <table class="table">
                                                <thead>
                                                  <tr>
                                                  <th><h4><a href="?page=profile&uid=<?php echo $req['u_id'];?>"><?php echo $req['name']." ".$req['surname'];?></a></h4></th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>Sent date: <?php echo $req['sent_date'];?></td>
                                                  </tr>
                                                </tbody>
                                      </table><br>
                                        <div class="containe">
                                          
                                          <button id="accept" class="btn btn-default" onclick="accept_req(<?php echo $req['u_id'];?>)">Accept request</button>
                                          <button id="deny" class="btn btn-default" onclick="deny_req(<?php echo $req['u_id'];?>)">Deny request</button>
        
                                			  </div>
                                  </div>
                              </div><br>
                          </td>
                        </tr>
                      </thead>
                      
 <script type="text/javascript">
  
  function accept_req(f_id){
    
    $.post("ajax/controller.php?act=accept_req",{
      
        fid: f_id
        
      },
      function(data){
        
        
      }
    );
    
    document.getElementById("req"+f_id).style.display = "none";
    
  }
   function deny_req(f_id){
    
    $.post("ajax/controller.php?act=deny_req",{
      
        fid: f_id
        
      },
      function(data){
        
        
      }
    );
    
    document.getElementById("req<?php echo $req['u_id'];?>").style.display = "none";
    
  }
  
  
</script>
<?php
											}
											
            }				

?>  

</table>

