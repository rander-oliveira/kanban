$(document).ready(function(){
  //modal create/edit task
  $("#edit-task .btn-danger").on("click", function(){
    //clear fields
    $("#form-edit-task").find("#ipt-task-id").val("");
    $("#form-edit-task").find("#ipt-task-name").val("");
    $("#form-edit-task").find("#txt-task-description").val("");
  });

  $("#edit-task .btn-success").on("click", function(){
    //get values
    var taskId = $("#form-edit-task").find("#ipt-task-id").val();
    var taskName = $("#form-edit-task").find("#ipt-task-name").val();
    var descName = $("#form-edit-task").find("#txt-task-description").val();

    console.log(taskId);
    console.log(taskName);
    console.log(descName);

    if (taskName == "") {
      alert("Task name is empty");
    } else {
      if (taskId == ""){
        //Create new task
      } else{
        //Edit task
      }
    }
  });
});
