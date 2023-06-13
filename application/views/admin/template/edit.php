<input type="hidden" class="form-control" name="rowid" id="rowid" value="<?=$item[0]['id'] ?? '' ?>">

<div class="col-xxl-12 mb-3">
  <div>
    <label for="firstName" class="form-label">Template Title</label>
    <input type="text" class="form-control" name="template_name" id="template_name" value="<?=$item[0]['template_name'] ?? '' ?>">
  </div>
</div>
<!--end col-->
<div class="col-xxl-12 mb-3">
  <div>
    <label for="lastName" class="form-label">Template Text</label>
    <textarea class="form-control" name="message" id="message"><?=$item[0]['message'] ?? '' ?></textarea>
  </div>
  <div class="error" id="subemailError"></div>
</div>

<div class="col-xxl-12 mb-3">
  <div>
    <label for="firstName" class="form-label">Template ID</label>
    <input type="text" class="form-control" name="template_id" id="template_id" value="<?=$item[0]['template_id'] ?? '' ?>">
  </div>
</div>