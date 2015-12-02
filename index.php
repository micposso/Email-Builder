<?php
session_start();

if(isset($_FILES['file'])){
    $errors= array();
    foreach($_FILES['file']['tmp_name'] as $key => $tmp_name ){
        $file_name = $_FILES['file']['name'][$key];
        $file_size =$_FILES['file']['size'][$key];
        $file_tmp =$_FILES['file']['tmp_name'][$key];
        $file_type=$_FILES['file']['type'][$key];  
        if($file_size > 2097152){
            $errors[]='File size must be less than 2 MB';
        }       
        $desired_dir="shell/images";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);        // Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else{                                  // rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;               
            }       
        }else{
                print_r($errors);
        }
    }
}

if(isset($_FILES['files'])){
    $_SESSION["email"] = $_POST["email"];
    $errors= array();
    foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
        $file_name = $_FILES['files']['name'][$key];
        $file_size =$_FILES['files']['size'][$key];
        $file_tmp =$_FILES['files']['tmp_name'][$key];
        $file_type=$_FILES['files']['type'][$key];  
        if($file_size > 2097152){
            $errors[]='File size must be less than 2 MB';
        }       
        $desired_dir="shell";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);        // Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else{                                 

                $new_dir="$desired_dir/".$file_name;
                 rename($file_tmp,$new_dir) ;               
            }       
        }else{
                print_r($errors);
        }
    }
    if(empty($error)){
        echo $_SESSION["email"];
        header("Location: shell/index.php");
    }
}
?>

 
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Email Builder</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">
  
  
  <link rel="stylesheet" href="css/styles.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">


  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body>   
    

    
    
<div class="panel-default" id="mycont">
    <div class="panel panel-default">
        <div class="panel-body">
            
            
<div class="panel-default">
    <div class="panel panel-default">
        <div class="panel-body">
    
    
<form action="" method="POST" enctype="multipart/form-data" role="form">        
        
    <div class="input-group">
        <span class="input-group-btn">
            <span class="btn btn-danger btn-file large-button">
                Upload IMAGES<type="file" name="file[]" multiple/>
            </span>
        </span>
        <input type="text" class="form-control" readonly="">
    </div>
        
   
</form>
            
        </div>
    </div>
</div>  
    
    
<form action="" method="POST" enctype="multipart/form-data">
    <center>
        
        
    <div class="input-group">
        <span class="input-group-btn">
            <span class="btn btn-primary btn-file large-button">
                Upload SHELL: <input type="file" name="files[0]"/>
            </span>
        </span>
        <input type="text" class="form-control" readonly="">
    </div>   
        
        
    <div class="input-group">
        <span class="input-group-btn">
            <span class="btn btn-primary btn-file large-button">
                Pre-Header: <input type="file" name="files[2]"/>
            </span>
        </span>
        <input type="text" class="form-control" readonly="">
    </div>
        
        
    <div class="input-group">
        <span class="input-group-btn">
            <span class="btn btn-primary btn-file large-button">
                Header: <input type="file" name="files[3]"/>
            </span>
        </span>
        <input type="text" class="form-control" readonly="">
    </div>   
        
        
    <div class="input-group">
        <span class="input-group-btn">
            <span class="btn btn-primary btn-file large-button">
                HERO: <input type="file" name="files[4]"/>
            </span>
        </span>
        <input type="text" class="form-control" readonly="">
    </div>
        
        
    <div class="input-group">
        <span class="input-group-btn">
            <span class="btn btn-primary btn-file large-button">
                MODULE 2: <input type="file" name="files[5]"/>
            </span>
        </span>
        <input type="text" class="form-control" readonly="">
    </div>  

        
    <div class="input-group">
        <span class="input-group-btn">
            <span class="btn btn-primary btn-file large-button">
                MODULE 3: <input type="file" name="files[6]"/>
            </span>
        </span>
        <input type="text" class="form-control" readonly="">
    </div>
        
        
    <div class="input-group">
        <span class="input-group-btn">
            <span class="btn btn-primary btn-file large-button">
                MODULE 4: <input type="file" name="files[7]"/>
            </span>
        </span>
        <input type="text" class="form-control" readonly="">
    </div>
        
        
     
    <div class="input-group">
        <span class="input-group-btn">
            <span class="btn btn-primary btn-file large-button">
                MODULE 5: <input type="file" name="files[8]"/>
            </span>
        </span>
        <input type="text" class="form-control" readonly="">
    </div>
        
    <div class="input-group">
        <span class="input-group-btn">
            <span class="btn btn-primary btn-file large-button">
                FOOTER: <input type="file" name="files[9]"/>
            </span>
        </span>
        <input type="text" class="form-control" readonly="">
    </div> 
        
    <div class="input-group">
        <span class="input-group-btn">
            <span class="btn btn-primary btn-file large-button">
                DISCLAIMER: <input type="file" name="files[10]"/>
            </span>
        </span>
        <input type="text" class="form-control" readonly="">
    </div>  
        
        	<div class="input-group">
    <label for="email">Email Address:</label>
    <input type="text" name="email" class="form-control" id="email">
  </div>
	
	
	<div class="input-group">
	 <button type="submit" class="btn btn-default">Send Proof</button>
	</div>
        
        
        
       
</form>


        </div>
    </div>
</div>  

<script src="js/scripts.js"></script>
</body>
</html>



