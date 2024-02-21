import { getFaculties } from './faculty/read-faculty.js';
import { getGroups } from './group/read-groups.js';

const groupSelectedCourse = document.getElementById("groupSelectCourse");
const groupSelectedFaculty = document.getElementById("groupSelectFaculty");

groupSelectedCourse.addEventListener("change", () => getGroups(groupSelectedCourse, groupSelectedFaculty));
groupSelectedFaculty.addEventListener("change", () => getGroups(groupSelectedCourse, groupSelectedFaculty));

// Получаем все факультеты
await getFaculties();
// Получаем группы для выбранного факультета
await getGroups(groupSelectedCourse, groupSelectedFaculty);