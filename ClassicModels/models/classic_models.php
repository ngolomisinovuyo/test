<?php

function getAllProductLines()
{ 
    
    $result = DatabaseHandler::GetAll('CALL uspGetProductLines()');
    if(!empty($result))
    {
        return $result;
    }
}
function getProductLine($product_line)
{
    $result = DatabaseHandler::GetRow('CALL uspGetProductLine(:product_line)',array(':product_line'=>$product_line));
    if(!empty($result))
    {
        return $result;
    }
}
function getProduct($product_code)
{
    $result = DatabaseHandler::GetRow('CALL uspGetProduct(:product_code)',array(':product_code'=>$product_code));
    if(!empty($result))
    {
        return $result;
    }
}
function getProductsByProductLine($product_line)
{
    $result = DatabaseHandler::GetAll('CALL uspGetProductByLine(:product_line)',array(':product_line'=>$product_line));
    if(!empty($result))
    {
        return $result;
    }
}
function addProduct($code,$name,$line,$scale,$vendor,$description,$quantity_in_stock,$buy_price,$msrp)
{
    $data = array(
        ':product_code'=>$code,
        ':product_name'=>$name,
        ':product_line'=>$line,
        ':product_scale'=>$scale,
        ':product_vendor'=>$vendor,
        ':product_description'=>$description,
        ':quantity_in_stock'=>$quantity_in_stock,
        ':buy_price'=>$buy_price,
        ':msrp'=>$msrp
            );
    $sql_statement = 'CALL uspAddProduct (:product_code,:product_name,:product_line,:product_scale,:product_vendor,'
            . ':product_description,:quantity_in_stock,:buy_price,:msrp)';
    $result = DatabaseHandler::Execute($sql_statement,$data);
    if($result > 0)
    {
        return $result;
    }
}
function updateProduct($code,$name,$line,$scale,$vendor,$description,$quantity_in_stock,$buy_price,$msrp)
{
    $data = array(
        ':product_code'=>$code,
        ':product_name'=>$name,
        ':product_line'=>$line,
        ':product_scale'=>$scale,
        ':product_vendor'=>$vendor,
        ':product_description'=>$description,
        ':quantity_in_stock'=>$quantity_in_stock,
        ':buy_price'=>$buy_price,
        ':msrp'=>$msrp
            );
    $sql_statement = 'CALL uspUpdateProduct (:product_code,:product_name,:product_line,:product_scale,:product_vendor,'
            . ':product_description,:quantity_in_stock,:buy_price,:msrp)';
    $result = DatabaseHandler::Execute($sql_statement,$data);
    if($result > 0)
    {
        return $result;
    }
}
function deleteProduct($product_code)
{
    $result = DatabaseHandler::GetAll('CALL uspDeleteProduct(:product_code)',array(':product_code'=>$product_code));
    if(!empty($result))
    {
        return $result;
    }
}