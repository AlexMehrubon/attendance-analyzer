export async function fetchData(url) {
    const response = await fetch(url);
    if (!response.ok) {
        throw new Error('Ошибка загрузки JSON файла');
    }
    return response;
}