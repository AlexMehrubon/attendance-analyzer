export async function createStudent () {
    const API_URL = 'http://courseWork/api/student/create.php';
    const SUCCESS_STATUS = 201;

    let json_data = {
        first_name: document.getElementById("firstNameField").value,
        last_name: document.getElementById("lastNameField").value,
        login: document.getElementById("loginField").value,
        password: document.getElementById("firstPasswordField").value,
        group_id: document.getElementById("groupSelectGroup").value,
        course: document.getElementById("groupSelectCourse").value

    };

    let requestOptions = {
        method: 'POST',
        body: JSON.stringify(json_data), // Преобразуйте объект в JSON
        headers: {
            'Content-Type': 'application/json'
        }
    };

    try {
        const response = await fetch(API_URL, requestOptions);

        if (response.status === SUCCESS_STATUS) {
            document.getElementById("login-form").reset();
        } else {
            const errorText = await response.text();
            console.error(`Ошибка: ${response.status} - ${errorText}`);
            // Вы можете добавить обработку ошибок здесь, например, показать пользователю сообщение об ошибке
        }
    } catch (error) {
        console.error("Ошибка сети:", error);
        // Вы можете добавить обработку сетевых ошибок здесь, например, показать пользователю сообщение об ошибке
    }
}