<?php
//TODO:
require "includes/connect.php";

/*
  TODO:
  1. Write a SELECT query to get all subscribers*///2. Add ORDER BY subscribed_at DESC
  $sql = "SELECT * FROM process
          WHERE frist_Name = '$firstName',
          last_name = '$lastName',
          email = '$email'
          ORDER BY subscribed_at DESC";
  //3. Prepare the statement
  $stmt = $pdo->prepare($sql);
  //4. Execute the statement
  $stmt->execute([
  ":first_name" => $firstName,
  ":last_name" => $lastName,
  ":email" => $email,
  ]);

  //5. Fetch all results into $subscribers
  $subscribers = $stmt->fetchAll(PDO::FETCH_ASSOC);


$subscribers = []; // placeholder
?>

<main class="container mt-4">
  <h1>Subscribers</h1>

  <?php if (count($subscribers) === 0): ?>
    <p>No subscribers yet.</p>
  <?php else: ?>
    <table class="table table-bordered mt-3">
      <thead>
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Subscribed</th>
        </tr>
      </thead>
      <tbody>
        <!-- TODO: Loop through $subscribers and output each row -->
      </tbody>
    </table>
  <?php endif; ?>

  <p class="mt-3">
    <a href="index.php">Back to Subscribe Form</a>
  </p>
</main>

<?php require "includes/footer.php"; ?>
