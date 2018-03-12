<?php
include_once("check_login_status.php");
// Initialize any variables that the page might echo
$u = "";
$sex = "Male";
$userlevel = "";
$country = "";
$joindate = "";
$lastsession = "";
// Make sure the _GET username is set, and sanitize it
if(isset($_GET["u"])){
  $u = preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
} else {
    header("location: ../donut.php");
    exit(); 
}
// Select the member from the users table
$sql = "SELECT * FROM users WHERE username='$u' LIMIT 1";
$user_query = mysqli_query($db_conx, $sql);
// Now make sure that user exists in the table
$numrows = mysqli_num_rows($user_query);
if($numrows < 1){
  header("location: ../donut.php");
  exit();
}
// Check to see if the viewer is the account owner
$isOwner = "no";
if($u == $log_username && $user_ok == true){
  $isOwner = "yes";
}
if($isOwner=="no"){
  header("location: ../donut.php");
  exit();
}
// Fetch the user row from the query above
while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
  $profile_id = $row["id"];
  $gender = $row["gender"];
  $country = $row["country"];
   $avatar =$row ["avatar"];
  $userlevel = $row["userlevel"];
  $signup = $row["signup"];
  $lastlogin = $row["lastlogin"];
  $username = ucwords($row["name"]);
  $user_name =$row["username"];
  $joindate = strftime("%b %d, %Y", strtotime($signup));
  $lastsession = strftime("%b %d, %Y", strtotime($lastlogin));
  if($gender == "f"){
    $sex = "Female";
  }
}
?>






<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel=icon href=../css/donut.png>
      <title><?php echo ucwords($username); ?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
     <link href='https://fonts.googleapis.com/css?family=New Rocker' rel='stylesheet'>
      <link rel="stylesheet" type="text/css" href="../css/main.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=n0agidhz3ts8rcb2cj1000d93gcubpwioedyrxocls2izdiu"></script>
      
      
      
<style>
.loader {
  border: 5px solid #f3f3f3;
  border-radius: 50%;
  border-top: 5px solid #3498db;
  width: 50px;
  height: 50px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

  


</style> 
      

</head>

  
  <body>
<nav class="nav-container navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../donut.php"><span class="donut"><img src="../css/donut.png"/>SugarlabsDemo </span></a>
    </div>
    

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $username?><span>  <img src="<?php echo $avatar;?>" alt="profile.png" class="img-circle" width="20" height="20"></span></a>
          <ul class="dropdown-menu dropdown-self">
            <li><a href="../donut.php">Home</a></li>
            <li><a href="settings.php?u=<?php echo $user_name;?>">Settings</a></li>
            <li><a href="profile.php?u=<?php echo $user_name;?>">Profile</a></li>
             <li><a href="#" data-toggle="modal" data-target="#myModaleditor">Write</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="contact.php">Contact Us</a><a href="../logout.php">Logout</a><a href="advertise.php">Advertise with us</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right test">
         
    </div>
       
      </ul>
    </div><!-- /.navbar-collapse -->
  </div>
</nav>
  <!-- Content-->

   <div class="container">
      <div class="row">
      <div class="col-sm-9 col-md-9 col-lg-9 blog-main">
        <div class="blog-header">
            <div class="container">
              <h1 class="blog-title">Sugars <button type="button" class="btn btn-default btn-lg write" data-toggle="modal" data-target="#myModaleditor"><span id="writelogo" class="glyphicon glyphicon-pencil"></span> Start Writing</button></h1>
              <p class="lead blog-description">Explore the users with great knowledge</p>
            </div>
          </div>

   
      

         

            <?php include('fetch.php'); $real_user= $username; $user_id=$user_name; get_articles($real_user,$user_id); ?>
         





        

      </div><!-- /.blog-main -->



        <div id="sidebar" class="col-sm-3 col-md-3 col-lg-3  blog-sidebar">
            <div class="sidebar">
              <div class="sidebar-module sidebar-module-inset">
                          <h4 class="trending">Trending  <img src="../css/trending.png"/></h4>
                          <ol class="list-unstyled">
                          <li><a href="#">No, Not Again </a></li>
                          <li><a href="#" class="text-info">By Shubham Tripathi</a></li>
                          <li><a href="#">The immortals of meluha</a></li>
                          <li><a href="#" class="text-info">By Shashank Ahuja </a></li>
                          </ol>
              </div>

          <div class="sidebar-module">
                       <h4 class="trending">Social Connects  <img src="../css/social.png"/></h4>
                        <ol class="list-unstyled">
                        <li><a href="#">No, Not Again (793 views)</a></li>
                        <li><a href="#" class="text-info">By Shubham Tripathi</a></li>
                        <li><a href="#">The immortals of meluha(492 views)</a></li>
                        <li><a href="#" class="text-info">By Shashank Ahuja </a></li>
                        </ol>
                         <h4 class="trending">Social Connects  <img src="../css/social.png"/></h4>
                        <ol class="list-unstyled">
                        <li><a href="#">No, Not Again </a></li>
                        <li><a href="#" class="text-info">By Shubham Tripathi</a></li>
                        <li><a href="#">The immortals of meluha</a></li>
                        <li><a href="#" class="text-info">By Shashank Ahuja </a></li>
                        </ol>


          </div>
        <div class="sidebar-module">
            People You may Know
            </div>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

   
  
  <!-- Trigger the modal with a button -->
  
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModaleditor" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Post your first Sugar</h4>
        </div>
        <div class="modal-body">
        <div class="form-group">
  <label for="contentname">Title of your Content</label>
  <input type="text" class="form-control" id="contentname" placeholder="Not more than 50 Characters">
</div>
<div class="form-group">
  <label for="tagline">Tagline</label>
  <input type="text" class="form-control"  id="tagline" placeholder="Not more than 100 Characters">
</div>
<div class="form-group">
  <label for="genre">Genre</label>
  <input type="text" class="form-control" id="genre" placeholder="Not more than 30 characters">
</div>
  
  <script>tinymce.init({ selector:'textarea#editor1',
        height: 300 });</script>
        
  <textarea id="editor1"></textarea>

                              
        </div>
        <div class="modal-footer">
          <span class="label label-success" id="published"></span>
          <button type="button" onclick= "publish()" class="btn btn-info">Publish</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</div>
<script>
  
  function ajaxObj( meth, url ) {
  var x = new XMLHttpRequest();
  x.open( meth, url, true );
  x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  return x;
}

function ajaxReturn(x){
  if(x.readyState == 4 && x.status == 200){
      return true;  
  }
}

function reply_click(clicked_id)
{
   
    var article = clicked_id;
    var username="<?php echo $user_name; ?>";
    var ajax = ajaxObj("POST","like.php");
    var old_like_value = document.getElementById(clicked_id+'likes').innerHTML;
    document.getElementById(clicked_id+"likes").setAttribute("onClick","");
        ajax.onreadystatechange = function() {
          if(ajaxReturn(ajax) == true) {
              document.getElementById(clicked_id+'likes').innerHTML = " "+ ajax.responseText;
              var clicked_button_color = document.getElementById(clicked_id+'likes').innerHTML;
              var new_like_value = parseInt(clicked_button_color);
              if(new_like_value>old_like_value)
              {
                document.getElementById(clicked_id+"like_color").style.color="red";
                document.getElementById(clicked_id+"img").src = "../css/heart.png";
                document.getElementById(clicked_id+"likes").setAttribute("onClick","reply_click(this.id)");
              }
              else{
                document.getElementById(clicked_id+"like_color").style.color = "";
                document.getElementById(clicked_id+"img").src ="../css/thumb.png";
                document.getElementById(clicked_id+"likes").setAttribute("onClick","reply_click(this.id)");

              }
              
          }
        }
        ajax.send("article="+article+"&username="+username);
}

function reply_click_dislikes(clicked_id)
{
   
    var articledislikes = clicked_id;
    var username="<?php echo $user_name; ?>";
    var ajax = ajaxObj("POST","dislikes.php");

        ajax.onreadystatechange = function() {
          if(ajaxReturn(ajax) == true) {
              document.getElementById(clicked_id+'dislikes').innerHTML = " "+ ajax.responseText;
            
             
              
          }
        }
        ajax.send("articledislikes="+articledislikes+"&username="+username);
}



function publish(){

  var contentname = document.getElementById("contentname").value;
  var  temp= tinymce.activeEditor.getContent({format: 'html'});
  var content = new tinymce.html.Serializer().serialize(new tinymce.html.DomParser().parse(temp));
  var genre = document.getElementById("genre").value;
  var username = "<?php echo $user_name ; ?>";
  var tagline = document.getElementById("tagline").value;

if(contentname == "" || content == "" || genre == "" || tagline == ""){
   document.getElementById("published").innerHTML = "Fill all the feilds";
}
  else if(contentname.length>50){
    document.getElementById("published").innerHTML = "Content Title should be less than 50 characters";
  }
  else if(tagline.length>100){
    document.getElementById("published").innerHTML = "Tagline should be less than 100 characters";
  }
  else{
  
  if(username != ""){
    document.getElementById("published").innerHTML = 'checking ...'; 
    var ajax = ajaxObj("POST","publish.php");
        ajax.onreadystatechange = function() {
          if(ajaxReturn(ajax) == true) {
              document.getElementById("published").innerHTML = ajax.responseText;
              location.reload();
              
          }
        }
        ajax.send("username="+username+"&content="+content+"&contentname="+contentname+"&tagline="+tagline+"&genre="+genre);
    }
  }
}        
</script>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p><?php   getcontent();?> </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

    <script type="text/javascript">
  function zoom(){
    document.body.style.zoom = "80%";
  }


  function showcommentbutton(commentid){

  var rx = new RegExp;
  rx = /[^0-9]/g; 
       var buttonid= commentid.replace(rx, "");
    
    document.getElementById("commentbutton"+buttonid).style.visibility = "visible";
  }

  function comment(buttonid){

      var rx = new RegExp;
      rx = /[^0-9]/g;
      var articleid= buttonid.replace(rx, "");
      var username = "<?php echo $user_name; ?>";
      var commentid = "comment" + articleid;
      var isOwner = "<?php echo $isOwner;?>";
      var comment = document.getElementById(commentid).value;
      
      if(comment==""){alert("Please write something");}

      else if(comment!= "" && articleid!="" && isOwner=="yes"){
      
    var ajax = ajaxObj("POST","comment.php");
        ajax.onreadystatechange = function() {
          if(ajaxReturn(ajax) == true) {

               var rx = new RegExp;
                  rx = /[^0-9]/g;
                var buttonid= commentid.replace(rx, "");
    
        document.getElementById("commentbutton"+buttonid).className = "btn btn-success";
         document.getElementById("commentbutton"+buttonid).innerHTML = "Commented";
         setTimeout(function(){document.getElementById("commentbutton"+buttonid).style.visibility = "hidden"; 
         document.getElementById("commentbutton"+buttonid).className = "btn btn btn-primary"; 
          document.getElementById("commentbutton"+buttonid).innerHTML = "Comment";}, 1000);
          document.getElementById(commentid).value="";
          document.getElementById("commentlogo"+buttonid).innerHTML= "<img src='../css/comment.png'/>" + ajax.responseText  +"</span>";
          }
        }
        ajax.send("username="+username+"&articleid="+articleid+"&comment="+comment);
    }



  }


  function fetchcomments(comment_buttonid){

                  var rx = new RegExp;
                  rx = /[^0-9]/g;
                var article_id= comment_buttonid.replace(rx, "");
                document.getElementById("commentsbody").innerHTML = '<div style="margin:50%;" id="loader"></div>';

                if(article_id!= ""){
              document.getElementById("loader").innerHTML = '<div class="loader"></div>';  
              var ajax = ajaxObj("POST","fetchcomments.php");
                  ajax.onreadystatechange = function() {
                  if(ajaxReturn(ajax) == true) {
                    document.getElementById("commentsbody").innerHTML = "";
              document.getElementById("commentsbody").innerHTML = ajax.responseText;
              
          }
        }
        ajax.send("article_id="+article_id);
    }



  }

  


  function readmore(readmore_id){

     var x = readmore_id;
    var array = x.split("_");
    var article_id = array[0];
 

      var rx = new RegExp;
      rx = /[^0-9]/g;
      var splitted = array[1];
      var total_content_length = array[2];
      var offset = splitted.replace(rx,"");
      offset = parseInt(offset);
     

     
      

  if(article_id!= ""){
             
               document.getElementById(readmore_id).innerHTML ="Fetching...."; 
              var ajax = ajaxObj("POST","fetchcontents.php");

                  ajax.onreadystatechange = function() {
                  if(ajaxReturn(ajax) == true) {
                    
                   
                 /*   document.getElementById(article_id+"content").innerHTML = "";
                    document.getElementById(article_id+"content").innerHTML = ajax.responseText;
                    document.getElementById(article_id+"readmore_fetched_content").setAttribute("id",random);
                    document.getElementById(readmore_id).innerHTML ="Read More";   
                    var new_offset = offset + (content_length);
                    var new_id = article_id + "_" +new_offset+ "_" + total_content_length;
                    alert(new_offset);
                    document.getElementById(readmore_id).setAttribute("id", new_id);
                    var check_length = document.getElementById(article_id+"content").innerHTML;
                    var new_legth = check_length.length;
                    if(new_offset==total_content_length){
                      document.getElementById(new_id).style.visibility = "none" ;  
                      document.getElementById(new_id).setAttribute("onclick", "show_less(this.id)");
                      */


                    document.getElementById(article_id+"content").innerHTML = "";
                    document.getElementById(article_id+"content").innerHTML = ajax.responseText;
                    var flag;
                    flag = ajax.responseText.match(/<flag.*>/);
                    document.getElementById(readmore_id).innerHTML ="Read More"; 
                    var content_length = ajax.responseText.length;
                    var new_offset = content_length;
                    var new_id = article_id + "_" +new_offset+ "_" + total_content_length;
                    document.getElementById(readmore_id).setAttribute("id", new_id);
                    
                    
                    
              if(flag!=null){
                
                      document.getElementById(new_id).style.visibility = "hidden" ;  
                     
                      }
              
          }



        }
        ajax.send("article_id="+article_id + "&offset="+offset);
    }

}

</script>




<!-- Modal -->
<div id="commentsmodal" class="modal fade" role="dialog">
<div class="modal-dialog">

    
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Comments</h4>
            </div>
            <div class="modal-body" id="commentsbody">
            <div style="margin:50%;" id="loader"></div>

          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
   
</div>
<script>


</script>
  

  </body>
</html>
