<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>TPA: Trans Planet Airlines - Beam Up Photo</title>
<link href="styles/main.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var $theChoice = localStorage.getItem("theChoice");
		$theChoice = "<p>For your background, you chose <strong>"+$theChoice+"</strong>.";
		$("#showChoice").html($theChoice);
	});
</script>
</head>

<body>
<div id="outerWrapper">
  <div id="header"><img src="images/logo.png" width="410" height="181" alt="TPA: Trans Planet Airlines" /><br>
  <img src="images/tpa_name.gif" width="373" height="37" alt="Trans Planet Airlines">
  </div>
  <div id="nav">
  <h1>Create Your Own Space Souvenir!</h1>
    <ul>
      <li><a href="index.php">START</a></li>
      <li><a href="beam-up.php">UPLOAD</a></li>
      <li><a href="modify.php">MODIFY</a></li>
      <li><a href="save.php">SAVE</a></li>
    </ul>
  </div>
<div id="content">
  <h1>Step 2: Beam up your photo</h1>
  <div id="showChoice"></div>
<form id="upload" action="upload.php" method="POST" enctype="multipart/form-data">

<fieldset>
<legend>HTML File Upload</legend>

<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="500000" />

<div>
	<label for="fileselect">Files to upload:</label>
	<input type="file" id="fileselect" name="fileselect[]" multiple />
	<div id="filedrag">or drop files here</div>
</div>

<div id="submitbutton">
	<button type="submit">Upload Files</button>
</div>

</fieldset>

</form>

<div id="progress"></div>

<div id="messages">
<p>Status Messages</p>
</div>
</div>
<div id="footer">
  <p>Copyright &copy; 2054 Trans Planet Airlines, LLC. All rights reserved</p>
</div></div>
<script src="scripts/filedrag.js"></script>
</body>
</html>
