<?php
// result.php

require 'db.php';

$id = (int)($_GET['id'] ?? 0);

if ($id <= 0) {
    die("Invalid ID");
}

$stmt = $pdo->prepare("SELECT * FROM panel_orders WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    die("Record not found");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Panel Wiring Result</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; padding: 20px; }
        h2 { color: #2c3e50; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background: #3498db; color: white; }
        .success { background: #d4edda; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
    </style>
</head>
<body>

    <div class="success">
        Data successfully saved! (Order ID: <?= $row['id'] ?>)
    </div>

    <h2>Panel Enclosure Details</h2>

    <table>
        <tr>
            <th>Component</th>
            <th>Quantity</th>
            <th>Poles</th>
            <th>Ampere</th>
        </tr>
        <tr>
            <td>MCCB (Main Breaker)</td>
            <td><?= $row['mccb_qty'] ?></td>
            <td><?= $row['mccb_poles'] ?></td>
            <td><?= $row['mccb_amp'] ?></td>
        </tr>
        <tr>
            <td>RCCB (Earth Leakage)</td>
            <td><?= $row['rccb_qty'] ?></td>
            <td><?= $row['rccb_poles'] ?></td>
            <td><?= $row['rccb_amp'] ?></td>
        </tr>
        <tr>
            <td>MCB (Outgoing)</td>
            <td><?= $row['mcb_qty'] ?></td>
            <td><?= $row['mcb_poles'] ?></td>
            <td><?= $row['mcb_amp'] ?></td>
        </tr>
    </table>

    <h3 style="margin-top: 30px;">Other Components</h3>
    <table>
        <tr><td>Change-Over Switch</td><td><?= $row['changeover'] ? 'Yes' : 'No' ?></td></tr>
        <tr><td>Phase Failure Relay (PFR)</td><td><?= $row['pfr'] ? 'Yes' : 'No' ?></td></tr>
        <tr><td>Current Transformers (CT)</td><td><?= $row['ct'] ?></td></tr>
        <tr><td>Fuse / HRC Fuse</td><td><?= $row['fuse'] ?></td></tr>
        <tr><td>Phase Indicators (PIL)</td><td><?= $row['indicators'] ?></td></tr>
        <tr><td>Created At</td><td><?= $row['created_at'] ?></td></tr>
    </table>

    <br>
    <a href="index.html">← Back to Form</a>

</body>
</html>