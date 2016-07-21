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
					<a href="query.php">CPU Usage Query</a>
				</li>
					<li>
					<a href="ping.php">Server Availibilty</a>
				</li>
				<li>
					<a href="wifi1.php">Wifi Lists</a>
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
                        <h1>Raspberry Pi</h1>
						<div id="piechart1" style="width: 300px; height: 300px;"></div>
						<div id="piechart2" style="width: 300px; height: 300px;"></div>
						<?php include "indexscript.php";?>
						
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
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
 
        var data = google.visualization.arrayToDataTable([
          ['CPU', 'Percent'],
                                  ['Free',                  <?php echo $free; ?>],
          ['Load',    <?php echo $used; ?>],
                                 
 
        ]);
 
        var options = {
          title: 'CPU',
                                  is3D: true,
        };
 
        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
 
        chart.draw(data, options);
      }
    </script>
	<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
 
        var data = google.visualization.arrayToDataTable([
          ['CPU', 'Percent'],
                                  ['Free',                  <?php echo $freem; ?>],
          ['Used',    <?php echo $usedm; ?>],
                                 
 
        ]);
 
        var options = {
          title: 'Memory',
                                  is3D: true,
        };
 
        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
 
        chart.draw(data, options);
      }
    </script>

</body>
</html>