<?php  

// PARTIE DATABASE à exporter dans une autre page
$StreamerIdList = array ();
$StreamerUsernameList =array ();
$StreamerBioList=array ();
$StreamerPICURL=array();
$DejavuStreamerlist = array();




$highestID=0;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "streamerdatabase";


	if(isset($_POST['action'])){
		if($_POST['action'] == 'call_this') {
	//GenerateCard();
		
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT id, username, bio, maingame, Picture_URL FROM streamerlist ORDER BY id";
		$sql2 ="SELECT MAX(id) FROM streamerlist";
		$result = $conn->query($sql);
		$result2 =$conn->query($sql2);

		$Sqlanswer=$result2->fetch_assoc();
		$highestID =$Sqlanswer["MAX(id)"];
		
		$FirstIdChoosen= RandomCardId($highestID);
		/////echo "1erIdgeneré =".$FirstIdChoosen." <br>";
			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {
			   // GenerateCard($row["id"],$row["username"],$row["bio"],$row["Picture_URL"]);
			  	array_push($StreamerIdList,$row["id"]);
			  	array_push($StreamerUsernameList,$row["username"]);
			  	array_push($StreamerBioList,$row["bio"]);
			  	array_push($StreamerPICURL,$row["Picture_URL"]);
			  }
			}

		$conn->close();
		GenerateCard($StreamerIdList[$FirstIdChoosen],$StreamerUsernameList[$FirstIdChoosen],$StreamerBioList[$FirstIdChoosen],$StreamerPICURL[$FirstIdChoosen]);
		array_push($GLOBALS["DejavuStreamerlist"],'"'.$FirstIdChoosen.'"');
		
		
		}
	}


// Create connection

//////////////////////////// Fonctions Cartes ect
function GenerateCard($id,$username,$bio,$picURL){
	global $DejavuStreamerlist;
 	
 	print_r(CheckupCard($DejavuStreamerlist,$id));
//echo "VOICI l'id fourni pour generer la carte=".$id;
		if(CheckupCard($DejavuStreamerlist,$id)==true){
				echo "dejavu";
		}else{  
		//array_push($DejavuStreamerlist,$id);
				echo "jamaisvu ";
	echo <<<EOL
           <div id="Card">
				<div class="ImgCard" style='background-image:url("images/$picURL")'>
					<div class="Username">$username
					</div>
					<div class="Userbio">$bio
					
					</div>

				</div>
			</div>
EOL;


}		

}

	function RandomCardId($maxId)
	{
		return rand(0, $maxId); 
	}

	function CheckupCard($array,$randomid){
	global $DejavuStreamerlist;
	
		if(in_array($randomid,$DejavuStreamerlist)){
			echo "aaaaaaaaaaaaaaaaaaaaaaaaaaa";
			return true;
		}
		else{
			return false;
			echo "lets go";
			array_push($DejavuStreamerlist, $randomid);
			
			//GenerateCard($StreamerIdList[$randomid],$StreamerUsernameList[$randomid],$StreamerBioList[$randomid],$StreamerPICURL[$randomid]);
		} 


	}




?>