<?php require_once 'header.php'; ?>

<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Register</header>
      <form action="#" enctype="multipart/form-data">
        <div class="error-txt"></div>
        <div class="name-details">
          <div class="field input">
            <label for="firstname">firstname</label>
            <input type="text" name="fname" placeholder="first name" />
          </div>
          <div class="field input">
            <label for="lastname">lastname</label>
            <input type="text" name="lname" placeholder="last name" />
          </div>
        </div>
        <div class="field input">
          <label for="email">email</label>
          <input type="text" name="email" placeholder="email" />
        </div>
        <div class="field input">
          <label for="password">password</label>
          <i class="fas fa-eye" id="eye"></i>
          <input type="password" name="password" placeholder="enter new password" />
        </div>

        <div class="field image">
          <label for="image">select image</label>
          <input type="file" name="image" />
        </div>
        <div class="field button">
          <input type="submit" value="continue to chat" />
        </div>
      </form>
      <div class="link">
        already signed up? <a href="login.php">login now</a>
      </div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>


  <script src="javascript/signup.js"></script>
</body>

</html>