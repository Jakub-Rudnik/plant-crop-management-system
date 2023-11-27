const addCropModal = {
    title: "Dodaj uprawę",
    elemToFocus: "#cropName",
    template: `
        <form>
            <div class="form-control">
                <label for="cropName" >Nazwa uprawy</label>
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
        </form>`
};
