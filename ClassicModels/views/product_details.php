<?php

?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                 <div class="row display" style="" id="">
                    <div class="col-md-12 mx-auto">
                        <div class="card w-100">
                                <div class="card-header bg-white text-info text-center">
                                    <h3><?php echo $product['productLine'];?></h3>
                                </div> 
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div>
                                                <img src="<?php echo $product_mage;?>" alt="<?php echo $image_alt;?>"/>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <label>Product Name</label>
                                                <?php echo $product['productName'];?>
                                            </div>
                                             <div class="input-group">
                                                <label>Product Scale</label>
                                                <?php echo $product['productScale'];?>
                                            </div>
                                            <div class="input-group">
                                                <label>Product Vendor</label>
                                                <?php echo $product['productVendor'];?>
                                            </div>
                                            <div class="input-group">
                                                <label>Product Description</label>
                                                <p><?php echo $product['productDescription'];?></p>
                                            </div>
                                            <div class="input-group">
                                                <label>Quantity In Stock</label>
                                                <?php echo $product['quantityInStock'];?>
                                            </div>
                                            <div class="input-group">
                                                <label>Buy Price</label>
                                                <?php echo $product['buyPrice'];?>
                                            </div>
                                            <div class="input-group">
                                                <label>MSRP</label>
                                                <?php echo $product['MSRP'];?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>    
                </div>
            </main>
        </div>
</div>

