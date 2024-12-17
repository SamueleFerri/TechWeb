document.querySelectorAll('.like-icon').forEach(icon => {
    icon.addEventListener('click', function() {
        const itemId = this.getAttribute('data-item-id');
        const icon = this;

        fetch('/like-corso', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Token CSRF per protezione
            },
            body: JSON.stringify({ item_id: itemId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                icon.classList.toggle('liked');
                icon.classList.toggle('not-liked');
            } else {
                alert('Errore durante l\'operazione di like.');
            }
        });
    });
});