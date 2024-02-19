<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>.Lateness</title>
    <style>
        body {
            background-color: lightblue;
            font-family: Arial, sans-serif;
        }
        .login-form {
            width: 300px;
            margin: 0 auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
        }
        .login-form h2 {
            text-align: center;
        }
        .login-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: blue;
            color: white;
            border: none;
        }
        .dropdown-select {
            width: 200px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

    </style>
</head>
<body>
<form id="login-form" class="login-form">
    <h2>Регистрация</h2>
    <input type="text" placeholder="Логин" id="loginField" required>
    <input type="password" placeholder="Пароль" id="firstPasswordField" required>
    <input type="password" placeholder="Подтвердите пароль" id="secondPasswordField" required>
    <input type="text" placeholder="Имя" id="firstNameField" required>
    <input type="text" placeholder="Фамилия" id="lastNameField" required>
    <input type="text" placeholder="Группа" id="groupField" required>
    <div class="dropdown" >
        <select class="dropdown-select" id="groupSelectFaculty" required>
        </select>
    </div>
    <div class="dropdown" >
        <select class="dropdown-select" id="groupSelectCourse" required>
            <option value="1">1 КУРС</option>
            <option value="2">2 КУРС</option>
            <option value="3">3 КУРС</option>
            <option value="4">4 КУРС</option>
        </select>
    </div>
    <div class="dropdown" >
        <select class="dropdown-select" id="groupSelectGroup" required>
        </select>
    </div>
    <button>Войти</button>
    <a href="#">Забыли пароль?</a>
</form>



<script src="app/app.js"></script>
<script src="app/group/read-groups.js"
<script src="app/faculty/read-faculty.js"
<script src = "app/student/create-student.js"></script>
<script src = "app/student/read-students.js"></script>
</body>
</html>
