
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kanban - To do list</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css" type="text/css">
  </head>
  <body>
    <div class="container-fluid">

      <h1>Kanban - To do list</h1>

      <button type="button" id="new-task" class="btn btn-success" data-toggle="modal" data-target="#edit-task"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New task</button>

      <div class="kanban">
        <div class="row">
          <div class="col-xs-4">
            <div id="todo">
              <h2>To do</h2>
              <div class="tasks-area">
                <div class="task">
                  <span class="task-title">Meu título</span>
                  <p class="task-description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vulputate dignissim mi a hendrerit. Cras nec tellus in sem bibendum porta venenatis quis mi.
                  </p>
                  <div class="task-menu">
                    <span class="glyphicon glyphicon-pencil edit-task-ico" aria-hidden="true" title="Edit task" data-toggle="modal" data-target="#edit-task"></span>
                    <span class="glyphicon glyphicon-trash delete-task-ico" aria-hidden="true" title="Delete task" data-toggle="modal" data-target="#delete-task"></span>
                    <span class="glyphicon glyphicon-move move-task-ico" aria-hidden="true" title="Move task"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-4">
            <div id="doing">
              <h2>Doing</h2>
              <div class="tasks-area">
              </div>
            </div>
          </div>
          <div class="col-xs-4">
            <div id="done">
              <h2>Done</h2>
              <div class="tasks-area">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
      include_once "editTask.php";
      include_once "deleteTask.php";
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>

  </body>
</html>
