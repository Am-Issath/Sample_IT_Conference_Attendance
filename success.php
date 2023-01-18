<?php
    $title = 'Index';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
      //extract values from the $_POST array
      $fname = $_POST['firstname'];
      $lname = $_POST['lastname'];
      $dob = $_POST['dob'];
      $email = $_POST['email'];
      $contact = $_POST['phone'];
      $specialty = $_POST['specialty'];

      // $orig_file = $_FILES["avatar"]["tmp_name"];
      // $ext = pathinfo($_FILES["avatar"]["name"],PATHINFO_EXTENSION);
      // $target_dir = 'uploads/';
      // $destination = "$target_dir$contact.$ext";
      // move_uploaded_file($orig_file,$destination);

      if(isset($_FILES["avatar"])){
        $orig_file = $_FILES["avatar"]["tmp_name"];
        $ext = pathinfo($_FILES["avatar"]["name"],PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        $destination = "$target_dir$contact.$ext";
        move_uploaded_file($orig_file,$destination);
        // Insert $destination into the database or use it here.
      }else{
          $destination = null; // or any other default value
      }
      //Call function to insert and track if success or not
      $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty, $destination);
      

      if($isSuccess){
        //echo '<h1 class="text-center text-success">You Have Been Registered!</h1>';
        include 'includes/successmessage.php';
      }
      else{
        //echo '<h1 class="text-center text-danger">There was an error in processing!</h1>';
        include 'includes/errormessage.php';
      }


    }


?>


<!-- This prints out values that were passed to the action page using method="get" -->
<!-- <div class="card" style="width: 20rem;">
  <div class="card-body">
    <h5 class="card-title"> <?php //echo $_GET['firstname'] .' '. $_GET['lastname'] ?> </h5>
    <h6 class="card-subtitle mb-2 text-muted"> <?php //echo $_GET['exampleFormControlSelect1'] ?> </h6>
    <p class="card-text"> Date Of Birth : <?php //echo $_GET['dob'] ?> </p>
    <p class="card-text"> Email address : <?php //echo $_GET['exampleInputEmail'] ?> </p>
    <p class="card-text"> Phone number : <?php //echo $_GET['phone'] ?> </p>
    </div>
</div> -->

<!-- This prints out values that were passed to the action page using method="post" -->
<img src="<?php echo $destination; ?>" class="rounded-circle" style = "width: 20% height: 20%"/>
<div class="card" style="width: 20rem;">
  <div class="card-body">
    <h5 class="card-title"> <?php echo $_POST['firstname'] .' '. $_POST['lastname'] ?> </h5>
    <h6 class="card-subtitle mb-2 text-muted"> <?php echo $_POST['specialty'] ?> </h6>
    <p class="card-text"> Date Of Birth : <?php echo $_POST['dob'] ?> </p>
    <p class="card-text"> Email address : <?php echo $_POST['email'] ?> </p>
    <p class="card-text"> Phone number : <?php echo $_POST['phone'] ?> </p>
    </div>
</div>

<br>
<br>
<br>

<?php require_once 'includes/footer.php'; ?>
