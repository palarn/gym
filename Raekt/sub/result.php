<?php
	
	//Birtir gögn úr gagnagrunni varðandi þá líkamsræktarstöð sem var valinn í list.php

	//Tengjast gagnagrunni
	require_once('mysqli_connect.php');
	
	//Fær send gildi takka frá list.php
	$check_value1 = $_GET['var1'];
	$check_value2 = $_GET['var2'];


	//Fyrirspurn í gagnagrunn eftir því hvaða takka var ýtt á
	$test_box1 = "SELECT id, title, Iman, IIIman, VIman, XIIman, staerd, stadur, hoptimar, postnr FROM stodvar WHERE id=$check_value1";
	$test_box2 = "SELECT id, title, Iman, IIIman, VIman, XIIman, staerd, stadur, hoptimar, postnr FROM stodvar WHERE id=$check_value2";

	$response2 = @mysqli_query($dbc, $test_box1);
	$response3 = @mysqli_query($dbc, $test_box2);


	//Samanburðar dálkur----------------------------------------

	echo '<div class="container fixed">';
	if($response2){
				
				//Sækir gögn og birtir í töflu
				while($row = mysqli_fetch_array($response2)){
					echo '<div class="col-md-4 col-xs-12" id="result_box">';
					echo '<table align="center">

								<tr><td align="left"><b>Stöð:</b></td><td align="right">'. $row['title'] .'</td></tr>
								<tr><td align="left"><b>1 mán:</b></td><td align="right">'. $row['Iman'] .' kr</td></tr>
								<tr><td align="left"><b>3 mán:</b></td><td align="right">'. $row['IIIman'] .' kr</td></tr>
								<tr><td align="left"><b>6 mán:</b></td><td align="right">'. $row['VIman'] .' kr</td></tr>
								<tr><td align="left"><b>Ár:</b></td><td align="right">'. $row['XIIman'] .' kr</td></tr>
								<tr><td align="left"><b>Stærð:</b></td><td align="right">'. $row['staerd'] .' fm</td></tr>
								<tr><td align="left"><b>Staður:</b></td><td align="right">'. $row['stadur'] .'</td></tr>
								<tr><td align="left"><b>Hóptímar:</b></td><td align="right">'. $row['hoptimar'] .'</td></tr>

							</table>';
					echo "</div>";
				}
			}
	if($response3){
				
				while($row = mysqli_fetch_array($response3)){
					echo '<div class="col-md-4 col-xs-12" id="result_box">';
					echo '<table align="center">

								<tr><td align="left"><b>Stöð:</b></td><td align="right">'. $row['title'] .'</td></tr>
								<tr><td align="left"><b>1 mán:</b></td><td align="right">'. $row['Iman'] .' kr</td></tr>
								<tr><td align="left"><b>3 mán:</b></td><td align="right">'. $row['IIIman'] .' kr</td></tr>
								<tr><td align="left"><b>6 mán:</b></td><td align="right">'. $row['VIman'] .' kr</td></tr>
								<tr><td align="left"><b>Ár:</b></td><td align="right">'. $row['XIIman'] .' kr</td></tr>
								<tr><td align="left"><b>Stærð:</b></td><td align="right">'. $row['staerd'] .' fm</td></tr>
								<tr><td align="left"><b>Staður:</b></td><td align="right">'. $row['stadur'] .'</td></tr>
								<tr><td align="left"><b>Hóptímar:</b></td><td align="right">'. $row['hoptimar'] .'</td></tr>								
							</table>';
					echo "</div>";
				}
			}
	echo '</div>';

	//Loka gagnagrunni
	mysqli_close($dbc);	

?>