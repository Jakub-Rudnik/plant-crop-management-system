const addCropModal = {
    title: "Dodaj uprawę",
    elemToFocus: "#cropName",
};

const editCropModal = {
    title: "Edytuj uprawę",
    elemToFocus: "#cropName",
};

const deleteTask = {
    title: "Usuń zadanie",
    elemToFocus: "#cancel",
    template:`
        <div style="display: flex; align-items: center; justify-content: center; gap: 10px">
            <button id="cancel" onclick="closeModal()" class="btn  btn__big btn__outlined">Anuluj</button>
            <button class="btn btn__big btn__danger">Usuń</button>
        </div>
    `
}

