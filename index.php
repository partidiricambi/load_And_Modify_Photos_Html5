<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>TPA: Trans Planet Airlines - Start</title>
<link href="styles/main.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#submit").click(function(e) {
			e.preventDefault();
			var theChoice = $('input:radio:checked').val()
			localStorage.setItem("theChoice",theChoice);
			window.location = "beam-up.php";
		});
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
  <h1>Step 1: Choose your souvenir background</h1>
  <p>&nbsp;</p>
  <form name="form1" method="post" action="">
    <table>
      <tr>
        <td><input type="radio" name="bgImage" value="astronaut.jpg" id="radioImage_0"></td>
        <td><label>
        Astronaut</label></td>
        <td><img src="images/astronaut_small.jpg" width="320" height="238"></td>
      </tr>
      <tr>
        <td><label>
          <input type="radio" name="bgImage" value="weightless.jpg" id="radioImage_1">
        </label></td>
        <td>Weightlessness</td>
        <td><img src="images/weightless_small.jpg" width="320" height="238"></td>
      </tr>
      <tr>
        <td><label>
          <input type="radio" name="bgImage" value="moonwalk.jpg" id="radioImage_2">
        </label></td>
        <td>Moonwalk</td>
        <td><img src="images/moonwalk_small.jpg" width="320" height="238"></td>
      </tr>
    </table>
    <p>
      <input type="submit" name="submit" id="submit" value="Select Background and Proceed">
    </p>
  </form>
</div>
<div id="footer">
  <p>Copyright &copy; 2054 Trans Planet Airlines, LLC. All rights reserved</p>
</div></div>
</body>
</html>
