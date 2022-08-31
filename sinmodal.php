<!-- Modal -->
<div class="modal fade" id="sinmodal" tabindex="-1" aria-labelledby="sinmodallabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sinmodallabel">Sing Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
  
  <form action="handlesign.php" method="post">
    <div class="modal-body">
      
      <div class="form-group">
        <label for="validationCustom01" class="form-label">Username:</label>
        <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        <!-- <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"> -->
        <!-- <small id="emailHelp" class="form-text text-muted">Sdsnfdfsnfkldsfnk</small> -->

      </div>

      <div class="form-group">
        <label for="valid" class="form-label">Password:</label>
        <input type="password" class="form-control" id="spass" name="spass" aria-describedby="emailPass">
      </div>
      
      <div class="form-group">
        <label for="valid" class="form-label">Confirm Password:</label>
        <input type="password" class="form-control" id="scpass" name="scpass" aria-describedby="emailPass">
      </div>

        <button class="btn btn-primary" type="submit">Sign Up</button>
      </div>

      
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
  </form>

    </div>

  </div>
</div>

     <!-- <span class="input-group-text" id="inputGroupPrepend">@</span>