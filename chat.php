<?php require_once 'header.php';

if (!$_SESSION['reference_id'] || !isset($_SESSION['reference_id'])) {
  header('location: login.php');
}
?>

<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <a href="#" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="img.jpg" alt="" />
        <div class="details">
          <span>sam</span>
          <p>active now</p>
        </div>
      </header>
      <div class="chat-box">
        <div class="chat outgoing">
          <div class="details">
            <p>jon bellion song</p>
          </div>
        </div>
        <div class="chat incoming">
          <img src="img.jpg" alt="" />
          <div class="details">
            <p>weight of the word</p>
          </div>
        </div>
        <div class="chat outgoing">
          <div class="details">
            <p>jon bellion song</p>
          </div>
        </div>
        <div class="chat incoming">
          <img src="img.jpg" alt="" />
          <div class="details">
            <p>weight of the word</p>
          </div>
        </div>
        <div class="chat outgoing">
          <div class="details">
            <p>jon bellion song</p>
          </div>
        </div>
        <div class="chat incoming">
          <img src="img.jpg" alt="" />
          <div class="details">
            <p>weight of the word</p>
          </div>
        </div>
        <div class="chat outgoing">
          <div class="details">
            <p>jon bellion song</p>
          </div>
        </div>
        <div class="chat incoming">
          <img src="img.jpg" alt="" />
          <div class="details">
            <p>weight of the word</p>
          </div>
        </div>
        <div class="chat outgoing">
          <div class="details">
            <p>jon bellion song</p>
          </div>
        </div>
        <div class="chat incoming">
          <img src="img.jpg" alt="" />
          <div class="details">
            <p>weight of the word</p>
          </div>
        </div>
      </div>
      <form action="#" class="typing-area">
        <input type="text" placeholder="type a message here..." />
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>
</body>

</html>