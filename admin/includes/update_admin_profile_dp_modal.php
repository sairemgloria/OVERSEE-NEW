<!-- Modal -->
<div class="modal fade" id="updateDPModal" tabindex="-1" aria-labelledby="updateDPModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="updateDPModalLabel">Update Display Profile</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="./includes/update_admin_profile_dp_func.php" method="post" enctype="multipart/form-data">
            <div class="modal-body">
               <input type="hidden" class="form-control" name="ID" value="<?= $user['ID']; ?>">
               <div class="mb-3">
                  <label for="profile" class="control-label">Display Profile</label>
                  <input type="file" class="form-control" name="PROFILE">
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