<table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                      
                                        <tbody id="productdetailsdiv">
                                            <?php
                                            $sn = 1;
                                            if ($useritem->uderdata) {
                                                foreach ($useritem->uderdata as $value) {
                                                    // print_r($value); exit();
                                            ?>
                                                    <tr>
                                                        <td>
                                                            <?= $sn++; ?>
                                                        </td>
                                                        <td><?= $value->name; ?></td>
                                                        <td><?= $value->f_name ?></td>
                                                        <td><?= $value->dharm ?></td>
                                                        <td><?= $value->caste ?></td>
                                                        <td><?= $value->mobile ?></td>
                                                        <td><?= $value->whtup ?></td>
                                                        <td><?= $value->verify ?></td>
                                                        <td><?= $value->aadharno ?></td>
                                                        <td><?= $value->voteridno ?></td>
                                                        <td><?= $value->marriedstatus ?></td>
                                                        <td><?= $value->dateofmarriage ?></td>
                                                        <td><?= $value->birthd ?></td>
                                                        <td><?= $value->sadasha_varsh ?></td>
                                                        <td><?= $value->vartaman_pad ?></td>
                                                        <td><?= $value->purv_pad ?></td>
                                                        <td><?= $value->vidhan_sabha ?></td>
                                                        <td><?= $value->cities_id ?></td>
                                                        <td>
                                                            <i class="ri-edit-box-line editmodel" style="color: blue;" class="" data-bs-toggle="modal" data-bs-target="#editsubadmin" data-id="<?= $value->id; ?>"></i>
                                                        </td>
                                                        <?php if ($value->flag == 0) {
                                                        ?>
                                                            <td>
                                                                <i class="ri-checkbox-circle-line" data-toggle="tooltip" data-placement="bottom" title="Disable Your Account" name="archive" class="remove" type="submit" onclick="disableaccount1(<?= $value->id; ?>)" data-toggle="tooltip" data-placement="bottom" style="color: green;"></i>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td>
                                                                <i class="ri-alert-line" data-toggle="tooltip" data-placement="bottom" title="Enable Your Account" name="archive" class="remove" type="submit" onclick="enableaccount(<?= $value->id; ?>)" data-toggle="tooltip" data-placement="bottom" style="color: red;"></i>
                                                            </td>
                                                        <?php } ?>
                                                    </tr>
                                            <?php }
                                            } ?>


                                        </tbody>
                                    </table><!-- end table -->
