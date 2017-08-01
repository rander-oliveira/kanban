$(document).ready(function(){
  loadTasksAjax();

  //task
  $("#tasks-todo, #tasks-doing, #tasks-done").sortable({
    connectWith: ".tasks-area",
    handle: ".move-task-ico",
    cursor: "move",
    placeholder: "task-space",
    opacity: 0.7,
    stop: function(e, ui){
      updateTaskStatusAjax(ui.item);
    },
  });

  //edit task
  $(".tasks-area").on('click', '.edit-task-ico', function(e) {
    var id = $(this).parents(".task").find(".task-id").val();
    var name = $(this).parents(".task").find(".task-title").text();
    var description = $(this).parents(".task").find(".task-description").text();

    $("#form-edit-task").find(".ipt-task-id").val(id);
    $("#form-edit-task").find("#ipt-task-name").val(name);
    $("#form-edit-task").find("#txt-task-description").val(description);
  });

  //modal create/edit task
  $('#edit-task').on('hidden.bs.modal', function (e) {
    //clear fields
    $("#form-edit-task").find(".ipt-task-id").val("");
    $("#form-edit-task").find("#ipt-task-name").val("");
    $("#form-edit-task").find("#txt-task-description").val("");
  });

  $("#edit-task .btn-success").on("click", function(){
    //get values
    var taskId = $("#form-edit-task").find(".ipt-task-id").val();
    var taskName = $("#form-edit-task").find("#ipt-task-name").val();
    var taskDesc = $("#form-edit-task").find("#txt-task-description").val();

    if (taskName == "") {
      alert("Task name is empty");
    } else {
      if (taskId == ''){
        createTaskAjax(taskName, taskDesc);
      } else {
        editTaskAjax(taskId, taskName, taskDesc);
      }
    }
  });

  //delete task
  $(".tasks-area").on('click', '.delete-task-ico', function(e) {
    var id = $(this).parents(".task").find(".task-id").val();

    $("#delete-task").find(".ipt-task-id").val(id);
  });

  // modal delete task
  $("#delete-task .btn-success").on("click", function(){
    var id = $("#delete-task").find(".ipt-task-id").val();

    deleteTaskAjax(id);
  });

  $('#delete-task').on('hidden.bs.modal', function (e) {
    //clear fields
    $("#delete-task").find(".ipt-task-id").val("");
  });
});

function loadTasksAjax(){
  $.ajax({
    method: "GET",
    url: "v1/api.php",
    dataType: "json",
    data: {
      action: "load",
    }
  }).success(function(data){
    if (data.error) {
      alert("ERROR: "+data.message);
      return
    }
    showTasks(data.response);
  }).error(function(data){
    alert("Unexpected error");
  });
}

function createTaskAjax(name, description){
  $.ajax({
    method: "POST",
    url: "v1/api.php",
    dataType: "json",
    data: {
      action: "create",
      name: name,
      description: description,
    }
  }).success(function(data){
    if (data.error) {
      alert("ERROR: "+data.message);
      return
    }
    showTask(data.response);
    closeModal();
  }).error(function(data){
    alert("Unexpected error");
  });
}

function editTaskAjax(id, name, description){
  $.ajax({
    method: "POST",
    url: "v1/api.php",
    dataType: "json",
    data: {
      action: "edit",
      id: id,
      name: name,
      description: description,
    }
  }).success(function(data){
    if (data.error) {
      alert("ERROR: "+data.message);
      return
    }

    updateTask(data.response);
    closeModal();
  }).error(function(data){
    alert("Unexpected error");
  });
}

function updateTaskStatusAjax(element){
  var status = $(element).parent().data("task-status");
  var id = $(element).find(".task-id").val();

  $.ajax({
    method: "POST",
    url: "v1/api.php",
    dataType: "json",
    data: {
      action: "move",
      id: id,
      status: status,
    }
  }).success(function(data){
    if (data.error) {
      alert("ERROR: "+data.message);
      return
    }

    $(element).find(".task-status").val(data.status);
  }).error(function(data){
    alert("Unexpected error");
  });
}

function deleteTaskAjax(id){
  $.ajax({
    method: "POST",
    url: "v1/api.php",
    dataType: "json",
    data: {
      action: "delete",
      id: id,
    }
  }).success(function(data){
    if (data.error) {
      alert("ERROR: "+data.message);
      return
    }

    deleteTask(data.response);
    closeDeleteModal();
  }).error(function(data){
    alert("Unexpected error");
  });
}

function showTasks(tasks){
  $(tasks).each(function(i){
    showTask(tasks[i]);
  })
}

function showTask(task){
  var structure = '<div class="task">' +
    '<input type="hidden" class="task-id" value="'+task.id+'">'+
    '<input type="hidden" class="task-status" value="'+task.status+'">'+
    '<span class="task-title">'+task.name+'</span>'+
    '<p class="task-description">'+task.description+'</p>'+
    '<div class="task-menu">'+
      '<span class="glyphicon glyphicon-pencil edit-task-ico" aria-hidden="true" title="Edit task" data-toggle="modal" data-target="#edit-task"></span>'+
      '<span class="glyphicon glyphicon-trash delete-task-ico" aria-hidden="true" title="Delete task" data-toggle="modal" data-target="#delete-task"></span>'+
      '<span class="glyphicon glyphicon-move move-task-ico" aria-hidden="true" title="Move task"></span>'+
    '</div>'+
  '</div>';

  switch (task.status) {
    case '2':
      $("#tasks-doing").append(structure);
      break;
    case '3':
      $("#tasks-done").append(structure);
      break;
    default:
      $("#tasks-todo").append(structure);
      break;
  }
}

function updateTask(task) {
  var elm = $(".tasks-area").find(".task-id[value='"+task.id+"']");

  $(elm).parent(".task").find(".task-title").text(task.name);
  $(elm).parent(".task").find(".task-description").text(task.description);
}

function deleteTask(task){
  var elm = $(".tasks-area").find(".task-id[value='"+task.id+"']");

  $(elm).parent(".task").remove();
}

function closeModal(){
  $("#edit-task").find(".btn-danger").trigger("click");
}

function closeDeleteModal(){
  $("#delete-task").find(".btn-danger").trigger("click");
}
