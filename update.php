<?php
require_once './core/config/database.php';
require_once './entities/contact.php';


$message = '';

$contact = new Contact();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (empty($errors)) {
        $contact = new Contact(
            $_POST['id'],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['telephone']
        );

        if ($contact->create()) {
            header("Location: read.php");
            exit;
        } else {
            $message = "Unable to update contact.";
        }
    }
} elseif (isset($_GET['id'])) {
    if (!$contact->getById($_GET['id'])) {
        header("Location: read.php");
        exit;
    }
} else {
    header("Location: read.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Contact</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets/css/index.css" />
</head>

<body>
    <div class="container">
        <div class="page-header">
            <h1>Update Contact</h1>
        </div>

        <?php if (!empty($message)): ?>
            <div class="alert alert-danger">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $contact->getId()); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $contact->getId(); ?>" />

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control"
                    value="<?php echo htmlspecialchars($contact->getNom()); ?>" required />
            </div>

            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" id="prenom" class="form-control"
                    value="<?php echo htmlspecialchars($contact->getPrenom()); ?>" required />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control"
                    value="<?php echo htmlspecialchars($contact->getEmail()); ?>" required />
            </div>

            <div class="form-group">
                <label for="telephone">Telephone</label>
                <input type="tel" name="telephone" id="telephone" class="form-control"
                    value="<?php echo htmlspecialchars($contact->getTelephone()); ?>" required />
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Contact</button>
                <a href="read.php" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>