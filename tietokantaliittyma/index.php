<?php
require "./alku.php";
require "./yhteys.php";
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
			<li class="linkworks"><a style="color: black; margin-left: 10%; margin-top: 10%;" href="">päiväkirja</a></li>
			<img id="menuicon" src="https://img.icons8.com/ios/50/000000/top-menu-filled.png">
		</ul>
	</div>
	<div class="hidden-xs col-sm-2 col-md-2 col-lg-2 hajoita">
	</div>
</div>
</div>
<div class="container-fluid">
	<div class="row ala">
		<div class="hidden-xs hidden-sm col-md-2 col-lg-2">
		</div>
		<div class='col-xs-12 col-sm-10 col-md-8 col-lg-8 iso'>
		<div id="sisalto">
		<a class="muokkaa" href='./lisaa_juttu.php'>Kirjoita päiväkirjaan</a> 
		<input style="margin-left: 43%;padding: 4px;" placeholder="Hae päiväkirjoja"> </input>
		<hr>
<?php
//valmis jos toimii
$teos=""; 
$sql ="SELECT * FROM esports_paivakirja ORDER BY PaivakirjaID asc"; 
echo "Opiskelija";


$kysely=$yhteys->query($sql); 

$rivit = $kysely->rowCount(); 
$vastaus = $kysely->fetchAll(PDO::FETCH_ASSOC);  
for($i=0;$i<$rivit;$i++) { 
    $paivakirja=$vastaus[$i]["PaivakirjaID"]; 
    $peli=$vastaus[$i]["PeliID"]; 
    $kesto=$vastaus[$i]["harjoitus_kesto"]; 
    $uni=$vastaus[$i]["uni"]; 
    $ruokailu=$vastaus[$i]["ruokailu"]; 
	$liikunta=$vastaus[$i]["liikunta"]; 
	$mieliala=$vastaus[$i]["mieliala"]; 
    echo "<div class='osa lista'>";
	echo "Matti Meikäläinen";
	echo "<button>Lue päiväkirjaa: ".$paivakirja."</button>"; 
	echo "<div class='submenu'><p>PeliID: ".$peli."</p>"; 
	echo "<p>Harjoituksen kesto: ".$kesto."</p>"; 
	echo "<p>Uni: ".$uni."</p>"; 
	echo "<p>Ruokailu: ".$ruokailu."</p>"; 
	echo "<p>Liikunta: ".$liikunta."</p>";
	echo "<p>Mieliala: ".$mieliala."</p></div></div><br>"; 
    //echo "<div class='osa'><a href=\"muokkaa_juttua.php?teos=$teos\">Kirjoita päiväkirjaan </a></div>";
} ?>
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
require "./loppu.php";
?>