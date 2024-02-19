document.getElementById("login-form").addEventListener("submit", function (e) {
    e.preventDefault(); // Предотвращаем стандартное поведение формы (перезагрузку страницы)

    let json_data = {
        first_name: document.getElementById("firstNameField").value,
        last_name: document.getElementById("lastNameField").value
    };

    let requestOptions = {
        method: 'POST',
        body: JSON.stringify(json_data), // Преобразуйте объект в JSON
        headers: {
            'Content-Type': 'application/json'
        }
    };

    fetch('http://courseWork/api/student/create.php', requestOptions)
        .then(response => {
            if (response.status === 201) {
                document.getElementById("login-form").reset();
            } else {
                return response.text().then(errorText => {
                    console.log(response.status, errorText);
                });
            }
        })
        .catch(error => {
            console.log("Ошибка сети:", error);
        });
});