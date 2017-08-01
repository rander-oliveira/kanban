<div class="modal fade" id="delete-task" tabindex="-1" role="dialog" aria-labelledby="deleteTask">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete task</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" class="ipt-task-id" value="">
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
          <h4>Are you sure you want to delete this task?</h4>
          <p>This is an irreversible action</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-success">Yes</button>
      </div>
    </div>
  </div>
</div>
