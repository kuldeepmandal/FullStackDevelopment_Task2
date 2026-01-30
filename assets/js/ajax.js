function updateStock(id, stock) {
    fetch('update_stock.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({id: id, stock: stock})
    });
}
