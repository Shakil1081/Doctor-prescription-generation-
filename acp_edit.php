<?php
include('head.php'); 

if (isset($_GET['ids'])){
$id = mysqli_real_escape_string($conn,$_GET['ids']);
}
$sql = "select * from sick_list where id='".$id ."'";
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
                            <h2>chief complain</h2>			                          
							
                        </div>
                        <div class="body">
                           <form method="post" id="idForm">
						    <input type="hidden" name="id" id="nameofcomplain" class="form-control" placeholder="Enter your Complain" value="<?php echo $d['id'] ?>">
							  <label for="password">Name Of chief complain</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="name" id="nameofcomplain" class="form-control" placeholder="Name Of chief complain" value="<?php echo $d['name'] ?>"> </div>								
                                </div>								
                                <label for="email_address">Deacription</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="comment" id="email_address" class="form-control" placeholder="complain Deacription" value="<?php echo $d['comment'] ?>">
                                    </div>
                                </div>
                              
                                <!--<button type="button" class="btn bg-teal m-t-15 waves-effect">Save</button>-->
								<button class="btn bg-teal waves-effect" id="idForm" type="submit">Update chief complain </button> 
                            </form>
							<?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
   // this is the id of the form
   $("#idForm").submit(function(e) {
var id = jQuery('input[name=id]').val();
   var name = jQuery('input[name=name]').val();
   var comment = jQuery('input[name=comment]').val();

   
        $.ajax({
   					type: "POST",
   					url: "<?php echo $url; ?>/acp_update.php",
   					data:{id,name,comment}, // serializes the form's elements.
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