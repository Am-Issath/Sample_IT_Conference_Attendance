<?php
    $title = 'Edit record';
    require_once 'includes/header.php'; 
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();

    if(!isset($_GET['id'])){
        //echo 'Error!';
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");

    } else {
        $id = $_GET['id'];
        $attendee = $crud->getAttendeesDetails($id);
    
?>

    <?php if($attendee != null) { ?>
    
    <h1 class="text-center"> Edit Record </h1>
    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>" />
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>"
             id="firstname" name="firstname">  
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" 
             id="lastname" name="lastname">  
        </div>
        <div class="form-group">
            <label for="dob">Date Of Birth</label>
            <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth'] ?>"
             id="dob" name="dob">  
        </div>
        <div class="form-group">
            <label for="specialty">Area of expertise</label> 
            <select class="form-control" id="specialty" name="specialty">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['specialty_id']?>" <?php if($r['specialty_id'] ==
                    $attendee['specialty_id']) echo 'selected' ?>>
                        <?php echo $r['name'];?>
                    </option>
                <?php }?>
            </select> 
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" value="<?php echo $attendee['emailaddress'] ?>"
             id="email" name="email" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="phone" class="form-control" value="<?php echo $attendee['contactnumber'] ?>"
             id="phone" name="phone" aria-describedby="phoneHelp">
            <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
        </div>
        
        </br>
        <a href="viewrecords.php" class="btn btn-info">Back to list</a>
        <button type="submit" name="submit" class="btn btn-success ">Save changes</button>
        
    </form>

    <?php 
    } else{ 

        //echo "<h1 class='text-danger'>Please check details and try again!</h1>";
        include 'includes/errormessage.php';
    } 
    ?>

<?php } ?>    
<br>
<br>
<br>
<br>
<br>

<?php require_once 'includes/footer.php'; ?>



