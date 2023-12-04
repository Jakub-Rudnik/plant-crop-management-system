async function createModal(modal, type, id) {
    let template;

    switch (type) {
        case "crop-edit":
        case "crop-add":
            template = await fetch("http://localhost/templates/crop-modal", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: id ? JSON.stringify({
                    id: id
                }) : {}
            })
                .then(res => res.text())
                .then(data => data);
            break;

    }
    document.body.innerHTML += template;

    const modalInDom = document.querySelector(".modal");
    const dimensions = modalInDom.getBoundingClientRect();

    modalInDom.style.marginTop = (0 - dimensions.height / 2).toString() + 'px';
    modalInDom.style.marginLeft = (0 - dimensions.width / 2).toString() + 'px';

    document.querySelector(modal.elemToFocus).focus();

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