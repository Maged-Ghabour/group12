<?php

  if($_SERVER["REQUEST_METHOD"] == "POST"){



    $imgName = $_FILES["image"]['name'];
    $imgPath = $_FILES["image"]['full_path'];
    $imgTmp = $_FILES["image"]['tmp_name'];
    $imgSize = $_FILES["image"]['size'];
    $imgError = $_FILES["image"]['error'];
    $imgtype = $_FILES["image"]['type'];

    // Empty 

    if(!empty($imgName)){

      // Extension

      $imgArr = explode("/",$imgtype);
      $imgExtension = end($imgArr);

      $allowedExtension = ["png","jpg","jpeg","png"];



      if(in_array($imgExtension,$allowedExtension)){

        $finalName = time().rand().".".$imgExtension;

        $disPath = 'uploads/'.$finalName;

        if(move_uploaded_file($imgTmp,$disPath)){

          echo "Image Uploaded";


          }else{
            echo "Try Again";
          }

      
      }else{
        echo "Not Vaild Extension";
      }

    }else{
      echo "Required Filed";
    }



       

         


  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype='multipart/form-data'"> 

<input type="file" name="image" >
<input type="submit" value="GO">

</form>
</body>
</html>