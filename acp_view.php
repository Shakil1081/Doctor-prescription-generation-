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
                                        <input type="text" name="name" id="nameofcomplain" class="form-control"  value="<?php echo $d['name'] ?>" disabled> </div>								
                                </div>								
                                <label for="email_address">Description</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="comment" id="email_address" class="form-control" placeholder="No Available" value="<?php echo $d['comment'] ?>" disabled>
                                    </div>
                                </div>
                              
                                <!--<button type="button" class="btn bg-teal m-t-15 waves-effect">Save</button>-->
								
                            </form>
							<?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include('footer.php'); ?>