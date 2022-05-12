<?php
    session_start();
    include('config.php');
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $userscore = $_POST['userscore'];
        $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            echo '<p class="error">Username password combination is wrong!</p>';
        } else {
            if (password_verify($password, $result['password'])) {
                $_SESSION['user_id'] = $result['id'];
                $query = $connection->prepare("UPDATE users SET score='" . $userscore . "' WHERE username='" . $_POST['username'] . "'");
                $result = $query->execute();
                if ($result) {
                    echo '<p class="success">Your score update was successful!</p>';
                    echo '<p class="success">Congratulations, your socre is in!</p>';
                    //header("location: dino");
                } else {
                    echo '<p class="error">Something went wrong!</p>';
                }


            } else {
                echo '<p class="error">Username password combination is wrong!</p>';
            }
        }
        //$connection->prepare("SELECT * FROM users WHERE username=:username");
        //$result = mysqli_query($connection,"SELECT * FROM users");
        //$query = $connection->prepare("SELECT * FROM users"); //You don't need a ; like you do in SQL
        //$result = $query->execute();

        $sql = 'SELECT id, username, score FROM users ORDER BY score';
        foreach ($connection->query($sql) as $row) {
          print "id:". $row['id'] . "\t";
          print "__username:". $row['username'] . "\t";
          print "__score:". $row['score'] . "\n /\/\/\/\ ";
          print "    ";
        }
      exit();

    }


?>

<form method="post" action="" name="signin-form">
  <div class="form-element">
    <label>Username</label>
    <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
  </div>

  <div class="form-element">
    <label>Password</label>
    <input type="password" name="password" required />
  </div>
  <div class="form-element">
  <label>New Score</label>
  <input type="text" name="userscore" required />
  </div>
  <button type="submit" name="login" value="login">update score</button>
</form>
