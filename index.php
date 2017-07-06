<?php
require('config.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>Home</title>
<meta charset="iso-8859-1">
<link rel="stylesheet" href="styles/layout.css" type="text/css">
<link rel="stylesheet" href="styles/jquery.bxslider.css" type="text/css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="scripts/jquery.bxslider.js"></script>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<!--[if lt IE 9]><script src="scripts/html5shiv.js"></script><![endif]-->
</head>
<body>
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1><a href="#">Roweb</a></h1>
      
    </div>
    <nav class="custom-menu">
      <ul>
        <li><a class="target" href="#">Text Link</a></li>
        <li><a class="target" href="#">Text Link</a></li>
        <li><a class="target" href="#">Text Link</a></li>
        <li><a class="target" href="#">Text Link</a></li>
        <li class="last"><a class="target" href="#">Text Link</a></li>
      </ul>
    </nav>
	
  </header>
</div>
<!-- content -->
<div class="wrapper row2">
  <div id="container" class="clear">
	<?php 
	if (isset($_GET['register']) and $_GET['register']=='true') {
        echo '<h1>User Registered succesfully!</h1>';
	}
	if (isset($_SESSION['curentuser'])) {
        echo "<h1>Login succesfully: Oh, hi, " . $_SESSION['curentuser'] . "! <a href=\"logout.php\">Logout!</a></h1> ";
	} else {
		echo "<h1><a href=\"login.php\">Login</a> or <a href=\"register.php\">Register</a></h1>";
	}
	?>
    <!-- content body -->
    <div class="slider">
		<a href="#">
			<img src="images/demo/940x360.gif" alt="">
		</a>
	</div>

    <!-- main content -->
    <section id="homepage" class="last clear">
      <!-- article 1 -->
      <article class="one_third">
        <h2>Lorum ipsum dolor</h2>
        <img src="images/demo/80x80.gif" alt="">
        <p>This is a W3C compliant free website template from <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a>. For full terms of use of this template please read our <a href="http://www.os-templates.com/template-terms">website template licence</a>. You can use and modify the template for both personal and commercial use. You must keep all copyright information and credit links in the template and associated files. For more HTML5 templates visit <a href="http://www.os-templates.com/">free website templates</a>.</p>
        <footer class="more"><a href="#">Read More &raquo;</a></footer>
      </article>
      <!-- article 2 -->
      <article class="one_third">
        <h2>Lorum ipsum dolor</h2>
        <img src="images/demo/80x80.gif" alt="">
        <p>Vestibulumaccumsan egestibulum eu justo convallis augue estas aenean elit intesque sed. Facilispede estibulum nulla orna nisl velit elit ac aliquat non tincidunt. Namjusto cras urna urnaretra lor urna neque sed quis orci nulla. Laoremut vitae doloreet condimentumst phasellentes dolor ut a ipsum id consectetus. Inpede cumst vitae ris tellentesque fring intesquet.</p>
        <footer class="more"><a href="#">Read More &raquo;</a></footer>
      </article>
      <!-- article 3 -->
      <article class="one_third lastbox">
        <h2>Lorum ipsum dolor</h2>
        <img src="images/demo/80x80.gif" alt="">
        <p>Vestibulumaccumsan egestibulum eu justo convallis augue estas aenean elit intesque sed. Facilispede estibulum nulla orna nisl velit elit ac aliquat non tincidunt. Namjusto cras urna urnaretra lor urna neque sed quis orci nulla. Laoremut vitae doloreet condimentumst phasellentes dolor ut a ipsum id consectetus. Inpede cumst vitae ris tellentesque fring intesquet.</p>
        <footer class="more"><a href="#">Read More &raquo;</a></footer>
      </article>
    </section>
	
	<div class="aaa bbb"></div>
	
	</div>
  
</div>
<!-- footer -->
<div class="wrapper row3">
  <footer id="footer" class="clear">
    <p class="fl_left">Copyright &copy; - All Rights Reserved - <a href="www.roweb.ro">Roweb Homepage</a></p>
    <p class="fl_right"> Roweb</p>
  </footer>
</div>
<script>
$(function(){
	
});
</script>
</body>
</html>
