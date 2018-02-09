<?php
include('head.php'); 
//load and initialize user class
// define variables and set to empty values
$nameErr = $AgeErr = $genderErr =   $StatusErr = $adddateErr = $emailErr =$phoneErr = $massage = "";
$name = $Age = $gender =  $Status = $phone = $email= $age= $note="";
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
  
  if (empty($_POST["gender"])) {
    $genderErr ="Gender is required";
	++$err;
  } else {
    $gender = test_input($_POST["gender"]);
  }
  
    if (empty($_POST["Status"])) {
    $StatusErr ="Status is required";
	++$err;
  } else {
    $Status = test_input($_POST["Status"]);
  }  
   if (empty($_POST["phone"])) {
    $phoneErr ="phone is required";
	++$err;
  } else {
    $phone = test_input($_POST["phone"]);
  }   
  
    if (empty($_POST["email"])) {
    $emailErr ="Email is required";
	++$err;
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr ="Invalid email format"; 
	  ++$err;
    }
  }
  
  $adddate = test_input($_POST["adddate"]);
  $note = test_input($_POST["note"]); 
  $uid = test_input($_POST["uid"]);
  $docid = test_input($_POST["docid"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;  
}
if (isset($_POST['submit'])) 
{
  if($err == 0){
	$sql = "INSERT INTO `patient` (`id`, `name`, `age`, `sex`, `status`, `note`, `adddate`, `uid`, `docid`,`phone`,`email`) VALUES (NULL, '".$name."', '".$age."','".$gender."', '".$Status."', '".$note."', '".$adddate."', '".$uid."', '".$docid."', '".$phone."', '".$email."')";
	if ($conn->query($sql) === TRUE) {
	$massage = '<script>$("#smallModal").css("display", "block");</script>';
	$name = $Age = $gender =  $Status = $phone = $email= $age= $note=""  ;
	} else {
	$massage = "Error: ". $conn->error;
	}
	$conn->close();
}

}

/* $name."//".$age."//".$gender."//".$Status."//".$adddate."//".$uid."//".$docid; */
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
                            <h2>Add Patient</h2>
                            <?php echo $massage;?>							
                        </div>
                        <div class="body">
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							  <label for="password">Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" placeholder="Name"> 
										</div>
								<label id="name-error" class="error" for="name"><?php echo $nameErr;?></label>
                                </div>	

								<label for="password">Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Email address"> 
										</div>
								<label id="name-error" class="error" for="name"><?php echo $emailErr;?></label>
                                </div>	


								<label for="password">Phone</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control" placeholder="Phone number"> 
										</div>
								<label id="name-error" class="error" for="name"><?php echo $phoneErr;?></label>
                                </div>	

								
                                <label for="email_address">Age</label>
                                <div class="form-group">
                                    <div class="form-line">
                                   <input type="text" name="age"  value="<?php echo $age; ?>" class="form-control" placeholder="Age">
                                    </div>
									<label id="name-error" class="error" for="name"><?php echo $AgeErr;?></label>
                                </div>							
							<label>Sex</label>
							 <div class="form-group">
							 <div class="demo-radio-button">
                          <input name="gender" type="radio" class="with-gap" id="radio_3" value="male" <?php if ( $gender== "male"){echo 'checked';}?>/>
                           <label for="radio_3">Male</label>								
                          <input name="gender" type="radio" id="radio_4" class="with-gap" value="female"<?php if ($gender== "female") {echo 'checked';}?>>
                                <label for="radio_4">Female</label>
                                <input name="group2" type="radio" id="radio_5" checked="" disabled="">
                                <label for="radio_5">Radio - Disabled</label>
                                <input name="group3" type="radio" id="radio_6" class="with-gap" checked="" disabled="">
                                <label for="radio_6">Radio - Disabled</label>
							</div>
							<label id="name-error" class="error" for="name"><?php echo $genderErr;?></label>
							</div>
								<label for="email_address">Patient Status</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="Status" id="email_address" class="form-control"  value="<?php echo $Status; ?>" placeholder="Patient Status">
                                    </div>
									<label id="name-error" class="error" for="name"><?php echo $StatusErr;?></label>
                                </div>
								<label for="email_address">Note</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="note" value="<?php echo $note; ?>"class="form-control" placeholder="Complain Details">	
                                    </div>
                                </div>
								<input type="hidden" name="adddate" value="<?php echo date('Y/m/d', time());?>">
								<input type="hidden" name="uid" value="<?php echo rand(0, 99999);?>">
								<input type="hidden" name="docid" value="<?php echo $login_id; ?>">
								
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
                               List of Patient
                            </h2>
                          </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
										    <th>No</th>
                                            <th>Name</th>
                                            <th>phone</th>
                                            <th>Email</th>  
											<th>Age</th> 
											<th>Date</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$conn = new mysqli($servername, $username, $password,$dbname );
$sql = "SELECT * FROM `patient` ORDER BY adddate DESC";
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	$t=0;
 while($row = $result->fetch_assoc()) {
 echo '<tr id="a'.$row["id"].'"><td>'.$t++.'</td><td><a href="user_view.php?ids='.$row["id"].'" >'. $row["name"].'</a></td><td>'. $row["phone"].'<td>'. $row["email"].'</td><td>'. $row["age"].'</td><td>'. $row["adddate"].'</td><td><a id="option1" data-id="'.$row["id"].'"  href="javascript:void(0);" onclick="goDoSomething(this);"><button type="button" class="btn bg-teal btn-circle waves-effect waves-circle waves-float"> <i class="material-icons">delete_forever</i></button></a><a id="option1" data-id="'.$row["id"].'"  href="'.$url."/user_edit.php?ids=".$row["id"].'";> <button type="button" class="btn bg-teal btn-circle waves-effect waves-circle waves-float"> <i class="material-icons">edit</i></button> </a></a><a id="option1" data-id="'.$row["id"].'"  href="'.$url."/user_view.php?ids=".$row["id"].'";> <button type="button" class="btn bg-teal btn-circle waves-effect waves-circle waves-float"> <i class="material-icons">remove_red_eye</i></button></a></td></tr>';
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
	 //data: {'"name: 'Wayne', age: 27, country: 'Ireland'},
	 data:{"ids":ids,"table": 'patient'},
success: function (data) {
	jQuery('#a'+ids).hide();
	$("#smallModal").css("display", "block");
        },
error: function (data) {
	jQuery('#loadingmessage').hide();
            console.log(data);
        }
	
});

	}
        }
    </script>
<?php include('footer.php'); ?>