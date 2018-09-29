<?php
require 'config.php';
require 'common/header.php';
require 'libs/database_handler.php';
require_once 'models/classic_models.php';
$product_lines = getAllProductLines();
require 'common/side_bar.php';
 $page = filter_input(INPUT_POST,'page');
 if(!isset($page) || $page == NULL)
 {
     $page = filter_input(INPUT_GET,'page');
     if(($page == NULL || !isset($page)) )
     {
         $page = 'catalog';
         
     }
 }
 
//echo $product_line;
// die();
 switch ($page) 
 {
     case 'catalog':
        $product_line = filter_input(INPUT_GET,'product_line');
        if(!isset($product_line) || $product_line == NULL)
        {
            $product_line = 'Classic Cars';
        }
        
        
            $product_line_name = getProductLine($product_line);
            $products = getProductsByProductLine($product_line);
            include 'views/main.php';
        
        
        $product_code = filter_input(1,'product_code');
        if(isset($product_code))
        {
            $product = getProduct($product_code);
            $product_image = '../public/images/'.$product['productCode'].'png';
            $image_alt = $product['productCode'].'png';
             include 'views/product_details.php';
        }
        
         break;
    case 'product_manager':
        $action = filter_input(INPUT_POST,'action');
        if(!isset($action) || $action == NULL)
        {
            $action = filter_input(INPUT_GET,'action');
            if(($action == NULL || !isset($page)) )
            {
                $action = 'product_manager/default';

            }
        }
        $product_line = filter_input(INPUT_GET,'product_line');
        if(!isset($product_line) || $product_line == NULL)
        {
            $product_line = 'Classic Cars';
        }
        $product_line_name = getProductLine($product_line);
        $products = getProductsByProductLine($product_line);
        include 'views/home.php';
         break;
      case 'modify':
        $product_line = filter_input(INPUT_POST,'product_line');
        $product_line_name = getProductLine($product_line);
        $product_code = filter_input(INPUT_POST,'product_code');
        $product = getProduct($product_code);
        if(filter_input(0,'update') !== NULL)
        {
             include 'views/edit_product.php';
        }
        elseif(filter_input(0,'delete') !== NULL)
        {
            deleteProduct($product_code);
            header('location:?product_line='.$product_line);
        }
        
   
         break;
    case 'save_update':
        $product_code = filter_input(0, 'product_code');
        $product_name = filter_input(0, 'product_name');
        $product_line = filter_input(0, 'product_line');
        $product_scale = filter_input(0, 'product_scale');
        $product_vendor = filter_input(0, 'product_vendor');
        $product_description = filter_input(0, 'product_description');
        $quanity_in_stock = filter_input(0, 'quantity_in_stock');
        $buy_price = filter_input(0, 'buy_price');
        $msrp = filter_input(0, 'msrp');
        if($product_code != NULL && $product_name != NULL && $product_line != NULL && $product_scale != NULL)
        {
            $res = updateProduct($product_code, $product_name, $product_line, $product_scale, $product_vendor,$product_description,$quanity_in_stock, $buy_price, $msrp);
            header('location:?product_line='.$product_line);
        }
        break;
    case 'add_product':
        include 'views/add_product.php';
        break;
    case 'save_product':
        $product_code = filter_input(0, 'product_code');
        $product_name = filter_input(0, 'product_name');
        $product_line = filter_input(0, 'product_line');
        $product_scale = filter_input(0, 'product_scale');
        $product_vendor = filter_input(0, 'product_vendor');
        $product_description = filter_input(0, 'product_description');
        $quanity_in_stock = filter_input(0, 'quantity_in_stock');
        $buy_price = filter_input(0, 'buy_price');
        $msrp = filter_input(0, 'msrp');
        if($product_code != NULL && $product_name != NULL && $product_line != NULL && $product_scale != NULL)
        {
            $res = addProduct($product_code, $product_name, $product_line, $product_scale, $product_vendor,$product_description,$quanity_in_stock, $buy_price, $msrp);
            
            if(isset($_FILES['product_image']['name']))
            {
                $name = $_FILES['product_image']['name'];
                $size = $_FILES['product_image']['size'];
                $extensions = explode('.',$name);
                $extension = end($extensions);
                $allowed_extension = array('png','jpg','jpeg');
                if(in_array($extension, $allowed_extension))
                {
                    if($size < (1024*1024))
                    {
                        $new_image='';
                        //$new_name = md5(rand()).'.'.$extension;
                        $new_name = $product_code.'.'.$extension;
                        $path = 'public/images/'.$new_name;
                        list($width,$height) = getimagesize($_FILES['product_image']['tmp_name']);
                        if($extension=='png')
                        {
                            $new_image = imagecreatefrompng($_FILES['product_image']['tmp_name']);
                        }
                        if($extension =='jpg'|| $extension =='jpeg')
                        {
                            $new_image = imagecreatefromjpeg($_FILES['product_image']['tmp_name']);
                        }
                        $new_width = 200;
                        $new_height = ($height/$width)*200;
                        $temp_image = imagecreatetruecolor($new_width, $new_height);
                        imagecopyresampled($temp_image, $new_image, 0, 0, 0, 0, $new_width, $new_height, $width,$height);
                        imagejpeg($new_image,$path,100);
                        imagedestroy($new_image);
                        imagedestroy($temp_image);
                        //echo '<img src="'.$path.'"/>';
                    }
                    else 
                    {
                        $error = 'Image size must be less than 1 mb';
                    }

                }
                else {
                       $error = 'Invalid image format';
                   }
            }
            else
            {
                $error='Please select an image';
            }
             header('location:?product_line='.$product_line);
        }
        break;
}
function sideBar()
{
    
}

