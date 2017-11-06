<?php 
include 'dbc.php';
page_protect();
$displayName=NULL;

if(isset($_POST['liblist']) && ($_POST['liblist']!=""||$_POST['liblist']!=" ")){
	$libid=$_POST['liblist'];
}
else {
      $user_email=$_SESSION['email'];
	  $result = mysql_query("SELECT `Library` . * FROM `Library` WHERE `OwnerEmail` = '$user_email' OR `ID` IN ( SELECT ID FROM SharedLibrary WHERE `ShareEmail` = '$user_email')"); 
		$num = mysql_num_rows($result);

		// Match row found with more than 1 results  - the user is authenticated. 
		//if ( $num > 0 ) {

			$row = mysql_fetch_array($result, MYSQL_ASSOC);
            $libid=$row["ID"];   
	        $displayName = $row["DisplayName"];	   
        // } 
		//else {
		//	 $libid=0;
		//	}

   }
?>
<html>
<head>
        <div id="header">
		
        <title>My Account</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="styles.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script language="JavaScript" type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

	var loadlib =function(){
		
          $.ajax({
			 type: "POST",
			 dataType: "HTML",
			 url: "response.php", 
			 data: {"action":"loadlib"},
			 success: function(data) {
            $("#liblist").html(data);
			$("#libshareid").html(data);	 
			 }
		  });
	};
	loadlib();
     $("#addreference").submit(function(){
         $.ajax({
			 type: "POST",
			 dataType: "HTML",
			 url: "response.php", 
			 data: {"action":"addreference", "libid": $("#libid").val(),"add_title":$("#add_title").val(),
					"add_abstract":$("#add_abstract").val(),
					"add_author":$("#add_author").val(),
					"add_year":$("#add_year").val(),
					"add_pdf":$("#add_pdf").val(),
					"add_url":$("#add_url").val()
				   },
			 success: function(data) {
             alert(data);
				// loadlib();
			 }

		 });
		 return false;
	 });
	$("#sharelib").submit(function(){
         $.ajax({
			 type: "POST",
			 dataType: "HTML",
			 url: "response.php", 
			 data: {"action":"sharelib", "libshareid": $("#libshareid").val(),"emailtoshare":$("#emailtoshare").val()},
			 success: function(data) {
             alert(data);
				 loadlib();
			 }

		 });
		 return false;
	 });	
	 $("#create_lib_form").submit(function(){
         $.ajax({
			 type: "POST",
			 dataType: "HTML",
			 url: "response.php", 
			 data: {"action":"createlib", "libname": $("#libname").val()},
			 success: function(data) {
             alert(data);
				 loadlib();
			 }

		 });
		 return false;
	 });
	});
</script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="3" class="main">
  <tr> 
    <td colspan="1"></td>
  </tr>
  <tr> 
    <td width="120" valign="top">
<?php 

if (isset($_SESSION['user_name'])) {?>
<div class="myaccount">
  <p><strong>My Account</strong></p>
  <a href="library.php">My Account</a><br>
  <a href="mysettings.php">Settings</a><br>
    <a href="logout.php">Logout </a>
	 </div>
<?php }
		?>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td width="732" valign="top">
		<h1 align="Right">Bibliography Manager</h1>
    <h3 class="titlehdr">Welcome <?php echo $_SESSION['user_name'];?></h3>  

	  <?php	
      if (isset($_GET['msg'])) {
	  echo "<div class=\"error\">$_GET[msg]</div>";
	  }

	  ?>
      </td>
    </table>
        <div id="Form">

            <fieldset>
                <legend><b>Change Library</b></legend>

                <form method="POST" action="library.php">
                    <select name="liblist" id="liblist">
					<option selected="yes">All references</option>
					</select>
                    <br/>
                    <br/>
                    <input type="submit" value="Change Active Library"/>
					</br></br>
                     <a href='/biblogarphy/deletelibrary.php?name=<?php echo $displayName; ?>'>Delete Library</a>			
					</form>
            </fieldset>

            <fieldset>
                <legend><b>Create New Library</b></legend>
                <form method
				="POST" id="create_lib_form">
				Type a name here:
                    <input type="text" name="libaname" id="libname" value=""  >
                    <br/>
                    <br/>
                    <input type="submit" value="Create Library" />
                </form>
            </fieldset>

            <fieldset>
                <legend><b>Library Sharing</b></legend>
                <form method="POST" name="sharelib" id="sharelib">
					<lable>User Email</lable>
                    <input type="text" name="emailtoshare" id="emailtoshare" />

                    <select name="libshareid" id="libshareid">
                        <option selected="yes" value="0">select Library</option>
                     </select>
					<input type="submit" name="share" value="share" />
                </form>
            </fieldset>

            <fieldset>
                <legend><b>Share With</b></legend>
                <form method="POST" action="doSomething.jsp">
                    <input type="text">

                    <input type="text">
                </form>
				
            </fieldset>

<fieldset>
                <legend><b>Search Libraries</b></legend>
                <form method="POST" action="library.php">
                    Author Name: <input type="text" name="Author" /><br>
                    Title: <input type="text" name="Title"/><br>
                    Year: <input type="text" name="Year"/><br>
                    <br/>
                    Libraries to Search:
                    <select name="Change Active Library">
                        <option selected="yes">All My references</option>
                        <option>New Library Name</option>
                    </select></br>

                    <br/>
                    <input type="submit" value="Search and Save Results" />
                </form>
</fieldset>
        </div>  
        <div class="allright">

        <?php if($libid==0) {
		  echo " No Library found, please create a library first";
	  }
        else {
?>

        <div >
            <table border="3" bordercolor="#c86260" bgcolor="#a8a8a8" width="84%" cellspacing="2" cellpadding="5">
                <tr>
                    <th>All</th>
                    <th><a href="/html/">Author</a></th>
                    <th><a href="/html/">Title</a></th>
                    <th><a href="/html/">Year</a></th>
                    <th><a href="/html/">Abstract</a></th>
                    <th>PDF</th>
                    <th>URL</th>
					<th></th>
                </tr>
                
					<?php
                 $result = mysql_query("SELECT * FROM `Reference` WHERE `SharedLibraryID` = '$libid'"); 
$num = mysql_num_rows($result);

		// Match row found with more than 1 results  - the user is authenticated. 
		if ( $num > 0 ) {
			$result_out='';
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				echo "<tr>";
				echo "<td><input type='checkbox' id='ref".$row['ID']."' class='refaction' value='".$row['ID']."'/> </td>";
				echo "<td>".$row['Author']."</td>";
				echo "<td>".$row['Title']."</td>";
				echo "<td>".$row['Year']."</td>";
				echo "<td>".$row['Abstract']."</td>";
				echo "<td><a href='".$row['PDF']."' >".$row['PDF']."</a></td>";
				echo "<td><a href='".$row['URL']."' >".$row['URL']."</a></td>";
				echo "<td><a href='/biblogarphy/delete.php?id=".$row['ID']."' > Delete Reference</a></td>";
				echo "<td><a href='/biblogarphy/update.php?id=".$row['ID']."' > Update Reference</a></td>";
				echo "</tr>";
			}

		}
		else { echo '<td>No references found in this library</td>';}
			?>


                </tr>
                

            </table>
        </div>
		<p>
        Sort By:
        <select name="Sort By">
            <option selected="yes">Asc</option>
            <option>Desc</option>
        </select>

        	
		<input type="button" value="Move" />
		<input type="button" value="Update"/>
        </p>

        <br/><br/></br></br>
		<h3> Create new reference:<h3>
        <form method="POST" id="addreference">
			<input type="hidden" name="libid" id="libid" value="<?php echo $libid; ?>" />
<div class="scrollcell">
            <table border="3" bordercolor="#c86260" bgcolor="#e4e4e4" width="70%" cellspacing="3" cellpadding="2" scrollbars="yes">
                <tr>
                    <td>Title</td> 
                    <td><textarea rows="1" cols="100" name="add_title" id="add_title"></textarea></td>

                </tr>
                <tr>
                    <td>Author</td> 
                    <td><textarea rows="1" cols="100" name="add_author" id="add_author"></textarea></td>

                </tr>
                <tr>
                    <td>Year</td> 
                    <td><textarea rows="1" cols="100" name="add_year" id="add_year"></textarea></td>
                </tr>
                <tr>
                    <td height="100">Abstract</td> 
                    <td><textarea rows="8" cols="100" name="add_abstract" id="add_abstract"></textarea></td>
                </tr>
                
                <tr>
                    <td>Address</td> 
                    <td><textarea rows="1" cols="100" name="add_url" id="add_url"></textarea></td>

                </tr>
				<tr>
                    <td></td> 
                    <td><input type="submit" nameame="save" value="Save" /></td>

                </tr>
            </table>
        </div>
    </form>
			<?php  } ?>
      </div>
</body>
</html>
