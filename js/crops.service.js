
async function fetchCropsFile() {
    // $.ajax({
    //     url: "templates/uprawy",
    //     dataType: 'json',
    //     success: function (data) {
    //         console.log(data)
    //         // localStorage.setItem('crops', JSON.stringify(data))
    //     }
    // }).done(data => localStorage.setItem('crops', JSON.stringify(data)))
    const res = await fetch('../mockup-data/crops.json');
    const data = await res.json();
    localStorage.setItem('crops', JSON.stringify(data));
}
async function fetchCrops() {
    let data = localStorage.getItem('crops');

    if (data != null && data !== '') {
        data = JSON.parse(data);
    } else {
        await fetchCropsFile();
        data = JSON.parse(localStorage.getItem('crops'));
    }

    let dataHtml = "";

    data.forEach(crop => {
        dataHtml += `
            
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