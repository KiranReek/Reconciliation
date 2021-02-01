<html lang="en-US">
  <head>
      <title>Tutuka payment API</title>
      <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link href = "css/style.css" rel = "stylesheet">
	  <link href = "css/wpo-minify-header-78171344.min.css" rel = "stylesheet">
	  <link href = "css/bootstrap/bootstrap.min.css" rel = "stylesheet">
	  <link href = "css/bootstrap/sidebar.css" rel = "stylesheet">


	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
	<div class = "main">
		<div class = "header">
			<div class="container container--wide d-flex justify-content-between align-items-center">
				<div class="site-header__left">
					<a class="navbar-brand" rel="home" title="Tutuka Home page" itemprop="url"><img width="190" height="41" src="https://developer.tutuka.com/wp-content/uploads/2020/08/tutuka-header-logo.svg" alt="Tutuka Logo">
					<span class="developers">Financial Reconciliation</span>
					</a>
				</div>
	
	        </div>
		
		
		</div>
	</div>
	  <div id="page-content">
    <!-- /#sidebar-wrapper -->
	  <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">


      

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
		       <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Display Reconciliation Records
              </a>
              <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="http://localhost/reconciliation/client_unmatched.php">Client Unmatched Report</a>
				<a class="dropdown-item" href="http://localhost/reconciliation/tutuka_unmatched.php">Tutuka Unmatched Report</a>
                <div class="dropdown-divider"></div>
				<a class="dropdown-item" href="http://localhost/reconciliation/client_matched.php">Client matched Report</a>
				<a class="dropdown-item" href="http://localhost/reconciliation/tutuka_matched.php">Tutuka matched Report</a>
				<div class="dropdown-divider"></div>
                <a class="dropdown-item" href="http://localhost/reconciliation/client_file.php">Client Markoff File</a>
				<a class="dropdown-item" href="http://localhost/reconciliation/tutuka_file.php">Tutuka Markoff File</a>
              </div>
            </li>
        
           
      
          </ul>
        </div>
      </nav>
      </br>
	    </div>
		</div>
      <div class="container-fluid">
	  	 
	  
	    <h2 class="mt-4">Client Markoff File</h2>
		</br>
	
	<div class="table-responsive">
    <table class="table table-hover table-fixed">
	
	   <?php 
   

$row = 1;

if (($handle = fopen("ClientMarkoffFile20140113.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
        $num = count($data);
		if($row == 1)
		{
			echo'<thead><tr>';
		}
		else
		{		
			echo'<tr>';
		}
       // echo "<p> $num fields in line $row: <br /></p>\n";
        
        for ($line=0; $line < $num; $line++) {
			
			if(!empty($data[$line]))
			{
              $value = $data[$line];
			 // $test = $data[1];
		
			  
			}
            else
			{
              $value = "&nbsp;";
             
			}
            if($row==1)
			{
             echo '<th scope="col">'.$value.'</th>';
			}	
            else
			{
              echo '<td>'.$value.'</td>';

			}				
           // echo $data[$c] . "<br />\n";
        }
		if($row==1)
		{
		 echo '</tr></thead><tbody>';
		}
		else
		{
			 echo '</tr>';
		}
		$row++;
    }
    echo '</tbody></table>';
    fclose($handle);
}
   ?>
  
	</div>
		 
        
      </div>
	 

  

	
	  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
	
	</body>
</html>