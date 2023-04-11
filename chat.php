<?php
require_once 'header.php';
include_once 'backend/config.php';


if (!$_SESSION['reference_id'] || !isset($_SESSION['reference_id']) || !$_GET['user_id']) {
  header('location: login.php');
}
?>

<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php



        $user_id = $_GET['user_id'];
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE reference_id = {$user_id} ");

        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);

        }

        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="backend/images/<?php echo $row['img']; ?>" alt="" />
        <div class="details">
          <span>
            <?php echo $row['fname'] . " " . $row['lname']; ?>
          </span>
          <p>
            <?php echo $row['status']; ?>
          </p>
        </div>
      </header>
      <div class="chat-box">
        <!-- <div class="chat outgoing">
          <div class="details">
            <p>jon bellion song</p>
          </div>
        </div> -->
        <!-- <div class="chat incoming">
          <img src="img.jpg" alt="" />
          <div class="details">
            <p>weight of the word</p>
          </div>
        </div> -->



      </div>
      <form action="#" class="typing-area">
        <input type="text" name="outgoing_id" value="<?php echo $_SESSION['reference_id'] ?>" hidden>
        <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="type a message here..." />
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>
</body>

</html>