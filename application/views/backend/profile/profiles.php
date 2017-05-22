        <div class="col-sm-10 col-md-11 main">
          <div class="row" >
            <div class="col-sm-12 col-md-12" style="padding-left:0px;">
                <h1 class="page-header"><?echo $role == 1 ? 'User' : 'Guide';?> Profile</h1>
            </div>
          </div>
          <div class="row">
           <div class="col-sm-6 col-md-4">
              <div class="form-group">
              <?php
                if ($this->session->flashdata('message') != '') echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('message') . '</div>';
              ?>
              </div>        
          <?php echo form_open('admin/profiles') ?>
            <input type="hidden" name="user_id" value="<?php echo $user_id ;?>">
              <div class="form-group">
                <label for="about_me">About Me</label>
                <textarea class="form-control" id="about_me" placeholder="About Me" name="about_me" value="<?php echo isset($profile->about_me) ? $profile->about_me : ''; ?>"><?php echo isset($profile->about_me) ? $profile->about_me : ''; ?></textarea>
                <?php echo form_error('about_me'); ?>
              </div>
              <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" max="100" min="0" placeholder="Age" name="age" value="<?php echo isset($profile->age) ? $profile->age : ''; ?>">
                <?php echo form_error('age'); ?>
              </div>
              
              <div class="form-group">
                <label for="gender">Gender</label>
                <input type="checkbox" class="" id="male" name="gender" value="male" <?if(isset($profile->gender) && $profile->gender == 'male'):?>checked="checked" <?endif;?>>Male
                <input type="checkbox" class="" id="female" name="gender" value="female" <?if(isset($profile->gender) && $profile->gender == 'female'):?>checked="checked" <?endif;?>>Female
                
              </div>
              <div class="form-group">
                <label for="location">Location</label>
                <select class="form-control" name='location'>
                    <option>--Select Location--</option>
                  <?foreach($location as $locationRow):?>
                    <option value="<?=$locationRow['id']?>" <?if(isset($profile->location_id) && $locationRow['id'] == $profile->location_id):?>selected <?endif?>><?=$locationRow['location']?></option>
                  <?endforeach;?>
                </select>
              </div>
              <button type="submit" class="btn btn-success" value="submit"><span class="icon-checkmark"></span> Save Profile</button>
            </div>
          </form>
          </div>
