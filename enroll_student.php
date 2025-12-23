<?php
include 'db.php';

// Fetch students for dropdown
$students_res = mysqli_query($conn, "SELECT id, name FROM students");

// Fetch courses for dropdown
$courses_res = mysqli_query($conn, "SELECT course_id, course_name FROM courses");

// Handle form submission
$message = '';
if(isset($_POST['enroll'])){
    $student_id = mysqli_real_escape_string($conn, $_POST['student']);
    $course_id = mysqli_real_escape_string($conn, $_POST['course']);

    $query = "INSERT INTO enrollments(student_id, course_id) VALUES('$student_id', '$course_id')";
    if(mysqli_query($conn, $query)){
        $message = "<p class='success'>Student enrolled successfully!</p>";
    } else {
        $message = "<p class='error'>Error: ".mysqli_error($conn)."</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Enroll Student - Student Management System</title>
    <meta charset="UTF-8">
    <style>
        /* Reset and base styles */
        body { margin:0; font-family: Arial, sans-serif; background:#f4f4f4; }
        header { background:#2c3e50; padding:20px 0; text-align:center; }
        header h1 { margin:0; color:white; font-size:32px; }

        /* Navigation */
        nav { margin-top:10px; }
        nav a {
            color:white; text-decoration:none; font-weight:bold;
            padding:10px 20px; margin:0 10px; display:inline-block;
            border-radius:5px; transition: background-color 0.3s;
        }
        nav a:hover { background:#34495e; }

        /* Container */
        .container {
            padding: 20px 50px; background:white;
            margin:20px auto; max-width:600px; border-radius:8px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        /* Form */
        form select {
            width: 100%; padding:10px; margin-top:5px; margin-bottom:15px;
            border:1px solid #ccc; border-radius:5px; font-size:16px;
        }
        form input[type="submit"] {
            background:#2c3e50; color:white; padding:10px 20px;
            border:none; border-radius:5px; cursor:pointer; font-weight:bold;
        }
        form input[type="submit"]:hover { background:#34495e; }

        /* Footer */
        footer { background:#2c3e50; color:white; text-align:center; padding:15px 0; margin-top:30px; }

        /* Messages */
        .success { color: green; font-size:16px; margin-top:10px; }
        .error { color: red; font-size:16px; margin-top:10px; }

        /* Page heading */
        .container h2 { margin-top:0; }
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
    <h2>Enroll Student</h2>

    <form method="post">
        Student:
        <select name="student" required>
            <option value="">--Select Student--</option>
            <?php while($s = mysqli_fetch_assoc($students_res)){ ?>
                <option value="<?= $s['id'] ?>"><?= $s['name'] ?></option>
            <?php } ?>
        </select>

        Course:
        <select name="course" required>
            <option value="">--Select Course--</option>
            <?php while($c = mysqli_fetch_assoc($courses_res)){ ?>
                <option value="<?= $c['course_id'] ?>"><?= $c['course_name'] ?></option>
            <?php } ?>
        </select>

        <input type="submit" name="enroll" value="Enroll Student">
    </form>

    <?= $message ?>
</div>

<footer>
    &copy; <?php echo date("Y"); ?> Student Management System. All rights reserved.
</footer>

</body>
</html>

