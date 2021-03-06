<?php
    require_once 'library/init.php';
    $title = '';
	if(isset($_GET['theloai']) && isset($_GET['sanpham'])) {
		$san_pham_id = $_GET['sanpham'];
		$the_loai_id = $_GET['theloai'];
		$sql_get_list = "SELECT * FROM sanpham WHERE Id='$san_pham_id'";
		if($db->num_rows($sql_get_list)) {
			$sanpham = $db->fetch_assoc($sql_get_list)[0];
			$title = $sanpham['Ten'];
		}
	}
	require_once 'layouts/header.php';  
?>
	<!--single start here-->
	<div class="single">
		<div class="container">
			<div class="single-main">
				<div class="single-top-main">
					<div class="col-md-5 single-top">
						<div class="flexslider">
							<?php
								if(isset($sanpham)) {
									echo 
									'
									<ul class="slides">
										<li data-thumb="'.$sanpham['Anh1'].'">
											<div class="thumb-image">
												<img src="'.$sanpham['Anh1'].'" data-imagezoom="true" class="img-responsive"> </div>
										</li>
										<li data-thumb="'.$sanpham['Anh2'].'">
											<div class="thumb-image">
												<img src="'.$sanpham['Anh2'].'" data-imagezoom="true" class="img-responsive"> </div>
										</li>
										<li data-thumb="'.$sanpham['Anh3'].'">
											<div class="thumb-image">
												<img src="'.$sanpham['Anh3'].'" data-imagezoom="true" class="img-responsive"> </div>
										</li>
									</ul>
									';
								} else {
									echo 'Không tồn tại sản phẩm';
								}
								
							?>
							
						</div>
					</div>
					<div class="col-md-7 single-top-left simpleCart_shelfItem">
						<?php 
							if(isset($sanpham)) {
								echo 
								'
								<h1>'.$sanpham['Ten'].'</h1>
								<h6 class="item_price">'.$sanpham['Gia'].'</h6>
								<p>'.$sanpham['MoTa'].'</p>
								';
							}
						?>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="singlepage-product">
					<h4 class="text-center">Sản phẩm cùng loại</h4>
					<br>
					<?php
						if(isset($the_loai_id)) {
							$sql_get_san_pham_cung_loai = "SELECT * FROM sanpham WHERE (TheLoaiId='$the_loai_id') AND (Id != '$san_pham_id');";
							if($db->num_rows($sql_get_san_pham_cung_loai)) {
								foreach ($db->fetch_assoc($sql_get_san_pham_cung_loai) as $key => $sanpham) {
									// Hiển thị 3 sản phẩm thôi
									if($key > 3) break;
									echo 
									'
									<div class="col-md-3 home-grid">
										<div class="home-product-main">
											<div class="home-product-top">
												<a href="single.php?theloai='.$sanpham['TheLoaiId'].'&sanpham='.$sanpham['Id'].'">
													<img src="'.$sanpham['Anh1'].'" alt="" class="img-responsive zoom-img">
												</a>
											</div>
											<div class="home-product-bottom">
												<h3>
													<a href="single.php?theloai='.$sanpham['TheLoaiId'].'&sanpham='.$sanpham['Id'].'">'.$sanpham['Ten'].'</a>
												</h3>
												<p>Khám phá ngay</p>
											</div>
											<div class="srch">
												<span>'.$sanpham['Gia'].'</span>
											</div>
										</div>
									</div>
									';
								}
							}
						}
					?>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
	<!--single end here-->

<?php
    require_once 'layouts/footer.php'; 
?>
