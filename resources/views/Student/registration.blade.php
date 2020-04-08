<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #8433;
}

* {
  width: 700px;
  margin-left: 80px;
  padding-left: 10px;
  margin-top: 0px;

}
h1{
  color: #fff;
  margin-left: 150px;


}
.reg{
  margin-top: 0px;
  margin-left: 0px;
  width: 678px;
  padding: 4px;
  background-color: #9878;
}

/* Add padding to containers */
.container {
  margin: 0px;
  padding: 16px;
  background: red;
  border: 1px solid black;

}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 655px;
  padding: 15px;
  margin: 5px 0 10px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 686px;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
   margin: 0px;
  background-color: blue;
  text-align: center;
  width: 718px;
  padding: 7px;
  color: #fff;
}
</style>
</head>
<body>

<form action="registration" method="post">
  <div class="container">
    <div class="reg">
    <h1>REGISTRATION FORM</h1>
    </div>
    @csrf   
    <input type="text" placeholder="Enter Name" name="name" required>

    <input type="text" placeholder="Enter Roll Number" name="roll_no" required>
    
    <input type="text" placeholder="Enter Email" name="email" required>


    <input type="password" placeholder="Enter Password" name="password" required>
  

    <input type="text" placeholder="Enter Mobile Number" name="mobile_no" required>
   
    <button type="submit" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form>