<?php if(!class_exists('Rain\Tpl')){exit;}?>

				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src='<?php if( !empty($sample["photo"]) ){ ?><?php echo htmlspecialchars( $sample["photo"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>\resource\upload\sem-foto.jpg<?php } ?>' alt="" />
								
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="/resource/site/images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php if( !empty($sample["title"]) ){ ?> <?php echo htmlspecialchars( $sample["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }elseif( !empty($product["name_product"]) ){ ?> <?php echo htmlspecialchars( $product["name_product"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?>Titulo não cadastrado<?php } ?></h2>
								<p>Web ID: <?php echo htmlspecialchars( $product["id_product"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
								<img src="/resource/site/images/product-details/rating.png" alt="" />
								<form action="/product/{product.id_product}/add" method="post"></form>
								<span>
									<span><?php if( $product["value"] ){ ?>R$ <?php echo htmlspecialchars( $product["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> Sem Preço<?php } ?></span>
									<label>Quantidade:</label>
									<input type="text" value="1" name="amount" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Comprar
									</button>
								</span>
								<p><b>Disponibilidade:</b> <?php if( $product["amount"] > 10 ){ ?>em estou<?php }elseif( $product["amount"] == 0 ){ ?>em falta<?php }else{ ?><?php echo htmlspecialchars( $product["amount"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?></p>
								<p><b>Marca:</b>  <?php if( !empty($p["name_brand"]) ){ ?><?php echo htmlspecialchars( $p["name_brand"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>Sem marca<?php } ?> </p>
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Detalhes</a></li>								
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
									<?php if( !empty($sample["description"]) ){ ?><?php echo $sample["description"]; ?><?php }else{ ?>Sem descrição<?php } ?>

							</div>
													
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="/resource/site/images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="/resource/site/images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="/resource/site/images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="/resource/site/images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="/resource/site/images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="/resource/site/images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>