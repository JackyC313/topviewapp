<?php
// Includes some basic helper functions I used for debugging
include "library/helpers.php";

// A class to handle ticker data
require_once "library/tickerClass.php";
// A class to handle site functionality
require_once "library/siteFacade.php";

$baseSite = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Top View App</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <link href="css/app.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Navigation Toggle</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $baseSite; ?>">TopView App</a>
            </div>

            <!-- Form to handle user entered limit -->
            <div id="navbar" class="navbar-collapse collapse">
                <form id="limitForm" class="navbar-form navbar-right">
                    <button type="submit" class="btn btn-success">Limit</button>
                    <div class="form-group">
                        <input id="tickerLimit" type="text" value="4" class="form-control">
                    </div>
                    Items on page
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Ticker Table (<span id="tickerCount"></span> Items in total)</h2>
                <div id="message" class="alert alert-danger hidden"></div>        
                </div>
        </div>
        <div class="row">
            <div id="no-more-tables">
                <?php
                    // PHP Code to run SiteFacade
                    $siteFacade = new SiteFacade("data/ticker.json");
                    $siteFacade->runFacade();
                ?>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.12.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Custom JS Script to handle display limit -->
    <script src="js/app.js"></script>
</body>
</html>
