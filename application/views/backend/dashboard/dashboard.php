
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
              <div class="col-md-6" style="padding-left:0px;">
                  <img src="../../images/p1" alt="profile pic" style="width:width;height:height;">
              </div>
          </div>
            
         </div>
