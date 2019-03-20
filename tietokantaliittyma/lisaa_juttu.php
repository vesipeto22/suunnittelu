<?php
//kesken
require "./alku.php";
require "./yhteys.php";
if (!empty($_POST["PeliID"]) && !empty($_POST["harjoitus_kesto"]) && !empty($_POST["uni"]) && !empty($_POST["ruokailu"]) && !empty($_POST["liikunta"]) && !empty($_POST["mieliala"])) { 
    //$PaivakirjaID = $_POST['PaivakirjaID']; 
    $PeliID = $_POST['PeliID']; 
    $harjoitus_kesto = $_POST['harjoitus_kesto'];
	$uni = $_POST['uni'];
	$ruokailu = $_POST['ruokailu'];
	$liikunta = $_POST['liikunta'];
	$mieliala = $_POST['mieliala'];

    $sql = "INSERT INTO esports_paivakirja (PeliID,harjoitus_kesto,uni,ruokailu,liikunta,mieliala) VALUES ($PeliID,'$harjoitus_kesto','$uni','$ruokailu','$liikunta',$mieliala)"; 
	
    $kysely=$yhteys->prepare($sql); 
    $kysely->execute();
	echo $sql;
	echo '<br><br><a class="muokkaa button" style="padding: 10px;" href="./index.php">Palaa päiväkirjaan</a>';
} 
else { 
	
	
?> 
<div class="container-fluid">
<div class="row yla">
	<div class="hidden-xs hidden-sm col-md-2 col-lg-2 animu">
		<a href="">
		<img href="" id="logo" src="./logo.png" alt="kemppainen">
		</a>
	</div>
	<div class="hidden-xs hidden-sm col-md-8 col-lg-8 sivu navi">
		<ul class="menu">
			<li class="linkworks"><a href="">etusivu</a></li>
			<li class="linkworks"><a style="color: black;" href="">päiväkirja</a></li>
			<li class="linkworks"><a href="">kilpailut</a></li>
			<li class="linkworks"><a href="">tiimit</a></li>
			<li class="linkworks" id="kirjauduu"><a href="">kirjaudu ulos</a></li>
		</ul>
	</div>
		<div class="col-xs-12 col-sm-12 hidden-md hidden-lg sivu navi">
		<ul class="menu">
			<li class="linkworks"><a style="color: black;" href="">päiväkirja</a></li>
			<img id="menuicon kirjauduu" style="float: right; margin-right: 10%; margin-top: 5px;" src="https://img.icons8.com/ios/50/000000/top-menu-filled.png">
		</ul>
	</div>
	<div class="hidden-xs hidden-sm col-md-2 col-lg-2 hajoita">
	</div>
</div>
</div>
<div class="container-fluid">
	<div class="row ala">
		<div class="hidden-xs hidden-sm col-md-2 col-lg-2">
		</div>
		<div class='col-xs-12 col-sm-10 col-md-8 col-lg-8 iso'>
		<div id="sisalto">
<h2>Täytä lomake kokonaan.</h2>
    <form action="./lisaa_juttu.php" method="post"> 
	
 		<!--<p> 
		<label for="PaivakirjaID">PaivakirjaID</label><br> 
		<input type="text" class="teksti" id="PaivakirjaID" name="PaivakirjaID"><br>
		</p>-->

		<!--<p> 
		<label for="PeliID">PeliID</label><br> 
		<input type="text" class="teksti" id="PeliID" name="PeliID"><br>
		</p>-->
		<p class="no-margin"> 
		<label class="tumma" >Valitse peli:</label>
		<select class="teksti" style="height:25px;" id="PeliID" name="PeliID" placeholder="valitse peli">
		  <?php
			  $sql="SELECT * FROM `esports_pelit` ORDER BY `esports_pelit`.`PeliID` ASC"; 
			  $kysely=$yhteys->query($sql); 

				$rivit = $kysely->rowCount(); 
				$vastaus = $kysely->fetchAll(PDO::FETCH_ASSOC); 
							for($i=0;$i<$rivit;) { 
							$PeliID=$vastaus[$i]["PeliID"]; 
							$Pelin_nimi=$vastaus[$i]["Pelin_nimi"];
							echo "<option style='color: black;' value=".$PeliID.">".$Pelin_nimi."</option>";
							$i++;
				  }
		?>
		</select>
		</p>
		
		<p class="no-margin"> 
		<label class="tumma">Peli harjoitus kesto: </label>
		<input style="width: 7.5%;" type="text" class="teksti" id="harjoitus_kesto" name="harjoitus_kesto"><br>
		</p>
		
		<p class="no-margin"> 
		<label class="tumma">Uni:</label>
		<input style="width: 7.5%;" type="text" class="teksti" id="uni" name="uni"><br>
		</p>

		<p class="no-margin"> 
		<label class="tumma">Ruokailu:</label>
		<input style="width: 40%;" type="text" class="teksti" id="ruokailu" name="ruokailu"><br>
		</p>
		
		<p class="no-margin"> 
		<label class="tumma">Liikunta:</label>
		<input style="width: 40%;" type="text" class="teksti" id="liikunta" name="liikunta"><br>
		</p>
		
		<p class="no-margin"> 
		<label class="tumma">Mieliala:</label>
		<input style="width: 5%;" type="text" class="teksti" id="mieliala" placeholder="1-3" name="mieliala"><br>
		</p>

		<p> 
		<input class="muokkaa button" style="width: 50%; border: none; visibility: hidden;" type="" value=""> 
		<input class="muokkaa button" style="width: 20%; border: none;" type="submit" value="Kirjoita päiväkirjaan" name="painike"> 
		<a class="muokkaa button" style="padding: 10px;" href='./index.php'>Palaa päiväkirjaan</a>
		</p> 
		 
		</form> 
     

	</div>
			</div>
			<div id="uutiset" class="hidden-xs col-sm-2 col-md-2 col-lg-2 sivu uutiset">
				<h1>Info</h1>
				<h3>ADVERTISEMENT:</h3>
				<p>website sponsored by kemppainen oy</p>
			</div>
		</div>
	</div>

<?php 
} 
require "./loppu.php";

?>