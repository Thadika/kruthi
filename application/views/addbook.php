<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Kruthi </title>
	<meta name="description" content="kruthi, e book, , sri Lanka, admin, flat ui, "/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<link rel="stylesheet" href="<?php echo ASSETS;?>css/bootstrap.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo ASSETS;?>css/animate.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo ASSETS;?>css/font-awesome.min.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo ASSETS;?>css/font.css" type="text/css" cache="false"/>
	<link rel="stylesheet" href="<?php echo ASSETS;?>css/plugin.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo ASSETS;?>css/app.css" type="text/css"/>
	<!--[if lt IE 9]>
    <script src="js/ie/respond.min.js" cache="false"></script>
    <script src="js/ie/html5.js" cache="false"></script>
    <script src="js/ie/fix.js" cache="false"></script>
  <![endif]-->
  <script type="text/javascript">
  
  function signOut() {
              
                  location.href="<?php echo BASE;?>loginc/logout" ;
                 }

</script>

<style type="text/css">
	 #au {
         width: 200px;
         height: 200px;
         overflow: hidden;
         border: 1px solid black;
         }
         #au img {
         width: 100%;
         min-height: 100%;
         }
	</style>
</head>

<body>
	<section class="vbox">
		<header class="header bg-black navbar navbar-inverse pull-in">
			<div class="navbar-header nav-bar aside dk">
				<a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-primary">
          <i class="fa fa-bars"></i>
        </a>
			
				<a style="font-size: 18px" href="<?php echo BASE;?>" class="nav-brand"><img src="<?php echo ASSETS;?>images/Kruthi-icon.png"> Dashboard</a>
				<a class="btn btn-link visible-xs" data-toggle="collapse" data-target=".navbar-collapse">
          <i class="fa fa-comment-o"></i>
        </a>
			
			</div>
			<div class="collapse navbar-collapse">


				<ul class="nav navbar-nav navbar-right">

					<li class="dropdown">
						<a href="#" class="dropdown-toggle aside-sm dker" data-toggle="dropdown">
             
              <?php echo $this->data['logUser']; ?> <b class="caret"></b>
            </a>
					
						<ul class="dropdown-menu animated fadeInLeft">

							<li>
								<a onclick="signOut();" >Logout</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</header>
		<section>
			<section class="hbox stretch">
				<aside class="aside bg-dark dk" id="nav">
					<section class="vbox">
						<section class="scrollable">
							<div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px">
								<nav class="nav-primary hidden-xs" data-ride="collapse">
									<ul class="nav">

										<li >
											<a href="<?php echo BASE;?>">
                        <i class="fa fa-book"></i>
                        <span>Books</span>
                      </a>
										
										</li>

										<li class="active">
											<a href="<?php echo BASE;?>welcome/addbookview">
                        <i class="fa fa-pencil"></i>
                        <span>Add Book</span>
                      </a>
										
										</li>
										<li>
											<a href="<?php echo BASE;?>welcome/purchases">
                        <i class="fa fa-money"></i>
                        <span>Purchases</span>
                      </a>
										
										</li>

									</ul>
								</nav>
							</div>
						</section>
					</section>
				</aside>
				<section>
					<div class="wrapper">
						<div style="height: 5px"></div>
						<form action="<?php echo BASE;?>welcome/addbook" method="post" enctype="multipart/form-data">

							<table class="table">

								<tbody>
									<tr>
										<div class="row">
											<div class="col-md-06">
												<td>
													<div style="width:200px">
														<div id="au">
														<img id="selectedImage" src="" onError="this.onerror=null;this.src='<?php echo ASSETS;?>images/log.png';"/>
														</div>
														<div style="height: 20px"></div>

														<div class="form-group ">
															<label for="file">Cover Photo</label>
															<input type="file" name="cover_photo" class="form-control" id="file" onchange="ch()" required>
														</div>
														<div class="form-group ">
															<label for="book">PDF Book</label>
															<input type="file" name="pdfbook" class="form-control" id="book" required>
														</div>
														<div class="form-group ">
															<label for="en">Encrypted Book</label>
															<input type="file" name="encryptbook" class="form-control" id="en" required>
														</div>




													</div>
												</td>
											</div>
											
											<div class="col-md-06">
											<div style="width: 50px;"></div>
												<td>
													<div class="form-group ">
														<label for="en">Name in English:</label>
														<input type="text" name="name_en" class="form-control" id="en" required>
													</div>
													<div class="form-group ">
														<label for="si">Name in සිංහල:</label>
														<input type="text" name="name_si" class="form-control" id="si" required>
													</div>
													<div class="form-group ">
														<label for="ta">Name in தமிழில்:</label>
														<input type="text" name="name_ta" class="form-control" id="ta" required>
													</div>

													<div class="form-group ">
														<label for="price">Price:</label>
														<input type="text" name="price" class="form-control" id="price" required>
													</div>

													<div class="form-group">
														<label for="pub">Select Publisher:</label>
														<select class="form-control" name="pub_id" id="pub" required>
															<?php
															foreach ( $pub as $Publisher ) {
																?>
															<option value="<?php echo $Publisher['id']; ?>">
																<?php echo $Publisher['name_en']; ?>
															</option>
															<?php } ?>

														</select>
													</div>

													<div class="form-group">
														<label for="cat">Select categories:</label>
														<select class="form-control" name="cat_id" id="cat" required>
															<?php
															foreach ( $cat as $categories ) {
																?>
															<option value="<?php echo $categories['id']; ?>">
																<?php echo $categories['name_en']; ?>
															</option>
															<?php } ?>
														</select>
													</div>
													

												</td>
											</div>
										</div>
									</tr>

								</tbody>
							</table>
							<div style="margin-left:440px">
								<button type="submit" class="btn btn-primary">Save</button>
								<button type="reset" class="btn btn-primary">Reset</button>

							</div>


						</form>

					</div>
					</div>
				</section>

			</section>
		</section>

		<!--<footer class="footer bg-dark" style="position: fixed; bottom: 0;">
			<br>
			<center>
				<p>© 2018 GGSLK. All rights reserved</p>
			</center>
		</footer>-->
	</section>

	<script type="text/javascript">
		function ch() {

			var files = ( $( "#file" ) )[ 0 ].files;
			if ( FileReader && files && files.length ) {
				var fr = new FileReader();
				fr.onload = function ( event ) {

					var data = event.target.result;
					console.log( data );
					$( "#selectedImage" ).attr( 'src', data );
				};
				fr.readAsDataURL( files[ 0 ] );
			}

		}
	</script>
	<script src="<?php echo ASSETS;?>js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo ASSETS;?>js/bootstrap.js"></script>
	<!-- Sparkline Chart -->
	<script src="<?php echo ASSETS;?>js/charts/sparkline/jquery.sparkline.min.js"></script>
	<!-- App -->
	<script src="<?php echo ASSETS;?>js/app.js"></script>
	<script src="<?php echo ASSETS;?>js/app.plugin.js"></script>
	<script src="<?php echo ASSETS;?>js/app.data.js"></script>
	<script src="<?php echo ASSETS;?>js/slimscroll/jquery.slimscroll.min.js" cache="false"></script>
	<!-- Sparkline Chart -->
	<script src="<?php echo ASSETS;?>js/charts/sparkline/jquery.sparkline.min.js"></script>
	<!-- Easy Pie Chart -->
	<script src="<?php echo ASSETS;?>js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
	<!-- Morris -->
	<script src="<?php echo ASSETS;?>js/charts/morris/raphael-min.js" cache="false"></script>
	<script src="<?php echo ASSETS;?>js/charts/morris/morris.min.js" cache="false"></script>
</body>

</html>