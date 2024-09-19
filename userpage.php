<?php
$conn = new mysqli('localhost', 'root', 'KARTHIK@2004', 'om');

// Fetch forms
$forms_result = $conn->query("SELECT * FROM forms");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Index</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // Get the scroll message element
        const scrollMessage = document.querySelector('.scroll-message');

        // Add click event listener to the scroll message
        scrollMessage.addEventListener('click', () => {
            // Calculate the center of the page
            const centerPosition = document.body.scrollHeight / 2 - window.innerHeight / 2;

            // Smoothly scroll to the center position
            window.scrollTo({
                top: centerPosition,
                behavior: 'smooth'
            });
        });
    });
    </script>
    <style>
     html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}

body {
  background: linear-gradient(#eecda3, #ef629f);
  background-repeat: no-repeat;
  background-size: cover;
}

          .always-visible {
    font-family: 'Arial', sans-serif; /* Modern and readable font */
    color: #333; /* Dark grey color for contrast */
    text-align: center; /* Centered text for a clean look */
    padding: 20px; /* Add some padding around the text */
    border-radius: 8px; /* Slightly rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    background-color: #f4f4f4; /* Light gray background */
    border: 1px solid #ddd; /* Light border to define the section */
}

.always-visible p {
    font-size: 18px; /* Slightly larger font size for readability */
    line-height: 1.6; /* Increased line height for better spacing */
}

.always-visible p strong {
    color: #d9534f; /* Highlight color for emphasis */
}
        .scroll-message {
            font-size: 22px;
            color: #007bff;
            font-weight: bold;
            margin-top: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Back</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="team.php">Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gallery.php">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
       
      </ul>
     
    </div>
  </div>
</nav>
<div class="always-visible">
    <p>Welcome to the Events Page! 🎉</p>
    <p>Looking for something exciting to register for? Well, you’re in the right place!</p>
    <p><strong>Are the events missing?</strong> 😲 Don't worry, we're just taking a coffee break ☕. Register yourselves for the next big thing!</p>
    <p class="scroll-message">Tap or Scroll down for more events!</p>
</div>
<div class="container mt-5">
    <h2>Available Events</h2>
    
    <div class="row">
        <?php while ($form = $forms_result->fetch_assoc()): ?>
            <div class="col-md-4 col-sm-6 col-12"> <!-- Responsive Columns -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($form['form_title']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($form['form_description']); ?></p>
                        <?php if ($form['poster_image']): ?>
                            <img src="<?php echo htmlspecialchars($form['poster_image']); ?>" alt="Poster" class="img-fluid mb-3" style="max-height: 300px; width: 350px; object-fit: cover;">
                        <?php endif; ?>
                        <a href="form.php?id=<?php echo $form['id']; ?>" class="btn btn-primary">Fill Form</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
