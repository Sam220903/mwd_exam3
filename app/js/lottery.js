async function getLottery(){
    const myHeaders = new Headers();
    myHeaders.append("Authorization", "12345");
    myHeaders.append("Content-Type", "application/json");

    const requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: JSON.stringify({
            endpoint: 'getLottery',
            method: 'GET',
        }),
        redirect: 'follow'
    };

    await fetch("http://localhost/Examen3DWM/app/php/intermediary.php", requestOptions)
    .then((response) => response.text())
    .then((result) => {
        const data = JSON.parse(result);
        const result1 = data.data;
        console.log(result);
        if (data.status!=200){
            throw new Error(data.message);
        }else{
            document.getElementById('lottery').innerHTML = result1;
        }

    })
    .catch(error => console.log('error', error));
}

let cards = [];
async function getCards(){
    const myHeaders = new Headers();
    myHeaders.append("Authorization", "12345");
    myHeaders.append("Content-Type", "application/json");

    const requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: JSON.stringify({
            endpoint: 'getCards',
            method: 'GET',
        }),
        redirect: 'follow'
    };

    await fetch("http://localhost/Examen3DWM/app/php/intermediary.php", requestOptions)
    .then((response) => response.text())
    .then((result) => {
        const data = JSON.parse(result);
        console.log(result);
        if (data.status!=200){
            throw new Error(data.message);
        } else {
            cards = data.data;
        }
    })  
    .catch(error => console.log('error', error));
}
    
let running = false;
function singLottery(){
    if (cards.length > 0 && !running) {
        running = true;
        let index = 0;
        document.getElementById('current-card').innerHTML = cards[index];
        index++;
        const interval = setInterval(() => {
            if (index < cards.length) {
                console.log(cards[index]);
                document.getElementById('current-card').innerHTML = cards[index];
                index++;
            } else {
                clearInterval(interval);
            }
        }, 5000);
    }
    running = false;
}

let modal_card = document.getElementById('modal-card');
let close_modal = document.getElementById('close-modal');

async function getCardbyID(){
    let id = prompt('Ingrese el id de la carta');

    const myHeaders = new Headers();
    myHeaders.append("Authorization", "12345");
    myHeaders.append("Content-Type", "application/json");

    const requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: JSON.stringify({
            endpoint: 'getCardbyID',
            method: 'GET',
            cardID : id
        }),
        redirect: 'follow'
    };

    await fetch("http://localhost/Examen3DWM/app/php/intermediary.php", requestOptions)
    .then((response) => response.text())
    .then((result) => {
        const data = JSON.parse(result);
        console.log(result);
        if (data.status!=200){
            throw new Error(data.message);
        }else{
            //alert(data.data);
            modal_card.style.display = 'block';
            document.getElementById('found-card').innerHTML = data.data;
        }

    })

}

close_modal.addEventListener('click', () => {
    modal_card.style.display = 'none';
});


let modal_form = document.getElementById('modal-form');
let close_form = document.getElementById('close-form');

close_form.addEventListener('click', () => {
    modal_form.style.display = 'none';
});


window.addEventListener("click",function(event) {
    if (event.target == modal_form || event.target == modal_card) {
        modal_form.style.display = 'none';
        modal_card.style.display = 'none';
    }
});

getLottery();
getCards();

document.getElementById('sing-lottery').addEventListener('click', singLottery);

document.getElementById('search-card').addEventListener('click', (e) => {
    e.preventDefault();
    getCardbyID();
});

document.getElementById('add-card').addEventListener('click', (e) => {
    e.preventDefault();
    modal_form.style.display = 'block';
});


const form = document.getElementById('form-card');
async function addCard(){
    const formData = new FormData(form);
    const myHeaders = new Headers();
    myHeaders.append("Authorization", "12345");
    myHeaders.append("Content-Type", "application/json");

    let base64 = await getBase64(formData.get('img'));

    const requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: JSON.stringify({
            endpoint: 'addCard',
            method: 'POST',
            name: formData.get('name'),
            image: base64
        }),
        redirect: 'follow'
    };

    await fetch("http://localhost/Examen3DWM/app/php/intermediary.php", requestOptions)
    .then((response) => response.text())
    .then((result) => {
        const data = JSON.parse(result);
        console.log(result);
        if (data.status!=200){
            throw new Error(data.message);
        }else{
            alert(data.message);
        }
    })
}


form.addEventListener('submit', (e) => {
    e.preventDefault();
    addCard();
    modal_form.style.display = 'none';
});

function getBase64(file) {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => resolve(reader.result);
        reader.onerror = (error) => reject(error);
    });
}