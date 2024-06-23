<!-- Modal -->
<div class="modal fade" id="myUploadProfileModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Update Display Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="./includes/upload_user_display_profile.php" autocomplete="off" onSubmit="return valid();" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="ID" value="<?= $userAcc['ID']; ?>">
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <div class="form-group">
                                <label for="profile" class="control-label">Display Profile</label>
                                <input type="file" class="form-control" name="PROFILE">
                            </div>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <div class="d-grid">
                                <button type="reset" class="btn btn-light" onclick="window.alert('Form cleared. Please provide a new data.')">
                                    <i class="material-icons" id="material-icon">restart_alt</i> Reset
                                </button>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="update" name="UPDATE" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>