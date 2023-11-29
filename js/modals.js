const addCropModal = {
    title: "Dodaj uprawę",
    elemToFocus: "#cropName",
    template: `
        <form>
            <div class="form-control">
                <label for="cropName" >Nazwa uprawy</label>
                <input id="cropName" type="text" />
            </div>
            <div class="form-control">
                <label for="variant">Odmiana</label>
                <select id="variant">
                    <option>Chyzantemy złociste</option>
                    <option>Bratek Szwajciarki Żółty</option>
                    <option>Bratek Wielokwiatowy Black Knight</option>
                </select>
            </div>
            <div class="form-control">
                <label for="quantity">Wielkość uprawy</label>
                <input id="quantity" type="number" />
            </div>
            <button type="submit" class="btn btn__big btn__primary">Dodaj</button>
        </form>`
};

const editCropModal = {
    title: "Edytuj uprawę",
    elemToFocus: "#cropName",
    template: `
        <form>
            <div class="form-control">
                <label for="cropName" >Nazwa uprawy</label>
                <input id="cropName" type="text" value="Nazwa uprawy"/>
            </div>
            <div class="form-control">
                <label for="variant">Odmiana</label>
                <select id="variant">
                    <option>Chyzantemy złociste</option>
                    <option>Bratek Szwajciarki Żółty</option>
                    <option>Bratek Wielokwiatowy Black Knight</option>
                </select>
            </div>
            <div class="form-control">
                <label for="quantity">Wielkość uprawy</label>
                <input id="quantity" type="number" value="4"/>
            </div>
            <button type="submit" class="btn btn__big btn__primary">Dodaj</button>
        </form>`
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

