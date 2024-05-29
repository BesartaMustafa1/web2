<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TL</title>
    <link rel="stylesheet" href="../header/header.css">
    <link rel="stylesheet" href="../footer/footer.css">
    <link rel="stylesheet" href="courses.css">
    <link rel="stylesheet" href="../launching/launching.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background-image: url('digitalreading.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
        .course-info {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div id="header">
    <!-- Header content here -->
</div>

<div class="container">
    <h1>Our Courses</h1>
    <section id="dynamicCourses" class="course">
        <h1>What We Offer</h1>
        <div class="row" id="course-container">
            <!-- Courses will be dynamically loaded here -->
        </div>
    </section>
</div>

<section class="facilities">
    <h1>Our Classrooms</h1>
    <div class="row">
        <div class="facilities-col">
            <img src="facility1.jpg">
            <h3>Courses For Kids</h3>
            <p>Ignite Your Child's Imagination with Fun and Educational Courses!.</p>
        </div>
        <div class="facilities-col">
            <img src="facility2.jpg">
            <h3>Courses For Adults</h3>
            <p>Invest in Yourself: Elevate Your Skills and Expand Your Horizons!</p>
        </div>
        <div class="facilities-col">
            <img src="facility3.jpg">
            <h3>Courses For Teenagers</h3>
            <p>Elevate Learning Beyond the Classroom with Engaging Teen-Focused Courses!</p>
        </div>
    </div>
</section>

<script>
    $('#header').load('../header/header.php');
    fetchCourses();

    function fetchCourses() {
        fetch('https://api.example.com/courses')
            .then(response => response.json())
            .then(data => {
                const container = document.getElementById('course-container');
                data.forEach(course => {
                    const courseDiv = document.createElement('div');
                    courseDiv.className = 'course-col';
                    courseDiv.innerHTML = `
                        <h3>${course.title}</h3>
                        <p>${course.description}</p>
                        <p>Price: ${course.price}</p>
                        <p>Duration: ${course.duration}</p>
                    `;
                    container.appendChild(courseDiv);
                });
            })
            .catch(error => console.error('Failed to fetch courses:', error));
    }
</script>

<iframe src="../footer/footer.php" width="100%" height="450vh"></iframe>
</body>
</html>
