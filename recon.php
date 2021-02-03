 <?php 
   
    $cFile=$_POST['markoffFileC'];
    $tFile=$_POST['markoffFileT'];
	//print_r(read_csv($num));

	$row = 1;
	$cdata = array();
	$tdata = array();
	
	if (($file6 = fopen("TutukaUnmatched.csv", "w")) !== FALSE) 
	{
		if (($file5 = fopen("TutukaMatched.csv", "w")) !== FALSE) 
		{
			
			if (($file3 = fopen("ClientMatched.csv", "w")) !== FALSE) 
			{
				if (($file4 = fopen("ClientUnmatched.csv", "w")) !== FALSE) 
				{
					if (($file1 = fopen($cFile, "r")) !== FALSE)
					{
						
						if (($file2 = fopen($tFile, "r")) !== FALSE)
						{
				        
						   
							while (($tdata = fgetcsv($file2, 1000, ",")) !== FALSE && ($cdata = fgetcsv($file1, 1000, ",")) !== FALSE)
							{
												
								$num = count($cdata);								
								for ($i=0; $i < $num; $i++) 
								{
									//Check for incorrect csv files
									if($row ==1)
									{
										if(in_array("TransactionAmount",$cdata) && in_array("TransactionDate",$cdata) &&  in_array("TransactionID",$cdata)
										&&  in_array("WalletReference",$cdata ))
										{
												$index_ta = array_search("TransactionAmount",$cdata);
												$index_td = array_search("TransactionDate",$cdata);
												$index_id = array_search("TransactionID",$cdata);
												$index_wr = array_search("WalletReference",$cdata);
												$index_wn = array_search("TransactionNarrative",$cdata);
												 
												fputcsv($file3, $cdata);  
												fputcsv($file4, $cdata); 
												fputcsv($file5, $tdata); 										
												fputcsv($file6, $tdata);	
											
												break;
										}
										else
										{
											echo "<script type='text/javascript'> document.location = 'pages/alert/invalidFile.php'; </script>";
											
											
											
											 
										}
									}
							
								}
									 
								if(trim($cdata[$index_ta]) == trim($tdata[$index_ta]) && trim($cdata[$index_td]) == trim($tdata[$index_td])
									&& trim($cdata[$index_id]) == trim($tdata[$index_id]) && trim($cdata[$index_wr]) == trim($tdata[$index_wr])
									&& trim($cdata[$index_wn]) == trim($tdata[$index_wn]))
								{
										
										 fputcsv($file3, $cdata);  
										 fputcsv($file5, $tdata); 
												
								}
								
								else
								{
									
									fputcsv($file4, $cdata); 
                                    fputcsv($file6, $tdata);									
											
								}
													 
								$row++;
								
							}
						 fclose($file2);
				
						}
					  fclose($file1);
					}
			   
				  fclose($file4);
				}
			 fclose($file3);
			}
			
		fclose($file5);
		}
	  fclose($file6);
	}
	
	$fp=file('TutukaUnmatched.csv');
	//echo count($fp);
	
   ?>
  
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
				<a class="dropdown-item" href="http://localhost/reconciliation/trial.php">Suggestion Report</a>
				 <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="http://localhost/client_file/.php">Client Markoff File</a>
				 <a class="dropdown-item" href="http://localhost/tutuka_file/.php">Tutuka Markoff File</a>
              </div>
            </li>
        
           
      
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <h1 class="mt-4">Summary Report</h1>
		</br>
		<h3 class="mt-4">Client Markoff File</h3>
        <h5 class="mt-5">Total Records:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php $fp=file($cFile); echo count($fp);?></h5>
	    <h5 class="mt-5">Matching Records:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php $fp=file("ClientMatched.csv"); echo count($fp);?></h5>
		<h5 class="mt-5">Unmatched Records:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php $fp=file("ClientUnmatched.csv"); echo count($fp);?></h5>
		</br>
		<h3 class="mt-4">Tutuka Markoff File</h3>
        <h5 class="mt-5">Total Records:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php $fp=file($tFile); echo count($fp);?></h5>
	    <h5 class="mt-5">Matching Records:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php $fp=file("TutukaMatched.csv"); echo count($fp);?></h5>
		<h5 class="mt-5">Unmatched Records:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php $fp=file("TutukaUnmatched.csv"); echo count($fp);?></h5>
		 
        
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