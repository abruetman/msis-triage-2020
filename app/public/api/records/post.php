<?php

require 'common.php';

use Ramsey\Uuid\Uuid;

$guid = Uuid::uuid4()->toString();

$db = DbConnection::getConnection();

$stmt = $db->prepare(
    'INSERT INTO  Patient (patientGuid, firstName, lastName, dob, sexAtBirth)
    VALUES (?, ?, ?, ?, ?)'
)

$stmt->execute([
    $guid,
    $_POST['firstName'],
    $_POST['lasttName'],
    $_POST['dob'],
    $_POST['sexAtBirth']
]);

header('HTTP/1.1 3-3 See Other');
header('Location: ../records/?guid=' . $guid);