document.addEventListener('DOMContentLoaded',
    function () {

        // Используем функцию fetch для загрузки JSON файла
        fetch('http://courseWork/api/faculty/read.php')
            .then(function (response) {
                // Проверяем, успешно ли выполнен запрос
                if (!response.ok) {
                    throw new Error('Ошибка загрузки JSON файла');
                }
                return response.json(); // Преобразуем ответ в JSON
            })
            .then(function (data) {
                // Данные успешно получены, отображаем их на странице
                if (!Array.isArray(data.records)) {
                    throw new Error('Данные не являются массивом JSON');
                }

                const facultyList = document.getElementById("groupSelectFaculty");
                facultyList.innerText = " "


                data.records.forEach(item => {
                    let option = document.createElement('option')
                    option.value = item.faculty_name;
                    option.innerText = item.faculty_name;
                    facultyList.appendChild(option)
                    console.log("wtf")

                })

            })
            .catch(function (error) {
                console.error("Error:", error)
            })
    })


