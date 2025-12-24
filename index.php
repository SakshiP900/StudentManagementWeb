<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
    <meta charset="UTF-8">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #ecf0f1;
            color: #333;
        }

        /* Header */
        header {
            background-color: #2c3e50;
            padding: 20px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
            color: #fff;
            font-size: 32px;
        }

        nav {
            margin-top: 10px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 20px;
            margin: 0 5px;
            display: inline-block;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #34495e;
        }

        /* Sections */
        section {
            padding: 80px 50px;
        }

        section h2, section h3 {
            margin-bottom: 20px;
        }

        section p, section ul {
            font-size: 18px;
            line-height: 1.7;
        }

        section ul {
            padding-left: 20px;
        }

        section ul li {
            margin-bottom: 10px;
        }

        /* Section backgrounds with subtle contrast */
        #welcome {
            background: linear-gradient(135deg, #2980b9, #3498db);
            color: #fff;
        }

        #features {
            background-color: #f7f7f7;
            color: #2c3e50;
        }

        #benefits {
            background: linear-gradient(135deg, #27ae60, #2ecc71);
            color: #fff;
        }

        #technologies {
            background-color: #f7f7f7;
            color: #2c3e50;
        }

        #cta {
            background: linear-gradient(135deg, #e67e22, #d35400);
            color: #fff;
            text-align: center;
            font-size: 20px;
            padding: 60px 50px;
            border-radius: 10px;
            margin: 40px 50px;
            transition: background 0.3s;
        }

        #cta:hover {
            background: linear-gradient(135deg, #d35400, #e67e22);
        }

        /* Footer */
        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 15px 0;
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

<section id="welcome">
    <h2>Welcome to the Student Management System</h2>
    <p>This system is a comprehensive platform to manage students, courses, and teachers efficiently. Hosted on AWS EC2 with MySQL RDS, it provides reliability, scalability, and secure data management.</p>
</section>

<section id="features">
    <h3>Key Features</h3>
    <ul>
        <li>Manage student information including personal details and academic records.</li>
        <li>Maintain course details and schedules for easy tracking.</li>
        <li>Track teacher information and assign them to courses.</li>
        <li>Enroll students in courses and monitor progress.</li>
        <li>Generate detailed reports for students, courses, and teachers.</li>
    </ul>
</section>

<section id="benefits">
    <h3>Benefits</h3>
    <p>This system simplifies administrative tasks, reduces paperwork, and improves accuracy in record keeping. Administrators and educators can manage operations quickly and efficiently from any device.</p>
</section>

<section id="technologies">
    <h3>Technologies Used</h3>
    <p>Built with PHP, MySQL, and hosted on AWS, this system demonstrates cloud deployment and practical DevOps concepts including CI/CD pipelines and automation.</p>
</section>

<section id="cta">
    Get started now! Navigate through the menu to add students, manage courses, enroll students, and view reports.
</section>

<footer>
    &copy; <?php echo date("Y"); ?> Student Management System. All rights reserved.
</footer>

</body>
</html>
