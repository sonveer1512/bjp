<form method="POST" id="bannerModelSubmits">
                                            <div class="row g-3">
                                               <div class="col-xxl-6">
                                               
                                                <div>
                                                    <label for="firstName" class="form-label">Panchayat Samiti</label>
                                                    <select class="form-select form-control" name="pan_sam_name" id="pan_sam_name">
                                                     
                                                    <?php foreach ($panchayatsamiti as $data) {
                                                                                ?>
                                                      <option value="<?= $data['id']; ?>" <?php if (!empty($content[0]['panchayatsimit'])) { if ($content[0]['id'] == $data['id']) { echo "selected"; } } ?>><?= $data['pachayatsimiti']; ?></option>
                                                   
                                                                                <?php } ?>
                                                    </select>
                                                </div>
                                          
                                                <div class="error" id="pan_sam_nameError"></div>
                                            </div>
                                              
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Gram Panchayat Name</label>
                                                      <select class="form-select form-control" name="gram_pan_name" id="gram_pan_name">
                                                       
                                                    <?php foreach ($grampanchayat as $data1) {
                                                                                ?>
                                                        <option value="<?= $data1['id']; ?>" <?php if (!empty($content[0]['grampanchyat_id'])) { if ($content[0]['grampanchyat_id'] == $data1['id']) { echo "selected"; } } ?>><?= $data1['gram_panchyat']; ?></option>
                                                    
                                                                                <?php } ?>
                                                    </select>
                                                    </div>
                                                    <div class="error" id="gram_pan_Error"></div>
                                                </div>
                                             <div class="col-xxl-6">
                                              <div>
                                                  <label for="firstName" class="form-label">Gram Name</label>
                                                  <input type="text" name="gram_name" class="form-control" id="gram_name" placeholder="Enter Gram Name" value="<?=$content[0]['gramname']?>">
                                              </div>
                                              <div class="error" id="gram_name_Error"></div>
                                          </div><!--end col-->
                                                
                                                <div class="col-lg-12">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-primary" value="Submit">
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
  <input type="hidden" name="id" value="<?=$content[0]['id']?>">
                                            <!--end row-->
                                        </form>