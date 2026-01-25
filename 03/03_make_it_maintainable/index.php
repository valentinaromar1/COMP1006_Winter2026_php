
/* What's the Problem? 
    - PHP logic + HTML in one file
    - Works, but not scalable
    - Repetition will become a problem

    How can we refactor this code so it’s easier to maintain?
*/


<!DOCTYPE html>
<html>

<head>
    <title>My PHP Page</title>
</head>

<header>
<h1>Welcome</h1>
</header>

<body>
<ul>
    <?php foreach ($items as $item): ?>
        <li><?= $item ?></li>
    <?php endforeach; ?>
</ul>

<footer>
    <p> &copy; 2026</p>
</footer>
</body>

</html>
