<?php $i = 0;
foreach ($parent_list as $value) {
    $i++; ?>
   <li class="list-group-item showchild_1" id="parent_<?= $value['id'] ?>" onclick="openchild(<?= $value['id'] ?>,'2')"><a href="#"> <?= $i; ?> . <?= $value['name'] ?></a></li>
<?php } ?>


