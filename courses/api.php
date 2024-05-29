<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TL</title>
    <!-- Include your CSS files here -->
    <link rel="stylesheet" href="../header/header.css">
    <link rel="stylesheet" href="../footer/footer.css">
    <link rel="stylesheet" href="../launching/launching.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-image: url('digitalreading.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
    </style>
</head>
<body>

<!-- Header -->
<div id="header">
    <!-- Include your header content here -->
</div>

<!-- JavaScript -->
<script>
    // Function to fetch course information from the API
    function fetchCourseInfo() {
        fetch('../course/courses.php') 
            .then(response => response.json())
            .then(data => {
                // Assuming the API returns an array of course objects
                // Iterate through each course object and display its information
                data.forEach(course => {
                    // Create elements to display course information
                    const courseDiv = document.createElement('div');
                    courseDiv.classList.add('course-info');

                    // Populate course information
                    courseDiv.innerHTML = `
                        <h2>${course.title}</h2>
                        <p>${course.description}</p>
                        <p>Price: ${course.price}</p>
                        <p>Duration: ${course.duration}</p>
                    `;

                    // Append the course information to the container
                    document.body.appendChild(courseDiv); // Shfaq kursin në fund të dokumentit
                });
            })
            .catch(error => {
                console.error('Error fetching course information:', error);
            });
    }

    // Call the fetchCourseInfo function when the page loads
    window.onload = fetchCourseInfo;
</script>

<!-- Footer -->
<iframe src="../footer/footer.html" width="100%" height="450vh"></iframe>

</body>
</html>
