 // Fonction de croissance de la population
function populationGrowth(P, r, K) {
    return r * P * (1 - P / K);
}

// Algorithme de Runge-Kutta
function rungeKutta(P0, r, K, h, t_max) {
     let t = 0
     let P = P0
     let results = []
     while (t < t_max) {
        let k1 = populationGrowth(P, r, K)
        let k2 = populationGrowth(P + h / 2 * k1, r, K)
        let k3 = populationGrowth(P + h / 2 * k2, r, K)
        let k4 = populationGrowth(P + h * k3, r, K)
        P = P + h / 6 * (k1 + 2 * k2 + 2 * k3 + k4)

        // Enregistrer l'année et la population
        results.push({ year: t, population: P })
        t += h
     }
     return results
}


 document.getElementById('population-form').addEventListener('submit', function (event) {
     event.preventDefault()

     // Récupérer les valeurs du formulaire
     let P0 = parseFloat(document.getElementById('P0').value)
     let r = parseFloat(document.getElementById('r').value)
     let K = parseFloat(document.getElementById('K').value)
     let temps = parseFloat(document.getElementById('temps').value)
     let years = parseInt(document.getElementById('years').value)

     if (checkInput(P0) && checkInput(r) && checkInput(K) && checkInput(temps) && checkInput(years)) {
          let results = rungeKutta(P0, r, K, temps, years)
          document.querySelector('.results-container').style.display = "block"

     let resultsTableBody = document.querySelector('#results-table tbody')
     resultsTableBody.innerHTML = ''

     results.forEach(result => {
         let row = document.createElement('tr')
         let yearCell = document.createElement('td')
         let populationCell = document.createElement('td')

         yearCell.textContent = `${result.year}`
         populationCell.textContent = result.population.toFixed(2)
         populationCell.setAttribute('class', 'fw-bolder')

         row.appendChild(yearCell)
         row.appendChild(populationCell)
         resultsTableBody.appendChild(row)
     });
     }
     else {
          alert("Veillez entrer une valeur positif")
     }
 });

function checkInput (cible) {
     if (cible < 0) return false
     return true
}
