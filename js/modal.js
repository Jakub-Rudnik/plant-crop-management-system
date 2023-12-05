async function createModal(type, id) {
    let template;
    let elemToFocus;
    const TYPE = type.split('-');

    let titleSecondPart = "";

    switch (TYPE[0]) {
        case "crop":
            titleSecondPart = "uprawę";
            elemToFocus = "#cropName";
            break;
        case "worker":
            titleSecondPart = "pracownika"
            elemToFocus = "#workerForeName";
            break;
        case "task":
            titleSecondPart = "zadanie";
            elemToFocus = "#taskDesc"
    }

    let mode;
    switch (TYPE[1]) {
        case "add":
            mode = "Dodaj";
            break;
        case "edit":
            mode = "Edytuj"
            break;
        case "delete":
            elemToFocus = "#cancelBtn"
            mode = "Usuń"
            break;
    }

    const title = mode + " " + titleSecondPart;

    let url;
    if (TYPE[1] !== "delete") {
        url = `http://localhost/templates/${TYPE[0]}-modal`;
    } else {
        url = 'http://localhost/templates/delete-modal';
    }

    template = await fetch(url, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(id ? {
            id: id,
            title: title
        } : {
            title: title
        })
    })
        .then(res => res.text())
        .then(data => data);

    const div = document.createElement('div');
    div.id = "modal";
    div.innerHTML = template;

    document.body.appendChild(div);

    const modalInDom = document.querySelector(".modal");
    const dimensions = modalInDom.getBoundingClientRect();

    modalInDom.style.marginTop = (0 - dimensions.height / 2).toString() + 'px';
    modalInDom.style.marginLeft = (0 - dimensions.width / 2).toString() + 'px';

    document.querySelector(elemToFocus).focus();

    const inputs = document.querySelectorAll('input');


    inputs.forEach(input => {
        input.addEventListener('input', (e) => {
            if ( input.type == "number" && input.value < 0) {
                input.setCustomValidity("Wartość musi byc dodatnia!")
            } else if (input.type == "text" && input.value == "") {
                input.setCustomValidity("Wartość nie może być pusta!");
            } else {
                input.setCustomValidity("")
            }

            input.reportValidity();
        })
    })

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

    document.querySelector(".modal__background").addEventListener('click', () => closeModal());
}

function closeModal() {
    const modal = document.querySelector("#modal");

    if ( modal != null) {
        document.body.removeChild(modal)
    }
}

document.addEventListener('keydown', (e) => {
    const modal = document.querySelector(".modal__background");
    if (modal != null && e.key === "Escape") closeModal();
});