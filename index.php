<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>.Lateness</title>
    <link rel="stylesheet" type="text/css" href="app/assets/css/auth.css">
</head>
<body>

<header class="header">
    <div class="header-content">
        <span class="header-text">AttendanceWizard</span>
    </div>
</header>

<main>
    <form id="login-form" class="login-form">
        <h2>Регистрация</h2>
        <input type="text" placeholder="Логин" id="loginField" required>
        <input type="password" placeholder="Пароль" id="firstPasswordField" required>
        <input type="password" placeholder="Подтвердите пароль" id="secondPasswordField" required>
        <input type="text" placeholder="Имя" id="firstNameField" required>
        <input type="text" placeholder="Фамилия" id="lastNameField" required>
        <div class="dropdown">
            <select class="dropdown-select" id="groupSelectFaculty" required>
            </select>
        </div>
        <div class="dropdown">
            <select class="dropdown-select" id="groupSelectCourse" required>
                <option value="1">1 КУРС</option>
                <option value="2">2 КУРС</option>
                <option value="3">3 КУРС</option>
                <option value="4">4 КУРС</option>
            </select>
        </div>
        <div class="dropdown">
            <select class="dropdown-select" id="groupSelectGroup" required>
            </select>
        </div>
        <button>Зарегистрироваться</button>
    </form>
</main>


<script type="module" src="app/app.js"></script>
<script src="app/student/read-students.js"></script>
</body>
</html>
