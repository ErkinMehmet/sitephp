<?php
session_start();
include('p1header.php');
include('p1contactopensession.php');

//$_SESSION['p1'].="n";
//print_r($_SESSION);
?>

<a href="p1.php">Introduction</a>
<a href="aspir.php">Services</a>
<a href="arti.php">Articles</a>
<a href="comm.php">Comments</a><a href="rendezvous.php?#">Rendez-vous</a>
<a class="active" href="p1contact.php">Contact</a>
<a href="oth.php">Others</a>
<?php

//$_SESSION['test'].="test";
//print_r($_SESSION);
if ( isset( $_SESSION['user_id'] ) ) {
echo "<a href='javascript:p1logout()'>Log Out</a>";
}
?>

</div>

<!-- POUR COMM
<div class="content">
hello this is contenido
<div contentEditable="true" class="commentbox">ddfaf
</div>
</div>
-->
<div class="content">
<div class="ligne background9">



<div class="gauche30">
<div class="ctcontacttext" style="padding:15px;">

<div class="ctcard">

  <h1>Fernando L. Sánchez</h1>
  <p class="cttitle">IT Consultant & Polyglot</p>
  <p>University of Alberta</p>
  <a href="https://www.dribbble.com/"><i class="fa fa-dribbble"></i></a> 
  <a href="https://www.twitter.com/"><i class="fa fa-twitter"></i></a> 
  <a href="https://www.linkedin.com"><i class="fa fa-linkedin"></i></a> 
  <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a> 
  <p><button>Contact</button></p>
</div>
</div>

<div class="chatbottxt">

</div>
</div>



<?php include('conexion.php'); ?>



<div class="droite70" style="padding:20px;" id="modalcont">

<div class="modal" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color:black;">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closemd()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="color:black;">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="frsrprosv()">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="frsrprocl()">Close</button>
      </div>
    </div>
  </div>
</div>

<?php
//get
$signup=isset($_GET['signup'])?$_GET['signup']:"";
$forget=isset($_GET['forget'])?$_GET['forget']:"";

//controleur
if ($signup=="y") {
  include('p1contactsignup.php');
} elseif ($forget=="y"){
  include('p1contactforget.php');
} else {
//include('p1contactopensession.php');

$sessionid=$_SESSION['user_id'];
//print_r($_SESSION);

if ( isset( $_SESSION['user_id'] ) ) {
  //register
  //echo "you are in";
  //find user
  $bbq=$_SESSION['user_id'];
  $queru="select * from p1usuarios where userid='$bbq'";
  $commsu=$bdd->query($queru);
  $commu=$commsu->fetch();
  $uid=$commu['id'];
  $ahora=date('Y-m-d H:i:m');
  if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
//generer un record seulement quand il n y pas de ligne sans dtf
$quer="select * from p1login where uid=$uid order by dt desc limit 1";
//print_r($quer);
$comms=$bdd->query($quer);
while ($comm=$comms->fetch()){
$xlogin=$comm['dt'];
$xlogout=$comm['dtf'];
}

//login bd
$querl="insert into p1login(uid,dt,visitor) values($uid,'$ahora','$ip')";
if (($xlogout!="")||($xlogin=="")){
$bdd->query($querl);
}

//le contenu
include("p1contactsession.php");
} else {
    // Redirect them to the login page
    include('p1contactlogin.php');
}
}



?>


</div>

</div>
</div>


<?php //print_r($_SESSION);
//ob_end_flush();
include('p1footer.php'); ?>