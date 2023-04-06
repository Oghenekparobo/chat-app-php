<?php
require_once 'header.php';
include_once 'backend/config.php';

if (!$_SESSION['reference_id'] || !isset($_SESSION['reference_id'])) {
  header('location: login.php');

}


?>
<div class="wrapper">
  <section class="users">
    <header>
      <?php

      $sql = mysqli_query($conn, "SELECT * FROM users WHERE reference_id = {$_SESSION['reference_id']} ");

      if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);

      }



      ?>
      <div class="content">
        <img src="backend/images/<?php echo $row['img']; ?>" alt="" />
        <div class="details">
          <span>
            <?php echo $row['fname'] . " " . $row['lname']; ?>
          </span>
          <p>
            <?php echo $row['status']; ?>
          </p>
        </div>
      </div>
      <a href="#" class="logout">logout</a>
    </header>
    <div class="search">
      <input type="text" placeholder="enter name to search" />
      <button><i class="fas fa-search"></i></button>
    </div>
    <div class="users-list">
      <a href="">
        <div class="content">
          <img src="img.jpg" alt="" />
          <div class="details">
            <span>steph</span>
            <p>this is a text message</p>
          </div>
          <div class="status-dot">
            <i class="fas fa-circle"></i>
          </div>
        </div>
      </a>
      <a href="">
        <div class="content">
          <img src="img.jpg" alt="" />
          <div class="details">
            <span>steph</span>
            <p>this is a text message</p>
          </div>
          <div class="status-dot">
            <i class="fas fa-circle"></i>
          </div>
        </div>
      </a>
      <a href="">
        <div class="content">
          <img src="img.jpg" alt="" />
          <div class="details">
            <span>steph</span>
            <p>this is a text message</p>
          </div>
          <div class="status-dot">
            <i class="fas fa-circle"></i>
          </div>
        </div>
      </a>
      <a href="">
        <div class="content">
          <img src="img.jpg" alt="" />
          <div class="details">
            <span>steph</span>
            <p>this is a text message</p>
          </div>
          <div class="status-dot">
            <i class="fas fa-circle"></i>
          </div>
        </div>
      </a>
    </div>
  </section>
</div>
<script src="javascript/users.js"></script>
</body>

</html>