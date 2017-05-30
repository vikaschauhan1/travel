        <div class="col-sm-10 col-md-11 main">
            <div class="row" >
            <div class="col-sm-12 col-md-12" style="padding-left:0px;">
                <h1 class="page-header">Account Setting</h1>
            </div>
          </div>
          <div class="row">
        <?php echo form_open('admin/settings') ?>
           <div class="col-sm-6 col-md-4">
              <div class="form-group">
              <?php
                if ($this->session->flashdata('message') != '') echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('message') . '</div>';
              ?>
              </div>        
          
               <input type="hidden" name="account_id" value="<?php echo $setting->id; ?>">
              <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname" value="<?php echo $setting->firstname; ?>">
                <?php echo form_error('firstname'); ?>
              </div>
              <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" value="<?php echo $setting->lastname; ?>">
                <?php echo form_error('lastname'); ?>
              </div>
              <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" placeholder="Email Id" name="email" value="<?php echo $setting->email; ?>">
                <?php echo form_error('email'); ?>
              </div>                                         
              <div class="form-group">
                <label for="phone">Phone number</label>
                <input type="text" class="form-control" id="phone" placeholder="Phone Number" name="phone" value="<?php echo $setting->phone; ?>">
                <?php echo form_error('phone'); ?>
              </div>
               <?if($this->session->userdata('role') == 2):?>
              <div class="form-group">
                <label for="dob">Date Of Birth</label>
                <div class="form-group date" id="datepicker1">
                    <input type="text" class="form-control" name="dob" id="dob" data-date-format="YYYY-MM-DD" value="<?php echo $setting->dob; ?>">
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
                <?php echo form_error('dob'); ?>
              </div>
              <div class="form-group">
                <label for="Adhar_no">Aadhar Number</label>
                <input type="text" class="form-control" id="Adhar_no" placeholder="Aadhar Number" name="Adhar_no" value="<?php echo $setting->Adhar_no; ?>">
                <?php echo form_error('Adhar_no'); ?>
              </div>
              <div class="form-group">
                <label for="licence_no">Licence Number</label>
                <input type="text" class="form-control" id="licence_no" placeholder="Licence Number" name="licence_no" value="<?php echo $setting->licence_no; ?>">
                <?php echo form_error('licence_no'); ?>
              </div>
               <?endif;?>
            </div>
              <div class="col-sm-6 col-md-4">
              <div class="form-group">
              </div>        
              <div class="form-group">
                <label for="home_airport">Home Airport</label>
                <input type="text" class="form-control" id="home_airport" name="home_airport" placeholder="Home Airport" value="<?php echo $setting->home_airport; ?>">
                <?php echo form_error('home_airport'); ?>
              </div>
              <div class="form-group">
                  <label for="street_address">Street Address</label>
                  <textArea class="form-control" id="street_address" placeholder="Street Address" name="street_address" value="<?php echo $setting->street_address; ?>"><?php echo $setting->street_address; ?></textarea>
                <?php echo form_error('street_address'); ?>
              </div>                                         
              <div class="form-group">
                <label for="postal_code">Postal Code</label>
                <input type="text" class="form-control" id="postal_code" placeholder="Postal Code" name="postal_code" value="<?php echo $setting->postal_code; ?>">
                <?php echo form_error('postal_code'); ?>
              </div>
              <div class="form-group">
                <label for="country_id">Country</label>
                <select class="form-control" name='country_id'>
                    <option>--Select Country--</option>
                  <?foreach($countries as $country):?>
                    <option value="<?=$country['id']?>" <?if(isset($setting->country_id) && $country['id'] == $setting->country_id):?>selected <?endif?>><?=$country['country']?></option>
                  <?endforeach;?>
                </select>
              </div>
            <?if($this->session->userdata('role') == 2):?>
              <div class="form-group">
                <label for="valid_up_to">Valid Up To</label>
                <div class="form-group date" id="datepicker2">
                    <input type="text" class="form-control" name="valid_up_to" id="valid_up_to" data-date-format="YYYY-MM-DD" value="<?php echo $setting->valid_up_to; ?>">
                     <span class="input-group-addon"><span class="icon-calendar"></span></span>
                     <script type="text/javascript">
                         $(function () {
                           $('#datepicker2').datetimepicker({
                             pickTime: false,
                             useCurrent: false
                           });
                         });
                     </script>
                 </div>
                <?php echo form_error('valid_up_to'); ?>
              </div>
              <div class="form-group">
                <label for="induction_year">Induction Year</label>
                <input type="text" class="form-control" id="induction_year" placeholder="Induction Year" name="induction_year" value="<?php echo $setting->induction_year; ?>">
                <?php echo form_error('induction_year'); ?>
              </div>
            <?endif;?>
              <button type="submit" class="btn btn-success" value="submit"><span class="icon-checkmark"></span> Save settings</button>
            </div>
          </form>
          </div>
