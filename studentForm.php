<?php include_once 'function.php'; ?>
        <?php 
        $allowedTypes = array(
            "image/png",
            "image/jpg",
            "image/jpeg"
        );
            if($_FILES['photo']){
                if(in_array($_FILES['photo']['type'],$allowedTypes) !== false && $_FILES['photo']['size']<1*1024*1024){
                    move_uploaded_file($_FILES['photo']['tmp_name'], "files/".$_FILES['photo']['name']); 
                }
            }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row text-center p-3">
            <h2>Student Form</h2>
            <p>Feni Polytechnic Institute</p>
        </div>
        <?php 
            $stName = '';
            $fName = '';
            $mName = '';
            $department = ["COMPUTER DEPARTMENT", "CIVIL DEPARTMENT", "ELECTRICAL DEPARTMENT", "MECHANICAL DEPARTMENT", "POWER DEPARTMENT", "AIDT"];
            $language = ["Bangla","Arabic","Hindi","Englis","Urdu"];
            $selectedDepartment = '';
            $selectedLanguage = '';
        ?>
        <!-- Sanitize Student Name -->
        <?php 
            if(isset($_POST['stName']) && $_POST['stName'] != '') {
                $stName = filter_input(INPUT_POST, 'stName', FILTER_SANITIZE_STRING);
        ?>
        <p>
            Student Name : <?php echo $stName; ?>
        </p>
        <?php }?>
        <!-- Sanitize Student Name -->
        <?php 
            if(isset($_POST['fName']) && $_POST['fName'] != '') {
                $fName = filter_input(INPUT_POST, 'fName', FILTER_SANITIZE_STRING);
        ?>
        <p>
            Father's Name : <?php echo $fName; ?>
        </p>
        <?php }?>
        <!-- Sanitize Student Name -->
        <?php 
            if(isset($_POST['mName']) && $_POST['mName'] != '') {
                $mName = filter_input(INPUT_POST, 'mName', FILTER_SANITIZE_STRING);
        ?>
        <p>
            Mother's Name : <?php echo $mName; ?>
        </p>
        <?php }?>
        <!-- Sanitize Departments -->
        <?php 
            if(isset($_POST['department']) && $_POST['department'] != '') {
                $selectedDepartment = filter_input(INPUT_POST, 'department', FILTER_SANITIZE_STRING);
                printf("You have selected : %s\n", ucwords($selectedDepartment));
            }
        ?>
        <!-- Sanitize Language -->
        <?php 
            if(isset($_POST['language']) && $_POST['language'] != '') {
                $selectedLanguage = filter_input(INPUT_POST, 'language', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
                //echo "You have selected :".join(', ', $selectedLanguage);
                printf("You have selected : %s",join(', ', $selectedLanguage));
            }
        ?>
        <!-- sanitize photo  -->
        <pre>
        <?php
            print_r($_POST);
            print_r($_FILES);
        ?> 
        </pre>

        
        
        
    </div>

    <!-- Form Section -->
    <div class="container">
        <div class="row">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="stName">Student Name : </label>
                    <input type="text" id="stName" name="stName" class="form-control mt-2" placeholder="Enter Student Name" value="<?php echo $stName; ?>">
                </div>
                <div class="mb-3">
                    <label for="fName">Father's Name : </label>
                    <input type="text" id="fName" name="fName" class="form-control mt-2" placeholder="Enter Father's Name" value="<?php echo $fName; ?>">
                </div>
                <div class="mb-3">
                    <label for="mName">Mother's Name : </label>
                    <input type="text" id="mName" name="mName" class="form-control mt-2" placeholder="Enter Mother's Name" value="<?php echo $mName; ?>"> 
                </div>
                <div class="mb-3">
                    <label for="date">Date of Birth : </label>
                    <input type="date" id="date" name="date" class="form-control mt-2"> 
                </div>
                <div class="mb-3">
                    <label for="department">Department : </label>
                    <select name="department" id="department" class="form-control mt-2" placeholder="Enter">
                        <option value="select" selected disabled>Select Department</option>
                        <?php displayDepartments($department); ?>     
                    </select>
                </div>
                <div class="mb-3">
                    <label for="religion">Religion : </label>
                    <br>
                    <input type="radio" name="a" id=""><span> Male</span> <br>
                    <input type="radio" name="a" id=""><span> Female</span> <br>
                    <input type="radio" name="a" id=""><span> Others</span>
                </div>
                <div class="mb-3">
                    <label for="language">Knowing Language : </label>
                    <select name="language[]" id="language" class="form-control mt-2" placeholder="Enter" multiple style = "height: 200px">
                        <option value="select" selected disabled>Select Your Language</option>
                        <?php displayLanguage($language);?>

                        
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Favourite Food : </label> <br>
                    <input type="checkbox" name="fruits[]" value="apple" id="apple" <?php checkFruits('fruits', 'apple');?>>
                    <label for="apple">Apple</label> <br>
                    <input type="checkbox" name="fruits[]" value="orange" id="orange" <?php checkFruits('fruits', 'orange');?>>
                    <label for="orange">Orange</label> <br>
                    <input type="checkbox" name="fruits[]" value="lemon" id="lemon" <?php checkFruits('fruits', 'lemon');?>>
                    <label for="lemon">Lemon</label> <br>
                    <input type="checkbox" name="fruits[]" value="mango" id="mango" <?php checkFruits('fruits', 'mango');?>>
                    <label for="mango">Mango</label> <br>
                    <input type="checkbox" name="fruits[]" value="coconut" id="coconut" <?php checkFruits('fruits', 'coconut
                    ');?>>
                    <label for="coconut">Coconut</label> <br>
                </div>

                <div class= "mb-3">
                   <input type="file" name="photo" id="photo"> 
                </div>

                <div  class="mb-3">
                    <input type="submit" value="Submit" class="btn btn-success px-3">
                    <input type="reset" value="Reset" class="btn btn-danger px-3 mx-3">
                </div>
                
            </form>
        </div>
    </div>
    



    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>