<table class="table">
<?php

    $query=mysql_query("SELECT s.*, g.name, g.description, g.a_id, g.avatar
                        FROM subscriptions s
                        LEFT OUTER JOIN groups g ON g.id=s.g_id
                        WHERE s.u_id=".$_SESSION['user_id']." AND s.state=1 AND g.state=1
                        ORDER BY g.create_date DESC");
    
    
    if(mysql_num_rows($query)){
      
      while($group = mysql_fetch_array($query)){
        
        ?>
        
        
  <thead id="<?php echo $group['g_id'];?>">
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
                                    <a href="?page=my_group&gid=<?php echo $group['g_id']; ?>"><?php echo $group['name'];?> <small>(you are an admin)</small></a>
                                    <?php } else { ?>
                                    <a href="?page=group&gid=<?php echo $group['g_id']; ?>"><?php echo $group['name'];?></a><?php }?>
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
                  <div class="containe">
          				  <button class="btn btn-default" onclick="left(<?php echo $group['g_id'];?>)">Unsubscribe</button>
    			  </div>
              </div>
          </div><br>
      </td>
    </tr>
  </thead>
  
<script type="text/javascript">
  
  

  function left(g_id){
    
    $.post("ajax/controller.php?act=left",{
      
        gid: g_id
        
      },
      function(data){
      }
    );
    
    document.getElementById(g_id).style.display = "none";
    
  }

</script>         
        
        <?php
      }
      
    }

?>  
  
  
</table>