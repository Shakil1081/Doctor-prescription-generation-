<?php include('head.php');
   $nameErr = $AgeErr = $genderErr =   $StatusErr = $adddateErr = $emailErr =$phoneErr = $massage = "";
   $name = $Age = $gender =  $Status = $phone = $email= $age= $note="";
   $err = 0;
   $err = 0;
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (empty($_POST["name"])) {
       $nameErr ="Name is required";
   	++$err;
     } else {
       $name = test_input($_POST["name"]);
     }
     
     if (empty($_POST["age"])) {
       $AgeErr = "Age is required";
   	++$err;
     } else {
       $age = test_input($_POST["age"]);
     }
      
       if (empty($_POST["Status"])) {
       $StatusErr ="Status is required";
   	++$err;
     } else {
       $Status = test_input($_POST["Status"]);
     }  
     }
   
   ?>
<section class="content">
   <div class="container-fluid">
      <div class="block-header">
         
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="card">
            <div class="header">
               <h2>Select Patient</h2>
            </div>
            <div class="body">
               <select class="selectpicker">
                  <option value="">-- Please select --</option>
                  <?php
                     $sql = "SELECT * FROM `patient`";
                     $result = $conn->query($sql); 
                     if ($result->num_rows > 0) {
                     	$t=0;
                      while($row = $result->fetch_assoc()) {
                      echo '<option value="'.$row["id"].'">'. $row["name"].'</td><td>';
                         }
                     }
                     $conn->close();
                     ?>
               </select>
            </div>
         </div>
      </div>
      <form method="post" id="idForm" >
         <!-- Basic Examples -->
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
               <div class="header">
                  <h2>Patient Details</h2>
                  <div id="massage"></div>
               </div>
               <div class="body">
                  <div class="row clearfix">
                     <div class="col-sm-3">
                        <div class="form-group">
                           <div class="form-line">
                              <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                              <input type="hidden" id="id" name="id" class="form-control">
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="form-group">
                           <div class="form-line">
                              <input type="text" id="age" name="age" class="form-control" placeholder="Age">
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="form-group">
                           <div class="form-line">
                              <input type="text" id="sex" name="sex" class="form-control" placeholder="Sex">
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="form-group">
                           <div class="form-line">
                              <input type="text" id="status" class="form-control" placeholder="Status">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
               <div class="header">
                  <h2>TEXTAREA</h2>
               </div>
               <div class="body">
                  <div class="demo-checkbox">
                     <?php
                        $conn = new mysqli($servername, $username, $password,$dbname );
                        $sql = "SELECT * FROM `sick_list`";
                        $result = $conn->query($sql); 
                        if ($result->num_rows > 0) {
                        	$t=0;
                         while($row = $result->fetch_assoc()) {
                         echo '<input type="checkbox" name="cc[]" class="filled-in chk-col-green" id="md_checkbox_'.$row["id"].'"value="'.$row["id"].'"><label for="md_checkbox_'.$row["id"].'">'. $row["name"].'</label>';
                         }
                        }
                        $conn->close();
                        ?>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
               <div class="header">
                  <h2>TEXTAREA</h2>
               </div>
               <div class="body">
                  <h2 class="card-inside-title">List of Chief complaint</h2>
                  <div class="row clearfix">
                     <div class="col-sm-12">
                        <div class="form-group">
                           <div class="form-line">
                              <textarea rows="10" id="detailes" name="detailes" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                           </div>
                        </div>
                        <label for="email_address">Note</label>
                        <div class="form-group">
                           <div class="form-line">
                              <input type="text" name="nots" class="form-control" placeholder="Complain Details">	
                           </div>
                        </div>
                        <button class="btn bg-teal waves-effect" id="idForm" type="submit">Create Prescription</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </div>
   </form>
   </div>
   </div>
   </div>
   </div>
   <!-- #END# Vertical Layout -->
   </div>
</section>
<!-- Large Size -->
<div class="modal fade in" id="largeModal" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="largeModalLabel">Print prescription</h4>
         </div>
         <div id="DivIdToPrint" class="modal-body">
            <table>
               <tbody>
                  <tr>
                     <td width="400">
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
						<div class="form-group">
                           <div class="form-line">
                              <b>Name&nbsp;:&nbsp;</b> <span id="namez"><span>
                           </div>
						   </div>
                        </div>
                     </td>
                     <td width="400">
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
						<div class="form-group">
                            <div class="form-line">
                                 <b>Age&nbsp;:&nbsp;</b><span id="agez"><span>
                              </div>
                           </div>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td width="318">
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                             <div class="form-group">
							 <div class="form-line">
                                 <b>Sex&nbsp;:&nbsp;</b> <span id="sexz"><span>
                           </div>
                        </div>
                     </td>
                     <td width="306">
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                              <div class="form-group">
							  <div class="form-line">
                                <b>Status&nbsp;:&nbsp;</b> <span id="statusz"><span>
                           </div>
                        </div>
						 </div>
                     </td>
                  </tr>
               </tbody>
            </table>
            &nbsp;
            <table>
               <tbody>
                  <tr>
                     <td width="300" valign="top">
                        <div id="casez" class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
						    <b>List of digiess</b>
                            <p>fgdfkgbdfjk</p>
						    <p>fgdfkgbdfjk</p>					 
                        </div>
                     </td>
					 <td width="500" valign="top">
					  <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
						 <b> List of digiess</b>
						 <br>
                           <div id="meadicininfoz">
						   </div>
                        </div>                     
                     </td>
                  </tr>
               </tbody>
            </table>
            &nbsp;
            <table>
               <tbody>
                  <tr>
                     <td width="800">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <div class="form-group">
                              <div class="form-line">
                                <b>Spacail notes :<b><span id="notsz"><span>
                              </div>
                           </div>
                        </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
   // this is the id of the form
   $("#idForm").submit(function(e) {
   
   
      var url = "<?php echo $url; ?>/inseartp.php"; // the script where you handle the form input.
     var val = [];
          $(':checkbox:checked').each(function(i){
            val[i] = $(this).val();
          });
   vals= val.join();
   var id = jQuery('input[name=id]').val(); //trial_instance_name
   var name = jQuery('input[name=name]').val(); // username
   var age = jQuery('input[name=age]').val(); // password
   var sex = jQuery('input[name=sex]').val();
   var desc = $('#detailes').val();
   var nots = jQuery('input[name=nots]').val();	 //paid_instance_name	
          		
      $.ajax({
             type: "POST",
             url: url,
             data:{vals,id,desc,nots}, // serializes the form's elements.
             success: function(data)
                 {
   			   var res = data;
   			   
   					$.ajax({
   					type: "POST",
   					url: "<?php echo $url; ?>/print_p.php",
   					data:{"ids":res}, // serializes the form's elements.
   					success: function(data)
   					{
   					var ress = JSON.parse(data);
   console.log(ress);						
   					 var name = ress.name, ages = ress["age"],sex =ress.sex,status =ress.status,md = ress.case.length-1,nots = ress.notes,meadicininfo = ress.meadicininfo,i;
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
           });
   
      e.preventDefault(); // avoid to execute the actual submit of the form.
   });
   
   
   
   
   
   
   
   jQuery(function() {
   
    $('.selectpicker').on('change', function(){
      var ids = $(this).find("option:selected").attr("value");
   			if(ids){
   		jQuery.ajax({
   type: 'POST',
   dataType: 'json',
   cache: false,
   url: "<?php echo $url; ?>/getuserinformation.php",
   data:{"ids":ids,"table": 'patient'},
   success: function (data) {
   var res = data;
   $("#id").val(res["0"].id);
   $("#name").val(res["0"].name);
   $("#age").val(res["0"].age);
   $("#sex").val(res["0"].sex);
   $("#status").val(res["0"].status);
    },
   error: function (data) {
   jQuery('#loadingmessage').hide();
              console.log(data['0']);
          }
   
   });
   			
   		}
    });
    
   });   
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