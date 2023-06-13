<form method="POST" id="bannerModelSubmits">
                                            <div class="row g-3">
                                               <div class="col-xxl-6">
                                               
                                                <div>
                                                    <label for="firstName" class="form-label">Panchayat Samiti</label>
                                                    <select class="form-select form-control" name="pan_sam_name" id="pan_sam_name">
                                                      <option value="<?= $content[0]['id']; ?>"><?php $id =  $content[0]['panchyatsimit']; 
                                                      	

                                                 $this->db->select('*');
                                                  $this->db->from('pachayatsimiti');
                                                  $this->db->where('id',$id);
                                                   $rows1 = $this->db->get()->row();
                                                      if(!empty($rows1)){
                                                 	 echo $rows1->pachayatsimiti;
                                                      }
                                                      
                                                      ?></option>
                                                                               
                                                    <?php foreach ($panchayatsamiti as $data) {
                                                                                ?>
                                                    <option value="<?= $data['id']; ?>"><?php echo $data['pachayatsimiti'];  ?></option>
                                                                                <?php } ?>
                                                    </select>
                                                </div>
                                          
                                                <div class="error" id="depnameError"></div>
                                            </div>
                                                <input type="hidden" class="form-control" name="panchayat" id="panchayat" value="1">
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Gram Panchayat Name</label>
                                                        <input type="text" class="form-control" name="gram_pan_name" id="gram_pan_name" placeholder="Enter Gram Panchayat Name" value="<?= $content[0]['gram_panchyat']; ?>">
                                                    </div>
                                                    <div class="error" id="subnameError"></div>
                                                </div>
                                                
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