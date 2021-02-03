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
					<a class="navbar-brand" rel="home" href="https://tutuka.com/" title="Tutuka Home page" itemprop="url"><img width="190" height="41" src="https://developer.tutuka.com/wp-content/uploads/2020/08/tutuka-header-logo.svg" alt="Tutuka Logo">
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
				<a class="dropdown-item" href="http://localhost/reconciliation/recon.php">Summary Report</a>
			    <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="http://localhost/reconciliation/client_unmatched.php">Client Unmatched Report</a>
				<a class="dropdown-item" href="http://localhost/reconciliation/tutuka_unmatched.php">Tutuka Unmatched Report</a>
                <div class="dropdown-divider"></div>
				<a class="dropdown-item" href="http://localhost/reconciliation/client_matched.php">Client matched Report</a>
				<a class="dropdown-item" href="http://localhost/reconciliation/tutuka_matched.php">Tutuka matched Report</a>
				 <div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#">Suggestion</a>
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
	  	 
	  
	    <h2 class="mt-4">Tutuka Suggestion</h2>
		
	
		

		<?php

$tn_unmatch= array();
$tid_unmatch= array();
$wa_unmatch=array();

$row=0;
$len=0;

if (($file1 = fopen("TutukaUnmatched.csv", "r")) !== FALSE )
{
	while (($umdata = fgetcsv($file1, 1000, ",")) !== FALSE )
	{
		$arr1 = $umdata[3];
		$arr2= $umdata[5];
		$arr3 = $umdata[7];
		array_push($tn_unmatch,$arr1);
		array_push($tid_unmatch,$arr2);
		array_push($wa_unmatch,$arr3);
		$num = count($umdata);
			   
	}
	
	$len = count($tn_unmatch);
	
  fclose($file1);
}

 echo'<div class="table-responsive">';
 echo'<table class="table"><tr>';
 
	if (($file2= fopen("TutukaMatched.csv", "r")) !== FALSE) 
		{
								
			while (($match_data = fgetcsv($file2, 1000, ",")) !== FALSE)
			{			
					
			   if($row ==1)
				{		
					/*fputcsv($file3, (array)$match_data[3]);  
					fputcsv($file3, (array)$match_data[5]);  
					fputcsv($file3, (array)$match_data[7]);	*/
					
					
					 echo'<th scope="col">'.$match_data[3].'</th>';
					 echo'<th scope="col">'.$match_data[5].'</th>';
					 echo'<th scope="col">'.$match_data[7].'</th>';
					 echo '</tr></thead><tbody>';
		
				}	
				for ($i=1; $i <=$len-1; $i++) 
				{
					
				
										
					if($tn_unmatch[$i] == $match_data[3] || $tid_unmatch[$i] == $match_data[5] 
					   || $wa_unmatch[$i] == $match_data[7])
						{
						   	// echo "<p>$match_data[3] </p>\n";			
						   //Suggestion
						  // fputcsv($file3, (array)$match_data[3]);
						  // fputcsv($file3, (array)$match_data[5] );  
						  // fputcsv($file3,(array)$match_data[7]); 
                             echo'<tr>';
							 echo'<td>'.$match_data[3].'</td> ';
                    	      echo'<td>'.$match_data[5].'</td> ';	
                              echo'<td>'.$match_data[7].'</td> ';								 
							 echo'</tr>';																				   
						}
					
				}						
				
					
					$row++;
			}
					
			fclose($file2);	
				
		}
		
		echo '</tbody></table>';
		echo'</div>';

		
		
 echo'<div class="table-responsive">';
 echo'<table class="table"><tr>';
	
	if (($file2= fopen("TutukaMatched.csv", "r")) !== FALSE) 
		{
								
			while (($match_data = fgetcsv($file2, 1000, ",")) !== FALSE)
			{			
					
			   if($row ==1)
				{		
					/*fputcsv($file3, (array)$match_data[3]);  
					fputcsv($file3, (array)$match_data[5]);  
					fputcsv($file3, (array)$match_data[7]);	*/
					
					
					 echo'<th scope="col">'.$match_data[3].'</th>';
					 echo'<th scope="col">'.$match_data[5].'</th>';
					 echo'<th scope="col">'.$match_data[7].'</th>';
					 echo '</tr></thead><tbody>';
		
				}	
				for ($i=1; $i <=$len-1; $i++) 
				{
					
				
										
					if($tn_unmatch[$i] == $match_data[3] || $tid_unmatch[$i] == $match_data[5] 
					   || $wa_unmatch[$i] == $match_data[7])
						{
						   	// echo "<p>$match_data[3] </p>\n";			
						   //Suggestion
						  // fputcsv($file3, (array)$match_data[3]);
						  // fputcsv($file3, (array)$match_data[5] );  
						  // fputcsv($file3,(array)$match_data[7]); 
                             echo'<tr>';
							 echo'<td>'.$tn_unmatch[$i].'</td> ';
                    	      echo'<td>'.$tid_unmatch[$i].'</td> ';	
                              echo'<td>'.$wa_unmatch[$i].'</td> ';								 
							 echo'</tr>';																				   
						}
					
				}						
				
					
					$row++;
			}
					
			fclose($file2);	
				
		}
		echo '</tbody></table>';
			echo'</div>';
		

	
	

?>
	
			
	
		
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