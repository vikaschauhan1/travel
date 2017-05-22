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
            <li role="presentation" class="active"><a href="">Home</a></li>
            <li role="presentation"><a href="<?php echo base_url('/index.php/login');?>">Login</a></li>
            <li role="presentation"><a href="<?php echo base_url('/index.php/signup');?>">Sigup</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Travel Guide</h3>
      </div>
     </div> <!-- /container -->

      <div class="jumbotron" style="height: 300px;">
        <div class="container">
              <div class="row">
                  <div class="col-sm-6 col-md-7">
                      <h3>Welcome and have a nice trip</h3>
                  </div>
                <?php echo form_open('') ?>
                  <div class="col-sm-6 col-md-5 search_box">
                          <h4>Search</h4>
                          <hr>
                          <input type="hidden" name="search" value="1">
                          <div class="col-sm-5 col-md-5">
                              <label for="location">Location</label>
                                <select class="form-control" name='location'>
                                    <option>--Select Location--</option>
                                  <?foreach($location as $locationRow):?>
                                    <option value="<?=$locationRow['id']?>" <?if($selectedlocation == $locationRow['id']):?>selected<?endif;?>><?=$locationRow['location']?></option>
                                  <?endforeach;?>
                                </select>

                          </div>

                          <div class="col-sm-12 col-md-12"><hr>
                        		<button type="submit" id="search" class="btn btn-success" value="submit"><span class="icon-search"></span> Check available tours</button>
                          </div>
                  </div>
              </form>
              </div>
        </div>
      </div>

      <div class="container">
      <div class="row">
        <?foreach($guideRowset as $guideRow):?>
          <div class="col-sm-6 col-md-3">
            <div class="thumbnail" style='height: 255px'>
              <div class="caption">
                <h3><?=$guideRow['firstname'].' '.$guideRow['lastname'];?></h3>
                <p><?=$guideRow['about_me']?></p>
                <p><b>Email:</b><?=$guideRow['email']?></p>
                <p><b>Contact Number:</b><?=$guideRow['phone']?></p>
                <p><a href="#" class="btn btn-primary" role="button">Book Now</a></p>
              </div>
            </div>
          </div>
        <?endforeach;?>
          
        </div>
      <footer class="footer">
        <p>&copy; Travel Guide 2017</p>
      </footer>
    </div> <!-- /container -->
    <script src="<?php echo base_url(); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/docs.min.js"></script>
     <script src="<?php echo base_url(); ?>/js/moment.js"></script>
     <script src="<?php echo base_url(); ?>/js/datetimepicker.js"></script>

  </body>
</html>
