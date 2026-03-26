<!-- Define document as HTML -->
<!DOCTYPE html>
<html lang="en">

<!-- Contains title and metadata of the page -->
<head>
  <meta charset="UTF-8">
  <!-- Ensures proper touch zooming on mobile devices -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  
  <style>
    /* Objective 4: CSS Variables */
    :root {
      --form-bg: rgb(152, 218, 248);
      --accent: rgb(240, 165, 240);
      --hover-accent: white;
      --text-color: black;
      --input-radius: 5px;
      --spacing: 10px;
      --font-main: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    /* Page Body Styling and Centering */
    body {
      font-family: var(--font-main);
      /* Objective 2: Using flexbox to center the form on all screen sizes */
      display: flex;
      justify-content: center; /* Center horizontally */
      align-items: center;     /* Center vertically */
      height: 100vh;
      padding: 20px;           /* Avoid edge overflow on small screens */
      background-image: url('https://thumbs.dreamstime.com/b/basic-rgb-197107608.jpg');
      background-size: cover;
      background-position: center;
    }

    /* Logo styling */
    .logo {
      /* Objective 3: CSS display property */
      display: block;
      margin: 0 auto 20px auto;
      width: 100px;
    }

    /* Container Styling */
    .form-container {
      background-color: var(--form-bg);
      padding: 30px;                   /* Inner space for the form */
      border-radius: 10px;
      width: 100%;
      max-width: 400px;
      color: var(--text-color);
      display: flex;
      flex-direction: column;         /* Stack children vertically */
    }

    /* School Registration Form heading Styling */
    h2 {
      text-align: center;
    }

    /* Label styling */
    form label {
      /* Objective 3: CSS display property */
      display: block;
      margin-top: var(--spacing);     /* Space above each label */
    }

    /* Input Field Styling */
    form input[type="text"],
    form input[type="email"],
    form input[type="password"] {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border-radius: var(--input-radius);
      border: 1px solid #ccc;
    }

    /* Gender Section Styling */
    .gender {
      /* Objective 3: CSS display property */
      display: flex;                   /* Layout radio buttons side by side */
      justify-content: space-between; /* Equal spacing between options */
    }

    .gender label {
      display: inline-block;          /* Keep label next to radio button */
      margin-right: 15px;             /* Space between gender options */
    }

    .gender input[type="radio"] {
      accent-color: var(--hover-accent);
    }

    /* Submit Button Styling */
    button {
      margin-top: 20px;
      width: 100%;
      padding: 10px;
      background-color: var(--accent);
      color: var(--text-color);
      border: none;
      border-radius: var(--input-radius);
      cursor: pointer;
      transition: background-color 0.3s ease-in-out; /* Smooth color transition */
    }

    button:hover {
      background-color: var(--hover-accent);
    }

    /* Objective 1: Responsive Design for Small Screens using @media query */
    @media (max-width: 500px) {
      .form-container {
        padding: 20px; /* Reduce padding on smaller screens */
      }

      /* Gender section switches from horizontal to vertical on screens smaller than 500px */
      .gender {
        flex-direction: column; /* Stack radio buttons vertically */
        gap: 10px;              /* Add vertical space between them */
      }
    }
  </style>
</head>

<body>
  <!-- Container div for styling and centering the form -->
  <div class="form-container">
    <img src="https://cdn-icons-png.freepik.com/512/17020/17020597.png" alt="School Logo" class="logo">
    <h2>Create a New Account</h2>
    
    <!-- action: URL to send form data to; method: POST to securely send data -->
    <form class = "form" action="process_lecturer.php" method="POST">
      
      <label for="id">Lecturer ID:</label>
      <input type="text" id="lecturer_id" name="lecturer_id" required>

      <label for="FirstName">First Name:</label>
      <input type="text" id="first_name" name="first_name" required>

      <label for="Surname">Surname:</label>
      <input type="text" id="surname" name="surname" required>

      <!-- Gender selection using radio buttons -->
      <!-- <label>Gender</label>
      <div class="gender">
        <label><input type="radio" name="gender" value="male" required> Male</label>
        <label><input type="radio" name="gender" value="female" required> Female</label>
      </div> -->

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <button type="submit">Sign in</button>
    </form>
    
    <p>Already have an account? <a href="login.html">Login here</a></p>
  </div>
</body>
</html>
