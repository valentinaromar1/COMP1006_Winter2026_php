<?php require "includes/header.php" ?>

<main>
    <h2> Online resume builder (beta v0.1)</h2>
    <form action="process.php" method="post">

    <fieldset>
    <!-- Customer Information (copied from in class example with few tweeks) -->
      <legend>Resume Information input</legend>
        <label for="first_name" class="form-label">First name</label>
        <input type="text" id="first_name" name="first_name" class="form-control">

        <label for="last_name" class="form-label">Last name</label>
        <input type="text" id="last_name" name="last_name" class="form-control">

        <label for="phone" class="form-label">Phone number</label>
        <input type="tel" id="phone" name="phone" placeholder="555-123-4567" class="form-control">

        <label for="email" class="form-label">Email</label>
        <input type="text" id="email" name="email" class="form-control">
        
        <label for="currentPos" class="form-label">Current Possition</label>
        <input type="text" id="email" name="email" class="form-control">
    </fieldset>

    <fieldset>
      <!--prompt users to add small description of themself and their skills -->
    <legend>Personal Information</legend>

      <p>
        <label for="skills" class="form-label">List skills</label>
        <textarea id="skills" name="skills" rows="8" placeholder="ex: team work, tech, " class="form-control"></textarea>
      </p>

      <p>
        <label for="bio" class="form-label">bio</label>
        <textarea id="bio" name="bio" rows="10" placeholder="ex: " class="form-control"></textarea>
      </p>
      <!--submits form for the resume-->
      </fieldset>

      <p>
        <button type="submit" class="btn btn-primary">done resume</button>
      </p>
      
  </form>
</main> 