<?php

if(isset($_FILES['product_image']['name']))
{
    $name = $_FILES['product_image']['name'];
    $size = $_FILES['product_image']['siez'];
    $extension = end(explode('.',$name));
    $allowed_extension = array('png','jpg','jpeg');
    if(in_array($extension, $allowed_extension))
    {
        if($size < (1024*1024))
        {
            $new_image='';
            $new_name = md5(rand()).'.'.$extension;
            $path = URL.'public/images'.$new_name;
            list($width,$height) = getimagesize($_FILES['product_image']['tmp_name']);
            if($extension=='png')
            {
                $new_image = imagecreatefrompng($_FILES['product_image']['tmp_name']);
            }
            if($extension =='jpg'|| $extension =='jpeg')
            {
                $new_image = imagecreatefromjpeg($_FILES['profuct_image']['tmp_name']);
            }
            $new_width = 200;
            $new_height = ($height/$width)*200;
            $temp_image = imagecreatetruecolor($new_width, $new_height);
            imagecopyresampled($temp_image, $new_image, $new_width, 0, 0, 0, 0, $new_width, $new_height, $width,$height);
            imagejpeg($new_image,$path,100);
            imagedestroy($new_name);
            imagedistroy($temp_image);
            echo '<img src="'.$path.'"/>';
        }
        else 
        {
            $error = 'Image size must be less than 1 mb';
        }
        echo 'done';
    }
 else {
        $error = 'Invalid image format';
    }
}
else
{
    $error='Please select an image';
}