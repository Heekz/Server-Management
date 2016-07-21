<html>


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>



    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="index.php">Home</a>
                </li>
                <li>
                    
                </li>
				<li>
					<a href="ippage.php">CPU Usage Query</a>
				</li>
					<li>
					<a href="ping.php">Server Availibilty</a>
				</li>
				<li>
					<a href="wifilists.php">Wifi Lists</a>
				</li>
				<li>
					<a href="reboot.php">Benchmark</a>
				</li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
						<h1>IP Address</h1>
                        <form action="ipfile.php" method="post" class="form-group">
						Username: <input type="text" name="ip" class="form-control" placeholder="IP Address of Query"><br>
						
						<h2>Query iterations</h2>
						
						<select class="form-control" name="iterations">
						<optgroup label="iterations">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option> 
						</optgroup>
						</select>

						
						
						<h3>Query Wait Time</h3>
						<label class="btn btn-secondary active">
						<input type="radio" name="wait" value='1'>1 second</input><br>
						</label><br>
						<label class="btn btn-secondary active">
						<input type="radio" name="wait" value='2'>2 seconds</input><br>
						</label><br>
						<label class="btn btn-secondary active">
						<input type="radio" name="wait" value='3'>3 seconds</input><br>
						</label><br>
						<label class="btn btn-secondary active">
						<input type="radio" name="wait" value='4'>4 seconds</input><br>
						</label><br>
						<input type="submit" class="btn btn-default"><br>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->




    
	<script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>
</html>