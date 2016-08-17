<table class="table">
<?php

      $query_fr = mysql_query("SELECT f.*, u.name, u.surname, u.city, u.age, u.avatar
                              FROM friends f
                              LEFT OUTER JOIN users u ON u.id=f.f_id
                              WHERE f.u_id=".$_SESSION['user_id']." AND u.state=1 AND f.state=1
                              ORDER BY u.name
                              ");        
                              
      if(mysql_num_rows($query_fr)>0){
        
        while($fr = mysql_fetch_array($query_fr)){
          
          ?>
  
          <thead>
            <tr>
              <td><br>
                  <div class="row">
                      <div class="col-md-4">
                        <img class="img-responsive img-thumbnail" src="images/<?php echo $fr['avatar'];?>" width="100%"><br>
                      </div>
                      <div class="col-md-8">
                          <table class="table">
                                    <thead>
                                      <tr>
                                        <th><h4><a href="?page=profile&uid=<?php echo $fr['f_id'];?>"><?php echo $fr['name']." ".$fr['surname'];?></a></h4></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>City: <?php echo $fr['city'];?></td>
                                      </tr>
                                      <tr>
                                        <td>Age: <?php echo $fr['age'];?></td>
                                      </tr>
                                    </tbody>
                          </table><br>
                          <div class="containe">
                            <button  type="button" class="btn btn-default " data-toggle="modal" data-target="#msgModal<?php echo $fr['f_id'];?>">
                            Write message
                            </button>
                              <?php include "modules/logged/write_msg.php";?>
                			  </div>
                      </div>
                  </div><br>
              </td>
            </tr>
          </thead>
                  
          
          <?php
          
        }
        
      }                        

?>  
  
</table>