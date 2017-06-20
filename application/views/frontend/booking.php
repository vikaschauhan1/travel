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
        <h3 class="text-muted">Travel Guide</h3>
      </div>
     </div> <!-- /container -->
    
        <div class="col-md-4 col-md-offset-4 well">
        <?php echo form_open('bookings/book'); ?>
          <legend>Booking</legend>
          <div class="col-sm-6 col-md-10">
                <input type="hidden" name="guide_id" value="<?=$guide_id?>">
              <div class="form-group">
                <label for="Location">Selected Location</label>
                <select class="form-control" id="locationId" name="location_id">
                    <option value="<?=isset($locationRow->id) ? $locationRow->id : ''?>" selected='true'><?=isset($locationRow->location) ? $locationRow->location : ''?></option>
                </select>
              </div>
              <div class="form-group">
                <label for="bookingDetail">Booking Detail</label>
                <textarea class="form-control" id="bookingDetail" placeholder="Booking Detail" name="booking_detail" value="<?php echo isset($bookingDetail) ? $bookingDetail : '' ?>"><?php echo isset($bookingDetail) ? $bookingDetail : '' ?></textarea>
                <?php echo form_error('booking_detail'); ?>
              </div>                                         
              <div class="form-group">
                <label>Booking date<span class="text-muted"></span></label>
                  <div class="form-group date" id="datepicker1">
                     <input type="text" class="form-control" name="booking_date" id="booking_date" data-date-format="YYYY-MM-DD" value="<?php echo set_value('booking_date'); ?>">
                      <span class="input-group-addon"><span class="icon-calendar"></span></span>
                      <script type="text/javascript">
                          $(function () {
                            $('#datepicker1').datetimepicker({
                              pickTime: false,
                              useCurrent: false
                            });
                          });
                      </script>
                  </div>
                <?if($bookingPage):?>
                    <?php echo form_error('booking_date'); ?>
                <?endif;?>
              </div>
              <div class="form-group">
                <label for="number_of_persons">Number Of Persons</label>
                <input type="number" class="form-control" id="number_of_persons" name="number_of_persons" value="<?php echo isset($numberOfPerson) ? $numberOfPerson : 0 ?>">
                <?php echo form_error('number_of_persons'); ?>
              </div>
              <div class="form-group">
                <label for="number_day_night">Number Of Day/Night</label>
                <input type="number" class="form-control" id="number_of_persons" name="number_day_night" value="<?php echo isset($numberOfDaynight) ? $numberOfDaynight : 0; ?>">
                <?php echo form_error('number_day_night'); ?>
              </div>
              <div class="form-group">
                <label for="hotel_booking">Hotel Booking</label>&nbsp;
                <input type="radio" class=""  name="hotel_booking" value="1" <?if(set_value('hotel_booking') == 1):?> checked="checked"<?endif;?>>Yes
                <input type="radio" class=""  name="hotel_booking" value="0" <?if(set_value('hotel_booking') == 0):?> checked="checked"<?endif;?>>No
                
              </div>
                <div class="form-group" style='margin-left: 32%;'>
                    <a class="btn btn-danger" href='../' type='button'>Cancel </a>&nbsp;
                    <input type="submit" class="btn btn-success" value="Submit">
                </div>
              <div class="form-group">
              <?php
                if ($this->session->flashdata('message') != '') echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('message') . '</div>';
              ?>
                <input type="hidden" name="bookingPage" value="1">
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
