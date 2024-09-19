<?php
$conn = new mysqli('localhost', 'root', 'KARTHIK@2004', 'om');

// Fetch all forms
$forms_result = $conn->query("SELECT * FROM forms");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Submissions</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>View Submissions</h2>
    
    <?php while ($form = $forms_result->fetch_assoc()): ?>
        <h3><?php echo htmlspecialchars($form['form_title']); ?></h3>
        <p><?php echo htmlspecialchars($form['form_description']); ?></p>
        <?php if ($form['poster_image']): ?>
            <img src="<?php echo htmlspecialchars($form['poster_image']); ?>" alt="Poster" class="img-fluid">
        <?php endif; ?>
        <?php if ($form['qr_image']): ?>
            <img src="<?php echo htmlspecialchars($form['qr_image']); ?>" alt="QR Code" class="img-fluid">
        <?php endif; ?>
        
        <!-- Display submissions for this form -->
        <?php
        $table_name = "form_" . $form['id'];
        $submissions_result = $conn->query("SELECT * FROM $table_name");
        ?>
        
        <h4>Submissions:</h4>
        <?php if ($submissions_result->num_rows > 0): ?>
            <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Submitted At</th>
                    <?php
                    // Fetch field names for the form
                    $fields_result = $conn->query("SELECT field_name FROM form_fields WHERE form_id = " . $form['id']);
                    while ($field = $fields_result->fetch_assoc()): ?>
                        <th><?php echo htmlspecialchars($field['field_name']); ?></th>
                    <?php endwhile; // Close the submission while loop ?>
                </tbody>
            </table>
            <?php else: ?>
                <p>No submissions found.</p>
            <?php endif; // Close the submissions if statement ?>
        <?php endwhile; // Close the form while loop ?>
                </tr>
            </thead>
            <tbody>
                <?php while ($submission = $submissions_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $submission['id']; ?></td>
                        <td><?php echo $submission['submitted_at']; ?></td>
                        <?php
                        // Fetch field names for the form
                        $fields_result = $conn->query("SELECT field_name FROM form_fields WHERE form_id = " . $form['id']);
                        while ($field = $fields_result->fetch_assoc()): ?>
                            <td><?php echo htmlspecialchars($submission[$field['field_name']]); ?></td>
                        <?php endwhile; ?>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
    <?php endwhile; ?>

</div>
</body>
</html>
