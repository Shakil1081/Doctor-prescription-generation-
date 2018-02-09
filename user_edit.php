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
                            <h2>Update Patient</h2>							
                        </div>
                        <div class="body">
                             <form method="post" id="idForm">
							  <label for="password">Name</label>
                                <div class="form-group">
                                    <div class="form-line">
			<input type="hidden" name="ids" value="<?php echo $d['id'] ?>" class="form-control">
                                <input type="text" name="name" value="<?php echo $d['name'] ?>" class="form-control" placeholder="Name"> 
										</div>
                                </div>	

								<label for="password">Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="email" value="<?php echo $d['email'] ?>" class="form-control" placeholder="Email address"> 
										</div>							
                                </div>	


								<label for="password">Phone</label>
                                <div class="form-group">
                                    <div class="form-line">
                              <input type="text" name="phone" value="<?php echo $d['phone'] ?>" class="form-control" placeholder="Phone number"> 
										</div>							
                                </div>	

								
                                <label for="email_address">Age</label>
                                <div class="form-group">
                                    <div class="form-line">
                                   <input type="text" name="age"  value="<?php echo $d['age'] ?>" class="form-control" placeholder="Age">
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
								<label for="email_address">patane Status</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="status" id="email_address" class="form-control"  value="<?php echo $d['age'] ?>" placeholder="patane Status">
                                    </div>
									<label id="name-error" class="error" for="name"></label>
                                </div>
								<label for="email_address">Note</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="note" value="<?php echo $d['age'] ?>"class="form-control" placeholder="Complain Details">	
                                    </div>
                                </div>
								<input type="hidden" name="adddate" value="<?php echo date('Y/m/d', time());?>">								
								<input type="hidden" name="docid" value="<?php echo $login_id; ?>">
								
                                <!--<button type="button" class="btn bg-teal m-t-15 waves-effect">Save</button>-->
								<button class="btn bg-teal waves-effect" id="idForm" type="submit">Update Patient</button> 
                            </form>
							
							<?php }?>
                        </div>
                    </div>
                </div>
            </div>
                 <!-- Basic Examples -->
              <!-- #END# Vertical Layout -->
        </div>
    </section>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
   // this is the id of the form
   $("#idForm").submit(function(e) {
   var ids = jQuery('input[name=ids]').val(),name = jQuery('input[name=name]').val(),age = jQuery('input[name=age]').val(),sex = jQuery('input[name=sex]:checked').val(),status = jQuery('input[name=status]').val(),note = jQuery('input[name=note]').val(),adddate = jQuery('input[name=adddate]').val(),docid = jQuery('input[name=docid]').val(),phone = jQuery('input[name=phone]').val(),email = jQuery('input[name=email]').val();
   
    $.ajax({
   					type: "POST",
   					url: "<?php echo $url; ?>/user_update.php",
   					data:{ids,name,age,sex,status,note,adddate,docid,phone,email}, // serializes the form's elements.
   					success: function(data)
   					{
				     //alert("saved");
   					 //console.log(data)			 
   					 $("#smallModal").css("display", "block");
   					}
   					});
   
      e.preventDefault(); // avoid to execute the actual submit of the form.
   });

    </script>
<?php include('footer.php'); ?>