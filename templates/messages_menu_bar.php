<?php

    $m_page="my_messages";

    if(isset($_GET['m_page'])){
        
        if($_GET['m_page']=='my_msgs'){
            
            $m_page='my_messages';
            
        }else if($_GET['m_page']=='chat'){
            
            $m_page='chat';
            
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
                          <li <?php if($m_page==my_messages){?>class="active"<?php }?>><a href="?page=messages&m_page=my_msgs" style="border-radius:0px;">My messages</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default" style="border-radius:0px;">
                          <div class="panel-body">
                            <?php 
                            
                                include "modules/logged/".$m_page.".php";
                            
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