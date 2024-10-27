<!-- Edit Info Modal -->
<div class="modal fade" id="editInfo" tabindex="-1" aria-labelledby="editInfoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editInfo">Edit Admin Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="./includes/edit_info_func.php" autocomplete="off">

          <input type="TEXT" name="ID" value="<?= $user['ID']; ?>" readonly>

          <div class="row">
            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="name" class="control-label">Name</label>
                <input type="text" class="form-control" name="NAME" placeholder="Name" value="<?php echo $user['NAME']; ?>" required>
              </div>
            </div>

            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="username" class="control-label">Username</label>
                <input type="text" class="form-control" name="USERNAME" placeholder="Username" value="<?php echo $user['USERNAME']; ?>" required>
              </div>
            </div>

            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="password" class="control-label">Password</label>
                <input type="password" class="form-control" name="PASSWORD" placeholder="Password">
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="UPDATE" class="btn btn-primary">Update</button>
          </div>

        </form>
      </div>
    </div>
  </div>