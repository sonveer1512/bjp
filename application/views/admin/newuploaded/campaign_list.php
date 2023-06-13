<?php $i = 1; if(!empty($item)){ foreach($item as $val) {?> 
<tr>
 <td class="fw-medium"><?php echo $i; ?></td>
<td><?php if (!empty($val['title'])) {?><?php echo $val['title']?> <?php }?></td>
 <td><?php if (!empty($val['date_time'])) {?><?php echo $val['date_time']?> <?php }?></td>
<td><?php if (!empty($val['discription'])) {?><?php echo $val['discription']?> <?php }?></td>
<td><button type="button" class="btn btn-success btn-sm" onclick="add_to_compaign(<?=$val['id']?>)">कैंपेन में जोड़ें <span id="count_comp">(0)</span> </button></td>
</tr>

<?php $i++; }} ?>
