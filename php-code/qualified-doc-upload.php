<?php
error_reporting(E_ALL);
include('send-uploaded-file-by-email.php');
include('send-qualified-to-docusign.php');
$time = date("d-m-Y")."-".time() ; 
$target_dir = "../uploads/";
//$target_dir = "/home/capstone/apps/wordpress/htdocs/uploads/";
$myfilename = basename($_FILES["fileToUpload"]["name"]) ;
$target_file = $target_dir . $time."-".basename($_FILES["fileToUpload"]["name"]);
//echo $target_file ;
//echo $myfilename ;
//echo "test" ;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check >  0) {
        echo "File is ok - ";
        $uploadOk = 1;
    } else {
        echo "File is empty.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "pdf" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
//   Send_Pdf_By_Email($target_file);
    // only 3 files need signatures
    $found = 0;
    $fnamefound = 0;
    $lnamefound = 0;
    $pos = strpos($myfilename, "capstone");
    if ($pos !== false) {
    echo "in first pos" ;
    system("pdftk '$target_file' dump_data_fields output '../uploads/fields.txt'"); 
// Need to get first and last names
     $handle = fopen("../uploads/fields.txt", "r");
     if($handle){
          $needle1 = "APP-1-First_Name";
          $needle2 = "TRA-1-First_Name";
          $needle3 = "REP-1-First_Name";
          $needle4 = "APP-1-Last_Name";
          $needle5 = "TRA-1-Last_Name";
          $needle6 = "REP-1-Last_Name";
          while (($line = fgets($handle)) !== false && $fnamefound == 0 ) {
          $pos1 = strpos($line, $needle1);
          $pos2 = strpos($line, $needle2);
          $pos3 = strpos($line, $needle3);
          if(($pos1 !== false) || ($pos2 !== false) || ($pos3 !== false) )
               {
                $line = fgets($handle) ;
                while(($pos7 = strpos($line,"FieldValue")) === false) {
                     $line = fgets($handle);
                    }
               $pieces = explode(":", $line);
               $fname = $pieces[1] ; 
               echo $fname;
                   $fnamefound = 1;
                }
          }
          while (($line = fgets($handle)) !== false && $lnamefound == 0 ) {
          $pos4 = strpos($line, $needle4);
          $pos5 = strpos($line, $needle5);
          $pos6 = strpos($line, $needle6);
          if(($pos4 !== false) || ($pos5 !== false) || ($pos6 !== false) )
               {
                $line = fgets($handle) ;
                while(($pos8 = strpos($line,"FieldValue")) === false) {
                     $line = fgets($handle);
                    }
               $pieces = explode(":", $line);
               $lname = $pieces[1] ; 
               echo $lname ;
                   $lnamefound = 1;
                }
          }
     
      }
       fclose($handle);
     $name = $fname." ".$lname ;
// Need to get email address
     $handle = fopen("../uploads/fields.txt", "r");
      if ($handle) {
//     echo "in handle" ; 
          $needle1 = "APP-1-Email";
          $needle2 = "TRA-1-Email";
          $needle3 = "REP-1-Email";
          $found = 0;
          $at = "@" ;
          while (($line = fgets($handle)) !== false && $found == 0) {
         // process the line read.
          $pos1 = strpos($line, $needle1);
          $pos2 = strpos($line, $needle2);
          $pos3 = strpos($line, $needle3);
          if(($pos1 !== false) || ($pos2 !== false) || ($pos3 !== false) )
               {
                $line = fgets($handle) ;
                while(($pos4 = strpos($line,"FieldValue")) === false) {
                     $line = fgets($handle);
                    }
               $pieces = explode(":", $line);
               $pemail = $pieces[1] ; 
               if(strpos($pemail,$at) === false) {$found = 0;}
                   else { $found = 1;}
                }
           }

       fclose($handle);
      }  else {
              // error opening the file.
         }  
    SendToDocusign($target_file, $pemail,$name) ;
       }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
