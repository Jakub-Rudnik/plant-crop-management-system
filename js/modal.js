async function createModal(type, id) {
    let template;
    let elemToFocus;
    const TYPE = type.split('-');

    let titleSecondPart = "";

    switch (TYPE[0]) {
        case "crop":
            titleSecondPart = "uprawę"
            elemToFocus = "#cropName";
            break;
        case "worker":
            titleSecondPart = "pracownika"
            elemToFocus = "#workerForeName";
            break;

    }

    const title = (TYPE[1] === "add" ? "Dodaj" : "Edytuj") + " " + titleSecondPart;

    template = await fetch(`http://localhost/templates/${TYPE[0]}-modal`, {
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

    console.log(template)

    const div = document.createElement('div');
    div.id = "modal";
    div.innerHTML = template;

    document.body.appendChild(div);

    const modalInDom = document.querySelector(".modal");
    const dimensions = modalInDom.getBoundingClientRect();

    modalInDom.style.marginTop = (0 - dimensions.height / 2).toString() + 'px';
    modalInDom.style.marginLeft = (0 - dimensions.width / 2).toString() + 'px';

    document.querySelector(elemToFocus).focus();

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