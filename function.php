<!-- Function for Departments -->
<?php 
    function displayDepartments($options){
        foreach($options as $option){
            printf("<option value='%s'>%s</option>", strtolower($option), ucwords($option));
        }
    }
?>

<!-- Function for Language -->
<?php 
    function displayLanguage($options){
        foreach($options as $option){
            printf("<option value='%s'>%s</option>", strtolower($option), ucwords($option));
        }
    }

?>

<!-- Fruits Checker -->
<?php 
    function checkFruits($options, $value){
        if(isset($_POST[$options]) && is_array($_POST[$options]) && in_array($value, $_POST[$options])){
            echo "checked";
        }
     }
?>