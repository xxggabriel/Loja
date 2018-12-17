<?php if(!class_exists('Rain\Tpl')){exit;}?>     
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>

                    <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>

                    <div class="col-sm-4" style="height: 502px;">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center" >
                                    <div class="thumbnail" style="width: 255px; height: 300px;">
                                        <img src='<?php echo htmlspecialchars( $value1["photo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>' width="100%" height="100%"  class="rounded float-left" alt="city1" />
                                    </div>
                                    
                                    <h2><?php echo htmlspecialchars( $value1["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
                                    <p><?php echo htmlspecialchars( $value1["name_product"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add a carrilho</a>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Informaçoes</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2><?php echo htmlspecialchars( $value1["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
                                        <p><?php echo htmlspecialchars( $value1["name_product"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add a carrilho</a>
                                        <a href="/product/<?php echo htmlspecialchars( $value1["id_product"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Informaçoes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>


                        
                    </div>
                    </div>

                    
                    
                    <ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">&raquo;</a></li>
                    </ul>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>