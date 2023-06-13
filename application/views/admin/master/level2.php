<div class="card hierarchy_<?= $level ?>">
    <div class="card-header"><b>Hierarchy Level <?= $level ?></b></div>
    <div class="card-body">
        <ul class="list-unstyled chat-list chat-user-list" id="userList">

            <?php
            if (!empty($item)) {
                foreach ($item as $value) {

                    $count = $this->savedata_model->countrowwhere('hierarchy',$value['id']);
            ?>

                    <li class="msgbot d-flex showchild_<?= $level ?>" id="parent_<?= $value['id'] ?>">
                        <a style="width: 100%;" onclick="showchild(<?= $value['id'] ?>, <?= $level + 1 ?>)">
                            <div class="align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-truncate mb-0"><?= $value['name'] ?> <span class="badge badge-outline-danger"><?=$count?></span></p>
                                </div>
                            </div>
                        </a>

                        <!-- <div class="btn-group" style="float: right;">
                          <a class="btn btn-light dropdown-toggle msgbot" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                          <div class="dropdown-menu " style="">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                          </div>
                        </div> -->
                    </li>

            <?php }
            } ?>

        </ul>

        <hr>

        <div class="row mt-3">
            <div class="col-md-12 mb-2">
                <ul id="myUL">
                    <!-- <li><span class="box">Add New</span>
                        <ul class="nested"> -->
                            <li class="mt-3">
                                <form class="addparents" method="post">
                                    <div class="row">
                                        <div class="col-md-12 d-flex">
                                            <input type="hidden" value="<?=$level?>" name="level">
                                            <input type="hidden" class="form-control" name="parent_level" value="<?= $id ?>">
                                            <input type="text" class="form-control" name="title" placeholder="Add New">
                                            <button type="submit" class="btn btn-primary btn-sm"> + </button>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        <!-- </ul>
                    </li> -->
                </ul>
            </div>
        </div>

    </div>
</div>


<script>
    var toggler = document.getElementsByClassName("box");
    var i;
    for (i = 0; i < toggler.length; i++) {
        toggler[i].addEventListener("click", function() {
            this.parentElement.querySelector(".nested").classList.toggle("active");
            this.classList.toggle("check-box");
        });
    }


    $(document).ready(function() {
        $(".addparents").on('submit', (function(e) {
            e.preventDefault();
            err = 0;
            var formData = new FormData(this);
            formData.append('action', "enqdet");

            var title = $("#title").val();

            if (err == 0) {
                $.ajax({
                    url: "<?= base_url() ?>hierarchy/addparent",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(result) {
                        var response = JSON.parse(result);
                        if (response.status == 200) {
                            showdetailsofparent(response.parent_id, response.level);
                        } else {
                            alert(response.error);
                        }
                    }
                });
            }
        }));
    });
</script>