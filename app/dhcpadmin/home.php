<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['userSession'])) {
 header("Location: index.php");
}

$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$DBcon->close();

?>

<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">

    <title>Welcome - <?php echo $userRow['email']; ?></title>
    <link crossorigin="anonymous" href=
    "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity=
    "sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" class=
                "navbar-toggle collapsed" data-target="#navbar" data-toggle=
                "collapse" type="button"><span class="sr-only">Toggle
                navigation</span> <span class="icon-bar"></span> <span class=
                "icon-bar"></span> <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="home.php">DHCP Admin</a>
            </div>

            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href=
                        "">
                        Back to Article</a>
                    </li>


                    <li>
                        <a href=
                        "http://www.codingcage.com/search/label/jQuery">jQuery</a>
                    </li>


                    <li>
                        <a href=
                        "http://www.codingcage.com/search/label/PHP">PHP</a>
                    </li>
                </ul>


                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#"><span class=
                        "glyphicon glyphicon-user"></span>&nbsp;
                        <?php echo $userRow['username']; ?></a>
                    </li>


                    <li>
                        <a href="logout.php?logout"><span class=
                        "glyphicon glyphicon-log-out"></span>&nbsp; Logout</a>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>


    <div class="container" style=
    "margin-top:150px;text-align:center;font-family:Verdana, Geneva, sans-serif;font-size:35px;">
    <?php
      $output = shell_exec('service isc-dhcp-server status');
      echo "<pre>$output</pre>";
    ?>
    </div>
</body>
</html>
