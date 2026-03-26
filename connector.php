<?php
require 'consultation_connection.php';
// Fetch consultation data
$sql = "SELECT * FROM consultations ";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Consultations</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 30px;
      background-color: #f2f2f2;
    }

    h2 {
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    th, td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #ccc;
    }

    th {
      background-color: #009879;
      color: white;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

  </style>
</head>
<body>
  <h2>Submitted Consultations</h2>

  <table>
    <thead>
      <tr>
        <th>Student ID</th>
        <th>Question</th>
        <th>Attachment</th>
        <th>Status</th>
        <th>Response</th>
        <th>Responder ID</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= ($row['id'])?></td>
            <td><?= ($row['question'])?></td>
            <td>
              <?php if (!empty($row['attachment_path'])): ?>
                <a class="download-link" href="<?= htmlspecialchars($row['attachment_path']) ?>" download="<?= htmlspecialchars($row['attachment_original_name']) ?>">
                  Download
                </a>
              <?php else: ?>
                No file
              <?php endif; ?>
            </td>
            <td><?= ($row['status']) ?></td>
            <td><?= ($row['response'] ?? 'N/A') ?></td>
            <td><?= ($row['responder_id'] ?? 'N/A') ?></td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="5">No consultations found.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</body>
</html>

<?php
$conn->close();
?>
