
<div class="ctcontainer">
    <div class="row">
      <div class="col" style="color:black;">

      <h2>Enter the name of the group below:<br/>
        <small>Please communicate with your friends to know the exact group name.</small>
      </h2>
<form action="<?php
$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$urirt='http://' . $_SERVER['HTTP_HOST'] . $uri_parts[0];
echo $urirt."?pagina=4";
?>" method="post" id="myFormx2">
<label for="email">*Group Name:</label>
<input type="text" name="email" /><br/><br/>
</form>
</div></div></div>
<div class="bottom-container">
  <div class="row">
    <div class="col">
      <a href="<?php echo $urirt;?>" style="color:white" class="btn" >Return</a>
    </div>
    <div class="col">
      <a href="javascript:confirmp1contactsignup2();" style="color:white" class="btn">Confirm</a>
    </div>
</div>
</div>