<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drug Information Form</title>
    <style>
        /* Center the form container */
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f4f4f9;
            font-family: Arial, sans-serif;
        }

        /* Form container styling */
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
        }

        /* Heading styling */
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Form group styling */
        .form-group {
            margin-bottom: 15px;
        }

        /* Label styling */
        label {
            font-weight: bold;
            color: #555;
        }

        /* Input fields styling */
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        /* Submit button styling */
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Message styling */
        .message {
            text-align: center;
            margin-top: 10px;
            color: green;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Drug Information Form</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "12345";
        $dbname = "ba_project";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO drugs_side_effects_drugs_medical_condition (drug_name, medical_condition, side_effects, generic_name, drug_classes, brand_names, activity, rx_otc, pregnancy_category, csa, alcohol, related_drugs, medical_condition_description, rating, no_of_reviews) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        // $stmt->bind_param() binds specific variables to the placeholders (?) in the prepared statement.
        // This makes $stmt ready to execute with the provided values without needing to re-prepare 
        // the SQL each time, offering efficiency and security (by preventing SQL injection).
        $stmt->bind_param("ssssssssssssssi", $drug_name, $medical_condition, $side_effects, $generic_name, $drug_classes, $brand_names, $activity, $rx_otc, $pregnancy_category, $csa, $alcohol, $related_drugs, $medical_condition_description, $rating, $no_of_reviews);

        // Set parameters and execute
        $drug_name = $_POST['drug_name'];
        $medical_condition = $_POST['medical_condition'];
        $side_effects = $_POST['side_effects'];
        $generic_name = $_POST['generic_name'];
        $drug_classes = $_POST['drug_classes'];
        $brand_names = $_POST['brand_names'];
        $activity = $_POST['activity'];
        $rx_otc = $_POST['rx_otc'];
        $pregnancy_category = $_POST['pregnancy_category'];
        $csa = $_POST['csa'];
        $alcohol = $_POST['alcohol'];
        $related_drugs = $_POST['related_drugs'];
        $medical_condition_description = $_POST['medical_condition_description'];
        $rating = $_POST['rating'];
        $no_of_reviews = $_POST['no_of_reviews'];

        if ($stmt->execute()) {
            echo "<div class='message'>New record created successfully</div>";
        } else {
            echo "<div class='message' style='color:red;'>Error: " . $stmt->error . "</div>";
        }

        $stmt->close();
        $conn->close();
    }
    ?>

    <form action="" method="post">
        <div class="form-group">
            <label>Drug Name:</label>
            <input type="text" name="drug_name" required>
        </div>

        <div class="form-group">
            <label>Medical Condition:</label>
            <input type="text" name="medical_condition">
        </div>

        <div class="form-group">
            <label>Side Effects:</label>
            <input type="text" name="side_effects">
        </div>

        <div class="form-group">
            <label>Generic Name:</label>
            <input type="text" name="generic_name">
        </div>

        <div class="form-group">
            <label>Drug Classes:</label>
            <input type="text" name="drug_classes">
        </div>

        <div class="form-group">
            <label>Brand Names:</label>
            <input type="text" name="brand_names">
        </div>

        <div class="form-group">
            <label>Activity:</label>
            <input type="text" name="activity">
        </div>

        <div class="form-group">
            <label>RX/OTC:</label>
            <input type="text" name="rx_otc">
        </div>

        <div class="form-group">
            <label>Pregnancy Category:</label>
            <input type="text" name="pregnancy_category">
        </div>

        <div class="form-group">
            <label>CSA:</label>
            <input type="text" name="csa">
        </div>

        <div class="form-group">
            <label>Alcohol:</label>
            <input type="text" name="alcohol">
        </div>

        <div class="form-group">
            <label>Related Drugs:</label>
            <input type="text" name="related_drugs">
        </div>

        <div class="form-group">
            <label>Medical Condition Description:</label>
            <input type="text" name="medical_condition_description">
        </div>

        <div class="form-group">
            <label>Rating:</label>
            <input type="number" step="0.1" name="rating">
        </div>

        <div class="form-group">
            <label>Number of Reviews:</label>
            <input type="number" name="no_of_reviews">
        </div>

        <input type="submit" value="Submit">
    </form>

</div>

</body>
</html>
