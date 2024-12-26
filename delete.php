<?php
require_once './core/config/database.php';
require_once './entities/contact.php';

if (isset($_GET['id'])) {
    $contact = new Contact();
    $contact->getById($_GET['id']);
    if ($contact && $contact->delete()) {
        header("Location: read.php");
        exit;
    }
}
