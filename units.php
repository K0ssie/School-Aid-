<?php
session_start();
include('connection.php');

// ✅ Check if logged in as student
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    die("Access denied. Please log in as a student.");
}

$student_id = $_SESSION['user_id'];

// ✅ Handle Add Unit
if (isset($_POST['add_unit'])) {
    $unit_name = $conn->real_escape_string($_POST['unit_name']);
    $semester = $conn->real_escape_string($_POST['semester']);
    $sql_insert = "INSERT INTO registered_units (student_id, unit_name, semester) VALUES ($student_id, '$unit_name', '$semester')";
    $conn->query($sql_insert);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// ✅ Handle Delete Unit
if (isset($_POST['delete_unit'])) {
    $unit_to_delete = $conn->real_escape_string($_POST['delete_unit']);
    $sql_delete = "DELETE FROM registered_units WHERE student_id = $student_id AND unit_name = '$unit_to_delete'";
    $conn->query($sql_delete);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// ✅ Fetch registered units for the logged-in student
$sql = "SELECT unit_name, semester FROM registered_units WHERE student_id = $student_id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Units Registered</title>
  <link rel="stylesheet" href="units.css" />
</head>
<body>
  <div class="container">
    <h1>Units Registered</h1>
    <table>
      <thead>
        <tr>
          <th>Unit Name</th>
          <th>Semester</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result->num_rows > 0): ?>
          <?php while($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= htmlspecialchars($row['unit_name']) ?></td>
              <td><?= htmlspecialchars($row['semester']) ?></td>
              <td>
                <form method="POST" action="" onsubmit="return confirm('Are you sure you want to delete this unit?');">
                  <input type="hidden" name="delete_unit" value="<?= htmlspecialchars($row['unit_name']) ?>">
                  <button type="submit">Delete</button>
                </form>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="3">No units registered.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>

    <!-- Add Unit Form -->
    <h2>Add a Unit</h2>
    <form method="POST" action="">
      <input type="text" name="unit_name" placeholder="Unit Name" required>
      <input type="text" name="semester" placeholder="Semester" required>
      <button type="submit" name="add_unit">Add Unit</button>
    </form>

    <a href="StudentDash.php" class="back-btn">🔙 Back to Dashboard</a>
  </div>
</body>
</html>

<?php $conn->close(); ?>
