document.querySelector('form').addEventListener('submit', (e) => {
    e.preventDefault();

    let results = [];

    let valid = false;

    inputs.forEach((input, i) => {
        if (results[i] == undefined) {
            results[i] = {"name": input.name, "value": input.value}
        } else {
            results[i].value = input.value
        }

        if ( input.type == "number" && input.value < 0) {
            input.setCustomValidity("Wartość musi byc dodatnia!")
        } else if (input.type == "text" && input.value == "") {
            input.setCustomValidity("Wartość nie może być pusta!");
        } else {
            input.setCustomValidity("");
            valid = true;
        }

        input.reportValidity();
    })

    if (valid) alert(JSON.stringify(results, null, 2))
});

function closeModal() {
    const modal = document.querySelector("#modals");

    if (modal != null) {
        document.body.removeChild(modal)
    }
}

document.addEventListener('keydown', (e) => {
    const modal = document.querySelector(".modal__background");
    if (modal != null && e.key === "Escape") closeModal();
});