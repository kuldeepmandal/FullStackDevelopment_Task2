function loadStock() {
    fetch('ajax_stock.php')
        .then(response => response.json())
        .then(data => {
            let html = `
                <tr>
                    <th>Name</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            `;

            data.forEach(item => {
                html += `
                    <tr>
                        <td>${item.product_name}</td>
                        <td>${item.stock}</td>
                        <td>
                            <a href="edit.php?id=${item.id}">
                                <button class="btn-edit">Edit</button>
                            </a>
                            <a href="delete.php?id=${item.id}" 
                               onclick="return confirm('Delete product?')">
                                <button class="btn-delete">Delete</button>
                            </a>
                        </td>
                    </tr>
                `;
            });

            document.getElementById('stockTable').innerHTML = html;
        })
        .catch(err => {
            alert('Failed to load stock data');
            console.error(err);
        });
}
