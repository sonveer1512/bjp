 <?php
                                                        $i = 1;
                                                        if (!empty($content)) {
                                                            foreach ($content as $row) {
                                                        ?>
                                                       
                                                                <tr class="odd" style="background-color: <?php if($row['Status'] == 'completed') { echo '#11942e'; } ?>">
                                                                   <!-- <td scope="col">
                                                                        <div class="form-check">
                                                                            <input type="checkbox" class="form-check-input check_class checkbox" id="id_1" name="camp_id[]" value="<?= $row['id'] ?>">
                                                                            <label class="form-check-label" for="cardtableCheck01"></label>
                                                                        </div>
                                                                    </td> -->
                                                                    <td><?php echo $i; ?></td>
                                                                    <!--<td><?php if (!empty($row['gram_panchayat_id'])) {
                                                                            $sql = $this->student_model->list_common_where3('grampanchyat', 'id', $row['gram_panchayat_id']); ?> <?php echo $sql[0]['gram_panchyat'] ?> <?php } ?></td>-->
                                                                  
                                                                    <td><?php if (!empty($row['mobile'])) { ?><?php echo $row['mobile'] ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['Sid'])) { ?><?php echo $row['Sid'] ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['DateCreated'])) { ?><?php echo $row['DateCreated'] ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['AccountSid'])) { ?><?php echo $row['AccountSid'] ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['call_To'])) { ?><?php echo $row['call_To'] ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['call_From'])) { ?><?php echo $row['call_From'] ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['StartTime'])) { ?><?php echo $row['StartTime']; ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['EndTime'])) { ?><?php echo $row['EndTime']; ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['Duration'])) { ?><?php echo $row['Duration']; ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['Price'])) { ?><?php echo $row['Price']; ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['Uri'])) { ?><?php echo $row['Uri']; ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['RecordingUrl'])) { ?><?php echo $row['RecordingUrl']; ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['is_verified'])) { ?><?php echo $row['is_verified']; ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['is_verify_satus'])) { ?><?php echo $row['is_verify_satus']; ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['remark'])) { ?><?php echo $row['remark']; ?> <?php } ?></td>
                                                                    
                                                                </tr>
                                                        <?php $i++;
                                                            }
                                                        } ?>