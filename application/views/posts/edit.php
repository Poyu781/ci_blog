<?php echo form_open('posts/edit'); ?>
  <div class="form-group">
    <label>ID</label>
    <input type="text" class="form-control" name="id" value="" readonly>
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"></textarea>
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
<?php echo form_close(); ?>
<script src="<?php echo site_url('assets/js/edit.js'); ?>" type="text/javascript"></script>