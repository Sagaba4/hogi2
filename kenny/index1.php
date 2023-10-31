
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Geopanneau</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     
    <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
    
    <style>
        #carte{
            height: 500px;;
            width: 300px;;
        }
        body{
            background: whitesmoke;
        }
		#container.img{
			height: 120px;;
            width: 100px;;
		}
		img{
			height: 500px;;
            width: 300px;;
		}
        
    </style>
</head>
<body>
<body>
            <div class='container'>
				 <div class='row'> 
                   <div class='col-6'>  
				 <?PHP
				    class user
					{
						public $table;
						public $tbl;
						public $Propriete;
						public $json;
						public $pdo;
						public $sele;
						
						public function fxAccessDB($table,$tbl,$Propriete,$pdo,$sele)
						{
						                $tbl=$table;
										$selexec=$pdo->query($sele);
										//Traitement des lignes et des colones de la Base de données
										$num= $selexec->rowCount();//Recupere le nombre de ligne
										$numf= $selexec->columnCount();//Recuperer le nombre de colones					
										$col000 =  $selexec->getColumnMeta(0);// On choisit la premiere colonne d indexation
										$nomChampCle=$columns[]= $col000['name'];// On recupere le nom de cette colonne
										
										$col00b =  $selexec->getColumnMeta(1); // On choisit la deuxien colonne
										$chNr2=$columns[] = $col00b['name'];// On recupere le nom de cette colonne			
										$i=0;
										echo"<details><summary>Menu eCommerce</summary>";	
										echo"<ul>";
										while($lignematrice=$selexec->fetch())
										{
											 echo"<details><summary>".$lignematrice[1]."</summary>";	
										   echo "<ul>";
											$y=0;
											$json='';
											$Lavirgule="";
											for($y==0;$y<($numf-1);$y++)
														{
																$col000 =  $selexec->getColumnMeta($y);// On choisit la colonne d indexation $y
																$nomChampCle=$columns[]= $col000['name'];// On recupere le nom de cette colonne
																//echo"<li>";
																echo $Champ0="<a href='?variable=".$lignematrice[$nomChampCle]."&Propriete=".$nomChampCle."'>".$lignematrice[$nomChampCle]."</a>";
															   //Creation/generation automatique du code JSON afin d avoir du code à transformer et à utiliser en parsering ou en stringfisation des objets JSON
																// echo"</li>";
															   $latbl="'".$tbl."{";
																  // echo $y." correspond a ".($numf-2);
																   if($y==($numf-2))
																   {
																	   $Lavirgule="";
																   }
																   else{
																	   $Lavirgule=",";
																   }
															   $finlatbl="}'";
																$json=$json."\"".$nomChampCle."\":\"".$lignematrice[$nomChampCle]."\"".$Lavirgule."";										   
																$json5=$json;   
														}
													
														
											echo "</ul>";
											echo"</details><div class='alert alert-success'>";						
											$json="".$json."  ".$json5."";
											
											echo"</div>";
											
											$i=$i+1;
										}
									
									     echo"</ul>";
									  echo"</details>";
									}	
									  
									
									 public function CreationFichierJson($json)
									 {
									   $file= fopen("geopanneau.json", "w");
									  // $json.="\r\n</script>\r\n";		
									   fwrite($file, $json);
									   fclose($file);	  
									   //echo "JSON has been written.  <a href=\"bisnet.json\">View the JSON.</a>";							
							          }
							}	
					
					include("connexiondb.php");
					$table="menu";
					$tbl=$table;
					$sele="select * from ".$tbl;										
					$tbl=$table;
					$Propriete="Nom";
					$json="";
					
					$appelClass=new user;
					$appelClass->fxAccessDB($table,$tbl,$Propriete,$pdo,$sele);
					$appelClass->CreationFichierJson($json);
				  
				 ?>
	 </div>
	 <div id="carte" name="carte" class="col-4"  >Affichage de la carte</div>
  </div>
</div>
	
<script>
        var map = L.map('carte').setView([-3.3437, 29.327], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);


L.marker([-3.3437, 29.327]).addTo(map)
    .bindPopup('<img src="login.JPG">')
    .openPopup();
	</script>
<?php
	include("connexiondb.php");
	$sele = "SELECT * FROM coordonne";
	$selexec = $pdo->query($sele);
	
	// $long = $_GET["longitude"];
	// $lat = $_GET["latitude"];
	while ($selexec->fetch()) {
		$circle = "L.circle([" . $selexec['longitude'] . ", " . $selexec['latitude'] . "], {
			color: 'red',
			fillColor: '#f03',
			fillOpacity: 0.5,
			radius: 500
		}).addTo(map);";
		echo "<script>" . $circle . "</script>";
	}
?>

// var polygon = L.polygon([
// [-3.305, 29.0],
// [-3.30, 29.30],
// [-3.3010, 29.7],
// ]).addTo(map);
//     
  
  <?PHP
      if(isset($_GET["variable"]))
		//echo $Propriete=$_GET["Propriete"];
	  {
  ?>
   <script>
		//let bisnetjsontext={"Universite_Id":"14","Symbole":"UNIV13 21061752736","Name":"MBA","Dispose_Accreditation":"Oui","Dispose_Agrement":"OUI","Dispose_Autorisation":"OUI","Zone_action_Id":"1","eMail":"sahinguvu bisnetcloudsystems.bi","Type_partenaire_Id":"1","Institution_Id":"6","Ordre":"16","Sigle_Abreviation":"MBA","Centre_responsabilite_Id":"0","Date_creation":"0000-00-00","Periode":"0","Type_activite_Id":"0","Etat_acceptation_Id":"0"};
//		const myObj = JSON.parse('{"idMenu":"2","nom":""}');
//		document.getElementById("carte").innerHTML = myObj.nom;
//       const myObj = document.querySelector('#iframe');
   </script>
  <?PHP
     }		  
  ?>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
 
 <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div id="kim" name="kim"   class="carousel-inner">
    <div class="carousel-item active">
      <img src="imagesetsons/allebus.JPG" alt="BUJA">
    </div>
    <div class="carousel-item">
      <img src="imagesetsons/stop.JPG" alt="BUJAVILLE">
    </div>
    <div class="carousel-item">
      <img src="imagesetson/dosdane.JPG" alt="CAPITAL">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
</body>
</html>