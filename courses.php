<?php 
include 'db.php'; 
$res = mysqli_query($conn,"SELECT * FROM courses"); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Courses - Student Management System</title>
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
        }

        /* Table */
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

        /* Page headings */
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
    <h2>Courses</h2>
    <table>
        <tr>
            <th>ID</th><th>Course</th><th>Duration</th>
        </tr>
        <?php while($row=mysqli_fetch_assoc($res)){ ?>
        <tr>
            <td><?= $row['course_id'] ?></td>
            <td><?= $row['course_name'] ?></td>
            <td><?= $row['duration'] ?></td>
        </tr>
        <?php } ?>
    </table>
</div>

<footer>
    &copy; <?php echo date("Y"); ?> Student Management System. All rights reserved.
</footer>

</body>
</html>

