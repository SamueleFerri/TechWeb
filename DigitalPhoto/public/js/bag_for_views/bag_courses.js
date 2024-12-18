document.querySelectorAll('.bag-icon').forEach(icon => {
    icon.addEventListener('click', function() {
        const itemId = this.getAttribute('data-item-id');
        const icon = this;

        fetch('/bag-corso', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') 
            },
            body: JSON.stringify({ item_id: itemId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                icon.classList.toggle('inbag');
                icon.classList.toggle('not-inbag');
            } else {
                alert('Errore durante l\'operazione di bag.');
            }
        });
    });
});