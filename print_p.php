<?php
include('db.php');
if (isset($_POST['ids'])){
    $id =$_POST['ids'];
	}
	
$sql = "SELECT patient_prescription.* , patient.name, patient.age, patient.sex, patient.status FROM patient_prescription, patient WHERE patient.id = patient_prescription.patien AND patient_prescription.id=$id";
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	$t=0;
 while($row = $result->fetch_assoc()) {
	 $sickListName= "";
	 $ids = explode(",",$row["ccompln"]);
	 $i=1;
	foreach($ids as $k=>$val){
		$sqlSickList = "SELECT * FROM sick_list WHERE id='$val'";
		$sickListResult = $conn->query($sqlSickList);
        if($sickListResult->num_rows > 0){				
			while($r = $sickListResult->fetch_assoc()){
				$sickListName.= $i++.'. '. $r['name'].',<br>';
			}
		}		
	}
 $arraysub=explode(",",$sickListName);;
 $array = array(
    "id" => $row["id"],
    "name" => $row["name"],
    "age" => $row["age"],
	"sex" => $row["sex"],
	"status" => $row["status"],
	"case"=> $arraysub,
	"meadicininfo" => $row["disisis"],
	"notes" => $row["notes"],
);
echo json_encode($array);
    }
} else{ echo "0 results";}
$conn->close();
?> 