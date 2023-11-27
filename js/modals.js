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
