
        <div class="col-sm-10 col-md-11 main">
          <div class="row" style="margin-right:0px;">
            <h1 class="page-header"><?php if($this->session->userdata('role') == 1) echo "User "; else if($this->session->userdata('role') === 2) echo "Guide "?>Dashboard</h1>
          </div>
          <div class="row" >
            <div class="col-md-4" style="padding-left:0px;">
              <div class="panel panel-default">
                <div class="panel-heading"><strong>Your Details</strong></div>
                <table class="table table-bordered table-striped">
                  <tbody>
                      <tr>
                        <td>Your Email</td>
                        <td><?php echo $details->email; ?></td>
                      </tr>
                      <tr>
                        <td>First Name</td>
                        <td><?php echo $details->firstname; ?></td>
                      </tr>
                      <tr>
                        <td>Last Name</td>
                        <td><?php echo $details->lastname; ?></td>
                      </tr>
                      <tr>
                        <td>Phone number</td>
                        <td><?php echo $details->phone; ?></td>
                      </tr>
                  </tbody>
                </table>
              </div>
            </div>
              <?php if($this->session->userdata('role') == 2):?>
              <div class="col-md-2">
                    <div class="metric">
                            <span class="icon"><i class="fa fa-eye"></i></span>
                            <p>
                                <strong> <span class="number"></span>
                                    <span class="title"><?echo $users_profile->views?> Views</span></strong>
                            </p>
                    </div>
            </div>
               <div class="col-md-3">
                    <div class="metric">
                            <span class="icon"><i class="fa fa-star-o"></i></span>
                            <p>
                                <strong> <span class="number"></span>
                                    <span class="title"> Avg Rating <?echo $rating->avgrating?></span></strong>
                            </p>
                    </div>
            </div>
              <?endif;?>
              
          </div>
            
         </div>

