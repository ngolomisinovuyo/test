<?php

?>
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                 <div class="row display" style="" id="">
                    <div class="col-md-12 mx-auto">
                        <div class="card w-100">
                                <div class="card-header text-center">
                                    <h3>Add New Product</h3>
                                </div>
                                <div class="card-body">
                                    <div class="col-lg-6 mx-auto">
                                        <form action="" method="POST"enctype="multipart/form-data" id="c">
                                            <div class="form-group">
                                                <label for="product_code">Product Code:</label>
                                            <input type="text" name="product_code" class="form-control mt-2" placeholder="Enter product code"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="product_name">Product Name:</label>
                                            <input type="text" name="product_name" class="form-control mt-2" placeholder="Enter product name"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="product_line">Product Line:</label>
                                            <select name="product_line" class="form-control mt-2">
                                                <option>Select Product Line</option>
                                                <?php foreach($product_lines as $product_line ):?>
                                                <option value="<?php echo $product_line['productLine'];?>">
                                                    <?php echo $product_line['productLine'];?>
                                                </option>
                                                <?php endforeach;?>
                                            </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="product_scale">Product Scale:</label>
                                            <input type="text" name="product_scale" class="form-control mt-2" placeholder="Enter product scale"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="product_vendor">Product Vendor:</label>
                                            <input type="text" name="product_vendor" class="form-control mt-2" placeholder="Enter product vendor"/>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="product_description">Product Description:</label>
                                            <textarea name="product_description" col="50" rows="3" class="form-control mt-2" placeholder="Enter product description"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="quantity_in_stock">Quantity In Stock:</label>
                                            <input type="text" name="quantity_in_stock" class="form-control mt-2" placeholder="Enter quantity in stock"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="buy_price">Buy Proce:</label>
                                            <input type="text" name="buy_price" class="form-control mt-2" placeholder="Enter buy price"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="msrp">MSRP:</label>
                                            <input type="text" name="msrp" class="form-control mt-2" placeholder="Enter MSRP"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="product_image">Upload Image:</label>
                                                <input type="file" name="product_image" value="Choose File"/>
                                            </div>
                                            <input type="hidden" name="action" value="save_product"/>
                                            <button type="submit" class="btn btn-info mt-2" name="btn_add_product" style="float: right;">Save </button>
                                        </form>
                                        
                                   
                                </div>
                        </div>
                    </div>    
                </div>
            </main>
        </div>
</div>

