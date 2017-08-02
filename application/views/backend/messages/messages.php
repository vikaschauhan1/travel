        <div class="col-sm-10 col-md-11 main">
          <div class="row" >
            <div class="col-sm-12 col-md-12" style="padding-left:0px;">
                <h1 class="page-header">Messages</h1>
            </div>
          </div>
          <div class="row">
           <div class="col-sm-4">
              <div class="form-group">
                  <?php if($this->session->userdata('role') == 1) $user = 1; else $user = 0;?>
              <?php
                if ($this->session->flashdata('message') != '') echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('message') . '</div>';
              ?>
              </div>        
          <?php echo form_open('admin/messages') ?>
               <select class="form-control" name='receiver'>
                    <option value="">--Select Receiver--</option>
                  <?foreach($receivers as $receiver):?>
                    <?php if($user):?>
                        <option value="<?=$receiver['guide_id']?>"><?=$receiver['firstname'].$receiver['lastname']?></option>
                    <?else:?>    
                        <option value="<?=$receiver['member_id']?>"><?=$receiver['firstname'].$receiver['lastname']?></option>
                    <?php endif;?>
                  <?endforeach;?>
                </select>
               <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" placeholder="Message Subject" name="subject" value="<?php echo set_value('subject'); ?>">
                <?php echo form_error('subject'); ?>
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea  rows="4" cols="20" class="form-control" id="message" placeholder="Message" name="message" value="<?php echo set_value('message'); ?>"><?php echo set_value('message'); ?></textarea>
                <?php echo form_error('message'); ?>
              </div>
              <button type="submit" class="btn btn-success" value="submit"><span class="icon-checkmark"></span> Send</button>
            </div>
          </form>
          <?php
            $this->load->model('message');
            $messages = $this->message->getMessage($this->session->userdata('id'), !$user);
            
          ?>
          <div class="col-sm-8">
                  <table class="table table-bordered">
                    <colgroup>
                       <col style="width: 18%">
                       <col style="width: 24%">
                       <col style="width: 58%">
                    </colgroup>
                    <thead>
                      <tr>
                        <th>Sender</th>
                        <th>Subject</th>
                        <th>Message</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach($messages as $message):?>
                            <tr style="cursor: pointer">
                               <td><?php echo $message['firstname'].' '.$message['lastname']?></td>
                               <td><?php echo $message['subject']?></td>
                               <td><?php echo $message['message']?></td>
                           </tr>
                        <?php endforeach;?>
                    </tbody>
                  </table>
          </div>
          </div>
        </div>
