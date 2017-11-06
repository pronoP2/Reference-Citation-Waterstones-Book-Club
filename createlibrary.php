<?php 
include 'dbc.php';
page_protect();


?>
<html>
<head>
        <div id="header">
		
        <title>My Account</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="styles.css" rel="stylesheet" type="text/css">

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
  <a href="myaccount.php">My Account</a><br>
  <a href="mysettings.php">Settings</a><br>
    <a href="logout.php">Logout </a>
	 </div>
<?php }
		?>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td width="732" valign="top">
	<h1 align="Right">Bibliography Manager<h1>
    <h3 class="titlehdr">Welcome <?php echo $_SESSION['user_name'];?></h3>  
	  
	  <?php	
      if (isset($_GET['msg'])) {
	  echo "<div class=\"error\">$_GET[msg]</div>";
	  }

	  ?>
      </td>
    </table></div>

        <div id="Form">

            <fieldset>
                <legend><b>Change Library</b></legend>

                <form method="POST" action="library.php">
                    <select name="Change Active Library">
                        <option selected="yes">All references</option>
                        </select>
                    <br/>
                    <br/>
                    <input type="submit" value="Change Active Library"></input>
                </form>
            </fieldset>

            <fieldset>
                <legend><b>Create New Library</b></legend>
                <form method="POST" action="createlibrary.php">
                    <input type="text" >
                    <br/>
                    <br/>
                    <input type="button" value="Change Active Library"></input>
                </form>
            </fieldset>

            <fieldset>
                <legend><b>Library Sharing</b></legend>
                <form method="POST" action="doSomething.jsp">
                    <textarea rows="2" cols="15"></textarea>

                    <input type="text">
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
                    Author Name: <input type="text" name="Author"><br>
                    Title: <input type="text" name="Title"><br>
                    Year: <input type="text" name="Year"><br>
                    </br>
                    Libraries to Search:
                    <select name="Change Active Library">
                        <option selected="yes">All My references</option>
                        <option>Can's</option>
                        <option>New Library Name</option>
                    </select>

                    <nav>
                        <a href="/html/">Toggle All Libraries</a>
                    </nav>
                    </br>
                    <input type="submit" value="Search and Save Results">
                </form>
            </fieldset>
        </div>  
		
		<p align="right">
        Sort By:
        <select name="Sort By">
            <option selected="yes">Ascending</option>
            <option>Descending</option>
        </select>

        <input type="button" value="Update"></input>    
        <input type="button" value="New"></input>
        <input type="button" value="Move Selected"></input>
        </p>
        <div >
            <table border="3" bordercolor="#c86260" bgcolor="#ffffcc" width="84%" cellspacing="2" cellpadding="5">
                <tr>
                    <th>All</th>
                    <th><a href="/html/">Author</a></th>
                    <th><a href="/html/">Title</a></th>
                    <th><a href="/html/">Year</a></th>
                    <th><a href="/html/">Key</a></th>
                    <th>PDF</th>
                    <th>URL</th>

                </tr>
                <tr>
                    <td><input type="checkbox" name="Username"/></td>
                    
                </tr>
                
                </tr>
            </table>
        </div>

        </br></br>
        <form method="POST" action="doSomething.jsp">
<div class="scrollcell">
            <table border="2" bordercolor="#c86260" bgcolor="#ffffcc" width="84%" cellspacing="3" cellpadding="2" scrollbars="yes">
                <tr>
                    <td>Title</td> 
                    <td><textarea rows="1" cols="100"></textarea></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Author</td> 
                    <td><textarea rows="1" cols="100"></textarea></td>

                </tr>
                <tr>
                    <td>Year</td> 
                    <td><textarea rows="1" cols="100"></textarea></td>
                </tr>
                <tr>
                    <td height="100">Abstract</td> 
                    <td><textarea rows="8" cols="100"></textarea></td>
                </tr>
                <tr>
                    <td>Attached PDF</td> 
                    <td><textarea rows="1" cols="100"></textarea></td>

                </tr>
                <tr>
                    <td>Address</td> 
                    <td><textarea rows="1" cols="100"></textarea></td>

                </tr>

            </table>
        </div>
    </form>

</body>
</html>
