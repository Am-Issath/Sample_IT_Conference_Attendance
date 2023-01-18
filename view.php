<?php
    $title = 'View records';
    require_once 'includes/header.php'; 
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    //Get attendee by id
    // if(!isset($_GET['id'])){
    //     echo "<h1 class='text-danger'>Please check details and try again!</h1>";

    // }else {
       
        $id = $_GET['id'];
        $result = $crud->getAttendeesDetails($id);

?>

<?php if($result != null) { ?>

<img src="<?php echo empty($result['avatar_path']) ? "uploads/blank.png" : $result['avatar_path']; ?>" 
    class="rounded-circle" style = "width: 20% height: 20%"/>
<br/>
<div class="card" style="width: 20rem;">
  <div class="card-body">
    <h5 class="card-title"> <?php echo $result['firstname'] .' '. $result['lastname']; ?> </h5>
    <h6 class="card-subtitle mb-2 text-muted"> <?php echo $result['name']; ?> </h6>
    <p class="card-text"> Date Of Birth : <?php echo $result['dateofbirth']; ?> </p>
    <p class="card-text"> Email address : <?php echo $result['emailaddress']; ?> </p>
    <p class="card-text"> Phone number : <?php echo $result['contactnumber']; ?> </p>
    </div>
</div>
</br>
    <a href="viewrecords.php" class="btn btn-info">Back to list</a>
    <a href="edit.php?id=<?php echo $result['attendee_id']; ?>" class="btn btn-warning">Edit</a>
    <a onclick="return confirm('Are you sure you want to delete this record?');"
        href="delete.php?id=<?php echo $result['attendee_id']; ?>" class="btn btn-danger">Delete</a>

<?php 
    } else{ 

        //echo "<h1 class='text-danger'>Please check details and try again!</h1>";
        include 'includes/errormessage.php';
    } 
?>

<?php //} ?>


<br>
<br>
<br>

<?php require_once 'includes/footer.php'; ?>