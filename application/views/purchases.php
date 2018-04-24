<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Kruthi </title>
	<meta name="description" content="kruthi, e book,  sri Lanka, admin, flat ui, පොත්ගුල , පොත්"/>
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
			$.post("<?php echo BASE;?>welcome/getpurchases_api",
			  {
				  q:$('#search_q').val()


			  },
			  function(data, status){
				console.log(data);
				$('#purchases_view').html(data);


			  });   
	
	
			}
	
	function purchases_date(){
		
		$.post("<?php echo BASE;?>welcome/getpurchases_api_date",
			  {
				  q:$('#date_type').val()

			
			  },
			  function(data, status){
				console.log(data);
				$('#purchases_view').html(data);


			  });   
		
	}
	
	</script>
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
							<input type="text" id="search_q"class="form-control input-sm no-border dk text-white" placeholder="Search">
							<span class="input-group-btn">
                <button type="button" onClick="search_q_fnc()" class="btn btn-sm btn-primary btn-icon"><i class="fa fa-search"></i></button>
              </span>
						
						</div>
					</div>
				</div>
				
				<ul class="nav navbar-nav">
          
          <select style="margin-top: 6px" class="form-control m-b" name="date_type" id="date_type" onchange="purchases_date()">
                         
             			  <option  value="1" name="Today">Today</option>
                          <option  value="2" name="Yesterday">Yesterday</option>
                          <option  value="3" name="Last 7 days">Last 7 days</option>
                          <option  value="4" name="Last 30 days">Last 30 days</option>
                          <option  value="5" name="This month">This month</option>
                          <option  value="6" name="Last month">Last month</option>
                          <option  value="7" name="This year">This year</option>
                          <option  value="0" name="All time" selected="">All time</option>
            
          </select>
        </ul>
				
				
				<ul class="nav navbar-nav navbar-right">

					<li class="dropdown">
						<a href="#" class="dropdown-toggle aside-sm dker" data-toggle="dropdown">
              
              <?php echo $this->data['logUser']; ?> <b class="caret"></b>
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

										<li >
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
										<li class="active">
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
					<div class="wrapper" id="purchases_view" style="height: 100%">
						<div style="height: 5px"></div>
						
						<table class="table table-striped b-t text-sm panel">
							<thead>
								<tr>
									<th>Book Name</th>
									<th>User Name</th>
									<th>Device ID</th>
									<th>Number(msisdn)</th>
									<th>Amount</th>
									<th>Fee</th>
									<th>Net Amount</th>
									<th>Date</th>

								</tr>
							</thead>
							<tbody>
								<?php foreach($purchases as $purch){ ?>
								<tr>
									<td>
										<?php echo $purch['bookname_en']; ?>
									</td>
									<td>
										<?php echo $purch['user_name']; ?>
									</td>
									<td>
										<?php echo $purch['device_id']; ?>
									</td>
									<td>
										<?php echo $purch['msisdn']; ?>
									</td>
									<td>
										<?php echo $purch['amount']; ?>
									</td>
									<td>
										<?php echo $purch['net_amount']; ?>
									</td>
									<td>
										<?php echo $purch['fee']; ?>
									</td>
									<td>
										<?php echo $purch['date']; ?>
									</td>
								</tr>

								<?php }?>

							</tbody>
						</table>


						<center>

							<ul class="pagination pagination-sm" style="display:<?PHP if($pagination_data['pages']==1 || $pagination_data['pages']=='')echo 'none';?>">
								<li class="page-item">
									<a class="page-link" href="<?PHP echo $current_url.'/?page='.$pagination_data['previous_page'];?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                    </a>
								
								</li>
								<?PHP for($i=$pagination_data['start_page'];$i<=($pagination_data['start_page']+4);$i++){?>
								<li class="page-item "><a class="page-link " href="<?PHP echo $current_url.'/?page='.$i;?>" <?PHP if($i==$pagination_data[ 'page'])echo 'class="active"'?>><?PHP echo $i;?></a>
								</li>
								<?PHP if($i==$pagination_data['pages'] ) break; ?>
								<?PHP }?>
								<li class="page-item">
									<a class="page-link" href="<?PHP echo $current_url.'/?page='.$pagination_data['next_page'];?>" aria-label="Next">
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
		<!--<footer class="footer bg-dark">
			<br>
			<center>
				<p>© 2018 GGSLK. All rights reserved</p>
			</center>
		</footer>-->
	</section>
	
	
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