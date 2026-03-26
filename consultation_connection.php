<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Consultation</title>
  <style>
    /* Objective four:CSS Variables */
   :root {
    --form-bg: rgb(152, 218, 248);               
    --accent: rgb(240, 165, 240);                  
    --hover-accent: white;             
    --text-color: black             
    --input-radius: 5px;              
    --spacing: 10px;                  
    --font-main: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; 
  }
  
  /*Page Body Styling and Centering*/
  body {
    font-family: var(--font-main);  
    /*Objective two: Using flexbox to center position the form on all screen sizes*/
    display: flex;                   
    justify-content: center; /*Center horizontally*/
    align-items: center;  /*Center vertically*/
    height: 100vh;  
    padding: 20px; /*Avoid edge overflow on small screens*/
    background-image: url('https://thumbs.dreamstime.com/b/basic-rgb-197107608.jpg');
    background-size: cover;
    background-position: center;
    
  }
  /*Logo styling*/
  .logo {
    /*Objective three: CSS display property*/
    display: block;
    margin: 0 auto 20px auto;
    width: 100px;
  }
  
  /*Container Styling*/
  .form-container {
    background-color: var(--form-bg);
    padding: 30px;                   /* Inner space for the form */
    border-radius: 10px;          
    width: 100%;                     
    max-width: 400px;                
    color: var(--text-color);        
    display: flex;    
    flex-direction: column;          /* Stack vertically */
  }
  
  /*School Registration Form heading Styling*/
  h2 {
    text-align: center;              
    
  }
  
  form label {
    /*Objective three: CSS display property*/
    display: block;                  
    margin-top: var(--spacing);     /* Space above each label */
  }
  
  /*Input Field Styling*/
  form input[type="text"],
  form input[type="email"],
  form input[type="password"],
  form input[type="id"] {
    width: 100%;                     
    padding: 8px;                    /* Inner space for text input */
    margin-top: 5px;                 /* Space between label and input */
    border-radius: var(--input-radius); 
    border: 1px solid #ccc;          
  }
  
  /*Gender Section Styling*/
  .gender {
    /*Objective three: CSS display property*/
    display: flex;                   /* Layout radio buttons side by side */
    justify-content: space-between; /* Equal spacing between them */
  }
  
  .gender label {
    /*Objective three: CSS display property*/
    display: inline-block;          /* Keep label next to radio button */
    margin-right: 15px;             /* Space between gender options */
  }
  
  .gender input[type="radio"] {
    accent-color: var(--hover-accent);   
  }
  
  /*Submit Button Styling*/
  button {
    margin-top: 20px;                
    width: 100%;                     
    padding: 10px;                   /* Vertical space inside button */
    background-color: var(--accent);
    color: var(--text-color);        /* White text */
    border: none;                    /* Remove default border */
    border-radius: var(--input-radius); 
    cursor: pointer;                
    transition: background-color 0.3s ease-in-out; /* Smooth color transition */
  }
  
  button:hover {
    background-color: var(--hover-accent); 
  }
  
  /*Objective 1: Responsive Design for Small Screens using @media query*/
  @media (max-width: 500px) {
    .form-container {
      padding: 20px;                 /* Reduce padding on smaller screens */
    }
  
    /*Gender section switches from horizontal to vertical on screens smaller than 500 px*/
    .gender {
      flex-direction: column;       /* Stack radio buttons vertically */
      gap: 10px;                     /* Add vertical space between them */
    }
  }
/*Textarea Styling */
form textarea {
  width: 100%;
  min-height: 120px;
  padding: 12px;
  margin-top: 5px;
  margin-bottom: 20px;
  border-radius: var(--input-radius);
  border: none;
  background-color: #ffffff;
  font-family: var(--font-main);
  font-size: 1rem;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: 0.3s;
}

form textarea:focus {
  outline: none;
  box-shadow: 0 0 0 3px var(--accent);
}

/* Styled File Upload Container */
.file-upload-wrapper {
  background-color: #fff;
  border: 2px dashed var(--accent);
  padding: 15px;
  border-radius: var(--input-radius);
  text-align: center;
  margin-top: 10px;
  font-size: 0.95rem;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
}

.file-upload-wrapper input[type="file"] {
  opacity: 0;
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  cursor: pointer;
}
/* Create a custom styled file button */
.custom-file-upload {
  display: inline-block;
  background-color: var(--form-bg);
  color: var(--text-color);
  padding: 10px 20px;
  border-radius: var(--input-radius);
  font-family: var(--font-main);
  font-size: 0.95rem;
  text-align: center;
  cursor: pointer;
  transition: background-color 0.3s ease-in-out;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
  </style>
</head>
<body>
  <div class="form-container">
    <img src="https://cdn-icons-png.flaticon.com/512/1470/1470006.png" alt="School Logo" class="logo"> 
  <h2>Consultation Form</h2>
  <form action="submit_consultation.php" method="POST" enctype="multipart/form-data">
    <label for = "Student_Id"> Student Id:</label><br>
    <input type="id" id="id" name="id" required>

    <label for= "question" >Your Question:</label><br>
    <textarea id="question" name="question" rows="5" cols="40" required></textarea><br><br>

    <label for="attachment">Upload Your Work (optional):</label><br>
    <div class="file-upload-wrapper" style="position: relative;">
       <label for="file" class="custom-file-upload">Choose File</label>
    <input type="file" id="attachment" name="attachment" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg"><br><br>
    </div>

    <button type="submit">Submit</button>
  </form>
  </div>
</body>
</html>
