<?php include('head.php');?>
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    JQUERY DATATABLES
                    <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>
                </h2>
            </div>
 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Patient Detail
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Prescription No</th>
											<th>PatientName</th>
                                            <th>Chief complain</th>
                                            <th>Description</th>
											<th>Notes</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
$conn = new mysqli($servername, $username, $password,$dbname );
$sql = "SELECT patient_prescription.* , patient.name, patient.id, patient.age FROM patient_prescription, patient WHERE patient.id = patient_prescription.patien";
//"SELECT * FROM `patient_prescription`";
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	$t=0;
 while($row = $result->fetch_assoc()) {
	 $sickListName = "";
	 $ids = explode(",",$row["ccompln"]);
	 $i=1;
	foreach($ids as $k=>$val){
		$sqlSickList = "SELECT * FROM sick_list WHERE id='$val'";
		$sickListResult = $conn->query($sqlSickList);
        if($sickListResult->num_rows > 0){				
			while($r = $sickListResult->fetch_assoc()){
				$sickListName.= $i++.") ".$r['name']."<br>";
			}
		}		
	}
 echo '<tr id="a'.$row["id"].'"><td>'.++$t.'</td><td><a href="'.$row["id"].'" >'. $row["name"].'</td><td>'. $sickListName.'</td><td>'. $row["disisis"].'</td><td>'. $row["notes"].'</td><td><a id="option1" data-id="'.$row["id"].'"  href="javascript:void(0);" onclick="goDoSomething(this);">Delete</a> <a id="option1" data-id="'.$row["id"].'"  href="javascript:void(0);" onclick="goDoSomething(this);"> <i class="material-icons">mode_edit</i></a></td></tr>';
    }
} else { echo "0 results";}
$conn->close();
?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                   </div>
    </section>
            
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<?php include('footer.php'); ?>