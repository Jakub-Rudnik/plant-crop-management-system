async function createModal(type, id) {
    let template;
    let elemToFocus;
    const TYPE = type.split('-');

    switch (TYPE[0]) {
        case "crop":
            switch (TYPE[1]) {
                case "add":
                case "edit":
                    elemToFocus = "#cropName";
                    const title = (TYPE[1] === "add" ? "Dodaj" : "Edytuj") + " uprawę";

                    template = await fetch("http://localhost/templates/crop-modal", {
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
                    break;
            }


    }
    document.body.innerHTML += template;

    const modalInDom = document.querySelector(".modal");
    const dimensions = modalInDom.getBoundingClientRect();

    modalInDom.style.marginTop = (0 - dimensions.height / 2).toString() + 'px';
    modalInDom.style.marginLeft = (0 - dimensions.width / 2).toString() + 'px';

    document.querySelector(elemToFocus).focus();

    document.querySelector(".modal__background").addEventListener('mousedown', () => closeModal());
}

function closeModal() {
    const modalBackground = document.querySelector(".modal__background");
    const modal = document.querySelector(".modal");

    if (modalBackground != null && modal != null) {
       modal.remove();
       modalBackground.remove();
    }
}

document.addEventListener('keydown', (e) => {
    const modal = document.querySelector(".modal__background");
    if (modal != null && e.key === "Escape") closeModal();
});