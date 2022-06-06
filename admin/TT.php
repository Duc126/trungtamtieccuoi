<?php
session_start();
if (!isset($_SESSION["user"])) {
	header("location:index.php");
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>ADMIN </title>

	<link href="assets/css/bootstrap.css" rel="stylesheet" />

	<link href="assets/css/font-awesome.css" rel="stylesheet" />

	<link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />

	<link href="assets/css/custom-styles.css" rel="stylesheet" />

	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<body>
	<div id="wrapper">
		<nav class="navbar navbar-default top-navbar" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="home.php"> <?php echo $_SESSION["user"]; ?> </a>
			</div>

			<ul class="nav navbar-top-links navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
						<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> THÔNG TIN NGƯỜI DÙNG</a>
						</li>
						<li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> CÀI ĐẶT</a>
						</li>
						<li class="divider"></li>
						<li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> ĐĂNG XUẤT</a>
						</li>
					</ul>

				</li>

			</ul>
		</nav>

		<nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">

					<li>
						<a class="active-menu" href="home.php"><i class="fa fa-dashboard"></i> TÌNH TRẠNG</a>
					</li>
					<li>
						<a href="messages.php"><i class="fa fa-desktop"></i> TIN TỨC</a>
					</li>
					<li>
						<a href="roombook.php"><i class="fa fa-bar-chart-o"></i>PHÒNG KHÁCH ĐẶT</a>
					</li>
					<li>
						<a href="payment.php"><i class="fa fa-qrcode"></i> THANH TOÁN</a>

					</li>
					<li>
						<a href="TT.php"><i class="fa fa-qrcode"></i> THÊM THÔNG BÁO</a>
					</li>
					<li>
						<a href="profit.php"><i class="fa fa-qrcode"></i> THỐNG KÊ</a>
					</li>
					<li>
						<a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> ĐĂNG XUẤT</a>
					</li>




				</ul>

			</div>

		</nav>
		<!-- /. NAV SIDE  -->
		<div id="page-wrapper">
			<div id="page-inner">


				<div class="row">
					<div class="col-md-12">
						<h1 class="page-header">
							Thông Báo Tin Tức
						</h1>
					</div>
				</div>

				

				<div class="container-fluid">

					<div class="col-lg-12">
						<div class="row mb-4 mt-4">
							<div class="col-md-12">

							</div>
						</div>
						<div class="row">
							<!-- FORM Panel -->

							<!-- Table Panel -->
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h2>Danh Sách</h2><br>
										<span class=" float-right"><a class="btn btn-primary" href="addnew.php" id="new_venue">
												<i class="fa fa-plus"></i> Thêm Mới
											</a></span>
									</div>
									<div class="card-body">
										<table id="mytable" class="table table-condensed table-bordered table-hover">
							
											<thead>
							
											<tbody>
												<?php

												include("db.php");
												$result = mysqli_query($con, "SELECT * FROM new");

												if (mysqli_num_rows($result) > 0) {
												?>
													<thead>

														<tr>
															<th class="text-center">#</th>
															<th class="text-center">Tên</th>
															<th class="text-center">Nội Dung</th>
															<th class="text-center">Thông Tin</th>

															<th class="text-center">Action</th>
														</tr>
													</thead>
													<?php
													$i = 0;
													while ($row = mysqli_fetch_array($result)) {
													?>
														<tr>
															<td class="text-center"><?php echo $row["id"]; ?></td>
															<td class="text-center"><?php echo $row["fname"]; ?></td>
															<td class="text-center"><?php echo $row["noidung"]; ?></td>
															<td class="text-center"><?php echo $row["thongtin"]; ?></td>
															<td class="text-center">
																<a href="updatenew.php?id<?php echo $row["id"]; ?>"> <button class="  btn btn-primary">Update</button></a>
															
															</td>
															<td>	<a href="deletenew.php?id=<?php echo $row["id"]; ?>"><button class="  btn btn-danger">Delete</button></a>

															</td>
														</tr>
													<?php
														$i++;
													}
													?>
										</table>
									<?php
												} else {
													echo "Không có kết quả nào";
												}
									?>


									</tbody>
									</table>
									</div>
								</div>
							</div>
							<!-- Table Panel -->
						</div>
					</div>

				</div>
				<style>
					td {
						vertical-align: middle !important;
					}

					td p {
						margin: unset
					}
				</style>
				


			</div>

		</div>

	</div>

	<script src="assets/js/jquery-1.10.2.js"></script>

	<script src="assets/js/bootstrap.min.js"></script>

	<script src="assets/js/jquery.metisMenu.js"></script>

	<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
	<script src="assets/js/morris/morris.js"></script>
	<script src="assets/js/custom-scripts.js"></script>


</body>

</html>