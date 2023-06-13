<style>
  .show_div{
  display:block;
  }
  
</style>		
<div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Edit <?=$role?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" onClick="window.location.reload();" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <form method="POST" id="addSubadmin">
                                            <div class="row g-3">
                                              
                                              <div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">उपयोगकर्ता की भूमिका</label>
                                                        <select class="form-control" name="user_role" id="user_role" onchange="for_executive(this.value)">
                                                          <option value="">भूमिका चुनें </option>
                                                            <option value="Subadmin">सब एडमिन </option>
                                                          	 <option value="Supervisor">सुपरवाइजर </option>
                                                          	 <option value="Executive" selected>एक्सिक्यूटिव </option>
                                                        </select>
                                                    </div>
                                                 <div class="error" id="role_Error"></div>
                                                </div>
                                              <div class="col-xxl-6 show_div">
                                                    <div>
                                                        <label for="firstName" class="form-label">जिला चुनें </label>
                                                        <select class="form-control" name="jila" id="jila_id" onchange="changevidhansabha(this.value, 'vidhansabha_id_10', 'विधानसभा')">
                                                          <option value="" selected>जिला चुनें</option>
                                                           <?php 
                                                            $booths = $this->Caller_model->list_common_where3('master_hierarchy','parent_id','0');
                      										
                                                            foreach ($booths as $val1) { ?>
                                                            <option value="<?= $val1['id'] ?>" <?php if($val1['id'] == $content[0]['zila']){echo "selected";}?>><?= $val1['name'] ?></option>
                                                            <?php } ?> 
                                                        </select>
                                                    </div>
                                                    <div class="error" id="jila_Error"></div>
                                                </div>
                                              
                                              <div class="col-xxl-6 show_div">
                                                    <div>
                                                        <label for="firstName" class="form-label">विधानसभा चुनें </label>
                                                        <select class="form-control vidhansabha_id_10" name="vidhansabha_id" id="vidhansabha_id_10" onchange="changevidhansabha(this.value, 'panchayat_id_10', 'पंचायत समिति/नगर पालिका')">>
                                                          <option value="" selected>विधानसभा चुनें </option>
                                                          
                                                        </select>
                                                    </div>
                                                    <div class="error" id="vidhanshabha_Error"></div>
                                                </div>
                                              
                                              <div class="col-xxl-6 show_div" id="panchayat_nagar">
                                                    <div>
                                                        <label for="firstName" class="form-label">पंचायत / नगर पालिका चुनें</label>
                                                        <select class="form-control panchayat_id_10" name="panchayat_id" id="panchayat_id_10" onchange="changevidhansabha(this.value, 'mandal_id_10', 'मंडल');">
                                                          <option value="" selected>पंचायत / नगर पालिका</option>
                                                          
                                                        </select>
                                                    </div>
                                                    <div class="error" id="pan_nagar_Error"></div>
                                                </div>
                                              
                                               <div class="col-xxl-6 show_div" id="mandal">
                                                    <div>
                                                        <label for="firstName" class="form-label">मंडल चुनें </label>
                                                        <select class="form-control" name="mandal_id" id="mandal_id_10" onchange="changevidhansabha(this.value, 'gram_id_10', 'ग्राम पंचायत');">
                                                          <option value="" selected>मंडल चुनें </option>
                                                           
                                                        </select>
                                                    </div>
                                                    <div class="error" id="mandal_Error"></div>
                                                </div>
                                              
                                               <div class="col-xxl-6 show_div" id="gram_panchayat">
                                                    <div>
                                                        <label for="firstName" class="form-label">ग्राम पंचायत चुनें </label>
                                                        <select class="form-control gram_id_10" name="gram_id" id="gram_id_10" onchange="changevidhansabha(this.value, 'booth_id_10', 'बूथ');">
                                                          <option value="" selected>ग्राम पंचायत  चुनें </option>
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="error" id="gram_Error"></div>
                                                </div>
                                              
                                              <div class="col-xxl-6 show_div" id="booth">
                                                    <div>
                                                        <label for="firstName" class="form-label">बूथ चुनें </label>
                                                        <select class="form-control booth_id_10" name="booth_id" id="booth_id_10">
                                                          <option value="" selected>बूथ चुनें </option>
                                                           
                                                        </select>
                                                    </div>
                                                    <div class="error" id="booth_Error"></div>
                                                </div>
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label"> नाम </label>
                                                        <input type="text" class="form-control" name="sub_name" id="sub_name" placeholder="नाम लिखें ">
                                                    </div>
                                                    <div class="error" id="subnameError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="lastName" class="form-label">ई-मेल </label>
                                                        <input type="email" class="form-control" name="sub_email" id="sub_email" placeholder="ई-मेल लिखें">
                                                    </div>
                                                    <div class="error" id="subemailError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="lastName" class="form-label">पासवर्ड </label>
                                                        <input type="password" class="form-control" name="sub_password" id="sub_password" placeholder="पासवर्ड लिखें">
                                                    </div>
                                                    <div class="error" id="subpassError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">मोबाइल नंबर </label>
                                                        <input type="number" class="form-control" name="sub_contact" id="sub_contact" placeholder="मोबाइल नंबर लिखें">
                                                    </div>
                                                    <div class="error" id="subcontactError"></div>
                                                </div>
                                                <!--end col-->
                                               
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="passwordInput" class="form-label">पता </label>
                                                        <textarea class="form-control" name="sub_address" id="sub_address" placeholder="पता लिखें"></textarea>
                                                    </div>
                                                    <div class="error" id="subaddressError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">बंद करें </button>
                                                        <input type="submit" class="btn btn-primary" value="सेव करें ">
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>
                </div>


<script>
  function changevidhansabha(id, changeid, text) {          
      $.ajax({
        url: "<?=base_url()?>master/changedropdown",
        type: "POST",
        data: {
        	id : id,
          	text: text
        },
        success: function(result) {
          $("."+changeid).html(result);
        },
      })
  }
</script>