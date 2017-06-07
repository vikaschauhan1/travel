
        <div class="col-sm-10 col-md-11 main">
          <div class="row" style="margin-right:0px;">
            <h1 class="page-header"><?php if($this->session->userdata('role') == 1) echo "User "; else echo "Guide "?>Earning Detail</h1>
          </div>
       
        <div class="row" >
            <div class="col-md-12" style="padding-left:0px;">
              <div class="panel panel-default">
                <div class="panel-heading"><strong> Your Total Earning = <?echo isset($earning->price) ? $earning->price.' ₹' : 0?></strong></div>
               </div>
            </div>
            
          </div>
              <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
         </div>
