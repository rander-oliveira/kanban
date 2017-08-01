<div class="modal fade" id="edit-task" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editTask">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Create / Edit task</h4>
      </div>
      <div class="modal-body">
        <form id="form-edit-task">
          <input type="hidden" class="ipt-task-id" value="">
          <div class="form-group">
            <label for="taskName">Task name*</label>
            <input type="text" class="form-control" id="ipt-task-name" placeholder="Task name">
          </div>
          <div class="form-group">
            <label for="taskDescription">Task description</label>
            <textarea class="form-control" id="txt-task-description" rows="3" placeholder="Task description"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success">Save</button>
      </div>
    </div>
  </div>
</div>
