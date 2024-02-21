import {fetchData} from '../fetch-data.js'
export async function getFaculties() {
    try {
        const response = await fetchData('http://courseWork/api/faculty/read.php');
        const data = await response.json();

        if (!Array.isArray(data.records)) {
            throw new Error('Данные не являются массивом JSON');
        }

        const facultyList = document.getElementById("groupSelectFaculty");


        data.records.forEach(item => {
            console.log(item.id)
            let option = document.createElement('option');
            option.value = item.id;
            option.innerText = item.faculty_name;
            facultyList.appendChild(option);
        });
    } catch (error) {
        console.error("Error:", error);
    }
}

