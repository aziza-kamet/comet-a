<nav class="navbar navbar-default navbar-fixed-top" >    
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="navbar-header ">
              <a class="navbar-brand" href="?page=auth" style="color:#ffffff">Comet-A</a>
            </div>
        </div>
        <div class="col-md-6">
            <ul class="nav navbar-nav" >
                <li <?php if(isset($_GET['page'])){if($_GET['page']==my_profile){?>class="active"<?php }}?> ><a href="?page=my_profile">My profile</a></li>
                <li <?php if(isset($_GET['page'])){if($_GET['page']==news){?>class="active"<?php }}?>><a href="?page=news">My news</a></li>
                <li <?php if(isset($_GET['page'])){if($_GET['page']==friends){?>class="active"<?php }}?>><a href="?page=friends">My friends</a></li> 
                <li <?php if(isset($_GET['page'])){if($_GET['page']==messages){?>class="active"<?php }}?>><a href="?page=messages">My messages</a></li>
                <li <?php if(isset($_GET['page'])){if($_GET['page']==my_groups){?>class="active"<?php }}?>><a href="?page=my_groups">My groups</a></li>
            </ul>
        </div>
        <div class="col-md-2">
            <form action="?act=log_out" method="post" style="padding-top:13px; float:right;">
              <input type="submit" class="btn btn-link" value="Log out" style="color:#ffffff;">
            </form>
        </div>
    </div>
    
  </div>
</nav><br><br><br>