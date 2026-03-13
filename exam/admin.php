<main>
    <legend>Information input log</legend>

        <p>first name: <?= htmlspecialchars($firstName)?></p>
        
        <p>last name: <?= htmlspecialchars($lastName) ?></p>
       
        <P>email: <?= htmlspecialchars($email)?></P>

        <p>Phone number: <?= htmlspecialchars($phone)?></p>
    
    <button class="btn btn-primary">make Changes</button>
    <a href="Update.php" class="btn btn-secondary">Cancel</a>
    
    <button class="btn btn-primary">DELETE</button>
    <a href="delete.php" class="btn btn-secondary">Cancel</a>
</main>