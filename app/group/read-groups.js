import {fetchData} from '../fetch-data.js'
export async function getGroups(groupSelectedCourse, groupSelectedFaculty) {
    try {
        const response = await fetchData('http://courseWork/api/group/read.php');
        const data = await response.json();

        if (!data.records?.length) throw new Error('Данные не явщаются массивом JSON');

        const groupList = document.getElementById("groupSelectGroup");
        groupList.innerText = " ";


        let isMatchedCourse = false;
        const selectedFacultyIndex = groupSelectedFaculty.selectedIndex

        data.records.forEach(item => {
            if (Number(item.course) === Number(groupSelectedCourse.value) &&
                (groupSelectedFaculty[selectedFacultyIndex].innerText === item.faculty_name))
            {
                let option = document.createElement('option');
                option.value = item.id;
                option.innerText = item.group_name;
                groupList.appendChild(option);
                isMatchedCourse = true;
            }
        });

        if (!isMatchedCourse) {
            groupList.innerText = "";
        }
    } catch (error) {
        console.error("Error:", error);
    }
}

