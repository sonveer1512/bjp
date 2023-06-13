<style>
  .msg{
  display:none;
  }
  .display{
    	display:none;
  }
  .display2{
  	display:none;
  }
  .display_1{
  	display:none;
  }
  .count_btn{
  display:none;
  }
</style>
                                          	<h4 class="mb-3 text-success count_call">(<?=$count_1;?>/<?=$count_all;?>)</h4>

										<div class="load_icon"><lord-icon src="https://cdn.lordicon.com/cnbtojmk.json" trigger="loop" style="width:100px;height:100px"></lord-icon></div>

                                        <div class="">
                                          	<?php if(!empty($to_number)){ ?>
                                            <h4 class="mb-3 call_number">Calling to +91<?=$to_number;?></h4>
                                          	<input type="text" id="to_number" name="to_number" value="<?=$to_number?>" hidden>
                                          <?php } ?>
                                          <?php if(!empty($sid))
											{
                                          	$replaced = str_replace('<Sid>', '', $sid);
												$replaced_1 = str_replace('</Sid>', '', $replaced); ?>
                                          	<input type="text" id="sid" name="sid" value="<?=$replaced_1?>" hidden>
                                          	<input type="text" id="campaign_id" name="campaign_id" value="<?=$id?>" hidden>
                                          <?php } ?>
                                          
                                          <h6 class=" msg1" style="color:green;">कृपया कॉल के जवाब आने तक इंतज़ार करें ......</h6>
                                          <h6 class=" msg" style="color:red;">कॉल नहीं जुडी,कृपया दुबारा प्रयास करें......</h6><br>
                                          <div id="hidedetails">
                                            
                                        <div class="row">
                                                    <div class="col-md-12">
                                                        <h6 class="" id="status1">Status - <span style="color:red;" class="status1 status"></span></h6>
                                                    </div>
                                                    <div class="col-md-6 display_1">
                                                            <label for="owner-field" class="form-label">सत्यापित/असत्यापित</label>
                                                          <select class="form-control" name="verify" id="verify" onchange="verifychange(this.value)">
                                                              <option value="" selected>चुनें</option>
                                                              <option value="Verify">सत्यापित</option>
                                                              <option value="Not Verify">असत्यापित</option>
                                                          </select>
                                                      <div class="error" id="is_verify_error"></div>
                                                    </div>
                                                    <div class="col-md-6 verified_section display">
                                                          <label for="owner-field" class="form-label">सत्यापित की स्थिति चुनें  </label>
                                                            <select class="form-control" name="is_verify" id="is_verify" >
                                                                       <option value="" selected>चुनें</option>
                                                                      <option value="Suppoter">समर्थक है।</option>
                                                                      <option value="Neutral">न्यूट्रल है।</option>
                                                                     <option value="Suppoter not">समर्थक नहीं है।</option>

                                                            </select>
                                                      <div class="error" id="verify_error"></div>
                                         			 </div>
                                           			<div class="col-md-6 verified_section display2">
                                                    <label for="owner-field" class="form-label">असत्यापित की स्थिति चुनें </label>
                                                      <select class="form-control" name="not_verify" id="not_verify" >
                                                                <option value="" selected>चुनें</option>
                                                                <option value="busy">व्यस्त</option>
                                                                <option value="not available">उपलब्ध नहीं</option>
                                                                <option value="wrong number">संख्या अमान्</option>
                                                                <option value="fake">नकली</option>
                                                                <option value="identity">गलत पहचान</option>
                                                      </select>
                                                      <div class="error" id="not_verify_error"></div>
                                          </div>
                                            <div class="col-md-6">
                                          <!--<h6 class="mb-3">Start Time - <span style="color:red;" class="status start_time" id="start_time"></span></h6>-->
                                          </div>
                                            <div class="col-md-6">
                                         <!-- <h6 class="mb-3">End Time - <span style="color:red;" class="status end_time" id="end_time"></span></h6>-->
                                          </div>
                                            <div class="col-md-12 display_1">
                                          <!--<h6 class="mb-3">Listen Recording - <span style="color:red;" class="recording" id="recording"><a href="<?= base_url()?>CallingData">Click Here</a></span></h6>-->
                                              <input type="text" class="form-control mt-3" id="callremark" name="callremark" placeholder="Remark">
                                              <div class="error" id="remark_error"></div>
                                          </div>
                                          
                                          <div class="col-md-12 mt-4 display_1">
                                          		<input type="button" class="btn btn-primary" onclick="submitcallrecord()" value="सेव करें ">
                                          </div>
                                          </div>
                                            </div>
                                          <div class="row">
                                          <div class="col-lg-6 ">
                                                    
                                                       <input type="button" class="btn btn-danger" style="float:left;" value="कॉल रद्द ">
                                                        
                                                    
                                                </div>
                                          <div class="col-lg-6 call_close">
                                          	
                                             <button type="button" class="btn btn-danger" style="float:right;" data-bs-dismiss="modal">बंद करें </button>
                                            
                                          </div>
                                            
                                            <div class="col-lg-6 count_btn">
                                          	
                                             <button type="button" class="btn btn-danger" style="float:right;" disabled>कॉल शुरू होगी (<span id="count_call"></span>) </button>
                                            
                                          </div>
                                          
											 
                                        </div>
										
<script>
  check_status();
  //show_resp();
  function show_resp()
  {
    var sid = $('#sid').val();
    $.ajax({
    url: "<?= base_url('CallingData/fetch_callingdata_sid'); ?>",
    type: "post",
    data: {
    sid: sid
     },
      beforeSend: function() {
            $(".status").html('<lord-icon src="https://cdn.lordicon.com/xjovhxra.json" trigger="loop" colors="primary:#109121" style="width:20px;height:20px;"></lord-icon>');
       },
     success: function(result) {
       var response = JSON.parse(result);
       
       if(response.code == 200)
       {
         $('.status').html('');
         $('.msg1').css('display','none')
		 $('.status1').append(response.status);
         $('.duration').append(response.duration);
         $('.start_time').append(response.start_time);
         $('.end_time').append(response.end_time);
         $('.recording').attr('href',response.recording);
         $('.msg1').html('Your Details Are Fetched....');
       }
       else
       {
       	$('.msg').css('display','block');
        $('.msg1').css('display','none')
        
       }
      
	}
    })
  } 
  
   function check_status()
  {
    var sid = $('#sid').val();
  	$.ajax({
      url: "<?= base_url('master/check_status'); ?>",
      type: "post",
      data: {
          sid: sid
      },
      success: function(result) {	
          var response = JSON.parse(result);
        	
          if(response.status == "completed") {
            $('.display_1').css('display','block');
            $('.msg1').html('कॉल पूरी हो चुकी है');
              savecalldetails(response.status);
            
              
             
          }else if(response.status == "in-progress"){
            setTimeout(function() {
                check_status()
            }, 1000);
            
          }else if(response.code == 400)
          {
          	$('.msg1').html('Call Completed');
            
          }
        
      }
    })
  }
  
  function savecalldetails(status) {
    var mobile = $('#to_number').val();
    var campaign_id			=$('#campaign_id').val(); 
  	$.ajax({
      url: "<?= base_url('master/save_call_data'); ?>",
      method:"POST",
      data:{status:status,mobile:mobile,campaign_id:campaign_id},
      success: function(response) {
        //setTimeout(function() {
          //      initiate_call();
            //}, 5000);
		
      }
    })
  }
  function verifychange(value){
  	
    
    	if(value =='Verify'){
            $('.display').css('display','block');
          	$('.display2').css('display','none');
        }else{
        	$('.display2').css('display','block');
          	$('.display').css('display','none');
        }
       
  }
</script>
<script>
    function submitcallrecord(){
      
      var to_number      = $('#to_number').val();
      var not_verify = $('#not_verify').val();
   	  var is_verify       = $('#is_verify').val();
      var callremark      = $('#callremark').val();
   	  var verify			=$('#verify').val(); 
      var campaign_id			=$('#campaign_id').val(); 
     
      if(verify == '')
      {
        $('#is_verify_error').html('सत्यापित/असत्यापित चुनें');
      	$('.error').css('color', 'red');
            
      }
      
     /* if(verify !='' && is_verify == '')
      {
        $('#verify_error').html('सत्यापित की स्थिति चुनें');
      	$('.error').css('color', 'red');
            error = true;
      }
      
      	if(verify !='' && not_verify == '')
      {
        $('#not_verify_error').html('असत्यापित की स्थिति चुनें');
      	$('.error').css('color', 'red');
            error = true;
      }
      */
      
      if(callremark == '')
      {
        $('#remark_error').html('टिप्पणी लिखें ');
      	$('.error').css('color', 'red');
           
      }
   
     		
     		 $.ajax({
				url: "<?= base_url('Master/save_call_update'); ?>",
				type: 'post',
				data:{to_number:to_number,is_verify:is_verify,callremark:callremark,verify:verify,campaign_id:campaign_id,not_verify:not_verify},
				
				
				success: function(result) {
					
					if (result.code == 200) {
						$('#hidedetails').css('display','none');
                      	$('.msg1').html("<span style='color:green;margin-top:10px;'>आप की कॉल रिकॉर्ड अपडेट हो चुकी है </span>");
                      	$('.count_call').html("");
                        $('.call_number').html("");
                        $('.load_icon').html("<lord-icon src='https://cdn.lordicon.com/lupuorrc.json' trigger='loop' style='width:100px;height:100px'></lord-icon>");
                      	$('.call_close').css('display','none');	
                      $('.count_btn').css('display','block');
                      	var timeleft = 10;
                        var downloadTimer = setInterval(function(){
                          if(timeleft <= 0){
                            clearInterval(downloadTimer);
                            //document.getElementById("count_call").innerHTML = "Finished";
                            initiate_call();
                          } else {
                            document.getElementById("count_call").innerHTML = timeleft ;
                          }
                          timeleft -= 1;
                        }, 1000);
                      
                      
					} else {
						swal(result.message, ' ', 'error');
					}
				},
				
			})
     
    
    
    }                                      
                                          
                                          
                                          
                                          
                                          
 </script>