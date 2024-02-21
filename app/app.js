import { getFaculties } from './faculty/read-faculty.js';
import { getGroups } from './group/read-groups.js';
import {createStudent} from "./student/create-student.js";

const groupSelectedCourse = document.getElementById("groupSelectCourse");
const groupSelectedFaculty = document.getElementById("groupSelectFaculty");
const loginForm = document.getElementById("login-form")

groupSelectedCourse.addEventListener("change", () => getGroups(groupSelectedCourse, groupSelectedFaculty));
groupSelectedFaculty.addEventListener("change", () => getGroups(groupSelectedCourse, groupSelectedFaculty));
loginForm.addEventListener("submit",async function(event){
    event.preventDefault()
    await createStudent()
});


// Получаем все факультеты
await getFaculties();
// Получаем группы для выбранного факультета
await getGroups(groupSelectedCourse, groupSelectedFaculty);


