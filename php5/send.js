/*

    <form data-form>
        <input type="text" name="animal" placeholder="animal">
        <button type="button">Send</button>
    </form>

    #url http://localhost/bit_projects/php5/info-json.php

*/

document.querySelector('[data-form] button').addEventListener('click', _ => {
    const jsonData = {}; // sukuria tuscia objekta
    const animal = document.querySelector('[data-form] [name="animal"]'); //paima laukelio reiksme
    jsonData.animal = animal.value; // iraso i objekta
 
    fetch('http://localhost/bit_projects/php5/info-json.php/', { 
        method: 'POST',
        headers: {
            'Content-Type': 'application/json' // nurodo kad siunciama JSON
        },
        body: JSON.stringify(jsonData) // pavercia objekta i JSON eilute
    })
    .then(response => response.json()) // konvertuoja serverio atsakyma i JS objekta
    .then(data => {
        console.log(data);
        const div = document.createElement('div');
        div.innerText = data.animal;
        document.querySelector('[data-form]').appendChild(div);
    })
    .catch(error => {
        console.error('Error:', error);
    });
});