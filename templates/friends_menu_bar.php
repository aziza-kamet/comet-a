<?php

    $fr_page="my_friends";//TEMPLATE!!!!

    if(isset($_GET['fr_page'])){
        
        if($_GET['fr_page']=='my_friends'){
            
            $fr_page='my_friends';
            
        }else if($_GET['fr_page']=='my_requests'){
            
            $fr_page='my_requests';
            
        }else if($_GET['fr_page']=='requests'){
            
            $fr_page='requests';
            
        }else if($_GET['fr_page']=='search_users'){
            
            $fr_page='search_users';
            
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
                    <div class="col-md-12">
                        <ul class="nav nav-pills">
                          <li <?php if($fr_page==my_friends){?>class="active"<?php }?> ><a href="?page=friends&fr_page=my_friends" style="border-radius:0px;">My friends</a></li>
                          <li <?php if($fr_page==my_requests){?>class="active"<?php }?>><a href="?page=friends&fr_page=my_requests" style="border-radius:0px;">My requests</a></li>
                          <li <?php if($fr_page==requests){?>class="active"<?php }?>><a href="?page=friends&fr_page=requests" style="border-radius:0px;">Requests for me</a></li>
                          <li <?php if($fr_page==search_users){?>class="active"<?php }?>><a href="?page=friends&fr_page=search_users" style="border-radius:0px;">Search</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default" style="border-radius:0px;">
                          <div class="panel-body">
                            <?php 
                            
                                //include "modules/logged/my_friends.php";
                                //include "modules/logged/my_requests.php";
                                //include "modules/logged/requests.php";
                                include "modules/logged/".$fr_page.".php";
                            
                            ?>
                          </div>
                        </div>
                    </div>
                </div>
                <br><br>
              </div> 
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>  
    
</div>