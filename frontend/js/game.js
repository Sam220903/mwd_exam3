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

    await fetch("http://localhost/Examen3DWM/frontend/php/intermediary.php", requestOptions)
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
getLottery();