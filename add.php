<?php
    include('config/db_connect.php');

    $name = $title = $parts = '';
    $errors = array('name' =>'', 'title'=>'', 'parts'=>'');
    //recognize if data is sent with isset function
    if(isset($_POST['submit'])){
        
        
        //validate if form fields are filled
        if(empty($_POST['name'])){
            $errors['name'] = 'Your name is required <br />';
        }
        else{
            $name = $_POST['name'];
            //echo htmlspecialchars($_POST['name']);
            if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
                $errors['name'] =  'Name can only be letters and spaces <br />';
            }

        }

        if(empty($_POST['title'])){
            $errors['title'] = 'A build title is required <br />';
        }
        else{
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z0-9\s]+$/', $title)){
                $errors['title'] = 'Title can only be letters and numbers <br />';
            }
        }

        if(empty($_POST['parts'])){
            $errors['parts'] = 'parts are required <br />';
        }
        else{
            $parts = $_POST['parts'];
            if(!preg_match('/(\d+)(,\s*\d+)*/', $parts)){
                $errors['parts'] = 'must be comma seperated list <br />';
            }
            
        }
        //prevents form submission if there are errors
        if(array_filter($errors)){
           // echo 'errors in form';
        }

        //if there are no errors in the form then submit and redirect user
        else{

          $name = mysqli_real_escape_string($conn, $_POST['name']); 
          $title = mysqli_real_escape_string($conn, $_POST['title']);
          $parts = mysqli_real_escape_string($conn, $_POST['parts']);

          //sql command
          $sql = "INSERT INTO builds(title,name,parts) VALUES('$title', '$name', '$parts')";
          //  echo 'form is valid';
            
          //save to database
           if(mysqli_query($conn, $sql)){

           }
           else{
               echo 'query error: ' . mysqli_error($conn);
           } 

          header('Location: index.php');
        }

    } //end of check
    
?>

<!DOCTYPE html>
<html lang="en">

<?php include ('templates/header.php') ?>

<section class="container">
    <h4 class="center">Add a Build</h4>
    <form class = "white" action = "add.php" method="POST">
         <label>Your name:</label>
         <input type = "text" name = "name" value ="<?php echo htmlspecialchars($name) ?>">
         <div class="red-text"><?php echo $errors['name']; ?></div>
         
         <label>Build title:</label>
         <input type = "text" name = "title" value ="<?php echo htmlspecialchars($title) ?>">
         <div class="red-text"><?php echo $errors['title']; ?></div>
         
         <label>Parts:</label>
         <input type = "text" name = "parts" value ="<?php echo htmlspecialchars($parts) ?>">
         <div class="red-text"><?php echo $errors['parts']; ?></div>

         <div class="center">
            <input type="submit" name="submit" value="submit" class ="blue btn brand z-depth-10">
         </div>
    </form>
</section>

<?php include ('templates/footer.php') ?>
    

</html>