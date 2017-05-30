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
            <?$is_logged_in = $this->session->userdata('is_logged_in');?>
            <?if($is_logged_in):?>
                <li role="presentation"><a href="<?php echo base_url(); ?>index.php/login/logout">Logout</a></li>
            <?else:?>
                <li role="presentation"><a href="<?php echo base_url('/index.php/login');?>">Login</a></li>
                <li role="presentation"><a href="<?php echo base_url('/index.php/signup');?>">Sigup</a></li>
            <?endif;?>
          </ul>
        </nav>
        <h3 class="text-muted">Travel Guide</h3>
      </div>
     </div> <!-- /container -->

      <div class="jumbotron">
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
                          <div class="row">
                            <div class="col-sm-5 col-md-5">
                                <label for="location">Location</label>
                                  <select class="form-control" name='location'>
                                      <option value="0">--Select Location--</option>
                                    <?foreach($location as $locationRow):?>
                                      <option value="<?=$locationRow['id']?>" <?if($selectedlocation == $locationRow['id']):?>selected<?endif;?>><?=$locationRow['location']?></option>
                                    <?endforeach;?>
                                  </select>

                            </div>
                            <div class="col-sm-5 col-md-5">
                                <label for="language">Language</label>
                                  <select class="form-control" name='language_id'>
                                      <option value="0">--Select Language--</option>
                                    <?foreach($languages as $languageRow):?>
                                      <option value="<?=$languageRow['id']?>" <?if($selectedlanguage == $languageRow['id']):?>selected<?endif;?>><?=$languageRow['language']?></option>
                                    <?endforeach;?>
                                  </select>

                            </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-5 col-md-5">
                                <label for="price">Fee</label>
                                  <select class="form-control" name='price' id="price">
                                      <option value="0">--Select Fees--</option>
                                      <option value="1" <?if($this->input->post('price') == "1"):?>selected <?endif;?>>< 500</option>
                                      <option value="2" <?if($this->input->post('price') == "2"):?>selected <?endif;?>>501-1000</option>
                                      <option value="3" <?if($this->input->post('price') == "3"):?>selected <?endif;?>>1001-2000</option>
                                      <option value="4" <?if($this->input->post('price') == "4"):?>selected <?endif;?>>2001-3000</option>
                                      <option value="5" <?if($this->input->post('price') == "5"):?>selected <?endif;?>>3001-4000</option>
                                      <option value="6" <?if($this->input->post('price') == "6"):?>selected <?endif;?>>4001-5000</option>
                                      <option value="7"> <?if($this->input->post('price') == "7"):?>selected <?endif;?>> 5000</option>
                                    
                                  </select>

                            </div>
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
          <?if(count($guideRowset)>0):?>
            <?foreach($guideRowset as $guideRow):?>
            <?php echo form_open('bookings/book') ?>
              <div class="col-sm-6 col-md-3">
                  <input type="hidden" name="guide_id" value="<?=$guideRow['user_id']?>">
                  <input type="hidden" name="location_id" value="<?=$guideRow['location_id']?>">
                <div class="thumbnail" style='min-height: 255px'>
                  <div class="caption">
                    <h3><?=$guideRow['firstname'].' '.$guideRow['lastname'];?></h3>
                    <p><?=$guideRow['about_me']?></p>
                    <p><b>Email:</b><?=$guideRow['email']?></p>
                    <p><b>Views:</b><?=$guideRow['views']?></p>
                    <p><b>Language proficiency:</b><?=$guideRow['language']?></p>
                    <p><b>Location:</b><?=$guideRow['location']?></p>
                    <p><b>Contact Number:</b><?=$guideRow['phone']?></p>
                    <p><input type="submit" value="Book Now" class="btn btn-primary" >
                        <button type="button" value="Price" class="btn btn-success" style="min-width:80px">₹&nbsp;<?=$guideRow['price']?></button></p>
                  </div>
                </div>
              </div>
          </form>
            <?endforeach;?>
        <?else:?>
        <div class="col-sm-10 col-md-10">
            <div class="thumbnail" style='text-align: center;color: red'>
                <style>
                .footer {
                    position: absolute;
                    right: 25%;
                    bottom: 8%;
                    left: 13%;
                    padding: 1rem;
                    padding-right: 0;
                    padding-left: 0;
                }
                </style>
                Sorry! There is no Guide available at this location
            </div>
        </div>
        <?endif;?>
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
