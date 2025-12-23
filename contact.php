<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact - Student Management System</title>
    <meta charset="UTF-8">
    <style>
        /* Reset body and default styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        /* Header */
        header {
            background-color: #2c3e50;
            padding: 20px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
            color: white;
            font-size: 32px;
        }

        /* Navigation */
        nav {
            margin-top: 10px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 20px;
            margin: 0 10px;
            display: inline-block;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #34495e;
        }

        /* Container */
        .container {
            padding: 20px 50px;
            background: white;
            margin: 20px auto;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        /* Form styling */
        form input[type="text"],
        form input[type="email"],
        form textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        form textarea {
            height: 120px;
            resize: vertical;
        }

        form input[type="submit"] {
            background-color: #2c3e50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        form input[type="submit"]:hover {
            background-color: #34495e;
        }

        /* Footer */
        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 30px;
        }

        /* Messages */
        .message {
            font-size: 16px;
            margin-top: 10px;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }

        /* Page heading */
        .container h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>

<header>
    <h1>Student Management System</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="students.php">Students</a>
        <a href="add_student.php">Add Student</a>
        <a href="courses.php">Courses</a>
        <a href="add_course.php">Add Course</a>
        <a href="teachers.php">Teachers</a>
        <a href="enroll_student.php">Enroll</a>
        <a href="contact.php">Contact</a>
    </nav>
</header>

<div class="container">
    <h2>Contact Us</h2>
    <form method="post">
        Name: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" required><br>
        Message:<br>
        <textarea name="message" required></textarea><br>
        <input type="submit" name="send" value="Send Message">
    </form>

    <?php
    if(isset($_POST['send'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        $query = "INSERT INTO contact_messages(name,email,message) VALUES('$name','$email','$message')";
        if(mysqli_query($conn, $query)){
            echo "<p class='message success'>Your message has been sent successfully!</p>";
        } else {
            echo "<p class='message error'>Error: ".mysqli_error($conn)."</p>";
        }
    }
    ?>
</div>

<footer>
    &copy; <?php echo date("Y"); ?> Student Management System. All rights reserved.
</footer>

</body>
</html>

