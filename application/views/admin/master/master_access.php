<?php $this->load->view('admin/link.php'); ?>
<!-- Begin page -->
<div id="layout-wrapper">

  <?php $this->load->view('admin/topar.php'); ?>
  <?php $this->load->view('admin/imgheader.php'); ?>
  <?php $this->load->view('admin/sidebar.php');
  date_default_timezone_set('Asia/Kolkata');
  $date = date('Y-m-d');
  ?>
</div>
<style>
  .boxbox {
    display: inline-flex;
    overflow-x: scroll;
  }

  .boxbox .card {
    width: 300px;
    margin-right: 30px;
  }

  .boxbox .card .card-header {
    padding: 0.35rem 0.35rem ! important;
    background: #e2e2e2;
  }

  .boxbox .card .card-body {
    padding: 0.35rem 0.35rem ! important;
  }
</style>
<style>
  ul,
  #myUL {
    list-style-type: none;
  }

  #myUL {
    margin: 0;
    padding: 0;
  }

  .box {
    cursor: pointer;
    -webkit-user-select: none;
    /* Safari 3.1+ */
    -moz-user-select: none;
    /* Firefox 2+ */
    -ms-user-select: none;
    /* IE 10+ */
    user-select: none;
  }

  .box::before {
    content: "+";
    color: white;
    display: inline-block;
    margin-right: 6px;
    border-radius: 17px;
    background: #0072ff;
    padding: 2px 8px;
  }

  .check-box::before {
    content: "-";
    color: white;
  }

  .nested {
    display: none;
  }

  .active {
    display: block;
  }

  .form-control {
    display: block;
    width: 100%;
    padding: 5px 5px !important;
    font-size: .8125rem;
    font-weight: 400;
    border: 0px solid var(--vz-input-border) !important;
    border-bottom: 1px solid var(--vz-input-border) !important;
  }

  .dropdown-toggle::after {
    display: inline-block;
    margin-left: 0.255em;
    font-size: 17px;
    line-height: 15px;
    content: "⁝" !important;
    font-family: "Material Design Icons";
    font-weight: 900;
  }

  .setbtngroup {
    margin-top: -10px;
  }

  .btn-light {
    color: #000;
    background-color: white;
    border: 0px solid white !important;
  }

  .dropdown-toggle:focus a.dropdown-menu {
    display: block !important;
  }
</style>
<div class="main-content">

  <div class="page-content">
    <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Hierarchy</h4>

            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                <li class="breadcrumb-item active">Hierarchy</li>
              </ol>
            </div>

          </div>
        </div>
      </div>
      <!-- end page title -->

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <div class="col-md-12">
                <h4 class="card-title mb-0" style="float: left;">Hierarchy</h4>
              </div>
            </div>
          </div>
          <!-- end col -->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
      <div class="row" style="overflow: scroll;">
        <div class="col-md-12">
          <div class="boxbox">
            <div class="card hierarchy_1">
              <?php $query = $this->Subadmin_model->list_common_where3('hierarchy_level', 'level', '1'); ?>
              <?php if (!empty($query)) {
                $gettitle = $query[0]['title'];
              } else {
                $gettitle = 'Hierarchy Level 1';
              } ?>

              <div class="card-header"><b id="changedlabel_1"><?= $gettitle ?></b>
                <a href="#" style="color: blue; float:right" onclick="changelevel('1','<?= $gettitle ?>')" data-bs-toggle="modal" data-bs-target="#editsubadmin">
                  <i class="ri-edit-box-line"></i>
                </a>

              </div>
              <div class="card-body">
                <ul class="list-unstyled chat-list chat-user-list" id="userList_1">

                  <?php
                  $level1 = $this->Subadmin_model->list_common_where3('master_hierarchy', 'parent_id', '0');
                  if (!empty($level1)) {
                    foreach ($level1 as $value) {

                      $count = $this->Subadmin_model->countrowwhere('master_hierarchy', $value['id']);

                  ?>

                      <li class="msgbot d-flex showchild_1" id="parent_<?= $value['id'] ?>">
                        <a style="width: 100%;" onclick="showchild(<?= $value['id'] ?>, '2')">
                          <div class="align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                              <p class="text-truncate mb-0"><?= $value['name'] ?> <span class="badge badge-outline-danger"><?= $count ?></span> </p>
                            </div>
                          </div>
                        </a>

                        <div class="btn-group" style="float: right;">
                          <a class="btn btn-light dropdown-toggle msgbot" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                          <div class="dropdown-menu " style="">
                            <a class="dropdown-item" href="<?= base_url() ?>master/addpeople/<?= $value['id'] ?>/<?=$query[0]['id'] ?? ''?>" target="_blank">कार्यकारिणी जोड़ें</a>
							<?php 
                            $morche = $this->Subadmin_model->list_common('morche');
                              if(!empty($morche)) {
                                foreach($morche as $values) { ?>
                                    <a class="dropdown-item" href="<?= base_url() ?>master/addpeopleinmorche/<?= $value['id'] ?>/<?=$values['id']?>/<?=$query[0]['id'] ?? ''?>" target="_blank"><?=$values['title']?> जोड़ें</a>
                                <?php }
                              }
                            ?>
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" onclick="deletedata(<?= $value['id'] ?>,'1')">Delete</a>
                          </div>
                        </div>
                      </li>

                  <?php }
                  } ?>

                </ul>

                <hr>

                <div class="row mt-3">
                  <div class="col-md-12 mb-2">
                    <ul id="myUL">
                      <!-- <li>
                        <span class="box">Add New</span>
                        <ul class="nested"> -->
                      <li class="mt-3">
                        <form class="addparents" method="post">
                          <div class="row">
                            <div class="col-md-12 d-flex">
                              <input type="hidden" value="1" name="level">
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

          </div>
        </div>

        <!-- container-fluid -->
      </div>
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Connection between Parent & Child</h4>
          </div><!-- end card header -->

          <div class="card-body">
            <?php $level1 = $this->Subadmin_model->list_common_where3('master_hierarchy', 'parent_id', '0'); ?>
            
            <div class="list-group col nested-list nested-sortable-handle" id="toptobottom">
            </div>
            
            
          </div><!-- end card-body -->
        </div><!-- end card -->
      </div>
      <!-- End Page-content -->
    </div>




    <div class="modal fade" id="editsubadmin" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalgridLabel">Edit Hierarchy <span class="level_number"></span> Label</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="changelevel" id="editlabel">
              <input type="hidden" name="level_number_val" id="level_number_val">
              <div class="row g-3">
                <div class="col-xxl-12">
                  <div>
                    <label for="firstName" class="form-label">Title<span class="text-danger">*</span></label>
                    <input type="text" name="level_title" class="form-control" id="level_title" placeholder="Enter Name">
                    <span id="showerrortitle" class="text-danger" style="display: none;">Please Enter Title</span>
                  </div>
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
            </form>
          </div>
        </div>
      </div>
    </div>





    <?php $this->load->view('admin/footer.php'); ?>


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
              url: "<?= base_url() ?>add_parent_level",
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






      function showdetailsofparent(parent_id, level) {

        $.ajax({
          url: '<?= base_url() ?>reloadparentdiv',
          method: 'POST',
          data: {
            id: parent_id,
            level: level
          },
          success: function(res) {
            $(".hierarchy_" + level).html(res);
          },
          error: function() {
            alert("Fail")
          }
        });
      }



      function showchild(id, level) {

        if (sessionStorage.getItem('parent_sequence')) {
          var seq = sessionStorage.getItem('parent_sequence');
          for (i = seq; i >= level; i--) {
            $(".hierarchy_" + i).remove();
          }
        }

        $.ajax({
          url: '<?= base_url() ?>getchilddetails',
          method: 'POST',
          data: {
            id: id,
            level: level
          },
          success: function(res) {

            var lev = level - 1;

            $(".showchild_" + lev).removeClass('active');
            $("#parent_" + id).addClass('active');
            sessionStorage.setItem('parent_id', id);
            sessionStorage.setItem('parent_sequence', level);
            $(".boxbox").append(res);
          },
          error: function() {
            alert("Fail")
          }
        });
      }



      // hierarchy label editing

      function changelevel(level, label) {
        $("#level_number_val").val(level);
        $(".level_number").html(level);
        $("#level_title").val(label);
      }


      $(document).ready(function() {
        $("#editlabel").on('submit', (function(e) {

          $("#showerrortitle").css('display', 'none');

          e.preventDefault();
          err = 0;
          var formData = new FormData(this);
          formData.append('action', "enqdet");

          var title = $("#level_title").val();

          if (title == '') {
            $("#showerrortitle").css('display', 'block');
          }

          if (err == 0) {
            $.ajax({
              url: "<?= base_url() ?>master/changelabel",
              type: "POST",
              data: formData,
              contentType: false,
              cache: false,
              processData: false,
              success: function(result) {
                var response = JSON.parse(result);
                if (response.code == 200) {
                  $("#editsubadmin").modal('hide');
                  $("#changedlabel_" + response.level).html(response.title);
                } else {
                  alert(response.message);
                }
              }
            });
          }
        }));
      });


      function deletedata(id,level) {
        $.ajax({
          url: '<?= base_url() ?>master/deleteitem',
          method: 'POST',
          data: {
            id: id,
            level: level
          },
          success: function(res) {
            $("#parent_"+id).remove();
          },
          error: function() {
            alert("Fail")
          }
        });
      }
      
      
      showtoptobottom(0);
      function showtoptobottom(id) {
      	$.ajax({
          url: '<?= base_url() ?>master/toptobottom',
          method: 'post',
          data: {
          	id: id
          },
          success: function(res) {
            $("#toptobottom").html(res);
          },
          error: function() {
            alert("Fail")
          }
        });
      }
      
    </script>