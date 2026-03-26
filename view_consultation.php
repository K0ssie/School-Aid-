<?php
require 'consultation_connection.php';

// Check if question is set
if (!isset($_POST['id']) || empty(trim($_POST['id']))) {
    die("Student ID is required");
}
if (!isset($_POST['question'])) {
    die("Question is required");
}



    $id = $conn->real_escape_string(trim($_POST['id']));
$question = $conn->real_escape_string($_POST['question']);

// File upload logic
$upload_dir = "uploads/";
$attachment_path = null;
$original_name = null;

if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
    // Validate file
    $allowed_types = ['pdf', 'doc', 'docx', 'png', 'jpg', 'jpeg'];
    $file_tmp_path = $_FILES['attachment']['tmp_name'];
    $original_name = $_FILES['attachment']['name'];
    $file_ext = strtolower(pathinfo($original_name, PATHINFO_EXTENSION));
    
    if (!in_array($file_ext, $allowed_types)) {
        die("Invalid file type. Only PDF, DOC, DOCX, PNG, JPG, JPEG are allowed.");
    }
    
    // Create uploads directory if it doesn't exist
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }
    
    $new_filename = uniqid("attach_", true) . "." . $file_ext;
    $destination = $upload_dir . $new_filename;
    
    if (move_uploaded_file($file_tmp_path, $destination)) {
        $attachment_path = $destination;
    } else {
        die("Failed to upload file. Error: " . $_FILES['attachment']['error']);
    }
}

// Insert into database
$sql = "INSERT INTO consultations (
            id, question, attachment_path,
            attachment_original_name
        ) VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param(
    "ssss",
    $id,
    $question,
    $attachment_path,
    $original_name
);

if ($stmt->execute()) {
    echo "Consultation submitted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close resources
$stmt->close();
$conn->close();
?>