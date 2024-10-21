function searchInPage(event) {
    event.preventDefault();

    const query = document.getElementById('searchQuery').value.toLowerCase();
    const contentElements = document.querySelectorAll('.content *'); // Selecciona todo el contenido dentro de la clase .content
    const resultsContainer = document.getElementById('searchResults');
    resultsContainer.innerHTML = ''; // Limpia los resultados anteriores

    if (!query) {
        resultsContainer.innerHTML = '<p>Por favor ingresa un término de búsqueda.</p>';
        return;
    }

    let found = false;

    // Recorre todos los elementos dentro del contenedor con clase .content
    contentElements.forEach(el => {
        // Busca coincidencias en texto visible o atributos
        const textMatch = el.textContent.toLowerCase().includes(query);
        const altMatch = el.getAttribute('alt') && el.getAttribute('alt').toLowerCase().includes(query);
        const titleMatch = el.getAttribute('title') && el.getAttribute('title').toLowerCase().includes(query);

        // Si encuentra una coincidencia, destaca el contenido y muestra el resultado
        if (textMatch || altMatch || titleMatch) {
            found = true;

            // Crear un elemento para mostrar el resultado
            const resultItem = document.createElement('div');
            resultItem.classList.add('result-item');
            if (textMatch) {
                resultItem.innerHTML = `Texto encontrado: <strong>${el.textContent}</strong>`;
            } else if (altMatch) {
                resultItem.innerHTML = `Imagen con alt: <strong>${el.getAttribute('alt')}</strong>`;
            } else if (titleMatch) {
                resultItem.innerHTML = `Imagen con título: <strong>${el.getAttribute('title')}</strong>`;
            }

            resultsContainer.appendChild(resultItem);

            // Opcional: destaca el elemento encontrado
            el.style.backgroundColor = '#ffff99'; // Destaca con un fondo amarillo claro
        }
    });

    if (!found) {
        resultsContainer.innerHTML = '<p>No se encontraron resultados.</p>';
    }
}
