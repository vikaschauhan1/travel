
        <div class="col-sm-10 col-md-11 main">
          <div class="row" style="margin-right:0px;">
            <h1 class="page-header"><?php if($this->session->userdata('role') == 1) echo "User "; else if($this->session->userdata('role') == 2) echo "Guide "?>Booking List</h1>
          </div>
        
        <div class="row" >
            <div class="col-md-12" style="padding-left:0px;">
              <div class="panel panel-default">
                <div class="panel-heading"><strong>Your Details</strong></div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>Person Name</th>
                        <th>Booking Date</th>
                        <th>Location</th>
                        <th>Booking Detail</th>
                        <th>E-mail</th>
                        <th>Phone</th>
                    </thead>
                  <tbody>
                      <?foreach($allBookings as $booking):?>
                      <tr>
                        <td><?=$booking['firstname'].$booking['lastname']?></td>
                        <td><?=$booking['booking_date']?></td>
                        <td><?=$booking['location']?></td>
                        <td><?=$booking['booking_detail']?></td>
                        <td><?=$booking['email']?></td>
                        <td><?=$booking['phone']?></td>
                      </tr>
                     <?endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
              
          </div>
            
         </div>
