<div class="row">
    <?php if(!empty($item)){ foreach($item as $value){ ?>
    <div class="col-xl-6">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-4">
                  	<?php if($value['uploaded_from'] == 'front') { ?>
                    	<img class="rounded-start img-fluid  object-cover" src="https://axepertexhibits.com/bjploksabhachittorgarh/people/<?=$value['image']?>" alt="Card image" style="margin-top: 50px;">
                  	<?php }else { ?>
                  		<img class="rounded-start img-fluid  object-cover" src="<?= base_url() ?>assets/images/people_image/<?=$value['image']?>" alt="Card image" style="margin-top: 50px;">
					<?php } ?>
                </div>
                <div class="col-md-8">
                    <div class="card-header">
                        <h5 class="card-title mb-0">नाम : <?=$value['name']?> </h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text mb-2">दायित्व : <?=$value['liability']?></p>
                        <p class="card-text mb-2">जन्म दिनांक : <?=$value['dob']?></p>
                        <p class="card-text mb-2">दूरभाष : <?=$value['contact_no']?></p>
                        <p class="card-text"><small class="text-muted">जुड़ने की तारीख : <?=$value['created_at']?></small></p>
                    </div>
                    <div class="btn-group" style="float: right;">
                        <a class="btn btn-light dropdown-toggle msgbot" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                        <div class="dropdown-menu" >
                          <a class="dropdown-item editpeople" data-id="<?=$value['id']?>">Edit</a>
                          <a class="dropdown-item" onclick="archiveFunction(<?=$value['id']?>)">Delete</a>
                        </div>
                    </div> 
                </div>
            </div>

        </div><!-- end card -->

    </div><!-- end col -->
    <?php }} ?>
    
</div>

<script>
    $(document).ready(function() {
        $('.editpeople').click(function() {
            var id = $(this).data('id');
            $.ajax({
                url: "<?= base_url('master/editpeople/'); ?>" + id,
                type: "post",
                data: {
                    id: id
                },
                success: function(response) {
                    $('.editpeopledata').html(response);
                }
            })
        });
    });
</script>