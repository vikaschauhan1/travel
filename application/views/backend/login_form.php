<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

   <title><?php echo $title; ?> | Travel Guide</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/datetimepicker.min.css" rel="stylesheet">

    <!-- METRO UI CSS 2.0 FONTS -->
    <link href="http://localhost/tripexpress/css/iconFont.min.css" rel="stylesheet">

    <!-- Login form CSS -->
    <link href="<?php echo base_url(); ?>css/frontend.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url(); ?>js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/notify/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/notify/bootbox.min.js"></script>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation"><a href="<?php echo base_url();?>">Home</a></li>
            <li role="presentation" class="active"><a href="<?php echo base_url('/index.php/login');?>">Login</a></li>            
            <li role="presentation" ><a href="<?php echo base_url('/index.php/signup');?>">Signup</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Travel Guide</h3>
      </div>
    <?if($this->input->get('logout',0)):?>
        <script>
            var dialog = bootbox.dialog({ 
                size:"small",
                message: '<div class="text-center">Session out</div>',
                closeButton:false
            });
            function myFunction() {
                setTimeout(function(){
                    dialog.modal('hide');
                }, 2000);
            }
            myFunction();
        </script>
    <?endif;?>

     </div> <!-- /container -->	
			<?php $att = array('class' => 'form-signin');?>
			<?php echo form_open('login/validate_credentials', $att); ?>
            <?
                $booking = $this->input->get('is_booking',0);
                $guide_id = $this->input->get('guide',0);
                $location_id = $this->input->get('location',0);
            ?>
            <?if(isset($booking) && $booking):?>
                <input type="hidden" name="is_booking" value="1">
                <input type="hidden" name="guide_id" value="<?=$guide_id?>">
                <input type="hidden" name="location_id" value="<?=$location_id?>">
            <?endif;?>
		    <div class="col-md-4 col-md-offset-4 well">
          	 <?php echo form_open('signup/add_user'); ?>
             <legend>Please login</legend>
             <div class="col-sm-6 col-md-10">
				<input type="text" class="form-control" name="email" placeholder="Email ID" required="" autofocus="">
				<input type="password" class="form-control" name="password" placeholder="Password" required="">
				<p style="color: #FFF;"><?php echo $error ?></p>
				<button class="btn btn-lg btn-primary btn-block" type="submit">
					Sign In
				</button>
			</form>
	</body>
</html>
