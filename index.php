<?php
require_once 'Database.php';
$db = new Database();

/**
 * Get User
 */
/*$name = 'John';
$email = 'smith@mail.com';
$sql = $db->prepare("SELECT * FROM users WHERE user_name = :user_name AND user_email = :user_email");
$sql->execute([
  ':user_name' => $name,
  ':user_email' => $email
]);
$user = $sql->fetchAll();
var_dump($user);*/

$users = $db->query("SELECT * FROM users");
foreach ($users as $user) {
  echo '<br>';
  echo 'User Name: '. $user['user_name'];
  echo '<br>';
  echo 'User Email: '. $user['user_email'];
  echo '<br>-------';
}