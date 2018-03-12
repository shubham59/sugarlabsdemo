<?php

if(isset($_POST['article_id'])){

	$article_id = $_POST['article_id'];

          include('db_conx.php'); 
          

          $no_of_comments = "select comment from articles where article_id ='$article_id' ";

          $run_query = mysqli_query($db_conx,$no_of_comments);

          $fetch_row = mysqli_fetch_row($run_query);

          $number_comments = $fetch_row[0];

          if($number_comments==0)
          {
            echo  '<div class="modal-body">
              
      
                
                <!-- Left-aligned media object -->
               
                  <div class="media-body">
                    
                    <p>No comments, be the first one to express.</p>
                  </div>
                </div>
                <hr>
                
               
            
      </div>
     ';
            exit();
            }


            else{
           
          

          $fetch_comments = "select * from comments where article_id= '$article_id' limit 20";



          $run_fetchcomments = mysqli_query($db_conx,$fetch_comments);

          while($row=mysqli_fetch_row($run_fetchcomments)){     


              $commenter = $row['1'];
              $comment = $row['2'];

              $fetch_commenter_details = "select * from users where username ='$commenter' ";
              $run_fetch_details = mysqli_query($db_conx,$fetch_commenter_details);
              $fetchedrow =mysqli_fetch_row($run_fetch_details);

              $user_name = $fetchedrow['15'];
              $avatar = $fetchedrow['8'];
          


            





	


	echo '			

    
			      <div class="modal-body">
			        
			
                
                <!-- Left-aligned media object -->
                <div class="media">
                  <div class="media-left">
                   <a href="profile.php?u='.$commenter.'"> <img src="profile.png" class="media-object" style="width:60px"></a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="profile.php?u='.$commenter.'">'.$user_name.'</a></h4>
                    <p>'.$comment.'</p>
                  </div>
                </div>
                <hr>
                
               
            
			</div>
     ';

     
}

}

}

?>