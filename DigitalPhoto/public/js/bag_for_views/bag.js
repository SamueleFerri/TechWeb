document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.bag-icon').forEach(icon => {
        icon.addEventListener('click', function () {
            const itemId = this.getAttribute('data-item-id');
            const itemType = this.getAttribute('data-item-type');
            const icon = this;

            console.log(`Rimuovo il bag per ${itemType} con ID: ${itemId}`);

            // Invio della richiesta AJAX a Laravel
            fetch('/bag/remove', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') 
                },
                body: JSON.stringify({
                    item_id: itemId,
                    item_type: itemType
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Bag rimosso con successo!');

                    // Troviamo e rimuoviamo il genitore .col__dipslay__card
                    const parentElement = icon.closest('.col__dipslay__card');
                    if (parentElement) {
                        parentElement.remove();
                    } else {
                        console.warn('Elemento non trovato per la rimozione.');
                    }
                } else {
                    console.warn('Errore durante la rimozione del bag:', data.message);
                }
            })
            .catch(error => console.error('Errore durante la rimozione:', error));
        });
    });
});