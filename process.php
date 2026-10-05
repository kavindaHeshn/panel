<?php
// process.php

require 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['generate'])) {
    header('Location: index.html'); // ඔයාගේ form page එක
    exit;
}

// Collect data
$mccb_qty    = (int)($_POST['mccb_qty'] ?? 0);
$mccb_poles  = $_POST['mccb_poles'] ?? '3P';
$mccb_amp    = $_POST['mccb_amp'] ?? '125A';

$rccb_qty    = (int)($_POST['rccb_qty'] ?? 0);
$rccb_poles  = $_POST['rccb_poles'] ?? '4P';
$rccb_amp    = $_POST['rccb_amp'] ?? '63A';

$mcb_qty     = (int)($_POST['mcb_qty'] ?? 0);
$mcb_poles   = $_POST['mcb_poles'] ?? '3P';
$mcb_amp     = $_POST['mcb_amp'] ?? '16A';

$changeover  = (int)($_POST['changeover'] ?? 0);
$pfr         = (int)($_POST['pfr'] ?? 0);
$ct          = (int)($_POST['ct'] ?? 0);
$fuse        = (int)($_POST['fuse'] ?? 0);
$indicators  = (int)($_POST['indicators'] ?? 0);

// Insert into database
try {
    $sql = "INSERT INTO panel_orders 
            (mccb_qty, mccb_poles, mccb_amp, 
             rccb_qty, rccb_poles, rccb_amp, 
             mcb_qty, mcb_poles, mcb_amp, 
             changeover, pfr, ct, fuse, indicators) 
            VALUES 
            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $mccb_qty, $mccb_poles, $mccb_amp,
        $rccb_qty, $rccb_poles, $rccb_amp,
        $mcb_qty, $mcb_poles, $mcb_amp,
        $changeover, $pfr, $ct, $fuse, $indicators
    ]);

    $last_id = $pdo->lastInsertId();

    // Success page එකට redirect කරනවා
    header("Location: result.php?id=" . $last_id);
    exit;

} catch (PDOException $e) {
    die("Error saving data: " . $e->getMessage());
}
?>