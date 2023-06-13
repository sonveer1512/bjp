<form method="POST" id="editcamp">
                                            <div class="row g-3">
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">कैंपेन का नाम</label>
                                                        <input type="text" class="form-control" name="title" id="title" value="<?=$content[0]['title']?>" placeholder="कैंपेन का नाम">
                                                    </div>
                                                    <div class="error" id="titleError"></div>
                                                </div>
                                              
                                              	<div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">कैंपेन की दिनांक व समय  </label>
                                                        <input type="datetime-local" class="form-control" name="date_time" value="<?=$content[0]['date_time']?>" id="date_time" placeholder="कैंपेन का नाम">
                                                    </div>
                                                    <div class="error" id="date_timeError"></div>
                                                </div>
                                              
                                                <!--end col-->
                                                <div class="col-xxl-12">
                                                    <div>
                                                        <label for="lastName" class="form-label">कैंपेन का विवरण</label>
                                                        <textarea name="description" class="blog_desc" class="form-control" placeholder="कैंपेन का विवरण"><?=$content[0]['discription']?></textarea>
                                                    </div>
                                                    <div class="error" id="subemailError"></div>
                                                </div>
                                             <input type="hidden" name="id" id="id" value="<?=$content[0]['id']?>">
                                                <!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-primary" value="Submit">
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>


<script>
    CKEDITOR.replaceAll( 'blog_desc' ); 
</script>