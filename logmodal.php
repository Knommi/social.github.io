

<!-- Modal -->
<div class="modal fade" id="logmodal" tabindex="-1" aria-labelledby="logmodallabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logmodallabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
  
  <form action="handlelog.php" method="post">
    <div class="modal-body">
      
      <div class="form-group">
        <label for="validationCustom01" class="form-label">Username:</label>
        <input type="text" class="form-control" id="lemail" name="lemail" aria-describedby="emailHelp">
        <!-- <small id="emailHelp" class="form-text text-muted">Sdsnfdfsnfkldsfnk</small> -->
      </div>

      <div class="form-group">
        <label for="valid" class="form-label">Password:</label>
        <input type="password" class="form-control" id="lpass" name="lpass" aria-describedby="emailPass">
      </div>
    

        <button class="btn btn-primary" type="submit">Login</button>
      </div>

      
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
  </form>

    </div>
  </div>
</div>