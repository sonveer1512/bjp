<?php 
                                            $i = 1;
                                          if(!empty($student)){
                                            foreach($student as $row)
                                            { 
                                            ?>
                                        <tr class="odd">
                                                
                                                <td><?php echo $i;?></td>
                                                <td><?php if (!empty($row['gram_panchayat_id'])) { $sql = $this->student_model->list_common_where3('grampanchyat','id',$row['gram_panchayat_id']);?> <?php echo $sql[0]['gram_panchyat']?> <?php }?></td>
                                                <td><?php if (!empty($row['booth_select'])) {?><?php echo $row['booth_select']?> <?php }?></td>
                                          		<td><?php if (!empty($row['name'])) {?><?php echo $row['name']?> <?php }?></td>
                                                <td ><?php if (!empty($row['father_name'])) {?><?php echo $row['father_name']?> <?php }?></td>
                                                <td><?php if (!empty($row['gender'])) {?><?php echo $row['gender']?> <?php }?></td>
                                          		<td><?php if (!empty($row['age'])) {?><?php echo $row['age']?> <?php }?></td>
                                          		<td ><?php if (!empty($row['contact'])) {?><?php echo $row['contact']?> <?php }?></td>
                                          		<td ><?php if (!empty($row['address'])) {?><?php echo $row['address']?> <?php }?></td>
                                                <td><?php if (!empty($row['mukhya_gram'])) {?><?php echo $row['mukhya_gram'];?> <?php }?></td>
                                          		<td><?php if (!empty($row['ward_no'])) {?><?php echo $row['ward_no'];?> <?php }?></td>
                                          		<td><?php if (!empty($row['ward_gram'])) {?><?php echo $row['ward_gram'];?> <?php }?></td>
                                          <td><?php if (!empty($row['mohalla'])) {?><?php echo $row['mohalla'];?> <?php }?></td>
                                          <td><?php if (!empty($row['voter_sr_no'])) {?><?php echo $row['voter_sr_no'];?> <?php }?></td>
                                          <td><?php if (!empty($row['sub_caste'])) {?><?php echo $row['sub_caste'];?> <?php }?></td>
                                          <td><?php if (!empty($row['caste'])) {?><?php echo $row['caste'];?> <?php }?></td>
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