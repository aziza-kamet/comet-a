<table class="table">
  <br>
  <div class="form-group">
      <div class="row">
           <form action="?" method="get">
          <div class="col-md-10">
                <input type="hidden" name="page" value="my_groups">
                <input type="hidden" name="g_page" value="search_groups">
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
  
      $query_searh = mysql_query("SELECT * FROM groups WHERE state=1 ".$key." ORDER BY name");
      
      if(mysql_num_rows($query_searh)>0){
        
        while($group = mysql_fetch_array($query_searh)){
          ?>
          
            
  
 <thead>
    <tr>
      <td><br>
          <div class="row">
              <div class="col-md-4">
                <img class="img-responsive img-thumbnail" src="images/<?php echo $group['avatar']; ?>" width="100%"><br>
              </div>
              <div class="col-md-8">
                  <table class="table">
                            <thead>
                              <tr>
                                <th>
                                  <h4><?php if($group['a_id']==$_SESSION['user_id']){ ?>
                                    <a href="?page=my_group&gid=<?php echo $group['id']; ?>"><?php echo $group['name'];?> <small>(you are an admin)</small></a>
                                    <?php } else { ?>
                                    <a href="?page=group&gid=<?php echo $group['id']; ?>"><?php echo $group['name'];?></a><?php }?>
                                  </h4>
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                    <?php echo $group['description'];?> 
                                </td>
                              </tr>
                            </tbody>
                  </table><br>
<?php

    $display_join = "none";
    $display_left = "none";
    
    $check_query=mysql_query("SELECT * FROM subscriptions WHERE u_id=".$_SESSION['user_id']." AND g_id=".$group['id']." AND state=1");
    
    if(mysql_num_rows($check_query)>0){
      
      $display_left = "initial";
      
    }else{
      
      $display_join = "initial";
      
    }
      

?>                  
                  
                  <div class="containe">
          				  <button id="j<?php echo $group['id'];?>" class="btn btn-default" style="display:<?php echo $display_join;?>;" onclick="join(<?php echo $group['id'];?>)">Join</button>
          				  <button id="l<?php echo $group['id'];?>" class="btn btn-default" style="display:<?php echo $display_left;?>;" onclick="left(<?php echo $group['id'];?>)">Unsubscribe</button>
          			  </div>
              </div>
          </div><br>
      </td>
    </tr>
 </thead>
          
<script type="text/javascript">
  
  function join(g_id){
    
    $.post("ajax/controller.php?act=join",{
      
        gid: g_id
        
      },
      function(data){
        
        
      }
    );
    
    document.getElementById("j"+g_id).style.display = "none";
    document.getElementById("l"+g_id).style.display = "initial";
    
  }
  function left(g_id){
    
    $.post("ajax/controller.php?act=left",{
      
        gid: g_id
        
      },
      function(data){
        
        
      }
    );
    
    document.getElementById("j"+g_id).style.display = "initial";
    document.getElementById("l"+g_id).style.display = "none";
    
  }
  
</script>        
          
          <?php
        }
        
      }
           
    ?>

 
         
</table>