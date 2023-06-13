 <?php 
                                            $i = 1;
                                          if(!empty($student)){
                                            foreach($student as $row)
                                            { 
                                            ?>
                                        <tr class="odd">
                                                
                                                <td><?php echo $i;?></td>
                                                <td><?php if (!empty($row['gram_panchayat_id'])) { $sql = $this->student_model->list_common_where3('grampanchyat','id',$row['gram_panchayat_id']);?> <?php echo $sql[0]['gram_panchyat']?> <?php }?></td>
                                                <td><?php if (!empty($row['name'])) {?><?php echo $row['name']?> <?php }?></td>
                                                <td ><?php if (!empty($row['father_name'])) {?><?php echo $row['father_name']?> <?php }?></td>
                                                <td><?php if (!empty($row['class_section'])) {?><?php echo $row['class_section']?> <?php }?></td>
                                          		<td ><?php if (!empty($row['contact'])) {?><?php echo $row['contact']?> <?php }?></td>
                                                <td><?php if (!empty($row['school'])) {?><?php echo $row['school'];?> <?php }?></td>
                                          		 <td>

                                          <i class="ri-phone-line" style="color: blue;" class="" data-bs-toggle="modal" onclick="show_call(<?php echo $row['contact']; ?>)" data-bs-target="#editsubadmin" data-call="<?php echo $row['contact']; ?>"></i>

                                          </td>
                                               
                                          	<!--	 <?php if($this->rbac->hasPrivilege('school_data','can_edit')) { ?>
                                                <td>

                                                    <i class="ri-edit-box-line editmodel" style="color: blue;" class="" data-bs-toggle="modal" data-bs-target="#editsubadmin" data-id="<?php echo $row['id']; ?>"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <i class="ri-delete-bin-line" name="archive" class="remove" type="submit" onclick="archiveFunction(<?php echo $row['id']; ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                                                </td>
                                            <?php } ?> -->

                                            
                                               
                                            </tr>
                                           <?php $i++; } }?>