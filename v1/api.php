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
    'error' => '',
    'message' => '',
    'response' => '',
  );

  if ($action != 'create' && $action != 'edit' && $action != 'delete' && $action != 'move') {
    $return['error'] = true;
    $return['message'] = "Bad request";
    $return['response'] = null;
  } else {
    if ($action == 'create') {
      $name = (isset($_REQUEST['name'])) ? $_REQUEST['name'] : '';

      if ($name == '') {
        $return['error'] = true;
        $return['message'] = "Name task is required";
        $return['response'] = null;
      } else {
        $description = (isset($_REQUEST['description'])) ? $_REQUEST['description'] : '';
        $date = date( [, $timestamp])
        $status = 1;

        include_once "../settings/connectDb.php";
          INSERT INTO `task` (`id`, `name`, `description`, `creation_date`, `status`, `last_update`) VALUES (NULL, 'test', 'bla bla bla', '2017-07-31', '1', '2017-07-31');
        $query = "INSERT INTO 'task' ('name', 'description', 'creation_date', 'status', 'last_update') VALUES ()";
      }
    }
  }


  // cria a instrução SQL que vai selecionar os dados
  $query = sprintf("SELECT identificador, nome, telefone FROM cadastro");
  // executa a query
  $dados = mysql_query($query, $con) or die(mysql_error());
  // transforma os dados em um array
  $linha = mysql_fetch_assoc($dados);
  // calcula quantos dados retornaram
  $total = mysql_num_rows($dados);

?>
