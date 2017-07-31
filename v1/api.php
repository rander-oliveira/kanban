<?php
  $method = $_SERVER['REQUEST_METHOD'];
  $action = $_REQUEST["action"];

  /*
  task status
    1 = TO DO
    2 = DOING
    3 = DONE
    4 = DELETED
  */

  $return = array(
    'error' => 'false',
    'message' => '',
    'response' => null,
  );

  if ($action != 'create' && $action != 'edit' && $action != 'delete' && $action != 'move') {
    $return['error'] = true;
    $return['message'] = "Bad request";
  } else {
    if ($action == 'create') {
      // CREATE TASK

      $name = (isset($_REQUEST['name'])) ? $_REQUEST['name'] : '';

      if ($name == '') {
        $return['error'] = true;
        $return['message'] = "Name task is required";
      } else {
        $description = (isset($_REQUEST['description'])) ? $_REQUEST['description'] : '';
        $status = 1;

        include_once "../settings/db.php";

        try {
          $pdo = new PDO('mysql:host=localhost;dbname=to_do_list', $usr, $psw);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $stmt = $pdo->prepare('INSERT INTO task VALUES(:id, :name, :description, :status)');
          $stmt->execute(array(
            ':id' => null,
            ':name' => $name,
            ':description' => $description,
            ':status' => $status,
          ));
        } catch(PDOException $e) {
          $return['error'] = true;
          $return['message'] = $e->getMessage();
        }
      }
    } elseif ($action == 'edit') {
      //EDIT TASK

      $id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : '';
      $name = (isset($_REQUEST['name'])) ? $_REQUEST['name'] : '';

      if ($id == '' || $name == '') {
        $return['error'] = true;
        $return['message'] = "ID and name task are required";
      } else {
        $description = (isset($_REQUEST['description'])) ? $_REQUEST['description'] : '';

        include_once "../settings/db.php";

        try {
          $pdo = new PDO('mysql:host=localhost;dbname=to_do_list', $usr, $psw);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $stmt = $pdo->prepare('UPDATE task SET name = :name, description = :description  WHERE id = :id');
          $stmt->execute(array(
            ':name' => $nome,
            ':description' => $description,
            ':id'   => $id,
          ));
        } catch(PDOException $e) {
          $return['error'] = true;
          $return['message'] = $e->getMessage();
        }
      }
    } elseif ($action == 'move') {
      // MOVE TASK

      $id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : '';
      $status = (isset($_REQUEST['status'])) ? $_REQUEST['status'] : '';

      if ($status <= 0 || $status >= 4 || id == '') {
        $return['error'] = true;
        $return['message'] = "ID and status are required";
      } else {
        include_once "../settings/db.php";

        try {
          $pdo = new PDO('mysql:host=localhost;dbname=to_do_list', $usr, $psw);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $stmt = $pdo->prepare('UPDATE task SET status = :status  WHERE id = :id');
          $stmt->execute(array(
            ':status' => $status,
            ':id'   => $id,
          ));
        } catch(PDOException $e) {
          $return['error'] = true;
          $return['message'] = $e->getMessage();
        }
      }
    } else {
      //DELETE TASK

      $id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : '';

      if ($id == '') {
        $return['error'] = true;
        $return['message'] = "ID is required";
      } else {
        include_once "../settings/db.php";

        try {
          $pdo = new PDO('mysql:host=localhost;dbname=to_do_list', $usr, $psw);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $stmt = $pdo->prepare('DELETE FROM task WHERE id = :id');
          $stmt->execute(array(
            ':id' => $id,
          ));
        } catch(PDOException $e) {
          $return['error'] = true;
          $return['message'] = $e->getMessage();
        }
      }
    }
  }

  echo json_encode($return);

?>
