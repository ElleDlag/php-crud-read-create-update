<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.1.0/handlebars.min.js" charset="utf-8"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <script src="script.js"></script>
    <title>CONFIGURAZIONI</title>
</head>
<body>
    <div class="container">
        <h1 class="title text-center mt-3">ELENCO STANZE</h1>
        <div class="result">
        </div>
        <div class="formPushData">
            <form action="03_setTBConfigurazioni.php" method="POST" id=formPushData class="d-flex flex-wrap">
                <div class="col-6 parameters">
                    <label for="tipo">Letto</label>
                    <select name="title" id="tipo">
                        <option value="select" selected>select</option>
                        <option value="Letto Matrimoniale" >Letto Matrimoniale</option>
                        <option value="Letto Singolo">Letto Singolo</option>
                        <option value="Letto 1pz e mezza">Letto 1pz e mezza</option>
                        <option value="Letto Matrimoniale + singolo">Letto Matrimoniale + singolo</option>
                        <option value="Letto Matrimoniale + letto castello 2 posti">Letto Matrimoniale + letto castello 2 posti</option>
                        <option value="Altre opzioni">Altre opzioni</option>
                    </select>
                </div>
                
                <div class="col-6 parameters">
                    <label for="descrizione">Descrizione</label>
                    <input type="text" name="description" id="descrizione" value="description" autocomplete='off'>
                </div>

                <div class="submitRow">
                    <input id="submitRow" type="submit" value="INSERISCI">
                </div>
            </form>
        </div>
        
        
    </div>
    
    <!-- template for handlebar -->
    <script id="box-template" type="text/x-handlebars-template">
        <div class="rowResult d-flex flex-nowrap">
        <div class="idResult col-1 d-flex flex-column justify-content-center align-items-center">
            <div class='idnumber mb-3'>ID: {{id}}</div> 
            <div class="icon-delete">
                <button type="submit" class='del-id' data-id='{{id}}' value='{{id}}'>
                <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </div>
        <div class="details flex-grow-1">
            <div>
                <button type="submit" class='upd-id' data-id='{{id}}'>
                    <i class="fas fa-pencil-alt"></i>
                </button>
                <b>Tipo letto: </b>{{title}}</div> 
            <div>
                <button type="submit" class='upd-id' data-id='{{id}}'>
                    <i class="fas fa-pencil-alt"></i>
                </button>
                <b>Descrizione: </b>{{description}}</div> 
            <div>
                <button type="submit" class='upd-id hidethis' data-id='{{id}}'>
                    <i class="fas fa-pencil-alt"></i>
                </button>
                <b>Creato il: </b>{{creatoil}}</div> 
            <div>
                <button type="submit" class='upd-id' data-id='{{id}}'>
                    <i class="fas fa-pencil-alt"></i>
                </button>
                <b>Aggiornato il: </b>{{updateil}}</div> 
        </div>
        </div>
    </script>
</body>
</html>