<form method="POST" class="editmodal" id="editworkallot">
                                            <div class="row g-3">
                                                
                                                <!--end col-->
                                              
                                                <!--end col-->
                                               
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="passwordInput" class="form-label">Remark</label>
                                                        <textarea class="form-control" name="marketer_remark" id="marketer_remark" value="" placeholder="Enter Your Task"><?php echo $content[0]['work'];?></textarea>
                                                    </div>
                                                    <div class="error" id="marketerremarkError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                            <input type="hidden" name="work_allot_id" value="<?php echo $content[0]['work_allot_id'];?>">
                                        </form>