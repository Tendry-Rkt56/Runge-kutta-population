<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Runge-Kutta</title>
     <link rel="stylesheet" href="styles/bootstrap.min.css">
     <link rel="stylesheet" href="styles/index.css">
</head>
<body>
     
     <div class="container containers">
          <form action="runge.php" method="POST" class="forms container d-flex align-items-center justify-content-center flex-column gap-2">
               <h2 class="my-5">Simulation de croissance</h2>
               <div class="container d-flex align-items-center justify-content-center flex-row">
                    <label style="width:40%" class="fw-bolder" for="nombre">Nombre de population: </label>
                    <input style="width:60%" required type="number" id="nombre" name="nombre" class="form-control" placeholder="Nombre de population...">
               </div>
               <div class="container d-flex align-items-center justify-content-center flex-row">
                    <label style="width:40%" class="fw-bolder" for="taux">Taux de reproduction: </label>
                    <input style="width:60%" required type="number" id="taux" step="0.01" name="taux" class="form-control" placeholder="Taux de reproduction...">
               </div>
               <div class="container d-flex align-items-center justify-content-center flex-row">
                    <label style="width:40%" class="fw-bolder" for="charge">Capacité de charge: </label>
                    <input style="width:60%" required type="number" id="charge" name="charge" class="form-control" placeholder="Capacité de charge...">
               </div>
               <div class="container d-flex align-items-center justify-content-center flex-row">
                    <label style="width:40%" class="fw-bolder" for="temps">Pas de temps (année): </label>
                    <input style="width:60%" required type="number" id="temps" name="temps" value="1" class="form-control" placeholder="Pas de temps...">
               </div>
               <div class="container d-flex align-items-center justify-content-center flex-row">
                    <label style="width:40%" class="fw-bolder" for="duree">Durée de l'analyse: </label>
                    <input style="width:60%" required type="number" id="duree" name="duree" class="form-control" placeholder="Durée...">
               </div>
               <input type="submit" value="Envoyer" class="btn btn-sm btn-primary">
          </form>
     </div>

</body>
</html>