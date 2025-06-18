<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Facebook – Sign Up</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .signup-container {
      background-color: #fff;
      padding: 20px 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 360px;
    }

    h1 {
      color: #1877f2;
      text-align: center;
      font-size: 36px;
      margin-bottom: 10px;
    }

    h2 {
      font-size: 22px;
      text-align: center;
      margin-bottom: 10px;
    }

    p {
      text-align: center;
      color: #555;
      margin-bottom: 20px;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-top: 8px;
      margin-bottom: 12px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .name-fields {
      display: flex;
      gap: 10px;
    }

    .name-fields input {
      width: 50%;
    }

    .gender-fields {
      display: flex;
      justify-content: space-between;
    }

    .gender-fields label {
      width: 33%;
      text-align: center;
    }

    .create-btn {
      width: 100%;
      background-color: #42b72a;
      color: white;
      border: none;
      font-weight: bold;
      padding: 10px;
      border-radius: 5px;
      font-size: 16px;
      margin-top: 10px;
      cursor: pointer;
    }

    .login-link {
      text-align: center;
      margin-top: 10px;
    }

    .login-link a {
      color: #1877f2;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="signup-container">
    <h1>facebook_clone</h1>
    <h2>Create a new account</h2>
    <p>It's quick and easy.</p>

    <form action="signup_process.php" method="POST">
      <div class="name-fields">
        <input type="text" name="first_name" placeholder="First name" required>
        <input type="text" name="last_name" placeholder="Surname" required>
      </div>

      <label>Date of birth</label>
      <input type="date" name="dob" required>

      <label>Gender</label>
      <div class="gender-fields">
        <label><input type="radio" name="gender" value="Female" required> Female</label>
        <label><input type="radio" name="gender" value="Male"> Male</label>
      </div>

      <input type="email" name="email" placeholder="Mobile number or email address" required>
      <input type="password" name="password" placeholder="New password" required>

      <button type="submit" class="create-btn">Create New Account</button>

      <div class="login-link">
        <a href="index.php">Already have an account?</a>

      </div>
    </form>
  </div>
</body>
</html>
