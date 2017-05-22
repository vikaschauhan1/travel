        <div class="col-sm-10 col-md-11 main">
          <div class="row" >
            <div class="col-sm-12 col-md-12" style="padding-left:0px;">
                <h1 class="page-header">Account Setting</h1>
            </div>
          </div>
          <div class="row">
           <div class="col-sm-6 col-md-4">
              <div class="form-group">
              <?php
                if ($this->session->flashdata('message') != '') echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('message') . '</div>';
              ?>
              </div>        
          <?php echo form_open('admin/settings') ?>
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
              <button type="submit" class="btn btn-success" value="submit"><span class="icon-checkmark"></span> Save settings</button>
            </div>
          </form>
          </div>
