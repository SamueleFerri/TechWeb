function emptyCart() {
    // Token CSRF necessario per protezione delle richieste
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Chiamata AJAX
    fetch('/empty-cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({})
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json(); // Parse del JSON solo se la risposta è ok
    })
    .then(data => {
        if (data.success) {
            console.log('Carrello svuotato con successo!');
            // Puoi anche fare un redirect o aggiornare la pagina
            window.location.href = 'bag';
        } else {
            alert('Errore durante lo svuotamento del carrello. Riprova.');
            console.error('Errore:', data.error);
        }
    })
    .catch(error => {
        console.error('Errore:', error);
        console.log('Errore durante la richiesta.');
    });
}