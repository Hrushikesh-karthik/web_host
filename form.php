<?php 
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$conn = new mysqli('localhost', 'root', 'KARTHIK@2004', 'om');

if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

$form_id = intval($_GET['id']);
$table_name = "form_$form_id";

$form_result = $conn->query("SELECT * FROM forms WHERE id = $form_id");
$form = $form_result->fetch_assoc();

$fields_result = $conn->query("SELECT * FROM form_fields WHERE form_id = $form_id");

$form_submitted = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $field_data = [];

    // Generate a random 6-digit unique code
   

    // Add static fields to the field_data array
    $field_data['name'] = $_POST['name'] ?? '';
    $field_data['email'] = $_POST['email'] ?? '';
    $field_data['roll_no'] = $_POST['roll_no'] ?? '';
   

    // Add dynamic fields
    $fields_result->data_seek(0);
    while ($field = $fields_result->fetch_assoc()) {
        $field_name = $field['field_name'];

        if (isset($_FILES[$field_name]['name']) && !empty($_FILES[$field_name]['name'])) {
            $uploaded_file = 'uploads/' . basename($_FILES[$field_name]['name']);
            move_uploaded_file($_FILES[$field_name]['tmp_name'], $uploaded_file);
            $field_data[$field_name] = basename($_FILES[$field_name]['name']);
        } elseif (isset($_POST[$field_name])) {
            $field_data[$field_name] = $_POST[$field_name];
        } else {
            $field_data[$field_name] = null;
        }
    }

    $fields = implode(", ", array_keys($field_data));
    $values = implode(", ", array_map(fn($value) => "'" . $conn->real_escape_string($value) . "'", array_values($field_data)));
    $sql = "INSERT INTO $table_name ($fields) VALUES ($values)";
    if ($conn->query($sql)) {
        $form_submitted = true;

        // Send Confirmation Email with the Unique Code
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                    
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = 'karthiku1904@gmail.com';   
            $mail->Password   = 'orvg lawx wwhz ccyn';   
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
            $mail->Port       = 587;                                    

            // Recipients
            $mail->setFrom('karthiku1904@gmail.com', 'Admin@techiehub');
            $mail->addAddress($_POST['email']);    

            // Content
            // Content inside the try block where the email is sent

$mail->isHTML(true);          

$mail->Subject = 'Registration Confirmation for ' . $form['form_title'];
// Path to the image inside the web folder
$imagePath = __DIR__ . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'logoo.png';
if (file_exists($imagePath)) {
    $mail->addEmbeddedImage($imagePath, 'logo_image');
} else {
    echo "File not found: " . $imagePath;
}


// HTML content of the email
$mail->Body = '
    <div style="font-family: Arial, sans-serif; color: #333;">
        <div style="text-align: center; padding: 20px 0;">
            <img src="cid:logo_image" alt="Logo" style="max-width: 150px;">
        </div>
        <div style="background-color: #f8f9fa; padding: 20px; border: 1px solid #ddd; border-radius: 10px;">
            <h2 style="color: #0056b3; text-align: center;">Registration Confirmation</h2>
            <p style="font-size: 18px; color: #555; text-align: center;">
                <strong>Event:</strong> ' . htmlspecialchars($form['form_title']) . '
            </p>
            <div style="text-align: center;">
                <hr style="border: 0; height: 1px; background: #ddd;">
            </div>
            <p style="font-size: 16px; color: #555;">
                Dear <strong>' . htmlspecialchars($_POST['name']) . '</strong>,
            </p>
            <p style="font-size: 16px; color: #555;">
                You have successfully registered for the event: <strong>' . htmlspecialchars($form['form_title']) . '</strong>. Below are your registration details:
            </p>
            <div style="background-color: #e9ecef; padding: 15px; border-radius: 8px; margin: 20px 0;">
                <p><strong>Name:</strong> ' . htmlspecialchars($_POST['name']) . '</p>
                <p><strong>Email:</strong> ' . htmlspecialchars($_POST['email']) . '</p>
                <p><strong>Roll No:</strong> ' . htmlspecialchars($_POST['roll_no']) . '</p>
            </div>
            <div style="text-align: center; margin: 20px 0;">
                <p style="font-size: 14px; color: #555;">If any of the above details are incorrect, please contact us at <a href="mailto:techiehub@mrce.in" style="color: #0056b3;">techiehub@mrce.in</a>.</p>
            </div>
            <div style="text-align: center;">
               <a href="techiehubmrce/events"><button style="background-color: #0056b3; color: white; border: none; padding: 10px 20px; font-size: 16px; border-radius: 5px;">
                    More Events
                </button></a> 
            </div>
            <hr style="border: 0; height: 1px; background: #ddd;">
            <p style="font-size: 14px; color: #888; text-align: center;">
                This is an official registration confirmation from Techie Hub.
            </p>
        </div>
    </div>
';

// Alternate plain-text version of the email
$mail->AltBody = 'Dear ' . $_POST['name'] . ', You have successfully registered for the event: ' . $form['form_title'] . '.';


            // Send the email
            $mail->send();
            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($form['form_title']); ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-size: 1rem;
        }
        .form-group label {
            font-size: 1.2rem;
        }
        .form-control, .form-control-file, select {
            font-size: 1rem;
        }
        .form-control-file {
            padding: 0.5rem;
        }
        .image-preview {
            max-width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 0.5rem;
        }
        .container {
            padding: 0 15px;
        }
        .success-message {
            font-size: 1.2rem;
        }
        .poster-image {
            width: 350px;
            max-height: 600px;
            padding: 0 15px; /* Padding on both sides for poster image */
            box-sizing: border-box;
        }
        .success-icon {
            font-size: 3rem; /* Larger success icon */
            color: #28a745; /* Green color for success */
        }
        @media (max-width: 576px) {
            .poster-image {
                width: 100%;
                max-height: 600px;
            }
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <?php if ($form_submitted): ?>
        <div class="alert alert-success text-center success-message" role="alert">
            <div class="success-icon">&#10004;</div>
            <h4 class="alert-heading">Form Submitted Successfully!</h4>
            <p>Thank you for your submission. A confirmation email has been sent to your account.<br> You will be redirected shortly...</p>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                setTimeout(function() {
                    window.location.href = 'userpage.php';
                }, 4000); // Redirect after 4 seconds
            });
        </script>
    <?php endif; ?>

    <?php if (!empty($form['poster_image'])): ?>
        <div class="text-center mb-4">
            <img src="<?php echo htmlspecialchars($form['poster_image']); ?>" alt="Poster" class="poster-image">
        </div>
    <?php endif; ?>

    <h2 class="text-center"><?php echo htmlspecialchars($form['form_title']); ?></h2>
    <p class="text-center"><?php echo htmlspecialchars($form['form_description']); ?></p>

    <form id="dynamic-form" method="post" enctype="multipart/form-data" class="mt-4">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="roll_no">Roll No</label>
            <input type="text" class="form-control" id="roll_no" name="roll_no" required>
        </div>

        <?php
        $fields_result->data_seek(0);
        while ($field = $fields_result->fetch_assoc()): ?>
            <div class="form-group">
                <label for="<?php echo htmlspecialchars($field['field_name']); ?>">
                    <?php echo htmlspecialchars($field['field_name']); ?>
                </label>

                <?php if ($field['field_type'] == 'text'): ?>
                    <input type="text" class="form-control" id="<?php echo htmlspecialchars($field['field_name']); ?>" name="<?php echo htmlspecialchars($field['field_name']); ?>">

                <?php elseif ($field['field_type'] == 'textarea'): ?>
                    <textarea class="form-control" id="<?php echo htmlspecialchars($field['field_name']); ?>" name="<?php echo htmlspecialchars($field['field_name']); ?>"></textarea>

                <?php elseif ($field['field_type'] == 'file'): ?>
                    <input type="file" class="form-control-file" id="<?php echo htmlspecialchars($field['field_name']); ?>" name="<?php echo htmlspecialchars($field['field_name']); ?>">

                <?php elseif ($field['field_type'] == 'checkbox'): ?>
                    <?php $options = json_decode($field['options'], true); ?>
                    <?php foreach ($options as $option): ?>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="<?php echo htmlspecialchars($field['field_name']); ?>_<?php echo htmlspecialchars($option); ?>" name="<?php echo htmlspecialchars($field['field_name']); ?>[]" value="<?php echo htmlspecialchars($option); ?>">
                            <label class="form-check-label" for="<?php echo htmlspecialchars($field['field_name']); ?>_<?php echo htmlspecialchars($option); ?>">
                                <?php echo htmlspecialchars($option); ?>
                            </label>
                        </div>
                    <?php endforeach; ?>

                <?php elseif ($field['field_type'] == 'radio'): ?>
                    <?php $options = json_decode($field['options'], true); ?>
                    <?php foreach ($options as $option): ?>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="<?php echo htmlspecialchars($field['field_name']); ?>_<?php echo htmlspecialchars($option); ?>" name="<?php echo htmlspecialchars($field['field_name']); ?>" value="<?php echo htmlspecialchars($option); ?>">
                            <label class="form-check-label" for="<?php echo htmlspecialchars($field['field_name']); ?>_<?php echo htmlspecialchars($option); ?>">
                                <?php echo htmlspecialchars($option); ?>
                            </label>
                        </div>
                    <?php endforeach; ?>

                <?php elseif ($field['field_type'] == 'date'): ?>
                    <input type="date" class="form-control" id="<?php echo htmlspecialchars($field['field_name']); ?>" name="<?php echo htmlspecialchars($field['field_name']); ?>">

                <?php endif; ?>
            </div>
        <?php endwhile; ?>
        <div class="qr-container">
    <div class="qr-label"></div>
    <?php
    // Fetch QR and UPI from the database
    $servername = "localhost";
    $username = "root";
    $password = "KARTHIK@2004";
    $dbname = "om";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM qr";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<img src='qrimg.php?id={$row['id']}' width='250' height='250'>";
            $upi = isset($row['upi']) ? $row['upi'] : 'N/A';
             echo "<div class='upi-value'><b>UPI: {$upi} </b> (Scan the QR or copy paste UPI ID)</div>";
        }
    } else {
        echo "This event is free";
    }

    $conn->close();
    ?>

</div>
<br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
