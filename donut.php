<?php include('596841401/db_conx.php') ;
 include('596841401/usernamecheck.php');?>
 <?php
include_once("596841401/check_login_status.php");
// If user is already logged in, header that weenis away
if($user_ok == true){
  header("location: 596841401/user.php?u=".$_COOKIE["user"]);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="google-signin-scope" content="profile email">
      <meta name="google-signin-client_id" content="219967070660-0ldeeu4hrb11i7dsoq2i86crspqr104n.apps.googleusercontent.com">
      <script src="https://apis.google.com/js/platform.js" async defer></script>
      <meta name="description" content="">
      <meta name="author" content="">
      <title>SugarLabs Social Demo </title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="javascript/main.js"></script>
      <link href="css/cover.css" rel="stylesheet">

</head>

  
  <body>



      <div class="site-wrapper">
        <div class="site-wrapper-inner">
          <div class="cover-container">
            <div class="masthead clearfix">
              <div class="inner">
                <h3 class="masthead-brand"><a href="#">Sugarlabs</a></h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="#">Home</a></li>
                  <li class="signup" data-toggle="modal" data-target="#myModalsignup"><a href="#">Login</a></li>
                </ul>
              </nav>
            </div>
          </div>


          <div class="row">
              <div class="col-md-12">
                <div class="inner cover">
                  <h1 class="cover-heading">Sugarlabs Socal </h1>
                  <p class="lead">Explore the knowledge of educators</p>
                  <a href="#" class="btn btn-lg btn-default" data-toggle="modal" data-target="#myModalsignup">Learn More</a>
  
                </div>
              </div>
                <div class="col-md-12"><div class="inner cover">
                      <h1 class="cover-heading">Sugar's beta Starting soon</h1>
                     
                </div>
          </div>
          <!-- Triggering the modal with a button -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title title">No, Not Again (Realistic-Fiction) <span class="badge">IIT dreams to Downfall</span><br> -By Shubham Tripathi</h4>
      </div>
      <div class="modal-body">
        <p><h1 class="title bold">Prologue<h2><br><br></p>
        <p class="content title">18th March 2015<br><br>



The coffee with hand in hand was in history now, that was now scripted in the deleted past. A woman was lying on the ground restricted to just primitive movements of muscles that differentiated her to being alive with another dead object almost with the same orientation. Rohit’s books were all over the places, the place had more books than people. <br><br>

The women was still in a world not known to us, thick red eyes and no lateral movements, she hardly seemed alive. I tried but could not evoke courage to speak. I wanted to see my brother one last time but emotions were tough to contain, the inner core hated me, the only question that loaded me with guilt was, why did he call me?? Why was he so desperate to talk to me one last time before meeting the almighty?? 
Why Alisha wanted to talk to me but now she hates me??Why did she say you can’t be his friend, he was a nice person???I was helpless. I had so many questions to answer, my guilt was not allowing me face Rohit’s dead body.
<br><br>
His father spotted me, he walked up to me, his lips were fluttering to speak yet he couldn’t, he just hugged me hiding his emotions. Perhaps the hug had such intensity that my eyes couldn’t resist, I broke into tears. He tapped me on my back trying to control me but emotions drove me to a more obnoxious state. His mother was still sleeping with her son, I wonder if his body although dead realized his presence to her. However when my mind finally limited my emotions with all it had uncle signaled me to follow him. I followed. 
<br><br>
While I moved with him, something that caught my attention and felt strange was the scratches made on the wall, that were possibly made with the human hand with some loud intensity. However the circumstances were not as supportive to get an answer to such curiosity.

“Take this home, it came yesterday”. All he could manage to say in his stammering voice. Two packets from Amazon with a gift wrap, Rohit and online shopping were never even close but those packets………….  

</p>
      </div>
        <div class="modal-footer">
        <a href="#" class="btn btn-lg btn-info signup" data-toggle="modal" data-target="#myModalsignup">Sign Up to Read More</a>
        <button type="button" class="btn btn-default title" data-dismiss="modal">Close</button>
      </div>
    </div>
 </div>
</div>
<!-- Large modal button signup !-->

   
<div class="modal fade" id="myModalsignup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
                <h4 class="modal-title title" id="myModalLabel">
                   Donut : Bringing literature to lives </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a class="title" href="#Login" data-toggle="tab">Login</a></li>
                            <li><a class="title" href="#Registration" data-toggle="tab"> Register</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="Login">
                                <form role="form" class="form-horizontal">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label title">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="emaillogin" onfocus="emptyElement('statuslogin')" onkeyup="restrict('emaillogin')" maxlength="88" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-2 control-label title">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control"  id="password" onfocus="emptyElement('statuslogin')" maxlength="100" placeholder="Password must be atleast 8 digit alphanumeric" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <p class="lead"><span class="label label-primary" id="statuslogin"></span></p>
                                        <button type="button" class="btn btn-primary btn-sm" id="loginbtn" onclick="login()">
                                            Submit</button>
                                        <a href="#"><h5 class="title">Forgot your password?<h5></a>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="Registration">
                                <form role="form" class="form-horizontal" name="signupform" id="signupform" onsubmit="return false;">
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label title">
                                        Name</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <select class="form-control title" id="gender">
                                                    <option>Mr.</option>
                                                    <option>Ms.</option>
                                                    <option>Mrs.</option>
                                                </select>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" id="name" onkeyup="restrict('name')" class="form-control" placeholder="Enter your lovely Name" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label title">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" onfocus="emptyElement('status')" onkeyup="restrict('email')" maxlength="88" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="col-sm-2 control-label title">
                                        Mobile</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="mobile" onkeyup="restrict('mobile')" placeholder="Mobile ten digit number without +91" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label title">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="pass1" onfocus="emptyElement('status')" maxlength="16" placeholder="Password must be 8 digit alphanumeric" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label title">
                                        Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="username" onkeyup="restrict('username');checkusername();" maxlength="16" placeholder="Enter your desired Username" />
                                        <span class="title" id="unamestatus"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <p class="lead"><span class="label label-primary" id="status"></span></p>
                                        <button type="button" class="btn btn-primary btn-sm" id="signupbtn" onclick="signup()" >
                                            Save & Continue</button>
                                       
                                    </div>
                                </div>
                                </form>
                                
                            </div>
                        </div>
                        <div id="OR" class="hidden-xs">
                            OR</div>
                    </div>
                    <div class="col-md-4">
                        <div class="row text-center sign-with">
                            <div class="col-md-12">
                                <h3 class="title">
                                    Social login 
                            </div>
                            <div class="col-md-12">
                              

                                   <div class="g-signin2" id="google" data-width="200" data-height="40" data-onsuccess="onSignIn" "></div>
                                   
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- button signup !-->







          <div class="mastfoot">
            <div class="inner">
               <a href="#"> Romance </a><a href="#"> Mystery </a><a href="#"></a><a href="#"> Horror </a><a href="#"> Drama</a> <a href="#"> Fiction</a>
              <p>follow us on facebook <a href="http://facebook.com/donutIndia">@donutIndia</a>, by <a href="http://facebook.com/shubham.Tripathi.1420">Shubham Tripathi</a></p>
            </div>
          </div>

        </div>

      </div>

    </div>


    

  </body>

  <script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else {
      // The person is not logged into your app or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '728406084008988',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.8' // use graph api version 2.8
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
</script>
</html>
