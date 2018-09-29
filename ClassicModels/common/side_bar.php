<div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar" id="sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="" class="nav-link active">
                                <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard <span class="sr-only">(current)</span> 
                            </a>
                        </li>
                         <?php foreach($product_lines as $product_line):?>
                        <li class="nav-item">
                                <a href="?product_line=<?php echo $product_line['productLine'];?>" class="nav-link">
                                    <?php echo $product_line['productLine'];?> 
                                </a>
                        </li>
                        <?php endforeach;?>
                        
                    </ul>
                </div>
            </nav>