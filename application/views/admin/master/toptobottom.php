<?php if (!empty($booth_details)) {
  foreach ($booth_details as $val1) { ?>
    <div class="list-group-item nested-1"><i class="ri-drag-move-fill align-bottom handle"></i><?= $val1['name'] ?>
      <div class="list-group nested-list nested-sortable-handle">

        <?php
        $booth2 = $this->Subadmin_model->list_common_where3('master_hierarchy', 'parent_id', $val1['id']);
        if (!empty($booth2)) {
          foreach ($booth2 as $value1) { ?>

            <div class="list-group-item nested-2"><i class="ri-drag-move-fill align-bottom handle"></i><?= $value1['name'] ?>

              <div class="list-group nested-list nested-sortable-handle">
                <?php
                $booth2 = $this->Subadmin_model->list_common_where3('master_hierarchy', 'parent_id', $value1['id']);
                if (!empty($booth2)) {
                  foreach ($booth2 as $value2) { ?>

                    <div class="list-group-item nested-3"><i class="ri-drag-move-fill align-bottom handle"></i><?= $value2['name'] ?>

                      <div class="list-group nested-list nested-sortable-handle">
                        <?php
                        $booth2 = $this->Subadmin_model->list_common_where3('master_hierarchy', 'parent_id', $value2['id']);
                        if (!empty($booth2)) {
                          foreach ($booth2 as $value3) { ?>

                            <div class="list-group-item nested-4"><i class="ri-drag-move-fill align-bottom handle"></i><?= $value3['name'] ?>

                              <div class="list-group nested-list nested-sortable-handle">
                                <?php
                                $booth2 = $this->Subadmin_model->list_common_where3('master_hierarchy', 'parent_id', $value3['id']);
                                if (!empty($booth2)) {
                                  foreach ($booth2 as $value4) { ?>

                                    <div class="list-group-item nested-4"><i class="ri-drag-move-fill align-bottom handle"></i><?= $value4['name'] ?>

                                      <div class="list-group nested-list nested-sortable-handle">
                                        <?php
                                        $booth2 = $this->Subadmin_model->list_common_where3('master_hierarchy', 'parent_id', $value4['id']);
                                        if (!empty($booth2)) {
                                          foreach ($booth2 as $value5) { ?>

                                            <div class="list-group-item nested-4"><i class="ri-drag-move-fill align-bottom handle"></i><?= $value5['name'] ?> 
                                        
                                        	(<?php
                                            $booth2 = $this->Subadmin_model->list_common_where3('people_data', 'refrence_id', $value5['id']);
                                            echo count($booth2) ?? '0';
                                        	?>)
                                        	</div>
                                        <?php }
                                        } ?>
                                      </div>

                                    </div>
                                <?php }
                                } ?>
                              </div>

                            </div>
                        <?php }
                        } ?>
                      </div>

                    </div>
                <?php }
                } ?>
              </div>


            </div>
        <?php }
        } ?>
      </div>

  <?php }
} ?>