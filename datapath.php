<?php
include "userview.php";

?>
<!DOCTYPE html>
<html lang="">
  <head>
  <title>DataPath Page</title>
    <meta charset="utf-8">
    <style>
    body {
      margin: 0;
      padding: 0;
    }

    div nav {
      background-color: #333;
      height: 100%; /* Set the height to full viewport height */
      width: 15%;
      position: fixed; /* Fix the position to the left */
      top: 0;
      left: 0;
      padding-top: 20px; /* Add some top padding */
    }

    div nav ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    nav ul li {
      margin-bottom: 10px;
    }

   div nav ul li a {
      display: block;
      color: #fff;
      text-decoration: none;
      padding: 10px;
    }

   div nav ul li a:hover {
      background-color: #555;
    }
    .content{
      display:none;
      text-align:center;
    
    }
  </style>
  </head>
  <body onload="openPage('mainn')">
  <div id="navdiv">

    <nav>
      <ul class="navbar">
   <h2><li style="color:white;text-alignment:center;display:block;"><b>CONFIGURE</b></li></h2>
    <li>
      <h3><b><a href="#" onclick="toggleSubMenu('userSubMenu')">USER</a></b></h3>
      <ul id="userSubMenu" class="sub-menu" style="display: none;">
      <h4><li><a href="#" onclick="openPage('userView')">User view</a></li></h4>
      <h4><li><a href="#" onclick="openPage('userAdd')">User Add</a></li></h4>
      <h4><li><a href="#" onclick="openPage('userDelete')">User Delete</a></li></h4>
    <h4><li><a href="#" onclick="openPage('userModify')">User Modify</a></li></h4>

      </ul>
    </li>
    <li>
      <h3><b><a href="#" onclick="toggleSubMenu('vlanSubMenu')">VLAN </a></b></h3>
      <ul id="vlanSubMenu" class="sub-menu" style="display: none;">
        <h4><li><a href="#" onclick="openPage('vlanView')">VLAN view</a></li></h4>
        <h4><li><a href="#" onclick="openPage('vlanAdd')">VLAN Add</a></li></h4>
        <h4><li><a href="#" onclick="openPage('vlanDelete')">VLAN Delete</a></li></h4>
        <h4><li><a href="#" onclick="openPage('vlanModify')">VLAN Modify</a></li></h4>
      </ul>
    </li>
    <li>
      <h3><b><a href="#" onclick="toggleSubMenu('apSubMenu')">AP </a></b></h3>
      <ul id="apSubMenu" class="sub-menu" style="display: none;">
      <h4><li><a href="#" onclick="openPage('apView')">AP view</a></li></h4>
        <h4><li><a href="#" onclick="openPage('apAdd')">AP Add</a></li></h4>
        <h4><li><a href="#" onclick="openPage('apDelete')">AP Delete</a></li></h4>
        <h4><li><a href="#" onclick="openPage('apModify')">AP Modify</a></li></h4>
      </ul>
    </li>
    <li>
    <h3><b><li><a href="#" onclick="toggleSubMenu('backupSubMenu')">BACKUP</a></li></b></h3>
    <ul id="backupSubMenu" class="sub-menu" style="display: none;">
    <h4><li><a href="#" onclick="openPage('backupView')">View</a></li></h4>
      <h4><li><a href="#" onclick="openPage('backupAdd')">Add Rule</a></li></h4>
      <h4><li><a href="#" onclick="openPage('backupDelete')">Delete</a></li></h4>
      <h4><li><a href="#" onclick="openPage('backupModify')">Modify Rule</a></li></h4>
    </ul>
    </li>
  </ul>
</nav>
</div> 
<div class="content" id="mainnContent"  >
        <h1>Welcome to BSNL Wi-Fi Data Path Management</h1>
        <p>Select an option from the left navigation to proceed.</p>
  </div>
<div class="content" id="userViewContent">
  <form action="userview.php" method = "POST">

  <h1>USER VIEW</h1>
  <?php
userview();
?>
  <div id="uv">
  </div>

  <!-- Add your user view content here -->
 	</form>
	</div>

  <div class="content" id="userAddContent" >
 
  <!-- Add your user add form here -->
 
  <H1 style="text-align: center;"><b> USER ADD </b></H1>
  <form action = "user.php" method = "POST" >
<br>
    <br>
 USERNAME :
 <input required type = "text" name = "username"><br>
  <br>
   PASSWORD :
 <input required type = "password" name = "password" type="password">
    <br>
    <br>
   EMAIL-ID :
  <input required type = "email" name = "email">
     <br>
    <br>
      <input type = "submit" name = "submit" value = "SUBMIT" />
      
  <input type = "reset" name = "reset" value = "RESET"/>  
 <br><br><br>
</form>  
</div>

<div class="content" id="userDeleteContent" >
	   <form action = "userdelete.php" method = "POST">
 <h2>USER DELETE</h2><br><br>
    <label for="deleteuser">USERNAME to Delete:</label>
    <input required type="text" name = "recordId" id="deleteuser" >
    <br>
    <br>
    <button>Delete Value</button>
    </form >
    </div>

    <div class="content" id="userModifyContent" >
        <form action = "usermodify.php" method = "POST">
  <!-- Add your user view content here -->
<H1 style="text-align: center;"><b> USER MODIFY </b></H1>
<br>
	<br>
   Login :
    <input type = "text" name = "login"><br>
    <br>
 Username :
 <input type = "text" name = "username"><br>
  <br>
 <label for="modifiedPassword">Modified Password:</label>
        <input require type="text" name="modifiedPassword" required>
        <br>
        <br>
       <label for="modifiedEmail_ID">Modified Email-ID:</label>
        <input type="text" name="modifiedEmail_ID" required>
        <br>
        <br>
        <button type="submit" name="submit">Modify USER</button>
   	</form>
    </div>


<div class="content" id="vlanViewContent" >
<form action = "vlanview.php" method = "POST" style="text-align: center;">
   <h1>VLAN VIEW </h1>
  <!-- Add your user view content here -->
  <input type = "submit" value = "view">
        </form>

</div>


<div class = "content" id = "vlanAddContent" >
  <form action = "vlan.php" method = "POST">
  <H1 style="text-align: center;"><B> VLAN ADD </B> </H1>
  <br><br> 
	  <label for="Interface"> INTERFACE:</label>
   <select id="Interface" name = "Interface">
    <option> --Select an Interface-- </option>  <br><br>
    <option value = "lo"> lo </option>
    <option value = "enp1s0">  enp1s0 </option>
    <option value = "wlp2s0"> wlp2s0 </option>
    <option value = "docker0"> docker0 </option>
</select>
<br>
<br>
<label for="slider">VLAN-ID:</label>
<input type="number" id="slider" name="slider" min="2" max="4094">


<script>
  var slider = document.getElementById("slider");
  var errorMessage = document.getElementById("error-message");

  slider.addEventListener("input", function() {
    var value = parseInt(slider.value);
    if (value < parseInt(slider.min) || value > parseInt(slider.max)) {
      errorMessage.textContent = "VLAN-ID is outside the valid range.";
    } else {
      errorMessage.textContent = "";
    }
  });
</script>
<br>
<br>
<label for = "BRIDGEIP">BRIDGEIP:</label>
  <input type="text" name="Bridgeip" id="Bridgeip">
  <br>
  <br>
  <input type = "submit" name = "submit" value = "SUBMIT"/>
    </form> 
    </div>


<div class="content" id="vlanDeleteContent" >
            <form action = "vlandelete.php" method = "POST">
 <h2>VLAN DELETE</h2><br><br>
 <label for = "VLAN_ID">VLAN-ID TO DELETE:</label>
  <input type="text" name="recordId" id="VLAN_ID">
   <br>
    <br>
    <button>Delete Value</button>
    </form>
  </div>

 
 <div class = "content" id = "vlanModifyContent" >
	 <form action = "vlanmodify.php" method = "POST" >
  <h2>Modify VLAN</h2>
  <br>
  <br>
        <label for="VLAN_ID">VLAN ID:</label>
  <input type="text" id="VLAN_ID">
           <br>
           <br>
         <label for="modifiedBridgeIP">Modified Bridge IP:</label>
        <input type="text" name="modifiedBridgeIP" required>
        <br>
	<br>
        <button type="submit" name="submit">Modify VLAN</button>
    </form>
 </div>

<div class="content" id="apViewContent" >
	<form action = "apview.php" method = "POST" style="text-align: center;">
 <h1>AP VIEW </h1>
  <!-- Add your user view content here -->
  <input type = "submit" value = "view">


        </form>

</div>
 
 <div class="content" id="apAddContent" >
  <form action = "ap.php" method = "POST">
    <H1><b> AP ADD </b></H1>
	    <br>
	     <label for="Interface"> INTERFACE:</label>
   <select id="Interface" name = "Interface">
    <option> --Select an Interface-- </option>  <br><br>
    <option value = "lo"> lo </option>
    <option value = "enp1s0">  enp1s0 </option>
    <option value = "wlp2s0"> wlp2s0 </option>
    <option value = "docker0"> docker0 </option>
</select>
<br><br>
    AP IP :
    <input type = "text" name = "apip">
<br>
 (*AP - Access Point*)
 <br>
<br>
    AP NAME :
    <input type = "text" name = "ap_name">
<br>
<br>

   TUNNEL NUMBER :
  <input type = "text" name = "tno">
   <br>
   <br>
   VLAN-ID :
  <input type = "text" name = "VLAN_ID">
   <br>
   <br>
      <input type = "submit" name = "submit" value = "SUBMIT"/>
  <input type = "reset" name = "reset" value = "RESET"/>    
    </form>
</div>

<div class="content" id="apDeleteContent" >
	  <form action = "apdelete.php" method = "POST">
 <h2>AP DELETE</h2><br><br>
<label for = "deleteap">AP_NAME:</label>
  <input type="text" name="recordId" id="deleteap">
	    <br>
    <br>
    <button>Delete Value</button>
    </form>
</div>

<div class="content" id="apModifyContent" >
	 <form action = "apmodify.php" method = "POST">
 <h2>AP MODIFY</h2><br><br>
    <label for="ap_name">AP NAME:</label>
    <input type = "text" name = "ap_name">
    <br>
    <br>
    <label for="modifiedAPIP">New AP IP:</label>
    <input type="text" name = "modifiedAPIP"  required>
    <br>
    <br>
    <button type = "submit" name = "Submit">Modify Value</button>
    </form>
</div>

<div class="content" id="backupViewContent" >
  <h2>View</h2>
  <!-- Add your user view content here -->
</div>

 <div class="content" id="backupAddContent" >
  <h2>ADD RULE</h2>
  <!-- Add your user view content here -->
</div>

 <div class="content" id="backupDeleteContent" >
  <h2>DELETE </h2>
  <!-- Add your user view content here -->
</div>

 <div class="content" id="backupModifyContent" >
  <h2>MODIFY RULE</h2>
  <!-- Add your user view content here -->
</div>


<script>
function toggleSubMenu(subMenuId) {
  var subMenu = document.getElementById(subMenuId);
  subMenu.style.display = subMenu.style.display === "none" ? "block" : "none";
}

function openPage(pageName) {
  var contents = document.getElementsByClassName("content");
  for (var i = 0; i < contents.length; i++) {
    contents[i].style.display = "none";
  }
  var pageContent = document.getElementById(pageName + "Content");
  if (pageContent) {
    pageContent.style.display = "block";
  }
}
function toggleBackupSubMenu() {
  var backupSubMenu = document.getElementById("backupSubMenu");
  var backupContent = document.getElementById("backupContent");
  if (backupSubMenu && backupContent) {
    if (backupSubMenu.style.display === "none") {
      backupSubMenu.style.display = "block";
      backupContent.style.display = "none";
    } else {
      backupSubMenu.style.display = "none";
      bacupContent.style.display = "block";
    }
  }
}
</script>



  </body>
</html>
