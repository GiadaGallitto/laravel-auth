const deleteForms = document.querySelectorAll('form.form-delete');

deleteForms.forEach((formEl) => {
    formEl.addEventListener('submit', function(event) {
        event.preventDefault();
        const formElName = formEl.getAttribute('data-element-name');
        const confirmSend = window.confirm("Are you sure about delete this element?");
        if (confirmSend) this.submit();
    })
});