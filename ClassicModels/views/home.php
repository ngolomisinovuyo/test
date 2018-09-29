
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                 <div class="row display" style="" id="">
                    <div class="col-md-12 mx-auto">
                        <div class="card w-100">
                                <div class="card-header bg-info text-center">
                                    <h3><?php echo $product_line_name['productLine'];?></h3>
                                </div>
                                <div class="card-body">

                                        <table cellspacing="5" class="table w-180 mx-auto table-striped" id="medical_staff_list">
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th><th>Product Scale</th><th>Vendor</th><th>Description</th>
                                                    <th>Quantity In Stock</th><th>Buy Price</th><th>MSRP</th><th></th><th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($products as $product):?>
                                                <tr>
                                                    
                                                    <td><?php echo $product['productName'];?></td>
                                                    <td><?php echo $product['productScale'];?></td>
                                                    <td><?php echo $product['productVendor'];?></td>
                                                    <td><?php echo $product['productDescription'];?></td>
                                                    <td><?php echo $product['quantityInStock'];?></td>
                                                    <td><?php echo $product['buyPrice'];?></td>
                                                    <td><?php echo $product['MSRP'];?></td> 
                                                    <td>
                                                        <form action="." method="POST">
                                                           
                                                            <input type="hidden" name="action" value="modify"/>
                                                            <input type="hidden" name="product_code" value="<?php echo $product['productCode'];?>"/>
                                                            <input type="hidden" name="product_line" value="<?php echo $product['productLine'];?>"/>
                                                            <button class="btn-info" name="update" type="submit">Update</button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form action="." method="POST">
                                                            
                                                            <input type="hidden" name="action" value="modify"/>
                                                            <input type="hidden" name="product_line" value="<?php echo $product['productLine'];?>"/>
                                                            <input type="hidden" name="product_code" value="<?php echo $product['productCode'];?>"/>
                                                            <button class="btn-info" type="submit" name="delete" >Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                            
                                            <tfoot>
                                                <tr>
                                                    <td></td> <td></td> <td></td><td></td><td></td><td></td><td></td><td></td> <td>
                                                        
                                                        <a href="?action=add_product"class="btn btn-info" type="submit">Add Product</a>
                                                        
                                                    </td>

                                                </tr>
                                            </tfoot>
                                            
                                        </table>
                                    
                                   
                                </div>
                        </div>
                    </div>    
                </div>
            </main>
        </div>
</div>
