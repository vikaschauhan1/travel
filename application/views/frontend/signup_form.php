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

    <title>Travel Guide</title>

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
            <li role="presentation"><a href="/index.php">Home</a></li>
            <li role="presentation"><a href="<?php echo base_url('/index.php/login');?>">Login</a></li>            
            <li role="presentation"  class="active"><a href="<?php echo base_url('/index.php/signup');?>">Signup</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Travel Guide</h3>
      </div>
     </div> <!-- /container -->
        <div class="col-md-4 col-md-offset-4 well">
        <?php echo form_open('signup/add_user'); ?>
          <legend>Signup</legend>
            <div class="col-sm-6 col-md-10">
              <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname" value="<?php echo set_value('firstname'); ?>">
                <?php echo form_error('firstname'); ?>
              </div>
              <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" value="<?php echo set_value('lastname'); ?>">
                <?php echo form_error('lastname'); ?>
              </div>        
              <div class="form-group">
                <label for="company_currency">Signup As</label>
                <select class="form-control" id="role" name="role">
                <option value="0" <?if(set_value('role') == 0):?> selected="true" <?endif;?>>Select Your Role</option>
                <option value="1" <?if(set_value('role') == 1):?> selected="true" <?endif;?>>User</option>
                <option value="2" <?if(set_value('role') == 2):?> selected="true" <?endif;?>>Guide</option>  
                </select>
                <?php echo form_error('role'); ?>
              </div>
              <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" placeholder="Email Id" name="email" value="<?php echo set_value('email'); ?>">
                <?php echo form_error('email'); ?>
              </div>                                         
              <div class="form-group">
                <label for="phone">Phone number</label>
                <input type="text" class="form-control" id="phone" placeholder="Phone Number" name="phone" maxlength="10" value="<?php echo set_value('phone'); ?>">
                <?php echo form_error('phone'); ?>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter Any Password" name="password" value="<?php echo set_value('password'); ?>">
                <?php echo form_error('password'); ?>
              </div>
              <div class="form-group">
                <label for="passagain">Confirm Password</label>
                <input type="password" class="form-control" id="passagain" placeholder="Please Confirm Password" name="passagain" value="<?php echo set_value('passagain'); ?>">
                <?php echo form_error('passagain'); ?>
              </div>              
              <button type="submit" class="btn btn-success" value="submit"><span class="icon-checkmark"></span> Signup  </button>
              <div class="form-group">
              <?php
                if ($this->session->flashdata('message') != '') echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('message') . '</div>';
              ?>
              </div> 
            </div>
          </form>
         </div> 
    <script src="<?php echo base_url(); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/docs.min.js"></script>
     <script src="<?php echo base_url(); ?>/js/moment.js"></script>
     <script src="<?php echo base_url(); ?>/js/datetimepicker.js"></script>

  </body>
</html>        
