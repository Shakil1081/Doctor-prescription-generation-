<?php include('head.php');?>
 <section class="content">
 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List of Prescription
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th id="some-id">No</th>
											<th>Name</th>
											<th>Phone</th>
                                            <th>Chief complain</th>
                                            <th>Description</th>
											<th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
$conn = new mysqli($servername, $username, $password,$dbname );
$sql = "SELECT patient_prescription.* , patient_prescription.id AS prescriptionid, patient.name, patient.phone, patient.id, patient.age FROM patient_prescription, patient WHERE patient.id = patient_prescription.patien ORDER BY prescriptionid DESC;";
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
 echo '<tr id="a'.$row["id"].'"><td>'.$row["prescriptionid"].'</td><td><a href="user_view.php?ids='.$row["id"].'" >'. $row["name"].'</a></td><td><a href="user_view.php?ids='.$row["id"].'" >'. $row["phone"].'</a></td><td>'. $sickListName.'</td><td>'. $row["disisis"].'</td><td>'. $row["notes"].'</td><td><button class="btn bg-teal btn-circle waves-effect waves-circle waves-float" id="'.$row["prescriptionid"].'" onClick="reply_click(this.id)"><i class="material-icons">print</i></button> <a href="user_view.php?ids='.$row["id"].'" > <button type="button" class="btn bg-teal btn-circle waves-effect waves-circle waves-float"> <i class="material-icons">remove_red_eye</i></button></a></td></tr>';
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
						 <b>Chief Complain</b>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	 <script type="text/javascript">
function goDoSomething(d){
            var ids = d.getAttribute("data-id");
			if(ids){
			jQuery.ajax({
	type: 'POST',
	dataType: 'json',
	cache: false,
	url: "<?php echo $url; ?>/aldlete.php",
	data:{"ids":ids,"table": 'patient_prescription'},
success: function (data) {
	jQuery('#a'+ids).hide();
        },
error: function (data) {
	jQuery('#loadingmessage').hide();
            console.log(data);
        }
	
});
				
			}
        }
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