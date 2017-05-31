        <div class="col-sm-10 col-md-11 main">
          <div class="row" >
            <div class="col-sm-12 col-md-12" style="padding-left:0px;">
                <h1 class="page-header">Reset Access detail</h1>
            </div>
          </div>
          <div class="row">
           <div class="col-sm-6 col-md-4">
              <div class="form-group">
              <?php
                if ($this->session->flashdata('message') != '') echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('message') . '</div>';
              ?>
              </div>        
          <?php echo form_open('admin/access') ?>
               <div class="form-group">
                <label for="old_password">Old Password</label>
                <input type="password" class="form-control" id="old_password" placeholder="Enter your old password" name="old_password" value="<?php echo set_value('old_password'); ?>">
                <?php echo form_error('old_password'); ?>
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
             
              <button type="submit" class="btn btn-success" value="submit"><span class="icon-checkmark"></span> Reset</button>
            </div>
          </form>
          </div>
        </div>
