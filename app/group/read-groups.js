let groupSelectCourse = document.getElementById("groupSelectCourse");
const changeEvent = new Event("change");
groupSelectCourse.dispatchEvent(changeEvent);

groupSelectCourse.addEventListener("change", //showProducts
    function () {

        // Используем функцию fetch для загрузки JSON файла
        fetch('http://courseWork/api/group/read.php')
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

                const groupList = document.getElementById("groupSelectGroup");
                groupList.innerText = " "

                let isMatchedCourse = false
                data.records.forEach(item => {


                    if(Number(item.course) === Number(groupSelectCourse.value)) {
                        let option = document.createElement('option')
                        option.value = item.group_name;
                        option.innerText = item.group_name;
                        groupList.appendChild(option)
                        isMatchedCourse = true
                    }

                })

                if(!isMatchedCourse)
                    groupList.innerText = ""
            })
            .catch(function (error) {
                console.error("Error:", error)
            })
})


