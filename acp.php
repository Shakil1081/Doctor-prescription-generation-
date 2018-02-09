
<?php
include('head.php'); 
//load and initialize user class
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $comment = $massage= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;  
}

if (isset($_POST['submit'])) 
{
  if($name !== ""){
	$sql = "INSERT INTO `sick_list` (`id`, `name`, `comment`) VALUES (NULL, '".$name."', '".$comment."');";
	if ($conn->query($sql) === TRUE) {
	echo '<script>$("#smallModal").css("display", "block");</script>';
	} else {
	$massage  = "<strong> Error: </strong>".$conn->error;
	}
	$conn->close();
}

}
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
                            <h2> Add chief Complain</h2>
                        </div>
                        <div class="body">
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							  <label for="password">Name of chief complain</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="name" id="nameofcomplain" class="form-control" placeholder="Name of chief complain"> </div>
									<span class="error"><?php echo $nameErr;?></span>
                                </div>								
                                <label for="email_address">Description</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="comment" id="email_address" class="form-control" placeholder="Chief complain Details">
                                    </div>
                                </div>
                              
                                <!--<button type="button" class="btn bg-teal m-t-15 waves-effect">Save</button>-->
								<input type="submit" name="submit" value="Submit" class="btn bg-teal m-t-15 waves-effect"> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                 <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Chef Complain List
                            </h2>
                          </div>
                        <div class="body">
                            <div class="table-responsive">							
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
								
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name of CC</th>
                                            <th>Description</th>  
											<th>Action</th>  											
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$conn = new mysqli($servername, $username, $password,$dbname );
$sql = "SELECT * FROM `sick_list`";
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	$t=0;
 while($row = $result->fetch_assoc()) {
 echo '<tr id="a'.$row["id"].'"><td>'.$t++.'</td><td>'. $row["name"].'</td><td>'. $row["comment"].'</td><td><a id="option1" data-id="'.$row["id"].'"  href="javascript:void(0);" onclick="goDoSomething(this);"><button type="button" class="btn bg-teal waves-effect">Delete</button></a>  <a id="option1" data-id="'.$row["id"].'"  href="'.$url."/acp_edit.php?ids=".$row["id"].'";><button type="button" class="btn bg-teal waves-effect">Edit</button></a>  <a id="option1" data-id="'.$row["id"].'"  href="'.$url."/acp_view.php?ids=".$row["id"].'";><button type="button" class="btn bg-teal waves-effect">View</button></a></td></tr>';
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
    
            <!-- #END# Vertical Layout -->
        </div>
    </section>
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
	data:{"ids":ids,"table": 'sick_list'},
success: function (data) {
	jQuery('#a'+ids).hide();
	$("#smallModal").css("display", "block");
        },
error: function (data) {
	jQuery('#loadingmessage').hide();
        }
	
});
				
			}
        }
    </script>
<?php include('footer.php'); ?>