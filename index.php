<?php
    $title = 'Index';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();
?>

    <h1 class="text-center"> Registration for IT conference </h1>

    <!-- 
        - First Name
        - Last Name
        - Date of birth (Use Datapicker)
        - Specialty (Database Admin, Software Developer, Web Administration)
        - Email Address
        - Contact Number
    -->
    
    <form method="post" action="success.php">
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input required type="text" class="form-control" id="firstname" name="firstname">  
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input required type="text" class="form-control" id="lastname" name="lastname">  
        </div>
        <div class="form-group">
            <label for="dob">Date Of Birth</label>
            <input required type="text" class="form-control" id="dob" name="dob">  
        </div>
        <div class="form-group">
            <label for="specialty">Area of expertise</label> 
            <select class="form-control" id="specialty" name="specialty">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['specialty_id'];?>"><?php echo $r['name'];?></option>
                <?php }?>
            </select> 
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="phone" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
            <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
        </div>
        <br/>
        <div class="custom-file">
            <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
            <label class="custom-file-label" for="avatar">Choose File</label>
            <small id="avatar" class="form-text text-danger">File upload is optional</small>
        </div>
    
       
        <button type="submit" name="submit" class="btn btn-primary btn-block" >Submit</button>
    </form>


<br>
<br>
<br>
<br>
<br>

<?php require_once 'includes/footer.php'; ?>



