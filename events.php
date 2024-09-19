

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Index</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);
        }

        .card img {
            border-radius: 10px;
        }
        .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            background-color: #0e4083;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 16px;
            display: flex;
            align-items: center;
            text-decoration: none;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #7896e9;
        }

        .back-button i {
            margin-right: 8px;
        }

        @media (max-width: 768px) {
            .card {
                width: 90%;
                margin: 10px 0;
            }

            .title h4 {
                font-size: 30px;
                padding: 10px;
            }

            .back-button {
                font-size: 14px;
                padding: 8px 16px;
                top: 10px;
                left: 10px;
            }
        }

        @media (max-width: 480px) {
            .card {
                width: 100%;
            }

            .title h4 {
                font-size: 24px;
                padding: 8px;
            }

            .back-button {
                font-size: 12px;
                padding: 6px 12px;
                top: 5px;
                left: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.html" class="back-button"><i class="fa fa-arrow-left"></i> Back</a>
        <h2>Live events</h2>
        
        <div class="row">
            <?php while ($form = $forms_result->fetch_assoc()): ?>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($form['form_title']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($form['form_description']); ?></p>
                            <?php if ($form['poster_image']): ?>
                                <img src="<?php echo htmlspecialchars($form['poster_image']); ?>" alt="Poster" class="img-fluid mb-3" style="max-height: 300px; width: 100%; object-fit: cover;">
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
