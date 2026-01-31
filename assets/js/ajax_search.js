const input = document.getElementById('productInput');
const box = document.getElementById('suggestions');

input.addEventListener('keyup', () => {
    const query = input.value.trim();

    if (query.length < 1) {
        box.innerHTML = '';
        return;
    }

    fetch(`ajax_search.php?q=${encodeURIComponent(query)}`)
        .then(res => res.json())
        .then(data => {
            box.innerHTML = '';

            data.forEach(item => {
                const div = document.createElement('div');
                div.textContent = item;
                div.classList.add('suggestion-item');

                div.onclick = () => {
                    input.value = item;
                    box.innerHTML = '';
                };

                box.appendChild(div);
            });
        });
});
