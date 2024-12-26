<?php
require_once './core/config/database.php';
require_once './entities/contact.php';

$contact = new Contact();
$contacts = $contact->getAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Contact</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets/css/index.css" />
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Contact Manager</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Create Contact</a></li>
                    <li class="active"><a href="read.php">View Contacts</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="page-header">
            <h1>All Contacts</h1>
        </div>
        <table class='table table-hover table-responsive table-bordered'>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($contacts as $contact): ?>
                <tr>
                    <td><?php echo htmlspecialchars($contact['nom']); ?></td>
                    <td><?php echo htmlspecialchars($contact['prenom']); ?></td>
                    <td><?php echo htmlspecialchars($contact['email']); ?></td>
                    <td><?php echo htmlspecialchars($contact['telephone']); ?></td>
                    <td>
                        <a href='update.php?id=<?php echo $contact['id']; ?>' class='btn btn-primary'>Edit</a>
                        <a href='delete.php?id=<?php echo $contact['id']; ?>' class='btn btn-danger'>Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
</body>