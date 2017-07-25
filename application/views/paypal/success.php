<div>
    <h2>Dear Member</h2>
    <span>Your payment was successful, thank you for purchase.</span><br/>
    <span>Item Number : 
        <strong><?php echo $booking_id; ?></strong>
    </span><br/>
    <span>TXN ID : 
        <strong><?php echo $txn_id; ?></strong>
    </span><br/>
    <span>Amount Paid : 
        <strong>$<?php echo $payment_gross.' '.$currency_code; ?></strong>
    </span><br/>
    <span>Payment Status : 
        <strong><?php echo $payment_status; ?></strong>
    </span><br/>
    <a href="<?php echo base_url();?>index.php/admin/dashboard">Go to admin dashboard</a>
</div>