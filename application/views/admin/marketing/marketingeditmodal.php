<form method="post" class="MarketingData" id="editmarketingModal">
    <div class="row g-3">
        <div class="col-xxl-6">
            <div>
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" value="<?php echo $content[0]['admin_name'];?>" id="market_name" name="market_name" placeholder="Enter Name">
            </div>
        </div><!--end col-->
        <div class="col-xxl-6">
            <div>
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" value="<?php echo $content[0]['admin_email'];?>" id="market_email" name="market_email" placeholder="Enter Email">
            </div>
        </div><!--end col-->

        <div class="col-xxl-6">
            <div>
                <label for="email" class="form-label">Designation</label>
                <input type="text" class="form-control" value="<?php echo $content[0]['admin_marketing_des'];?>" id="admin_marketing_des" name="admin_marketing_des" placeholder="Enter Designation">
            </div>
        </div><!--end col-->
        
        <div class="col-xxl-6">
            <div>
                <label for="contact" class="form-label">Contact</label>
                <input type="number" class="form-control" value="<?php echo $content[0]['admin_contact'];?>" id="market_contact" name="market_contact" placeholder="Enter your Contact">
            </div>
        </div><!--end col-->
        <div class="col-xxl-6">
            <div>
                <label for="admin_address" class="form-label">Address</label>
                <textarea class="form-control" name="market_address" id="market_address" placeholder="Enter Your Address"><?php echo $content[0]['admin_address'];?></textarea>
            </div>
        </div><!--end col-->
        <div class="col-lg-12">
            <div class="hstack gap-2 justify-content-end">
                <button type="button" class="btn btn-light" onClick="window.location.reload();" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div><!--end col-->
    </div><!--end row-->
    <input type="hidden" value="<?php echo $content[0]['admin_user_id'];?>" name="admin_user_id">
</form>