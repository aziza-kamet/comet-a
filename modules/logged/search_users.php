<table class="table">
  <br>
  <div class="form-group">
        
      <div class="row">
        <form action="?" method="get">
          <div class="col-md-10">
                <input type="hidden" name="page" value="friends">
                <input type="hidden" name="fr_page" value="search_users">
                <input type="text" class="form-control" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>">
          </div>
          <div class="col-md-2">
                <button class="btn btn-default" style="float:right;" type="submit">Search</button>
          </div>
        </form>
      </div>
  </div>
    
  <?php
  
      $key="";
  
      if(isset($_GET['search']) && $_GET['search']!=''){
        
        $key="AND name LIKE \"%".$_GET['search']."%\"";
        
      }
  
      $query_searh = mysql_query("SELECT * FROM users WHERE state=1 ".$key." ORDER BY name");
      
      if(mysql_num_rows($query_searh)>0){
        
        while($user = mysql_fetch_array($query_searh)){
          
           
          ?>
        
        <thead>
          <tr>
            <td><br>
                <div class="row">
                    <div class="col-md-4">
                      <img class="img-responsive img-thumbnail" src="images/<?php echo $user['avatar'];?>" width="100%"><br>
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                                  <thead>
                                    <tr>
                                      <th><h4><a href="<?php if($user['id']==$_SESSION['user_id']){?>  ?page=my_profile <?php }else{ ?>
                                      ?page=profile&uid=<?php echo $user['id']; }?>"><?php echo $user['name']." ". $user['surname'];?></a></h4></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>City: <?php echo $user['city'];?></td>
                                    </tr>
                                    <tr>
                                      <td>Age: <?php echo $user['age'];?></td>
                                    </tr>
                                  </tbody>
                        </table><br>
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

