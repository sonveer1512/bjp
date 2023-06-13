
<form method="POST" class="projectdetailsmodal" id="bannerModelSubmits">
                        <div class="row g-3">
                            <div class="col-xxl-6">
                                <div>
                                    <?php 
                                  	foreach($projectdetailsdata->result() as $row)
                                    {
                                    	echo $row->p_name;
                                    }
                                  
                                  ?>
                                </div>
                            </div>
  							</div>
                        <!--end row-->
                    </form>
                    