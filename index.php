<?php
require_once './core/config/database.php';
require_once './entities/contact.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $contact = new Contact(
        null,
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['email'],
        $_POST['telephone']
    );

    if ($contact->create()) {
        echo "<div class='alert alert-success'>Contact created successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Contact not created.</div>";
    }
}
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
                    <li class="active"><a href="index.php">Create Contact</a></li>
                    <li><a href="read.php">View Contacts</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="page-header">
            <h1>Create Contact</h1>
        </div>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type='text' name='nom' id='nom' class='form-control'
                            value="<?php echo isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : ''; ?>" required />
                    </div>

                    <div class="form-group">
                        <label for="prenom">Prenom</label>
                        <input type='text' name='prenom' id='prenom' class='form-control'
                            value="<?php echo isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : ''; ?>" required />
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type='email' name='email' id='email' class='form-control'
                            value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required />
                    </div>

                    <div class="form-group">
                        <label for="telephone">Telephone</label>
                        <input type='tel' name='telephone' id='telephone' class='form-control'
                            value="<?php echo isset($_POST['telephone']) ? htmlspecialchars($_POST['telephone']) : ''; ?>" required />
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-primary">Create Contact</button>
                    <a href="read.php" class="btn btn-default">Cancel</a>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
</body>

</html>