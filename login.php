<?php require_once 'header.php'; ?>

<body>
  <div class="wrapper">
    <section class="form login">
      <header>Login</header>
      <form action="#">
        <div class="error-txt"></div>

        <div class="field input">
          <label for="email">email</label>
          <input type="text" name="email" placeholder="email" />
        </div>
        <div class="field input">
          <label for="password">password</label>
          <i class="fas fa-eye" id="eye"></i>
          <input type="password" name="password" placeholder="enter new password" />
        </div>

        <div class="field button">
          <input type="submit" value="Login" />
        </div>
      </form>
      <div class="link">don't have an account? <a href="index.php">sign up</a></div>
    </section>
  </div>
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>
</body>

</html>