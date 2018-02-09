<?php
include('head.php'); 

if (isset($_GET['ids'])){
$id = mysqli_real_escape_string($conn,$_GET['ids']);
}
$sql = "select * from patient where id='".$id ."'";
$sql= mysqli_query($conn,$sql);
while($d = mysqli_fetch_assoc($sql)){
?> 
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Patient detail</h2>							
                        </div>
                        <div class="body">
                             <form method="post" id="idForm">
							 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							  <label for="password">Name</label>
                                <div class="form-group">
                                    <div class="form-line">
			<input type="hidden" name="ids" value="<?php echo $d['id'] ?>" class="form-control">
                                <input type="text" name="name" value="<?php echo $d['name'] ?>" class="form-control" placeholder="Name" disabled> 
										</div>
                                </div>	
								</div>	
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<label for="password">Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="email" value="<?php echo $d['email'] ?>" class="form-control" placeholder="Email address" disabled> 
										</div>							
                                </div>	

								</div>	
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<label for="password">Phone</label>
                                <div class="form-group">
                                    <div class="form-line">
                              <input type="text" name="phone" value="<?php echo $d['phone'] ?>" class="form-control" placeholder="Phone number" disabled> 
										</div>							
                                </div>	
</div>	
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <label for="email_address">Age</label>
                                <div class="form-group">
                                    <div class="form-line">
                                   <input type="text" name="age"  value="<?php echo $d['age'] ?>" class="form-control" placeholder="Age" disabled>
                                    </div>									
                                </div>
								</div>									
							<label>Sex</label>
							 <div class="form-group">
							 <div class="demo-radio-button">
                          <input name="sex" type="radio" class="with-gap" id="radio_3" value="male" <?php if ($d['sex']== "male"){echo 'checked';}?>/>
                           <label for="radio_3">Male</label>								
                          <input name="sex" type="radio" id="radio_4" class="with-gap" value="female"<?php if ($d['sex']== "female") {echo 'checked';}?>>
                                <label for="radio_4">Female</label>
                                <input name="group2" type="radio" id="radio_5" checked="" disabled="">
                                <label for="radio_5">Radio - Selected</label>
                                <input name="group3" type="radio" id="radio_6" class="with-gap" checked="" disabled="">
                                <label for="radio_6">Radio - Disabled</label>
							</div>
							</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<label for="email_address">Patient Status</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="status" id="email_address" class="form-control"  value="<?php echo $d['age'] ?>" placeholder="Patient Status" disabled>
                                    </div>
                                </div>
								
												</div>	
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<label for="email_address">Note</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="note" value="<?php echo $d['age'] ?>"class="form-control" placeholder="Complain Details" disabled>	
                                    </div>
                                </div>
								</div>

								
                                <button type="" class=""></button>
								
                            </form>
							
							<?php }?>
                        </div>
					 </div>
					 
					  <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List of Patient
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
											<th>Patient Name</th>
                                            <th>Chief complain</th>
                                            <th>Description</th>
											<th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
$conn = new mysqli($servername, $username, $password,$dbname );
$sql = "SELECT patient_prescription.*,patient_prescription.id AS prescriptionid, patient.name, patient.id, patient.age FROM patient_prescription, patient WHERE patient.id = patient_prescription.patien AND patient.id='$id'";
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
 echo '<tr id="a'.$row["id"].'"><td>'.$row["prescriptionid"].'</td><td>'. $row["name"].'</td><td>'. $sickListName.'</td><td>'. $row["disisis"].'</td><td>'. $row["notes"].'</td><td><button class="btn bg-teal m-t-15 waves-effect" id="'.$row["prescriptionid"].'" onClick="reply_click(this.id)">Preview</button></td></tr>';
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
            </div>
                 <!-- Basic Examples -->
              <!-- #END# Vertical Layout -->
        </div>
    </section>
	
<div class="modal fade in" id="largeModal" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="largeModalLabel"> Print This Prescription</h4>
         </div>
         <div id="DivIdToPrint" class="modal-body">
<style>
@page { size: auto;  margin: 0mm; }
</style>
			 <table align="left" width="100%" style="margin-left:100px; margin-rigth:100px; "><tr><td width="400"><div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
			<h1 style="font-size:  72px; margin:0px; color: #fff !important;">&nbsp;</h1>
			<div class="form-group"><b>Prescription id&nbsp;:&nbsp;</b> <span id="pid"></span></div></td></tr></table>
            <table style="border-bottom: 1px solid #ddd;">
              <table align="left" width="100%" style="margin-left:100px; margin-rigth:100px; ">
                  <tr>
                     <td width="40%">
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
						<div class="form-group">
                              <b>Name&nbsp;:&nbsp;</b> <span id="namez"><span>
						   </div>
                        </div>
                     </td>
                     <td width="40%">
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
						<div class="form-group">
                                 <b>Age&nbsp;:&nbsp;</b><span id="agez"><span>
                           </div>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td width="40%">
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                             <div class="form-group">
                                 <b>Sex&nbsp;:&nbsp;</b> <span id="sexz"><span>
                        </div>
                     </td>
                     <td width="40%">
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                              <div class="form-group">
                                <b>Status&nbsp;:&nbsp;</b> <span id="statusz"><span>
                        </div>
						 </div>
                     </td>
                  </tr>
               </tbody>
            </table>
            <h1 style="font-size:  20px; margin:0px; color: #fff !important;">&nbsp;</h1>
             <table align="left" width="90%" style="margin-left:100px; margin-rigth:100px;" cellpadding="8">
               <tbody>
                  <tr>
                     <td width="30%" valign="top">					 	
                        <div  class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
						 <b>Name of chief complain</b>
						 <div id="casez"></div>
						    		 
                        </div>
                     </td>
					 <td width="76%" valign="top" style="border-left: 1px solid #ddd; padding-left=10px;">
					  <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
						 <h1 style="font-size:  60px; margin:0px;font-weight: normal !important;">R<span style="font-size:  36px;">x</span></h1>
                           <div id="meadicininfoz">
						   </div>
                        </div>                     
                     </td>
                  </tr>
               </tbody>
            </table>
            <h1 style="font-size:  50px; margin:0px; color: #fff !important;">&nbsp;</h1>
           <table align="left" width="90%" style="margin-left:100px; margin-rigth:100px;">
               <tbody>
                  <tr>
                     <td width="100%">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <div class="form-group">
                                <b>Spacail notes :</b><span id="notsz"><span>
                           </div>
                        </div>
						<input type="hidden" name="adddate" value="<?php echo date('Y/m/d', time());?>">
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="modal-footer">
		 <button type="button" value='Print' onclick='printDiv();' class="btn bg-red waves-effect"><i class="material-icons">print</i><span>PRINT...</span></button>
           <button type="button" id="closeZ" class="btn bg-red waves-effect"><i class="material-icons">cancel</i><span>CLOSE</span></button>
         </div>
      </div>
   </div>
</div>
</div>
</div>

<script type="text/javascript">
function reply_click(clicked_id)
{
 	 document.getElementById("namez").innerHTML = " ";
			   document.getElementById("agez").innerHTML = " ";
			   document.getElementById("sexz").innerHTML = " ";
			   document.getElementById("statusz").innerHTML = " ";
			   document.getElementById("meadicininfoz").innerHTML = " ";
			   document.getElementById("notsz").innerHTML = " ";
			   document.getElementById("casez").innerHTML = " ";
	   $.ajax({
   					type: "POST",
   					url: "<?php echo $url; ?>/print_p.php",
   					data:{"ids":clicked_id}, // serializes the form's elements.
   					success: function(data)
   					{
   					var ress = JSON.parse(data);				
   					 var id = ress.id, name = ress.name, ages = ress["age"],sex =ress.sex,status =ress.status,md = ress.case.length-1,nots = ress.notes,meadicininfo = ress.meadicininfo,i;
					 jQuery("#pid").append(id);
   					 jQuery("#namez").append(name);
					 jQuery("#agez").append(ages);
					 jQuery("#sexz").append(sex);
					 jQuery("#statusz").append(status);
					 jQuery("#meadicininfoz").append(meadicininfo);
					 jQuery("#notsz").append(nots);					 					 
   					 var i = 0;
   					       for (i; i< md; i++) {
 							   jQuery("#casez").append(ress.case[i]);	
   						}   					 
   					 $("#largeModal").css("display", "block");
   					}
   					}); 
}

 $(document).ready(function(){
   $("#closeZ").click(function(event){
     $("#largeModal").css("display", "none");
   });
 });
   
   function printDiv() 
   {
   
    var divToPrint=document.getElementById('DivIdToPrint');
   
    var newWin=window.open('','Print-Window');   
    newWin.document.open();   
    newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
   
    newWin.document.close();
   
    setTimeout(function(){newWin.close();},10);
   
   }
</script>


<?php include('footer.php'); ?>