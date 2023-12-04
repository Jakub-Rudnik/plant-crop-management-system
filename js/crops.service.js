await fetchCrops();

async function fetchCropsFile() {
    // $.ajax({
    //     url: "api/uprawy",
    //     dataType: 'json',
    //     success: function (data) {
    //         console.log(data)
    //         // localStorage.setItem('crops', JSON.stringify(data))
    //     }
    // }).done(data => localStorage.setItem('crops', JSON.stringify(data)))
    const res = await fetch('http://localhost/api/uprawy');
    const data = await res.json();
    localStorage.setItem('crops', JSON.stringify(data));
}
async function fetchCrops() {
    let data = localStorage.getItem('crops');

    if (data != null && data != '') {
        data = JSON.parse(data);
    } else {
        await fetchCropsFile();
        data = JSON.parse(localStorage.getItem('crops'));
    }

    let dataHtml = "";

    console.log(data)

    data.forEach(crop => {
        dataHtml += `
            <div class="card">
                <h3 class="card__title">
                    ${crop.name}
                </h3>
                <div class="card__body">
                    <h5>Aktulane parametry:</h5>
                    <p class="parameters">Wielkość uprawy: ${crop.quantity}</p>
                    <p class="parameters">Wiglotność podłoża: ${crop.humidity}%</p>
                </div>
                <div class="card__footer">
                    <a class="btn btn__primary" href="/uprawa/${crop.id}">Przejdź</a>
                    <a class="btn btn__accent" onclick="createModal(editCropModal, 'crop-edit', ${crop.id})">Edytuj</a>
                </div>
            </div>
        `;
    })

    const crops_wrapper = document.querySelector('.card__wrapper');
    crops_wrapper.innerHTML = dataHtml;
}

function editCrop(id, e) {
   let data = JSON.parse(localStorage.getItem('crops'));

   const crop = data[id];

   document.querySelector('#cropName').value = crop.name;

}