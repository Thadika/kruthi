<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Kruthi </title>
  <meta name="description" content="kruthi, e book, , sri Lanka, admin, flat ui, " />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="<?php echo ASSETS;?>css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ASSETS;?>css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ASSETS;?>css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ASSETS;?>css/font.css" type="text/css" cache="false" />
  <link rel="stylesheet" href="<?php echo ASSETS;?>css/plugin.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ASSETS;?>css/app.css" type="text/css" />
   <style type="text/css">
	   body{
		   background-color: #f2f2f0!important;
	   }
	
	</style>
  <!--[if lt IE 9]>#f2f2f0
    <script src="js/ie/respond.min.js" cache="false"></script>
    <script src="js/ie/html5.js" cache="false"></script>
    <script src="js/ie/fix.js" cache="false"></script>
  <![endif]-->
</head>
<body>
	<br>
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
   <center><img width="10%" src="<?php echo ASSETS;?>/images/Kruthi-icon.png"></center> 
    <div class="row m-n">
      <div class="col-md-4 col-md-offset-4 m-t-lg">
		  
        <section class="panel">
          
          <form action="<?php echo BASE;?>loginc/checklogin" method="post" class="panel-body">
            <div class="form-group">
              <label class="control-label">Email</label>
              <input type="email" name="email" placeholder="test@example.com" class="form-control" required>
            </div>
            <div class="form-group">
              <label class="control-label">Password</label>
              <input type="password"  name="password"  placeholder="Password" class="form-control" required>
            </div>
            
            
          <center>  <button type="submit" class="btn btn-info">Sign in</button></center>
           
           
          </form>
        </section>
      </div>
    </div>
  </section>
	<div style="height: 5px">
	             
	</div>
  <!-- footer -->
  <br>
  <footer id="footer">
    <div class="text-center padder clearfix">
      <p>
        <small>© 2018 GGSLK. All rights reserved.</small>
      </p>
    </div>
  </footer>
	<?php if(isset($err1)){ ?>
	
	
	<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
                <i class="fa fa-ban-circle"></i><center><strong><?php echo $err1;?></strong></center> 
              </div>
	
			<?php }?>
  <!-- / footer -->
	<script src="<?php echo ASSETS;?>js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo ASSETS;?>js/bootstrap.js"></script>
  <!-- app -->
  <script src="<?php echo ASSETS;?>js/app.js"></script>
  <script src="<?php echo ASSETS;?>js/app.plugin.js"></script>
  <script src="<?php echo ASSETS;?>js/app.data.js"></script>
</body>
</html>