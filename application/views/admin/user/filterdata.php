<?php
$sn = 1;
if ($filterdata) {
    foreach ($filterdata as $value) {
        // print_r($value); exit();
?>
        <tr <?php if ($value['datastatus'] == 'active') { ?> style="background:#F97D09;color:white;" <?php }
                                                                                                if ($value['datastatus'] == 'fakedata') { ?> style="background:red;color:white;" <?php }
                                                                                                                                                                                    if ($value['datastatus'] == 'inactive') { ?> style="background:#278D27;color:white;" <?php } ?>>
             <th scope="row">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="checkAll" id="flexSwitchCheckChecked" value="<?= $value['id'] ?>">
                                                            </div>
                                                        </th>
                                                        <?php if (!empty($value['bjp_congress'])) { ?>
                                                            <td>
                                                                <?php if ($value['bjp_congress'] == 'congress') { ?>
                                                                    <img src="<?= base_url() ?>assets/images/cong_logo.png" alt="" data-toggle="tooltip" data-placement="bottom" title="<?= $value['ex_man'] ?>" class="avatar-xs rounded-circle me-2 shadow" data-bs-toggle="modal" data-bs-target="#editexmembers" onclick="edit_ex_deginity(<?= $value['id'] ?>)">
                                                                <?php } else { ?>
                                                                    <img src="<?= base_url() ?>assets/images/14.png" alt="" data-toggle="tooltip" data-placement="bottom" title="<?= $value['ex_man'] ?>" class="avatar-xs rounded-circle me-2 shadow" data-bs-toggle="modal" data-bs-target="#editexmembers" onclick="edit_ex_deginity(<?= $value['id'] ?>)">
                                                                <?php } ?>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td></td>
                                                        <?php } ?>

                                                        <td>
                                                            <?php echo $offset++; ?>
                                                        </td>

            <td>

                <?php

                $c12 = $value['panchayatsimit'];
                $this->db->select('*');
                $this->db->from('pachayatsimiti');
                $this->db->where('id', $c12);
                $rows3 = $this->db->get()->row();

                ?>
                <?php if (!empty($rows3->pachayatsimiti)) {
                    echo $rows3->pachayatsimiti;
                } else {
                    echo '';
                } ?>


            </td>
            <td>
                <?php

                $c13 = $value['gram_panchanyat'];
                $this->db->select('*');
                $this->db->from('grampanchyat');
                $this->db->where('id', $c13);
                $rows4 = $this->db->get()->row();

                ?>

                <?php if (!empty($rows4->gram_panchyat)) {
                    echo $rows4->gram_panchyat;
                } else {
                    echo '';
                } ?>


            </td>
            <td>
                <?php

                $c14 = $value['gram'];
                $this->db->select('*');
                $this->db->from('gramdetail');
                $this->db->where('id', $c14);
                $rows5 = $this->db->get()->row();

                ?>
                <?php if (!empty($rows5->gramname)) {
                    echo $rows5->gramname;
                } else {
                    echo '';
                } ?>


            </td>

            <td><?= $value['tashsil']; ?></td>
            <td> <?php

                    $mohalla = $value['moholla'];
                    $this->db->select('*');
                    $this->db->from('mohalla');
                    $this->db->where('id', $mohalla);
                    $rows6 = $this->db->get()->row();

                    ?>
                <?php if (!empty($rows6->mohalla)) {
                    echo $rows6->mohalla;
                } else {
                    echo '';
                } ?></td>
            <td><?= $value['name']; ?></td>
            <td><?= $value['f_name'] ?></td>
            <td>
                <?php

                $c = $value['dharm'];
                $this->db->select('*');
                $this->db->from('dharm');
                $this->db->where('id', $c);
                $rows1 = $this->db->get()->row();

                ?>
                <?php if (!empty($rows1->dharm)) {
                    echo $rows1->dharm;
                } else {
                    echo '';
                } ?>
            </td>
            <td><?= $value['caste'] ?></td>
            <td><?= $value['mobile'] ?></td>
            <td><?= $value['whtup'] ?></td>
            <td><?= $value['verify'] ?></td>
            <td><?= $value['aadharno'] ?></td>
            <td><?= $value['voteridno'] ?></td>
            <td><?= $value['marriedstatus'] ?></td>
            <td><?= $value['dateofmarriage'] ?></td>
            <td><?= $value['birthd'] ?></td>
            <td><?= $value['sadasha_varsh'] ?></td>
            <td><?= $value['vartaman_pad'] ?></td>
            <td><?= $value['purv_pad'] ?></td>
            <td><?= $value['vidhan_sabha'] ?></td>
            <td><?= $value['cities_id'] ?></td>
            <td>
                <a href="<?= base_url() ?>editbjp/<?= $value['id'] ?>"><i class="ri-edit-box-line " style="color: blue;"></i></a>
            </td>
            <?php if ($value['flag'] == 0) {
            ?>
                <td>
                    <i class="ri-checkbox-circle-line" data-toggle="tooltip" data-placement="bottom" title="Disable Your Account" name="archive" class="remove" type="submit" onclick="disableaccount1(<?= $value['id'] ?>)" data-toggle="tooltip" data-placement="bottom" style="color: green;"></i>
                </td>
            <?php } else { ?>
                <td>
                    <i class="ri-alert-line" data-toggle="tooltip" data-placement="bottom" title="Enable Your Account" name="archive" class="remove" type="submit" onclick="enableaccount(<?= $value['id'] ?>)" data-toggle="tooltip" data-placement="bottom" style="color: red;"></i>
                </td>
            <?php } ?>
        </tr>
<?php $sn++;
    }
} ?>