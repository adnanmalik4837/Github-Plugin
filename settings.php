
<?php

function github_settings_page_html(){


global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_namee = $wpdb->prefix . "gh_temp_table";



 $check = $wpdb->get_var( "SELECT COUNT(*) FROM $table_namee");  
if($check>0)
{
?>
<div id="lo">  <center>
<form method="post" action="">
   <div align="center"><input type="submit" name="logout" value="Sign Out" style="background:#ff0000;font-size:20px;color:white"></div></from>  </center></div>


    <?php

    if(isset($_POST['logout'])){
?><script>

  var x = document.getElementById("lo");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

</script><?php
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_na = $wpdb->prefix . "gh_temp_table";
$delete = $wpdb->query("TRUNCATE TABLE $table_na");
?>

<div  id="myDIV">
<h1 align="center">Sign In Here</h1>
        <center>
            <form method="post" action="">
                User Name :<br><input type="text" name="value1"><br>
                User Pass :<br><input type="password" name="value2"><br>
             <br><input type="hidden" name="value"><br>
                <div align="center">
                    <input type="submit" name="submit" value="Sign In" style="background:#0099ff;font-size:20px;color:white">
                    <input type="submit" name="signup" value="Sign Up" style="background:#00cc99;font-size:20px;color:white">
                </div>
            </form>
        </center></div>


<?php
}

    if(isset($_POST['submit'])){
        $value1=$_POST['value1'];
        $value2=$_POST['value2'];
      
       
 if($value1=='') {
            echo "<script>alert('Please Enter User Name')</script>";
            exit();
        }

        if($value2=='') {
            echo "<script>alert('Please Enter Password')</script>";
            exit();
        }

global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_nam = $wpdb->prefix . "github_signup";

 $checks = $wpdb->get_var( "SELECT COUNT(*)  FROM $table_nam where user_name= '$value1' AND user_pass='$value2' ");  
 if($checks>0)
{

?>
<script>

  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

</script>


    <?php


echo '<center><h1 style="color:blue;">You are Already Login! You Can Aceess Repostries And Commits Pages</h1>';



global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_namee = $wpdb->prefix . "gh_temp_table";



 $check = $wpdb->get_var( "SELECT COUNT(*) FROM $table_namee where user_name= '$value1' AND user_pass='$value2'");  
if($check>0)
{
echo 'Your Are Already SignIn';

}
else
{
$wpdb->insert( 
  ''.$table_namee.'', 
  array( 
    'user_name' => $value1,  
    'user_pass' =>  $value2
  ), 
  array( '%s',
                '%s'
  ) 
);

}





}
else
{
echo 'You Not Login Sucessfully,Pass Or Username Incorrect';
}

    }
 if(isset($_POST['signup'])){

?>
<script>

  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

</script>
<h1 align="center">Sign Up Here</h1>
        <center>
            <form method="post" action="">
               Enter User Name :<br><input type="text" name="value1"><br>
               Enter Email :<br><input type="text" name="value2"><br>
               Enter User Password :<br><input type="password" name="value"><br>
                <div align="center">
                    <input type="submit" name="submit" value="Sign In" style="background:#0099ff;font-size:20px;color:white">
                    <input type="submit" name="signup" value="Submit" style="background:#ffcc00;font-size:20px;color:black">
                </div>
            </form>
<?php
  $value1=$_POST['value1'];
        $value2=$_POST['value2'];
    $value=$_POST['value'];
     
    if($value1=='') {
            echo "<script>alert('Please Enter User Name')</script>";
            exit();
        }

   if($value2=='') {
            echo "<script>alert('Please Enter Email')</script>";
            exit();
        }
   if($value=='') {
            echo "<script>alert('Please Enter Password')</script>";
            exit();
        }
    

global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_name = $wpdb->prefix . "github_signup";



 $check = $wpdb->get_var( "SELECT COUNT(*) FROM $table_name where user_name= '$value1' OR user_email='$value2' ");  
if($check>0)
{
echo 'Credentials Already Exists, You Are Not Registered';
}
else
{
$wpdb->insert( 
  ''.$table_name.'', 
  array( 
    'user_name' => $value1, 
                'user_email' => $value2, 
    'user_pass' =>  $value
  ), 
  array( '%s',
               '%s', 
                '%s'
     
  ) 
);
if($wpdb->insert_id)
{
echo 'You Are Registered Successfully ';
}
else
{
echo 'You Are Not Registered Successfully';
}}?>

<?php
      

}





//echo '<center><h1 style="color:blue;">You are Login Sucessfully! Please Refresh Once For Loading Data</h1>';

}
else
{

?>

<div  id="myDIV">
<h1 align="center">Sign In Here</h1>
        <center>
            <form method="post" action="">
                User Name :<br><input type="text" name="value1"><br>
                User Pass :<br><input type="password" name="value2"><br>
             <br><input type="hidden" name="value"><br>
                <div align="center">
                    <input type="submit" name="submit" value="Sign In" style="background:#0099ff;font-size:20px;color:white">
                    <input type="submit" name="signup" value="Sign Up" style="background:#00cc99;font-size:20px;color:white">
                </div>
            </form>
        </center></div>


<?php
}

    if(isset($_POST['submit'])){
        $value1=$_POST['value1'];
        $value2=$_POST['value2'];
      
       
 if($value1=='') {
            echo "<script>alert('Please Enter User Name')</script>";
            exit();
        }

        if($value2=='') {
            echo "<script>alert('Please Enter Password')</script>";
            exit();
        }

global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_nam = $wpdb->prefix . "github_signup";

 $checks = $wpdb->get_var( "SELECT COUNT(*)  FROM $table_nam where user_name= '$value1' AND user_pass='$value2' ");  
 if($checks>0)
{

?>
<script>

  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

</script>


    
<div id="lo">  <center>
<form method="post" action="">
   <div align="center"><input type="submit" name="logout" value="Sign Out" style="background:#ff0000;font-size:20px;color:white"></div></from>  </center></div>


    <?php

    if(isset($_POST['logout'])){
?><script>

  var x = document.getElementById("lo");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

</script><?php
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_na = $wpdb->prefix . "gh_temp_table";
$delete = $wpdb->query("TRUNCATE TABLE $table_na");
}

echo '<center><h1 style="color:blue;">You are Login Sucessfully! Now You Can Access Repostries And Commits</h1>';



global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_namee = $wpdb->prefix . "gh_temp_table";



 $check = $wpdb->get_var( "SELECT COUNT(*) FROM $table_namee where user_name= '$value1' AND user_pass='$value2'");  
if($check>0)
{
echo 'Your Are Already SignIn';

}
else
{
$wpdb->insert( 
  ''.$table_namee.'', 
  array( 
    'user_name' => $value1,  
    'user_pass' =>  $value2
  ), 
  array( '%s',
                '%s'
  ) 
);

}





}
else
{
echo 'You Not Login Sucessfully,Pass Or Username Incorrect';
}

    }
 if(isset($_POST['signup'])){

?>
<script>

  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

</script>
<h1 align="center">Sign Up Here</h1>
        <center>
            <form method="post" action="">
               Enter User Name :<br><input type="text" name="value1"><br>
               Enter Email :<br><input type="text" name="value2"><br>
               Enter User Password :<br><input type="password" name="value"><br>
                <div align="center">
                    <input type="submit" name="submit" value="Sign In" style="background:#0099ff;font-size:20px;color:white">
                    <input type="submit" name="signup" value="Submit" style="background:#ffcc00;font-size:20px;color:black">
                </div>
            </form>
<?php
  $value1=$_POST['value1'];
        $value2=$_POST['value2'];
    $value=$_POST['value'];
     
    if($value1=='') {
            echo "<script>alert('Please Enter User Name')</script>";
            exit();
        }

   if($value2=='') {
            echo "<script>alert('Please Enter Email')</script>";
            exit();
        }
   if($value=='') {
            echo "<script>alert('Please Enter Password')</script>";
            exit();
        }
    

global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_name = $wpdb->prefix . "github_signup";



 $check = $wpdb->get_var( "SELECT COUNT(*) FROM $table_name where user_name= '$value1' OR user_email='$value2' ");  
if($check>0)
{
echo 'Credentials Already Exists, You Are Not Registered';
}
else
{
$wpdb->insert( 
  ''.$table_name.'', 
  array( 
    'user_name' => $value1, 
                'user_email' => $value2, 
    'user_pass' =>  $value
  ), 
  array( '%s',
               '%s', 
                '%s'
     
  ) 
);
if($wpdb->insert_id)
{
echo 'You Are Registered Successfully ';
}
else
{
echo 'You Are Not Registered Successfully';
}}?>

<?php
      


}



}
function github_register_menu_page(){
add_menu_page('GitHub Plugin','GitHub Setting','manage_options','github-setting','github_settings_page_html','dashicons-screenoptions',20);
  }
add_action('admin_menu','github_register_menu_page');


function repositories_options_page_html(){
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_namee = $wpdb->prefix . "gh_temp_table";



 $check = $wpdb->get_var( "SELECT COUNT(*) FROM $table_namee");  
if($check>0)
{

?>
<div id="RandC"><h1>GITHUB REPOSITORIES PERVIEW PAGE</h1>
 <button id='btnRepos' style="#ffffff:blue; border-style: dotted;   font-weight: bold; font-size: 20px; background-color:#47d147;">REPOSITORIES</button>
 <div id='divResult' ></div>
<form method="post" action="">
   <button type="submit"  name="logout" value="Sign Out" style="#ffffff:blue; border-style: dotted;   font-weight: bold; font-size: 20px; background-color:#ff5c33;">SIGN OUT</button></div></from> </div>

   
  <script>
    	const btnRepos=document.getElementById("btnRepos")
    	
 
    	const divResult=document.getElementById("divResult")
    	btnRepos.addEventListener("click",getRepos)
    	


         
    	async function getRepos()
    	{
     const url="http://api.github.com/search/repositories?q=stars:>1000"
      const reponse=await fetch(url)
      const result=await reponse.json()

      result.items.forEach(i=>{
      	const anchor=document.createElement("a")
     anchor.href=i.html_url;
     anchor.textContent=i.full_name; 	
      	divResult.appendChild(anchor)
	divResult.appendChild(document.createElement("br"))
      })


    	}
    		
    	function clear()
    	{
    		while(divResult.firstChild)
    			divResult.removeChild(divResult.firstChild)
    	}
    </script>

    <?php

    if(isset($_POST['logout'])){
?><script>

  var x = document.getElementById("RandC");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

</script><?php
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_na = $wpdb->prefix . "gh_temp_table";
$delete = $wpdb->query("TRUNCATE TABLE $table_na");


?>

<div  id="myDIV">
<h1 align="center">Sign In Here</h1>
        <center>
            <form method="post" action="">
                User Name :<br><input type="text" name="value1"><br>
                User Pass :<br><input type="password" name="value2"><br>
             <br><input type="hidden" name="value"><br>
                <div align="center">
                    <input type="submit" name="submit" value="Sign In" style="background:#0099ff;font-size:20px;color:white">
                    <input type="submit" name="signup" value="Sign Up" style="background:#00cc99;font-size:20px;color:white">
                </div>
            </form>
        </center></div>


<?php
}

    if(isset($_POST['submit'])){
        $value1=$_POST['value1'];
        $value2=$_POST['value2'];
      
       
 if($value1=='') {
            echo "<script>alert('Please Enter User Name')</script>";
            exit();
        }

        if($value2=='') {
            echo "<script>alert('Please Enter Password')</script>";
            exit();
        }

global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_nam = $wpdb->prefix . "github_signup";

 $checks = $wpdb->get_var( "SELECT COUNT(*)  FROM $table_nam where user_name= '$value1' AND user_pass='$value2' ");  
 if($checks>0)
{

?>
<script>

  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

</script>



    <?php

   /* if(isset($_POST['logout'])){
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_na = $wpdb->prefix . "gh_temp_table";
$delete = $wpdb->query("TRUNCATE TABLE $table_na");

//echo 'logout';

}*/


?>
<div id="RandC"><h1>GitHub Commits</h1>
 <button id='btnRepos'>Repositories</button>
    <button id='btnCommits'>Commits</button>
 <div id='divResult' ></div>
<form method="post" action="">
   <button type="submit"  name="logout" value="Sign Out" >SignOut</button></div></from> 

   
</div>

    <?php

    if(isset($_POST['logout'])){
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_na = $wpdb->prefix . "gh_temp_table";
$delete = $wpdb->query("TRUNCATE TABLE $table_na");

//echo 'logout';

}?>

    <script>
    	const btnRepos=document.getElementById("btnRepos")
    	const btnCommits=document.getElementById("btnCommits")
 
    	const divResult=document.getElementById("divResult")
    	btnRepos.addEventListener("click",getRepos)
    	btnCommits.addEventListener("click",getCommits)


         
    	async function getRepos()
    	{
     const url="http://api.github.com/search/repositories?q=stars:>1000"
      const reponse=await fetch(url)
      const result=await reponse.json()

      result.items.forEach(i=>{
      	const anchor=document.createElement("a")
     anchor.href=i.html_url;
     anchor.textContent=i.full_name; 	
      	divResult.appendChild(anchor)
	divResult.appendChild(document.createElement("br"))
      })


    	}
    		async function getCommits()
    	{clear();
     const url="http://api.github.com/search/commits?q=repo:freecodecamp/freecodecamp author-date:2019-03-01..2019-03-31"
     const headers={
     	"Accept" : "application/vnd.github.cloak-preview"
     }
      const reponse=await fetch(url,{
        "method":"GET",
      	"headers":headers})
      const result=await reponse.json()

      result.items.forEach(i=>{
      	const auhorname=document.createElement("auhorname")
      	const img=document.createElement("img")
      	auhorname.textContent=i.author.login;
      	img.src=i.author.avatar_url;
      	img.style.width="32px"
      	img.style.height="32px"
      	const anchor=document.createElement("a")
     anchor.href=i.html_url;
     anchor.textContent=i.commit.message; 
     divResult.appendChild(document.createElement("br"))	
     divResult.appendChild(img)
     divResult.appendChild(document.createElement("br"))
     divResult.appendChild(auhorname)
     divResult.appendChild(document.createElement("br"))
      	divResult.appendChild(anchor)
	divResult.appendChild(document.createElement("br"))
      })
         

    	}
    	function clear()
    	{
    		while(divResult.firstChild)
    			divResult.removeChild(divResult.firstChild)
    	}
    </script>
<?php



//echo '<center><h1 style="color:blue;">You are Login Sucessfully! Please Refresh Once For Loading Data</h1>';

global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_namee = $wpdb->prefix . "gh_temp_table";



 $check = $wpdb->get_var( "SELECT COUNT(*) FROM $table_namee where user_name= '$value1' AND user_pass='$value2'");  
if($check>0)
{
echo 'Your Are Already SignIn';

}
else
{
$wpdb->insert( 
  ''.$table_namee.'', 
  array( 
    'user_name' => $value1,  
    'user_pass' =>  $value2
  ), 
  array( '%s',
                '%s'
  ) 
);

}





}
else
{
echo 'You Not Login Sucessfully,Pass Or Username Incorrect';
}

    }
 if(isset($_POST['signup'])){

?>
<script>

  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

</script>
<h1 align="center">Sign Up Here</h1>
        <center>
            <form method="post" action="">
               Enter User Name :<br><input type="text" name="value1"><br>
               Enter Email :<br><input type="text" name="value2"><br>
               Enter User Password :<br><input type="password" name="value"><br>
                <div align="center">
                    <input type="submit" name="submit" value="Sign In" style="background:#0099ff;font-size:20px;color:white">
                    <input type="submit" name="signup" value="Submit" style="background:#ffcc00;font-size:20px;color:black">
                </div>
            </form>
<?php
  $value1=$_POST['value1'];
        $value2=$_POST['value2'];
    $value=$_POST['value'];
     
    if($value1=='') {
            echo "<script>alert('Please Enter User Name')</script>";
            exit();
        }

   if($value2=='') {
            echo "<script>alert('Please Enter Email')</script>";
            exit();
        }
   if($value=='') {
            echo "<script>alert('Please Enter Password')</script>";
            exit();
        }
    

global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_name = $wpdb->prefix . "github_signup";



 $check = $wpdb->get_var( "SELECT COUNT(*) FROM $table_name where user_name= '$value1' OR user_email='$value2' ");  
if($check>0)
{
echo 'Credentials Already Exists, You Are Not Registered';
}
else
{
$wpdb->insert( 
  ''.$table_name.'', 
  array( 
    'user_name' => $value1, 
                'user_email' => $value2, 
    'user_pass' =>  $value
  ), 
  array( '%s',
               '%s', 
                '%s'
     
  ) 
);
if($wpdb->insert_id)
{
echo 'You Are Registered Successfully ';
}
else
{
echo 'You Are Not Registered Successfully';
}}?>

<?php
      
}?>

 
<?php


}
else
{

?>

<div  id="myDIV">
<h1 align="center">Sign In Here</h1>
        <center>
            <form method="post" action="">
                User Name :<br><input type="text" name="value1"><br>
                User Pass :<br><input type="password" name="value2"><br>
             <br><input type="hidden" name="value"><br>
                <div align="center">
                    <input type="submit" name="submit" value="Sign In" style="background:#0099ff;font-size:20px;color:white">
                    <input type="submit" name="signup" value="Sign Up" style="background:#00cc99;font-size:20px;color:white">
                </div>
            </form>
        </center></div>


<?php
}

    if(isset($_POST['submit'])){
        $value1=$_POST['value1'];
        $value2=$_POST['value2'];
      
       
 if($value1=='') {
            echo "<script>alert('Please Enter User Name')</script>";
            exit();
        }

        if($value2=='') {
            echo "<script>alert('Please Enter Password')</script>";
            exit();
        }

global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_nam = $wpdb->prefix . "github_signup";

 $checks = $wpdb->get_var( "SELECT COUNT(*)  FROM $table_nam where user_name= '$value1' AND user_pass='$value2' ");  
 if($checks>0)
{

?>
<script>

  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

</script>



    <?php

   /* if(isset($_POST['logout'])){
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_na = $wpdb->prefix . "gh_temp_table";
$delete = $wpdb->query("TRUNCATE TABLE $table_na");

//echo 'logout';

}*/


?>
<div id="RandC"><h1>GITHUB REPOSITORIES PERVIEW PAGE</h1>
 <button id='btnRepos' style="#ffffff:blue; border-style: dotted;   font-weight: bold; font-size: 20px; background-color:#47d147;">REPOSITORIES</button>
 <div id='divResult' ></div>
<form method="post" action="">
   <button type="submit"  name="logout" value="Sign Out" style="#ffffff:blue; border-style: dotted;   font-weight: bold; font-size: 20px; background-color:#ff5c33;">SIGN OUT</button></div></from> </div>
   
</div>

    <?php

    if(isset($_POST['logout'])){
?><script>

  var x = document.getElementById("RandC");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

</script><?php
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_na = $wpdb->prefix . "gh_temp_table";
$delete = $wpdb->query("TRUNCATE TABLE $table_na");

//echo 'logout';

}?>

    <script>
    	const btnRepos=document.getElementById("btnRepos")
    	
 
    	const divResult=document.getElementById("divResult")
    	btnRepos.addEventListener("click",getRepos)
    	


         
    	async function getRepos()
    	{
     const url="http://api.github.com/search/repositories?q=stars:>1000"
      const reponse=await fetch(url)
      const result=await reponse.json()

      result.items.forEach(i=>{
      	const anchor=document.createElement("a")
     anchor.href=i.html_url;
     anchor.textContent=i.full_name; 	
      	divResult.appendChild(anchor)
	divResult.appendChild(document.createElement("br"))
      })


    	}
    		
    	function clear()
    	{
    		while(divResult.firstChild)
    			divResult.removeChild(divResult.firstChild)
    	}
    </script>
<?php



//echo '<center><h1 style="color:blue;">You are Login Sucessfully! Please Refresh Once For Loading Data</h1>';

global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_namee = $wpdb->prefix . "gh_temp_table";



 $check = $wpdb->get_var( "SELECT COUNT(*) FROM $table_namee where user_name= '$value1' AND user_pass='$value2'");  
if($check>0)
{
echo 'Your Are Already SignIn';

}
else
{
$wpdb->insert( 
  ''.$table_namee.'', 
  array( 
    'user_name' => $value1,  
    'user_pass' =>  $value2
  ), 
  array( '%s',
                '%s'
  ) 
);

}





}
else
{
echo 'You Not Login Sucessfully,Pass Or Username Incorrect';
}

    }
 if(isset($_POST['signup'])){

?>
<script>

  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

</script>
<h1 align="center">Sign Up Here</h1>
        <center>
            <form method="post" action="">
               Enter User Name :<br><input type="text" name="value1"><br>
               Enter Email :<br><input type="text" name="value2"><br>
               Enter User Password :<br><input type="password" name="value"><br>
                <div align="center">
                    <input type="submit" name="submit" value="Sign In" style="background:#0099ff;font-size:20px;color:white">
                    <input type="submit" name="signup" value="Submit" style="background:#ffcc00;font-size:20px;color:black">
                </div>
            </form>
<?php
  $value1=$_POST['value1'];
        $value2=$_POST['value2'];
    $value=$_POST['value'];
     
    if($value1=='') {
            echo "<script>alert('Please Enter User Name')</script>";
            exit();
        }

   if($value2=='') {
            echo "<script>alert('Please Enter Email')</script>";
            exit();
        }
   if($value=='') {
            echo "<script>alert('Please Enter Password')</script>";
            exit();
        }
    

global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_name = $wpdb->prefix . "github_signup";



 $check = $wpdb->get_var( "SELECT COUNT(*) FROM $table_name where user_name= '$value1' OR user_email='$value2' ");  
if($check>0)
{
echo 'Credentials Already Exists, You Are Not Registered';
}
else
{
$wpdb->insert( 
  ''.$table_name.'', 
  array( 
    'user_name' => $value1, 
                'user_email' => $value2, 
    'user_pass' =>  $value
  ), 
  array( '%s',
               '%s', 
                '%s'
     
  ) 
);
if($wpdb->insert_id)
{
echo 'You Are Registered Successfully ';
}
else
{
echo 'You Are Not Registered Successfully';
}}?>

<?php
      


}



}
function repositories_menu_page(){
add_submenu_page('github-setting',
        'Repositories',
        'Repositories',
        'manage_options',
        'repositories-sd',
        'repositories_options_page_html',20);
  }
add_action('admin_menu','repositories_menu_page');


function Commits_options_page_html(){
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_namee = $wpdb->prefix . "gh_temp_table";



 $check = $wpdb->get_var( "SELECT COUNT(*) FROM $table_namee");  
if($check>0)
{

?>
<div id="RandC"><h1>GITHUB COMMITS PERVIEW PAGE</h1>
<button id='btnCommits'style="#ffffff:blue; border-style: dotted;   font-weight: bold; font-size: 20px; background-color:#47d147;">COMMITS</button>
 <div id='divResult' ></div>
<form method="post" action="">
   <button type="submit"  name="logout" value="Sign Out" style="#ffffff:blue; border-style: dotted;   font-weight: bold; font-size: 20px; background-color:#ff5c33;">SIGN OUT</button></div></from> </div>

   
  <script>
    	
    	const btnCommits=document.getElementById("btnCommits")
 
    	const divResult=document.getElementById("divResult")
    	
    	btnCommits.addEventListener("click",getCommits)


         
    	
    		async function getCommits()
    	{clear();
     const url="http://api.github.com/search/commits?q=repo:freecodecamp/freecodecamp author-date:2019-03-01..2019-03-31"
     const headers={
     	"Accept" : "application/vnd.github.cloak-preview"
     }
      const reponse=await fetch(url,{
        "method":"GET",
      	"headers":headers})
      const result=await reponse.json()

      result.items.forEach(i=>{
      	const auhorname=document.createElement("auhorname")
      	const img=document.createElement("img")
      	auhorname.textContent=i.author.login;
      	img.src=i.author.avatar_url;
      	img.style.width="32px"
      	img.style.height="32px"
      	const anchor=document.createElement("a")
     anchor.href=i.html_url;
     anchor.textContent=i.commit.message; 
     divResult.appendChild(document.createElement("br"))	
     divResult.appendChild(img)
     divResult.appendChild(document.createElement("br"))
     divResult.appendChild(auhorname)
     divResult.appendChild(document.createElement("br"))
      	divResult.appendChild(anchor)
	divResult.appendChild(document.createElement("br"))
      })
         

    	}
    	function clear()
    	{
    		while(divResult.firstChild)
    			divResult.removeChild(divResult.firstChild)
    	}
    </script>

    <?php

    if(isset($_POST['logout'])){
?><script>

  var x = document.getElementById("RandC");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

</script><?php
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_na = $wpdb->prefix . "gh_temp_table";
$delete = $wpdb->query("TRUNCATE TABLE $table_na");


?>

<div  id="myDIV">
<h1 align="center">Sign In Here</h1>
        <center>
            <form method="post" action="">
                User Name :<br><input type="text" name="value1"><br>
                User Pass :<br><input type="password" name="value2"><br>
             <br><input type="hidden" name="value"><br>
                <div align="center">
                    <input type="submit" name="submit" value="Sign In" style="background:#0099ff;font-size:20px;color:white">
                    <input type="submit" name="signup" value="Sign Up" style="background:#00cc99;font-size:20px;color:white">
                </div>
            </form>
        </center></div>


<?php
}

    if(isset($_POST['submit'])){
        $value1=$_POST['value1'];
        $value2=$_POST['value2'];
      
       
 if($value1=='') {
            echo "<script>alert('Please Enter User Name')</script>";
            exit();
        }

        if($value2=='') {
            echo "<script>alert('Please Enter Password')</script>";
            exit();
        }

global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_nam = $wpdb->prefix . "github_signup";

 $checks = $wpdb->get_var( "SELECT COUNT(*)  FROM $table_nam where user_name= '$value1' AND user_pass='$value2' ");  
 if($checks>0)
{

?>
<script>

  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

</script>



    <?php

   /* if(isset($_POST['logout'])){
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_na = $wpdb->prefix . "gh_temp_table";
$delete = $wpdb->query("TRUNCATE TABLE $table_na");

//echo 'logout';

}*/


?>
<div id="RandC"><h1>GitHub Commits</h1>
 <button id='btnRepos'>Repositories</button>
    <button id='btnCommits'>Commits</button>
 <div id='divResult' ></div>
<form method="post" action="">
   <button type="submit"  name="logout" value="Sign Out" >SignOut</button></div></from> 

   
</div>

    <?php

    if(isset($_POST['logout'])){
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_na = $wpdb->prefix . "gh_temp_table";
$delete = $wpdb->query("TRUNCATE TABLE $table_na");

//echo 'logout';

}?>

    <script>
    	const btnRepos=document.getElementById("btnRepos")
    	const btnCommits=document.getElementById("btnCommits")
 
    	const divResult=document.getElementById("divResult")
    	btnRepos.addEventListener("click",getRepos)
    	btnCommits.addEventListener("click",getCommits)


         
    	async function getRepos()
    	{
     const url="http://api.github.com/search/repositories?q=stars:>1000"
      const reponse=await fetch(url)
      const result=await reponse.json()

      result.items.forEach(i=>{
      	const anchor=document.createElement("a")
     anchor.href=i.html_url;
     anchor.textContent=i.full_name; 	
      	divResult.appendChild(anchor)
	divResult.appendChild(document.createElement("br"))
      })


    	}
    		async function getCommits()
    	{clear();
     const url="http://api.github.com/search/commits?q=repo:freecodecamp/freecodecamp author-date:2019-03-01..2019-03-31"
     const headers={
     	"Accept" : "application/vnd.github.cloak-preview"
     }
      const reponse=await fetch(url,{
        "method":"GET",
      	"headers":headers})
      const result=await reponse.json()

      result.items.forEach(i=>{
      	const auhorname=document.createElement("auhorname")
      	const img=document.createElement("img")
      	auhorname.textContent=i.author.login;
      	img.src=i.author.avatar_url;
      	img.style.width="32px"
      	img.style.height="32px"
      	const anchor=document.createElement("a")
     anchor.href=i.html_url;
     anchor.textContent=i.commit.message; 
     divResult.appendChild(document.createElement("br"))	
     divResult.appendChild(img)
     divResult.appendChild(document.createElement("br"))
     divResult.appendChild(auhorname)
     divResult.appendChild(document.createElement("br"))
      	divResult.appendChild(anchor)
	divResult.appendChild(document.createElement("br"))
      })
         

    	}
    	function clear()
    	{
    		while(divResult.firstChild)
    			divResult.removeChild(divResult.firstChild)
    	}
    </script>
<?php



//echo '<center><h1 style="color:blue;">You are Login Sucessfully! Please Refresh Once For Loading Data</h1>';

global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_namee = $wpdb->prefix . "gh_temp_table";



 $check = $wpdb->get_var( "SELECT COUNT(*) FROM $table_namee where user_name= '$value1' AND user_pass='$value2'");  
if($check>0)
{
echo 'Your Are Already SignIn';

}
else
{
$wpdb->insert( 
  ''.$table_namee.'', 
  array( 
    'user_name' => $value1,  
    'user_pass' =>  $value2
  ), 
  array( '%s',
                '%s'
  ) 
);

}





}
else
{
echo 'You Not Login Sucessfully,Pass Or Username Incorrect';
}

    }
 if(isset($_POST['signup'])){

?>
<script>

  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

</script>
<h1 align="center">Sign Up Here</h1>
        <center>
            <form method="post" action="">
               Enter User Name :<br><input type="text" name="value1"><br>
               Enter Email :<br><input type="text" name="value2"><br>
               Enter User Password :<br><input type="password" name="value"><br>
                <div align="center">
                    <input type="submit" name="submit" value="Sign In" style="background:#0099ff;font-size:20px;color:white">
                    <input type="submit" name="signup" value="Submit" style="background:#ffcc00;font-size:20px;color:black">
                </div>
            </form>
<?php
  $value1=$_POST['value1'];
        $value2=$_POST['value2'];
    $value=$_POST['value'];
     
    if($value1=='') {
            echo "<script>alert('Please Enter User Name')</script>";
            exit();
        }

   if($value2=='') {
            echo "<script>alert('Please Enter Email')</script>";
            exit();
        }
   if($value=='') {
            echo "<script>alert('Please Enter Password')</script>";
            exit();
        }
    

global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_name = $wpdb->prefix . "github_signup";



 $check = $wpdb->get_var( "SELECT COUNT(*) FROM $table_name where user_name= '$value1' OR user_email='$value2' ");  
if($check>0)
{
echo 'Credentials Already Exists, You Are Not Registered';
}
else
{
$wpdb->insert( 
  ''.$table_name.'', 
  array( 
    'user_name' => $value1, 
                'user_email' => $value2, 
    'user_pass' =>  $value
  ), 
  array( '%s',
               '%s', 
                '%s'
     
  ) 
);
if($wpdb->insert_id)
{
echo 'You Are Registered Successfully ';
}
else
{
echo 'You Are Not Registered Successfully';
}}?>

<?php
      
}?>

 
<?php


}
else
{

?>

<div  id="myDIV">
<h1 align="center">Sign In Here</h1>
        <center>
            <form method="post" action="">
                User Name :<br><input type="text" name="value1"><br>
                User Pass :<br><input type="password" name="value2"><br>
             <br><input type="hidden" name="value"><br>
                <div align="center">
                    <input type="submit" name="submit" value="Sign In" style="background:#0099ff;font-size:20px;color:white">
                    <input type="submit" name="signup" value="Sign Up" style="background:#00cc99;font-size:20px;color:white">
                </div>
            </form>
        </center></div>


<?php
}

    if(isset($_POST['submit'])){
        $value1=$_POST['value1'];
        $value2=$_POST['value2'];
      
       
 if($value1=='') {
            echo "<script>alert('Please Enter User Name')</script>";
            exit();
        }

        if($value2=='') {
            echo "<script>alert('Please Enter Password')</script>";
            exit();
        }

global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_nam = $wpdb->prefix . "github_signup";

 $checks = $wpdb->get_var( "SELECT COUNT(*)  FROM $table_nam where user_name= '$value1' AND user_pass='$value2' ");  
 if($checks>0)
{

?>
<script>

  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

</script>



    <?php

   /* if(isset($_POST['logout'])){
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_na = $wpdb->prefix . "gh_temp_table";
$delete = $wpdb->query("TRUNCATE TABLE $table_na");

//echo 'logout';

}*/


?>
<div id="RandC"><h1>GITHUB COMMITS PERVIEW PAGE</h1>
 <button id='btnCommits'style="#ffffff:blue; border-style: dotted;   font-weight: bold; font-size: 20px; background-color:#47d147;">COMMITS</button>
 <div id='divResult' ></div>
<form method="post" action="">
   <button type="submit"  name="logout" value="Sign Out" style="#ffffff:blue; border-style: dotted;   font-weight: bold; font-size: 20px; background-color:#ff5c33;">SIGN OUT</button></div></from> </div>
   
</div>

    <?php

    if(isset($_POST['logout'])){
?><script>

  var x = document.getElementById("RandC");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

</script><?php
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_na = $wpdb->prefix . "gh_temp_table";
$delete = $wpdb->query("TRUNCATE TABLE $table_na");

//echo 'logout';

}?>

    <script>
    	
    	const btnCommits=document.getElementById("btnCommits")
 
    	const divResult=document.getElementById("divResult")
    
    	btnCommits.addEventListener("click",getCommits)


       
    		async function getCommits()
    	{clear();
     const url="http://api.github.com/search/commits?q=repo:freecodecamp/freecodecamp author-date:2019-03-01..2019-03-31"
     const headers={
     	"Accept" : "application/vnd.github.cloak-preview"
     }
      const reponse=await fetch(url,{
        "method":"GET",
      	"headers":headers})
      const result=await reponse.json()

      result.items.forEach(i=>{
      	const auhorname=document.createElement("auhorname")
      	const img=document.createElement("img")
      	auhorname.textContent=i.author.login;
      	img.src=i.author.avatar_url;
      	img.style.width="32px"
      	img.style.height="32px"
      	const anchor=document.createElement("a")
     anchor.href=i.html_url;
     anchor.textContent=i.commit.message; 
     divResult.appendChild(document.createElement("br"))	
     divResult.appendChild(img)
     divResult.appendChild(document.createElement("br"))
     divResult.appendChild(auhorname)
     divResult.appendChild(document.createElement("br"))
      	divResult.appendChild(anchor)
	divResult.appendChild(document.createElement("br"))
      })
         

    	}
    	function clear()
    	{
    		while(divResult.firstChild)
    			divResult.removeChild(divResult.firstChild)
    	}
    </script>
<?php



//echo '<center><h1 style="color:blue;">You are Login Sucessfully! Please Refresh Once For Loading Data</h1>';

global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_namee = $wpdb->prefix . "gh_temp_table";



 $check = $wpdb->get_var( "SELECT COUNT(*) FROM $table_namee where user_name= '$value1' AND user_pass='$value2'");  
if($check>0)
{
echo 'Your Are Already SignIn';

}
else
{
$wpdb->insert( 
  ''.$table_namee.'', 
  array( 
    'user_name' => $value1,  
    'user_pass' =>  $value2
  ), 
  array( '%s',
                '%s'
  ) 
);

}





}
else
{
echo 'You Not Login Sucessfully,Pass Or Username Incorrect';
}

    }
 if(isset($_POST['signup'])){

?>
<script>

  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

</script>
<h1 align="center">Sign Up Here</h1>
        <center>
            <form method="post" action="">
               Enter User Name :<br><input type="text" name="value1"><br>
               Enter Email :<br><input type="text" name="value2"><br>
               Enter User Password :<br><input type="password" name="value"><br>
                <div align="center">
                    <input type="submit" name="submit" value="Sign In" style="background:#0099ff;font-size:20px;color:white">
                    <input type="submit" name="signup" value="Submit" style="background:#ffcc00;font-size:20px;color:black">
                </div>
            </form>
<?php
  $value1=$_POST['value1'];
        $value2=$_POST['value2'];
    $value=$_POST['value'];
     
    if($value1=='') {
            echo "<script>alert('Please Enter User Name')</script>";
            exit();
        }

   if($value2=='') {
            echo "<script>alert('Please Enter Email')</script>";
            exit();
        }
   if($value=='') {
            echo "<script>alert('Please Enter Password')</script>";
            exit();
        }
    

global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_name = $wpdb->prefix . "github_signup";



 $check = $wpdb->get_var( "SELECT COUNT(*) FROM $table_name where user_name= '$value1' OR user_email='$value2' ");  
if($check>0)
{
echo 'Credentials Already Exists, You Are Not Registered';
}
else
{
$wpdb->insert( 
  ''.$table_name.'', 
  array( 
    'user_name' => $value1, 
                'user_email' => $value2, 
    'user_pass' =>  $value
  ), 
  array( '%s',
               '%s', 
                '%s'
     
  ) 
);
if($wpdb->insert_id)
{
echo 'You Are Registered Successfully ';
}
else
{
echo 'You Are Not Registered Successfully';
}}?>

<?php
      


}






}

function Commits_menu_page(){
add_submenu_page('github-setting',
        'Commits',
        'Commits',
        'manage_options',
        'Commits-sd',
        'Commits_options_page_html',20);
  }
add_action('admin_menu','Commits_menu_page');

function github_plugin_setting(){
register_setting('github-setting','user_label');
register_setting('github-setting','pass_label');
add_settings_section('github_label_section','Sign In From','github_plugin_setting_section_cb','github-setting');
add_settings_field('user_label_field','User Name : ','user_label_field_cb','github-setting','github_label_section');
add_settings_field('pass_label_field','Password : ','pass_label_field_cb','github-setting','github_label_section');

}
add_action('admin_init','github_plugin_setting');
function github_plugin_setting_section_cb(){
echo '<p>Enter User Name and Password</p>';
}

function user_label_field_cb(){
 
} 
function pass_label_field_cb(){

} 


function session_check_function() {

global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_namee = $wpdb->prefix . "gh_temp_table";



 $check = $wpdb->get_var( "SELECT COUNT(*) FROM $table_namee");  
if($check>0)
{
//include 'C:\wamp64\www\github_plugin\wp-content\plugins\index.html';
?>
<div id="log">  <center>
<form method="post" action="">
   <div align="center"><input type="submit" name="logout" value="Sign Out" style="background:#ff0000;font-size:20px;color:white"></div>

<?phpecho '<center><h1 style="color:blue;">You Are In Login Page Please Visit GitHub Page</h1></center>';?>
</from> 

 </center></div>

    <?php

    if(isset($_POST['logout'])){
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_na = $wpdb->prefix . "gh_temp_table";
$delete = $wpdb->query("TRUNCATE TABLE $table_na");

//echo 'logout';
?>
<script>

  var x = document.getElementById("log");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

</script>



<?php

}
}
else
{

}

}
//add_action( 'init', 'session_check_function' );

?>