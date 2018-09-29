
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 mt-2" style="margin-top:0;">
    
                    <ul class="bg-info h-10 col-md-12">
                        <li class="nav-item  "style="display:inline-block; text-decoration: none;">
                             <a href="?page=product_manager" class="nav-link btn-link text-white" >Product Manager</a>
                        </li>
                        <li class="nav-item active" style="display:inline-block; text-decoration: none;">
                             <a href="?page=catalog" class="nav-link btn-link text-white" >Product Catalog</a>
                        </li>
                    </ul>  
                
            
                 <div class="row display" style="" id="">
                    <div class="col-md-12 mx-auto">
                        <div class="card w-100">
                                <div class="card-header bg-white text-info text-center">
                                    <h3><?php echo $product_line_name['productLine'];  $count_cols = 0;?></h3>
                                </div>
                                <div class="card-body">

                                        <table cellspacing="5" class="table w-180 mx-auto table-striped" id="medical_staff_list">
                                            
                                            <tbody>
                                               
                                                
<!--                                                    <?php //for($row =1; $row <= ceil(count($products)/4); $row++): 
                                                         $count_cols = $count_cols ?>
                                                        
                                                    <tr>
                                                        <?php
                                                         //for($col = 1 ; $col <= ceil(count($products)/6); $col++):?>
                                                            <?php // if($count_cols < count($products)):?>
                                                        <td><a href="?product_code=<?php echo $products[$count_cols]['productCode'];?>"><?php echo $products[$count_cols]['productName'];?></a></td>
                                                         <?php //$count_cols++;?>
                                                         <?php// endif;?>
                                                     <?php //endfor;?>                
                                                    </tr> 
                                                    <?php //endfor;?>
                                                -->
                                                    <?php foreach($products as $product):?>
                                                    <tr>
                                                        <td>
                                                            <a href="?product_code=<?php echo $product['productCode'];?>"><?php echo $product['productName'];?></a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach;?>
                                            </tbody>
                                            
                                            
                                             
                                            
                                        </table>
                                    
                                   
                                </div>
                        </div>
                    </div>    
                </div>
            </main>
        </div>
</div>

