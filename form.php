<?php
    //define variables
  $name = "";
  $email = "";
  $portfolio = "";
  $motivation ="";
  $contrat = "";
   // define error variables
  $nameErr = "";
  $emailErr = "";
  $portfolioErr = "";
  $motivationErr ="";
  $contratErr = "";
  

    if($_SERVER["REQUEST_METHOD"] == "POST"){
         if(empty($_POST["name"])){
             $nameErr = "Name is required";     
         }else{
             $name = test_input($_POST["name"]);
             //check 
             if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
               $nameErr =" Only letters and white space allowed!";
             }             
         }
        if(empty($_POST["email"])){
           $emailErr = "Email is required";
            
        }else{
            $email = test_input($_POST["email"]);
            //Check email adress
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
               $emailErr = "Invalid email format!";
                
            }
        }
        if(empty($_POST["portfolio"])){
            echo $portfolioErr = "";
        }else{
            $portfolio = test_input($_POST["portfolio"]);
            //check adress syntax
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$portfolio)){
                 $portfolio= "Invalid URL!";
            }
        }
        if(empty($_POST["motivation"])){
            $motivationErr = "Motivation is required!";
        }else{
            $motivation =test_input($_POST["motivation"]);
        }
        if(empty($_POST["contrat"])){
            $contratErr = "Contrat is required!";
        }else{
            $contrat = test_input($_POST["contrat"]); 
        }       
               
       }
    
     //test function 
   function test_input($variable){
        htmlspecialchars($variable);
        trim($variable);
        stripslashes($variable);
        return $variable;
    }


?>


<!DOCTYPE HTML>
<html>
   <head>
       <title>Form</title>
    </head>
    <body>
        <p><span>* required field</span></p>
        <h1>My Form example <span>.</span></h1>
       <div>
           <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
               Name: <input type="text" name="name" value="<?php echo $name; ?>"><span>* <?php echo $nameErr; ?></span>
               <br><br>
               Email: <input type="text" name="email" value="<?php echo $email; ?>" ><span>* <?php echo $emailErr; ?></span>
               <br><br>
               Portfolio: <input type="text" name="portfolio" value="<?php echo $portfolio; ?>"> <?php echo $portfolioErr; ?>
               <br><br>
               Motivation: <textarea name="motivation" rows="10" cols="50"><?php echo $motivation; ?></textarea><span>*<?php echo $motivationErr; ?></span>
               <br><br>
               Contrat: <input type="radio" name="contrat" <?php if(isset($contrat) && $contrat=="CDI") echo "checked"; ?> value="CDI" >CDI
               <input type="radio" name="contrat" <?php if(isset($contrat) && $contrat=="CDD") echo "checked"; ?> value="CDD" >CDD
               <input type="radio" name="contrat" <?php if(isset($contrat) && $contrat=="Stage") echo "checked"; ?> value="Stage" >Stage<span>*<?php echo $contratErr; ?></span>
               <br><br>
               <input type="submit" name="Submit" value="submit">    
           </form>
        
        
       </div>
    
   
    </body>
</html>