<?php include('head.php'); ?>
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
               <select class="selectpickersss col-sm-6" data-show-subtext="true" data-live-search="true">
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
      <form method="post" name ="idForm" id="idForm" >
         <!-- Basic Examples -->
               <div class="header">
                  <h2>Patient Details</h2>
                  <div id="massage"></div>
               </div>
               <div class="body">
                  <div class="row clearfix">
                     <div class="col-sm-4">
                        <div class="form-group">
                           <div class="form-line">
                              <input type="text" id="name" name="name" class="form-control" placeholder="Name" disabled>
                              <input type="hidden" id="id" name="id" class="form-control">
                           </div>
                        </div>
                     </div>
					 <div class="col-sm-4">
                        <div class="form-group">
                           <div class="form-line">
                              <input type="text" id="sex" name="sex" class="form-control" placeholder="Sex" disabled>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="form-group">
                           <div class="form-line">
                              <input type="text" id="age" name="age" class="form-control" placeholder="Age" disabled>
                           </div>
                        </div>
                     </div>
                     
                     <div class="col-sm-4">
                        <div class="form-group">
                           <div class="form-line">
                              <input type="text" id="phone" class="form-control" placeholder="Status" disabled>
                           </div>
                        </div>
                     </div>
					 <div class="col-sm-4">
                        <div class="form-group">
                           <div class="form-line">
                              <input type="text" id="email" class="form-control" placeholder="Status" disabled>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
        <div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="col-sm-4">
            <div class="card">
			            <div class="header">
               <h2>Select Chief complain</h2>
            </div>
            <div class="body">
			<div class="col-sm-10">
             <select id="scripts" name="scripts" class="selectpicker col-sm-12" data-show-subtext="true" data-live-search="true">
					  <?php
                        $conn = new mysqli($servername, $username, $password,$dbname );
                        $sql = "SELECT * FROM `sick_list`";
                        $result = $conn->query($sql); 
                        if ($result->num_rows > 0) {
                        	$t=0;
                         while($row = $result->fetch_assoc()) {
                         echo '<option value="'.$row["id"].'">'. $row["name"].'</option>';
                         }
                        }
                        $conn->close();
                        ?>
            </select>
           <input type="hidden" size="30" name="display" id="display" />
 </div>
<div class="col-sm-2"><input type="button" class="btn bg-teal waves-effect" id="showVal" value="Add" /> </div>
            </div>			
               <div class="body" id="getappendvalu" style="height: 665px;">
               </div>
			      </div>
               </div>
<div class="col-sm-8">
            <div class="card">
               <div class="header">
                 <h1 style="font-size:  72px; margin-top:  0px;font-weight: normal !important;">R<span style="font-size:  40px; margin-bottom: -20px;">x</span></h1>
               </div>
               <div class="body">
                  <h2 class="card-inside-title">Medicine Details</h2>
                  <div class="row clearfix">
                     <div class="col-sm-12">
                        <div class="form-group">
                           <div class="form-line">
                              <textarea id="ckeditor" rows="10" name="detailes" class="form-control no-resize" placeholder="Please type Medicine name ..."></textarea>
                           </div>
                        </div>
                        <label for="email_address">Note</label>
                        <div class="form-group">
                           <div class="form-line">
                              <input type="text" name="nots" class="form-control" placeholder="Note">	
                           </div>
                        </div>
                        <button class="btn bg-teal waves-effect" id="idForm" type="submit">Create Prescription</button>
                     </div>
                  </div>
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
            <h1 style="font-size:  50px; margin:0px; color: #fff !important;">&nbsp;</h1>
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
            <h1 style="font-size:  20px; margin:0px; color: #fff !important;">&nbsp;</h1>
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
 <script>
(function() {
    var sel = document.getElementById('scripts');
    var el = document.getElementById('display');
    // assign onclick handlers to the buttons
function getSelectedOption(sel) {
    var opt;
    for ( var i = 0, len = sel.options.length; i < len; i++ ) {
        opt = sel.options[i];
        if ( opt.selected === true ) {
            break;
        }
    }
    return opt;
}

// get selected option in sel (reference obtained above)
var opt = getSelectedOption(sel);
  document.getElementById('showVal').onclick = function () {
        var name = el.value = sel.value; 
        var opt = el.value = sel.options[sel.selectedIndex].text;
		var dataset = '<div style="display: inline-block; clear: both; width:100%; line-height: 37px; border-bottom:1px solid #e6e6e6; margin-bottom:10px;" id="id'+name+'"> <input type="checkbox" name="cc[]" class="iamchecked filled-in chk-col-green" id="md_checkbox_id'+name+'" value="'+sel.value+'" checked>'+opt+'<button type="button" class="btn bg-red waves-effect"  onClick="reply_click(this.id)" id="id'+name+'" style="float:  right;padding: 2px 4px;"><i class="material-icons">highlight_off</i></button></div>';		 
// making array 
var val = [];
$('.iamchecked:checkbox:checked').each(function(i){
val[i] = $(this).val();
});
if (jQuery.inArray(name, val)!='-1') {
	document.getElementById("emassage").innerHTML = " ";
  $("#iderror").css("display", "block");
  $( "#emassage" ).append("This "+opt+" already exists."); 
} else { $( "#getappendvalu" ).append(dataset); }
}
}()); 
   

function reply_click(clicked_id){
	var id=clicked_id;
	$("#md_checkbox_"+clicked_id).attr('checked', false); 
	$("#"+clicked_id).hide( );
}

/*------------------------------*/
 // this is the id of the form
 
   $("#idForm").submit(function(e) {  
   var url = "<?php echo $url; ?>/inseartp.php"; // the script where you handle the form input.
   var id = jQuery('input[name=id]').val(); //trial_instance_name
   var name = jQuery('input[name=name]').val(); // username
   var age = jQuery('input[name=age]').val(); // password
   var sex = jQuery('input[name=sex]').val();
   var desc =  CKEDITOR.instances["ckeditor"].getData();
   var nots = jQuery('input[name=nots]').val();	   
   var pdate =jQuery('input[name=adddate]').val();
   var error;
   //paid_instance_name	

        var val = [];
          $(':checkbox:checked').each(function(i){
            val[i] = $(this).val();
          });
      vals = val.join();
	  var i=0;
if(desc.length == 0){error="Please Add Medicine Details"; i++;}
if(vals.length == 0){error="Please Select one or more Chief complain"; i++;}
if((id.length == 0)&& (name.length == 0) &&(age.length == 0)&&(sex.length == 0)){error="please select a User"; i++;}
if( i==0){
      $.ajax({
             type: "POST",
             url: url,
             data:{vals,id,desc,nots,pdate}, // serializes the form's elements.
             success: function(data)
                 {
   			   var res = data;
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
   					data:{"ids":res}, // serializes the form's elements.
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
           });
   
   
   }else{
	 document.getElementById("emassage").innerHTML = " ";  
	$("#iderror").css("display", "block");
  $( "#emassage" ).append(error); 
}

      e.preventDefault(); // avoid to execute the actual submit of the form.
   });
  
   jQuery(function() {
   
    $('.selectpickersss').on('change', function(){
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
   console.log(res);
   $("#id").val(res["0"].id);
   $("#name").val(res["0"].name);
   $("#age").val(res["0"].age);
   $("#sex").val(res["0"].sex);
   $("#phone").val(res["0"].phone);
   $("#email").val(res["0"].email);
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

	<script src="plugins/ckeditor/ckeditor.js"></script>    
	<script src="plugins/tinymce/tinymce.js"></script> 
	<script src="js/pages/forms/editors.js"></script>
<?php include('footer.php'); ?>