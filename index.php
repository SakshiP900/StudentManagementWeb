<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
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
            background-color: #2c3e50; /* Dark blue */
            padding: 20px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
            color: white; /* Make header text visible */
            font-size: 32px;
        }

        /* Navigation */
        nav {
            margin-top: 10px;
        }

        nav a {
            color: white;                 /* White text */
            text-decoration: none;        /* Remove underline */
            font-weight: bold;
            padding: 10px 20px;           /* Space inside each link */
            margin: 0 10px;               /* Space between links */
            display: inline-block;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #34495e;   /* Hover effect */
        }

        /* Container */
        .container {
            padding: 20px 50px;
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Footer */
        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 30px;
        }

        /* Images */
        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
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
    <h2>Welcome</h2>
    <p>This is a PHP & AWS RDS based Student Management System.</p>
</div>

<footer>
    &copy; <?php echo date("Y"); ?> Student Management System. All rights reserved.
</footer>

</body>
</html>

