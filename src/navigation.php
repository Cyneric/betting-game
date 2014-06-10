<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header" style="width:100%">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(ltrim(strrchr ($_SERVER['SCRIPT_NAME'], "/"), "/") == "index.php")echo "class='active'";?>><a href="index.php">Home</a></li>
		<li <?php if(ltrim(strrchr ($_SERVER['SCRIPT_NAME'], "/"), "/") == "bet.php")echo "class='active'";?>><a href="bet.php">Tippen</a></li>
		<li <?php if(ltrim(strrchr ($_SERVER['SCRIPT_NAME'], "/"), "/") == "statistics.php")echo "class='active'";?>><a href="statistics.php">Statistik</a></li>
		<li <?php if(ltrim(strrchr ($_SERVER['SCRIPT_NAME'], "/"), "/") == "spielplan.php")echo "class='active'";?>><a href="spielplan.php">Spielplan</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user'] ?><b class="caret"></b></a>
          <ul class="dropdown-menu">
           	<li><a href="profile.php">Profil</a></li>
		    <li><a href="logout.php">Abmelden</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>