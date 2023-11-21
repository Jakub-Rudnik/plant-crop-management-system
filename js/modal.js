CREATE_CROP_MODAL = `
        <div class="site__header">
            <h1>Dodaj uprawę</h1>
            <button class="site__header__btn" title="Dodaj uprawę" onclick="closeModal()">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                </svg>
            </button>
        </div>
        <form>
            <div class="form-control">
                <label for="cropName">Nazwa uprawy</label>
                <input id="cropName" />
            </div>
            <div class="form-control">
                <label for="field2">Pole 2</label>
                <input id="field2" />
            </div>
            <div class="form-control">
                <label for="field3">Pole3</label>
                <input id="field3" />
            </div>
            <button type="submit" class="btn btn__big btn__primary">Dodaj</button>
        </form>
`;
function createModal() {
    const modalBackground = document.createElement("div");
    modalBackground.classList.add("modal__background")

    const modal = document.createElement("div");
    modal.classList.add("modal__container");

    modal.innerHTML = CREATE_CROP_MODAL;

    modalBackground.appendChild(modal);

    const header = document.querySelector(".main__header");

    document.body.insertBefore(modalBackground, header);
}

function showModal() {
    const modal = document.querySelector(".modal__background");

    if (modal != null) {
        modal.style.display = "flex";
    } else {
        createModal();
    }
}

function closeModal() {
    const modal = document.querySelector(".modal__background");

    modal.style.display = "none";
}