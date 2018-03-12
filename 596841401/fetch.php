<?php

function get_articles($real_user,$user_id){ 

				include('db_conx.php');	
				include('return_date.php');
					$get_articles="select * from articles  order by RAND() limit 20";
					$run_topics=mysqli_query($db_conx,$get_articles);
					
					while($row=mysqli_fetch_row($run_topics)){			
							$contentname=ucwords($row['4']);	
							$id= $row['0'];
							$tagline=ucfirst($row['5']);
							$genre=ucwords($row['6']);
							$raw_content = $row['7'];
							$raw_content_length = strlen($raw_content);
							$content_trimmed_array = str_split($raw_content,1000); 
							$to_be_cleaned = $content_trimmed_array[0];
							$content = preg_replace('/<[^>]*$/', '', $to_be_cleaned);
							$date_added =$row['8'];
							$date = explode("-", $date_added);
							$year= $date[0];
							$month = $date[1];
							$day = $date[2];
							$date_added= return_date($year,$day,$month);
							$username = $row['1'];
							$likes = $row['2'];
							$views =$row['3'];
							$dislikes =$row['9'];
							$fetch_name ="SELECT * FROM users where username='$username' ";
							$query = mysqli_query($db_conx, $fetch_name);
							$user_data = mysqli_fetch_row($query);
							$user_name =ucwords($user_data['15']);
							$comment = $row['10'];
							$views = $views + 1;
							$update_views = "update articles set views = '$views' where article_id = '$id'";
							$execute_update_query = mysqli_query($db_conx,$update_views);
							$check_like_status = "select like_status from like_check where article_id = '$id' and user_name = '$user_id' ";
							$execute_like_status = mysqli_query($db_conx,$check_like_status);
							$if_user_liked = mysqli_num_rows($execute_like_status);
							$img_src = "../css/thumb.png";
							$color = "";
							if($if_user_liked!=0)
							{	$fetching_row = mysqli_fetch_row($execute_like_status);
								$fetch_like_status = $fetching_row[0];
								if($fetch_like_status=='Y')
								{
									$color = "red";
									$img_src = "../css/heart.png";

								}

							}else{
								$color = "";
								$img_src="../css/thumb.png";
							}
							$content_length = strlen($content);

						//	$readmore = "<span id='".$id."readmore_fetched_content'></span>";

							$content = $content;



							echo '<br><br><div class="blog-post">
							<div id="post-content">
                          <h2 class="blog-post-title">'.$contentname.' <span class="tagline"> ( '.$tagline.' ) </span><br><span style="background-color:#2196F3;" class="badge">'.$genre.'</span></a><br></h2>
              			<p class="blog-post-meta"> On '.$date_added.' &nbsp; &nbsp; &nbsp; By &nbsp;<a href="profile.php?u='.$username.'">'.$user_name.'</a>       <span style="color:#928f8f;margin-left:15%;"><img src="../css/views.png"/> '.$views.' Views<span></p>
              			<div id="'.$id.'content" style="margin-right:1%;">'.$content.'</div>
              			<span id="'.$id.'more"><a id="'.$id.'_'.$content_length.'_'.$raw_content_length.'"  onclick="readmore(this.id)"  href="#">...(more)</a></span> 
              						<script>
									document.getElementById("'.$id.'_'.$content_length.'_'.$raw_content_length.'").addEventListener("click", function(event){
									    event.preventDefault()
									});
									</script>
              			<p class="lead">
              			<div class="btn-group">
  						
  						<button type="button" id="'.$id.'" onClick="reply_click(this.id)" class="btn btn-default"><span id="'.$id.'like_color" style="color:'.$color.'"><img id="'.$id.'img" src="'.$img_src.'"/><span id="'.$id.'likes"> '.$likes.'</span></span></button>
  						
  						<button type="button" id="'.$id.'" onClick="reply_click_dislikes(this.id)" class="btn btn-default"><span><img src="../css/thumb.png"/><span id="'.$id.'dislikes"> '.$dislikes.'</span></span></button>
  						<button type="button" id="commentlogo'.$id.'" onclick="fetchcomments(this.id)" data-toggle="modal" data-target="#commentsmodal" class = "btn btn-default"><span><img src="../css/comment.png"/> '.$comment.'</span></button></p>

						
              			</div><br> <br>
              			<div class="media" style="background-color:#F7F7F7; padding:2%;">
							    <div class="media-left">
							      <img src="profile.png" class="media-object img-circle" style="width:60px">
							    </div>
							    <div class="media-body">
							      <h4 class="media-heading">'.$real_user.'</h4>
							      
							      <div class="col-sm-8 form-inline">
							      <p><input type="text" id="comment'.$id.'" class="form-control"  onfocus="showcommentbutton(this.id)" placeholder="Add a comment"> <button type="button" id="commentbutton'.$id.'" style="visibility:hidden;" class="btn btn-primary" onclick="comment(this.id)">Comment</button> </p>
							      </div>

							    </div>
							  </div><br><br>
							  </div>
          				</div>';	
							

								
						}
					}

					function getcontent($shub){
						//$con=mysqli_connect("localhost","root","","donut") or die("Something went wrong!!");
						//echo $shub;
					}

					?>



					