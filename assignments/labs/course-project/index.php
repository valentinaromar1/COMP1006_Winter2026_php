<main>
    <?php require "includes/header.php" ?>
    <?php require "includes/connect.php" ?>
    
    <form action="process.php" method="post">
  <body>
    <fieldset>
    <!-- Customer Information (copied from in class example with few tweeks) -->
    <!--the h2 elements are ment to breakup the page -->
    <em>  <legend>Resume Information input</legend>

      <label for="profile_image" class="form-label">profile image</label>
        <input type="file" id="profile_image" name="profile_image" class="form-control mb-4" accept=".jpg,.jpeg,.png,.webp">
<h2></h2>
        <label for="first_name" class="form-label">First name</label>
        <input type="text" id="first_name" name="first_name" class="form-control">
<h2></h2>
        <label for="last_name" class="form-label">Last name</label>
        <input type="text" id="last_name" name="last_name" class="form-control">
<h2></h2>
        <label for="phone" class="form-label">Phone number</label>
        <input type="tel" id="phone" name="phone" placeholder="555-123-4567" class="form-control">
<h2></h2>
        <label for="email" class="form-label">Email</label>
        <input type="text" id="email" name="email" class="form-control">
<h2></h2> 
        <label for="currentPos" class="form-label">Current Possition</label>
        <input type="text" id="currentPos" name="currentPos" class="form-control">
    </fieldset>
  </body>

    <fieldset>
      <!--prompt users to add small description of themself and their skills -->
    <legend>Personal Information</legend>

      <p>
        <label for="skills" class="form-label">List skills</label>
        <textarea id="skills" name="skills" rows="8" placeholder="ex: team work, tech, " class="form-control"></textarea>
      </p>
        <h2></h2>
      <p>
        <label for="bio" class="form-label">bio</label>
        <textarea id="bio" name="bio" rows="10" placeholder="ex: " class="form-control"></textarea>
      </p>
      <!--submits form for the resume-->
      </fieldset>
        <h2></h2>
      <p>
        <button type="submit" class="btn btn-primary">done resume</button>
      </p>
      <a href="homepage.php">home</a>
      </em>
  </form>
</main> 
