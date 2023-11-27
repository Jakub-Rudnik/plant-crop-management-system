function createModal(modal) {
    const modalContentHtml = `
    <div class="modal__header">
        <h3 class="modal__title">${modal.title}</h3>
        <button class="btn btn__icon" title="Zamknij okno" onclick="closeModal()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="var(--text-800)" viewBox="0 0 24 24" stroke-width="1.5" stroke="var(--text-800)" width="24" height="24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
         </button>
    </div>
    <div class="modal__body">
        ${modal.template}
    </div>
    `;

    const modalBackground = document.createElement('div');
    modalBackground.classList.add('modal__background');

    const modalContainer = document.createElement("div");
    modalContainer.classList.add("modal");
    modalContainer.innerHTML = modalContentHtml;

    const header = document.querySelector(".main__header");

    document.body.insertBefore(modalBackground, header);
    document.body.insertBefore(modalContainer, header);

    const modalInDom = document.querySelector(".modal");
    const dimensions = modalInDom.getBoundingClientRect();

    modalInDom.style.marginTop = (0 - dimensions.height / 2).toString() + 'px';
    modalInDom.style.marginLeft = (0 - dimensions.width / 2).toString() + 'px';

    document.querySelector(modal.elemToFocus).focus();


    document.querySelector(".modal__background").addEventListener('mousedown', (e) => closeModal());
}

function closeModal() {
    const modalBackground = document.querySelector(".modal__background");
    const modal = document.querySelector(".modal");

    if (modalBackground != null && modal != null) {
        document.body.removeChild(modal);
        document.body.removeChild(modalBackground);
    }


    document.querySelector(".modal__background").style.pointerEvents = 'auto';
}

document.addEventListener('keydown', (e) => {
    const modal = document.querySelector(".modal__background");
    if (modal != null && e.key === "Escape") closeModal();
});



const modal = document.querySelector(".modal__background");

