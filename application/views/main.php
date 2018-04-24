<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Kruthi </title>
	<meta name="description" content="kruthi, e book,  sri Lanka, admin, flat ui, "/>
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
	<script type="text/javascript">
		function search_q_fnc(){
			$.post("<?php echo BASE;?>welcome/getSearch_api",
			  {
				  q:$('#search_q').val()


			  },
			  function(data, status){
				//console.log(data);
				$('#main_table_view').html(data);


			  });   
	
	
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

				<div class="navbar-form navbar-left m-t-sm" role="search">
					<div class="form-group">
						<div class="input-group input-s">
							<input type="text" id="search_q" class="form-control input-sm no-border dk text-white" placeholder="Search">
							<span class="input-group-btn">
                <button type="button" class="btn btn-sm btn-primary btn-icon" onClick="search_q_fnc()"><i class="fa fa-search"></i></button>
              </span>
						
						</div>
					</div>
				</div>
				<ul class="nav navbar-nav navbar-right">

					<li class="dropdown">
						<a href="#" class="dropdown-toggle aside-sm dker" data-toggle="dropdown">
              
              <?php echo $this->data['logUser']; ?><b class="caret"></b>
            </a>
					
						<ul class="dropdown-menu animated fadeInLeft">

							


							<li>
								<a onclick="signOut();">Logout</a>
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

										<li class="active">
											<a href="<?php echo BASE;?>">
                        <i class="fa fa-book"></i>
                        <span>Books</span>
                      </a>
										
										</li>

										<li>
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
					<div id="main_table_view" class="wrapper">
						
						<div style="height: 5px"></div>
	  
						<table class="table table-striped b-t text-sm panel">
							<thead>
								<tr>
									
									<th>Name</th>
									<th>Price</th>
									<th>category</th>
									<th>Author</th>
									<th>Edit</th>
									
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ( $allbook as $book ) {
									?>
								<input type="hidden" name="id" class="form-control" id="<?php echo $book['id']; ?>" value="" >
								<input type="hidden" name="id" class="form-control" id="<?php echo $book['publishers_id']; ?>" value="" >
								<input type="hidden" name="id" class="form-control" id="<?php echo $book['cat_id']; ?>" value="" >
						<tr style="cursor:pointer" data-toggle="modal" data-target="#myModal" onClick="edit_book_details('<?php echo $book['id']; ?>','<?php echo $book['name_en']; ?>','<?php echo $book['name_si']; ?>','<?php echo $book['name_ta']; ?>','<?php echo $book['price']; ?>','<?php echo ASSETS.'uploads/cover/'.$book['cover_photo']; ?>','<?php echo $book['cat_id']; ?>','<?php echo $book['publishers_id']; ?>','<?php echo ASSETS.			'uploads/pdf/'.$book['pdfbook']; ?>','<?php echo $book['encryptedfile']; ?>')">
									
									<td>
										<?php echo $book['name_en']; ?>
									</td>
									<td>
										<?php echo $book['price']; ?>
									</td>
									<td>
										<?php echo $book['cat_name_en']; ?>
									</td>
									<td>
										<?php echo $book['publishers_name']; ?>
									</td>
									<td>
										<a class="active"><i class="fa fa-edit text-success text-active"></i></a>
									</td>
									
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<center>
							<ul class="pagination pagination-sm" style="display:<?PHP if($pagination_data['pages']==1 || $pagination_data['pages']=='')echo 'none';?>">
								<li class="page-item">
									<a class="page-link" href="<?PHP echo $current_url.'?page='.$pagination_data['previous_page'];?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                    </a>
								
								</li>
								<?PHP for($i=$pagination_data['start_page'];$i<=($pagination_data['start_page']+4);$i++){?>
								<li class="page-item "><a class="page-link " href="<?PHP echo $current_url.'?page='.$i;?>" <?PHP if($i==$pagination_data[ 'page'])echo 'class="active"'?>><?PHP echo $i;?></a>
								</li>
								<?PHP if($i==$pagination_data['pages'] ) break; ?>
								<?PHP }?>
								<li class="page-item">
									<a class="page-link" href="<?PHP echo $current_url.'?page='.$pagination_data['next_page'];?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                    </a>
								
								</li>
							</ul>

						</center>






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



	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<center>
						<h4 class="modal-title">Edit Book</h4>
					</center>
				</div>
				<div class="modal-body">
				
			
            
				<form action="<?php echo BASE;?>welcome/updatebookfile" method="post" enctype="multipart/form-data">
				<table>
					<tbody>
						<tr>
							<td>
					<input type="hidden" name="edit_file_id" class="form-control" id="edit_file_id" value="" required>
							<div style="width:400px">
						<center><div id="au">		
						<img id="selectedImage" src="" onError="this.onerror=null;this.src='<?php echo ASSETS;?>images/log.png';"  />
						</div></center>
						<br>
						
						
						
						
						
						<div class="form-group ">
						<label >Cover Photo</label>
						
						<br>
						<label class="btn btn-success btn-sm" >
						<input  type="file" style="display:none" name="cover_photo" class="form-control " value="" id="cover_photo"
						onchange="ch(this.files[0].name)">
						Browse
						</label>
						<span class='label label-info' id="upload-file-info"></span>
						
						
						
						
						<!--<input type="file" name="cover_photo" class="form-control " value="" id="cover_photo" onchange="ch()" >-->
						</div>
						<div class="form-group ">
						<label >PDF Book</label><br>
						
						
						
						<label class="btn btn-success btn-sm" >
						<input  type="file" style="display:none" name="pdfbook" class="form-control" value="" id="pdfbook"
						onchange="$('#upload-file-info2').html(this.files[0].name)">
						Browse
						</label>
						<span class='label label-info' id="upload-file-info2"></span>
						
						
						
						<!--<input type="file" name="pdfbook" class="form-control" value="" id="pdfbook" >-->
						</div>
						<div class="form-group ">
						<label >Encrypted Book</label>
						
						<br>
						
						
						
						<label class="btn btn-success btn-sm" >
						<input  type="file" style="display:none" name="encryptbook" class="form-control" value="" id="encryptedfile" 
						onchange="$('#upload-file-info3').html(this.files[0].name)">
						Browse
						</label>
						<span class='label label-info' id="upload-file-info3"></span>
						
						
						
						
						
						<!--<input type="file" name="encryptbook" class="form-control" value="" id="encryptedfile" >-->
						</div>

						</div>	
						
							</td>
							
					
							<td><div style="width: 50px;"></div></td>
							
							
							
				
							<td>
								
						<div class="form-group ">
							<label>Name in English:</label>
							<input type="text" name="name_en" class="form-control " id="name_en" value="" required>
						</div>
						
						<div class="form-group ">
							 <label >Name in සිංහල:</label>
							 <input type="text" name="name_si" class="form-control" id="name_si" required>
						</div>
						<div class="form-group ">
							 <label >Name in தமிழில்:</label>
							 <input type="text" name="name_ta" class="form-control" id="name_ta" required>
						</div>

						<div class="form-group ">
							<label>Price:</label>
							<input type="text" name="price" class="form-control" id="price" value="" required>
						</div>
						
						<div class="form-group">
							<label for="pub">Publisher:</label>
							<select class="form-control" name="publishers_id" id="publisher_id" >
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
							<label for="cat">categories:</label>
							<select class="form-control" name="cat_id" id="cat_id">
								
								<?php
								
									foreach ( $cat as $categories ) {
								?>
								<option value="<?php echo $categories['id']; ?>"  >
									<?php echo $categories['name_en']; ?>
								</option>
								<?php } ?>
							</select>
						</div>
						<br>
						<div >
							<button type="submit" class="btn btn-primary">Save</button>
							<a  class="btn btn-success " data-dismiss="modal" data-toggle="modal" data-target="#myModal2">View Book </a>
							
						</div>
							</td>
							</form>
						</tr>
					</tbody>
				</table>
				
				</div>
				
			</div>
		</div>
	</div>
	</div>



<!-- Modal2 -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Book Reader</h4>
        </div>
        <div class="modal-body">
          
  <center>
    <iframe id="pdfbook_view"width="70%" height="400px" class="embed-responsive-item" src=""></iframe>
  </center>
			

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
		function ch(qa) {
			$('#upload-file-info').html(qa);
			var files = ( $( "#cover_photo" ) )[ 0 ].files;
			if ( FileReader && files && files.length ) {
				var fr = new FileReader();
				fr.onload = function ( event ) {

					var data = event.target.result;
					//console.log( data );
					$( "#selectedImage" ).attr( 'src', data );
				};
				fr.readAsDataURL( files[ 0 ] );
			}

		}
	
	
	
	
	
	function edit_book_details(id, name_en, name_si, name_ta, price,cover_photo, cat_id, publisher_id,pdfbook,encryptedfile){
			
			
			
			
		
			document.getElementById("edit_file_id").value =id;
		
			document.getElementById("name_en").value =name_en;
		
			document.getElementById("name_si").value =name_si;
		
			document.getElementById("name_ta").value =name_ta;
		
			document.getElementById("price").value =price;
		
			document.getElementById("selectedImage").src =cover_photo;
			
			
			document.getElementById("cat_id").value =cat_id;
		
			document.getElementById("publisher_id").value =publisher_id;
			document.getElementById("pdfbook_view").src =pdfbook;
			document.getElementById("encryptedfile").value =encryptedfile;
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