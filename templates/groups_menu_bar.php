<?php

    $g_page="my_groups";//TEMPLATE!!!!

    if(isset($_GET['g_page'])){
        
        if($_GET['g_page']=='my_groups'){
            
            $g_page='my_groups';
            
        }else if($_GET['g_page']=='search_groups'){
            
            $g_page='search_groups';
            
        }else if($_GET['g_page']=='create_group'){
            
            $g_page='create_group';
            
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
                          <li <?php if($g_page==my_groups){?>class="active"<?php }?>><a href="?page=my_groups&g_page=my_groups" style="border-radius:0px;">My groups</a></li>
                          <li <?php if($g_page==search_groups){?>class="active"<?php }?>><a href="?page=my_groups&g_page=search_groups" style="border-radius:0px;">Search groups</a></li>
                          <li <?php if($g_page==create_group){?>class="active"<?php }?>><a href="?page=my_groups&g_page=create_group" style="border-radius:0px;">Create a group</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default" style="border-radius:0px;">
                          <div class="panel-body">
                            <?php 
                            
                                include "modules/logged/".$g_page.".php";
                                
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