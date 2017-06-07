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
                <label for="experience">Experience</label>
                <input type="number" class="form-control" id="experience" max="100" min="0" placeholder="experience" name="experience" value="<?php echo isset($profile->experience) ? $profile->experience : ''; ?>">
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
              <div class="form-group">
                <label for="travel_style_tags">Travel Style Tags</label>
                <textarea class="form-control" id="travel_style_tags" placeholder="Travel Style Tags" name="travel_style_tags" value="<?php echo isset($profile->travel_style_tags) ? $profile->travel_style_tags : ''; ?>"><?php echo isset($profile->travel_style_tags) ? $profile->travel_style_tags : ''; ?></textarea>
              </div>
            <?if($role == 2):?>
              <div class="form-group">
                <label for="language">Language Proficiency</label>
                <select class="form-control" name='language_id'>
                    <option>--Select Language--</option>
                  <?foreach($languages as $languageRow):?>
                    <option value="<?=$languageRow['id']?>" <?if(isset($profile->language_id) && $languageRow['id'] == $profile->language_id):?>selected <?endif?>><?=$languageRow['language']?></option>
                  <?endforeach;?>
                </select>
              </div>
              <div class="form-group">
                <label for="destination_experties">Destination Experties</label>
                <textarea class="form-control" id="destination_experties" placeholder="Destination Experties" name="destination_experties" value="<?php echo isset($profile->destination_experties) ? $profile->destination_experties : ''; ?>"><?php echo isset($profile->destination_experties) ? $profile->destination_experties : ''; ?></textarea>
               </div>
                <div class="form-group">
                    <label for="price">Booking Price</label>
                    <input type='number' class="form-control" id="price" placeholder="Booking Price" name="price" value="<?php echo isset($profile->price) ? $profile->price : ''; ?>">
               </div>
            <?endif;?>
              <button type="submit" class="btn btn-success" value="submit"><span class="icon-checkmark"></span> Save Profile</button>
            </div>
          </form>
          </div>
