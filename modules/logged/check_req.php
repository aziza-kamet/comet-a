<?php

    $disp_send = "none";
    $disp_cancel = "none";
    $disp_write = "none";
    $disp_ad = "none";
    
    
    $query_to = mysql_query("SELECT * FROM requests WHERE u_id=".$_SESSION['user_id']." AND f_id=".$profile['id']." ORDER BY sent_date DESC");
    $query_from = mysql_query("SELECT * FROM requests WHERE u_id=".$profile['id']." AND f_id=".$_SESSION['user_id']." ORDER BY sent_date DESC");
    
    $to=0;
    $from=0;
    
    if(mysql_num_rows($query_to)){
      
      $req_to = mysql_fetch_array($query_to);
      
      $to++;
      
    }
    
    if(mysql_num_rows($query_from)){
        
       $req_from = mysql_fetch_array($query_from);
       
       $from++;
       
      }
      
      if($to>0 && $from >0){
        
            if($req_to['sent_date']>$req_from['sent_date']){
      
                  if($req_to['state']=="0"){
                    
                      $disp_send="initial";
                    
                  }else if($req_to['state']=="1"){
                    
                        $disp_cancel="initial";
                    
                  }else {
                      
                        $disp_write = "initial";
                  }
                
            }else {
                
                  if($req_from['state']=="0"){
                    
                      $disp_send="initial";
                    
                  }else if($req_from['state']=="1"){
                    
                        $disp_ad="initial";
                    
                  }else {
                      
                        $disp_write = "initial";
                  }
                
                
            }
        
      }else if($to>0){
          
          
              if($req_to['state']=="0"){
                
                    $disp_send="initial";
                
              }else if($req_to['state']=="1"){
                
                    $disp_cancel="initial";
                
              }else {
                  
                    $disp_write = "initial";
              }
          
      }else if($from>0){
          
              if($req_from['state']=="0"){
                    
                  $disp_send="initial";
                
              }else if($req_from['state']=="1"){
                
                    $disp_ad="initial";
                
              }else {
                  
                    $disp_write = "initial";
              }
          
      }else{
          
          $disp_send="initial";
          
      }

?>                