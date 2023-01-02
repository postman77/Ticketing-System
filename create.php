<?php
include 'functions.php';
$pdo = pdo_connect_mysql();

$msg = '';

if (isset($_POST['title'], $_POST['email'], $_POST['msg'])) {
    if (empty($_POST['title']) || empty($_POST['email']) || empty($_POST['msg'])) {
        $msg = 'Please complete the form!';
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $msg = 'Please provide a valid email address!';
    } else {
        $stmt = $pdo->prepare('INSERT INTO tickets (title, email, msg) VALUES (?, ?, ?)');
        $stmt->execute([ $_POST['title'], $_POST['email'], $_POST['msg'] ]);
        header('Location: view.php?id=' . $pdo->lastInsertId());
    }
}
?>

<?=template_header('Create Ticket')?>

<div class="content create">
	<h2>Create Ticket</h2>
    <form action="create.php" method="post">
        <label for="title">Title</label>
        <input type="text" name="title" placeholder="Title" id="title" required>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Enter your email" id="email" required>
        <label for="msg">Message</label>
        <textarea name="msg" placeholder="Enter your message here..." id="msg" required></textarea>
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>