<?php
include('../includes/db_connect.php');
include('user-navbar.html');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Courses</title>
</head>
<style>
    #container {
      width: 80%;
      margin: 20px auto;
    }
    
    .course-card {
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 20px;
      margin-bottom: 20px;
    }
    
    .course-title {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 10px;
    }
    
    .course-description {
      margin-bottom: 10px;
    }
    
    .registration-link {
      display: block;
      background:linear-gradient(180deg,#ffcc00,#ffcc00);
      color: #fff;
      text-decoration: none;
      padding: 10px;
      border-radius: 5px;
      width: 150px;
      text-align: center;
    }
    
    .registration-link:hover {
      background: #ffcc00;
    }
</style>
<body>
<div id="container">
    <div class="course-card">
      <h2 class="course-title " value="Python">Python programming language</h2>
      <p class="course-description">This course introduces the fundamentals of Python programming language, covering topics like variables, data types, control flow, functions, and file handling.</p>
      <a class="registration-link" href="register.php">Register Now</a>
    </div>
    
    <div class="course-card">
      <h2 class="course-title">Java Programming language</h2>
      <p class="course-description">Learn the essentials of Java, including object-oriented programming concepts, data structures, exception handling, and graphical user interface (GUI) development.</p>
      <a class="registration-link" href="register.php">Register Now</a>
    </div>
    
    <div class="course-card">
      <h2 class="course-title">C++ Programming language</h2>
      <p class="course-description">Dive into C++ programming language and explore topics such as pointers, memory management, classes, templates, and the Standard Template Library (STL).</p>
      <a class="registration-link" href="register.php">Register Now</a>
    </div>

    <div class="course-card">
      <h2 class="course-title">Introduction to Machine Learning with Python</h2>
      <p class="course-description">Get started with machine learning using Python. Learn about algorithms, data preprocessing, model evaluation, and commonly used libraries like scikit-learn and TensorFlow.</p>
      <a class="registration-link" href="register.php">Register Now</a>
    </div>

    <div class="course-card">
      <h2 class="course-title">Web Development with HTML, CSS, and JavaScript</h2>
      <p class="course-description">Build a strong foundation in web development by learning HTML for page structure, CSS for styling, and JavaScript for interactivity and dynamic content.</p>
      <a class="registration-link" href="register.php">Register Now</a>
    </div>

    <div class="course-card">
      <h2 class="course-title">Introduction to Data Science </h2>
      <p class="course-description">Discover the basics of R programming language and its applications in data science, including data manipulation, visualization, statistical analysis, and machine learning.</p>
      <a class="registration-link" href="register.php">Register Now</a>
    </div>

    <div class="course-card">
      <h2 class="course-title">Introduction to Ethical Hacking</h2>
      <p class="course-description">Explore the basics of ethical hacking and cybersecurity. Learn about vulnerabilities, penetration testing, network security, and best practices for securing systems.</p>
      <a class="registration-link" href="register.php">Register Now</a>
    </div>

    <div class="course-card">
      <h2 class="course-title">Mobile App Development with Swift</h2>
      <p class="course-description">Develop iOS applications using Swift programming language. Cover topics like UI design, data storage, networking, and integrating with device features.</p>
      <a class="registration-link" href="register.php">Register Now</a>
    </div>

    <div class="course-card">
      <h2 class="course-title">Front-End Web Development with React</h2>
      <p class="course-description">Learn to build interactive and responsive web applications using React library. Understand components, state management, routing, and API integration.</p>
      <a class="registration-link" href="register.php">Register Now</a>
    </div>
</body>
</html>