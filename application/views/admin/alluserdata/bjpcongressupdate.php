<style>
    #show_supporter_bjp {
        display: none;
    }

    #show_supporter_congress {
        display: none;
    }
</style>
<form method="POST" class="bjpcongressupdate" id="bjpcongressupdate">
    <div class="row g-3">
        <div class="col-xxl-6">
            <div>
                <label for="firstName" class="form-label">Select User Activity</label>
                <select name="user_select" id="user_select" class="form-control form-select" onchange="show_supporter_bjp(this.value, '<?=$title?>')">
                    <option value="">Select</option>
                    <option value="active">Active User</option>
                    <option value="inactive">Inactive User</option>
                </select>
            </div>
        </div>
        <?php if ($title == 'bjp') { ?>
            <div class="col-xxl-6" id="show_supporter_bjp">
                <div>
                    <label for="firstName" class="form-label">Select User Activity</label>
                    <select name="user_sopport" id="user_sopport" class="form-control form-select">
                        <option value="">Select</option>
                        <option value="support">Supporter</option>
                        <option value="notsupport">Not Supporter</option>
                    </select>
                </div>
            </div>
        <?php } ?>

        <?php if ($title == 'congress') { ?>
            <div class="col-xxl-6" id="show_supporter_congress">
                <div>
                    <label for="firstName" class="form-label">Select User Activity</label>
                    <select name="user_sopport" id="user_sopport" class="form-control form-select">
                        <option value="">Select</option>
                        <option value="support">Supporter</option>
                        <option value="notsupport">Not Supporter</option>
                    </select>
                </div>
            </div>
        <?php } ?>
        <!--end col-->

        <!--end col-->
        <div class="col-lg-12">
            <div class="hstack gap-2 justify-content-end">
                <button type="button" class="btn btn-light" onClick="window.location.reload();" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="add-btn">Submit</button>
            </div>
        </div>
        <!--end col-->
    </div>
    <input type="hidden" name="bjp_congress" id="bjp_congress" value="<?= $title ?>">
    <?php foreach ($id as $ids) { ?>
        <input type="hidden" value="<?= $ids ?>" name="user_id[]">
    <?php } ?>
    <!--end row-->
</form>
<script>
    function show_supporter_bjp(title, bjpcongress) {
        if(bjpcongress == 'bjp') {
            if(title == 'active'){
            $('#show_supporter_bjp').css("display", "block");
            $('#show_supporter_congress').css("display", "none");
            }
            else{
                $('#show_supporter_congress').css("display", "block");
            $('#show_supporter_bjp').css("display", "none");
            }
        }
        else if(title == 'inactive'){

            $('#show_supporter_congress').css("display", "block");
            $('#show_supporter_bjp').css("display", "none");
        }
        else{
            $('#show_supporter_bjp').css("display", "block");
            $('#show_supporter_congress').css("display", "none");
            }
        

      
    }   
</script>