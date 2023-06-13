<?php
if(!empty($item)) {
   $i=1;
foreach ($item  as  $row) {
  
?>
    <tr>
        <td><input type='checkbox' name="sendmsg[]" value="<?=$row['contact_no']?>"></td>
        <td><a href="#" class="fw-medium"><?php echo $i++  ?></a></td>
        <td>
            <?php if (!empty($row['refrence_id'])) {
                $refrence = $this->Subadmin_model->list_common_where3('master_hierarchy','id',$row['refrence_id']);
                if(!empty($refrence)) {
                    echo $refrence[0]['name'];
                }
            } ?>
        </td>
        <td><?php if (!empty($row['name'])) { ?><?php echo $row['name'] ?> <?php } ?></td>
        <td><?php if (!empty($row['liability'])) { ?><?php echo $row['liability'] ?> <?php } ?></td>
        <td><?php if (!empty($row['contact_no'])) { ?><?php echo $row['contact_no'] ?> <?php } ?></td>
        <td><?php if (!empty($row['dob'])) { ?><?php echo $row['dob'] ?> <?php } ?></td>
         <td>

      <i class="ri-phone-line" style="color: blue;" class="" data-bs-toggle="modal" onclick="show_call(<?php echo $row['contact_no']; ?>)" data-bs-target="#editsubadmin" data-call="<?php echo $row['contact_no']; ?>"></i>
     
  </td>
    </tr>
<?php
} } ?>