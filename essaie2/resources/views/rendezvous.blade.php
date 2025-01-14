<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prise de rendez-vous</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin: 5px 0;
            padding: 10px;
            background-color: #370808;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }

        li:hover {
            background-color: #d1d1d1;
        }

        .selected {
            background-color: #4caf50;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Prise de rendez-vous</h1>

        <!-- Sélection de la date -->
        <label for="date">Choisissez une date :</label>
        <input type="date" id="date" name="date" onchange="getDisponibilites()" />
        <br><br>

        <!-- Liste des horaires disponibles -->
        <h2>Horaires disponibles :</h2>
        <ul id="horaires">
            <!-- Les horaires disponibles seront affichés ici -->
        </ul>

        <!-- Formulaire de réservation -->
        <h2>Formulaire de réservation</h2>
        <form id="reservationForm" onsubmit="reserver(event)">
            <input type="hidden" id="selectedHoraire" name="horaire" />
            <input type="hidden" id="selectedDate" name="date" />

            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom_patient" required />
            <br><br>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required />
            <br><br>

            <button type="submit" id="reserverButton" disabled>Réserver</button>
        </form>

        <div id="message" style="margin-top: 20px;"></div>
    </div>

    <script>
        // Obtenir les horaires disponibles
        function getDisponibilites() {
            const date = document.getElementById('date').value;
            if (!date) return;

            axios.get('/api/disponibilites', { params: { date } })
                .then(response => {
                    const horaires = response.data;
                    const horairesList = document.getElementById('horaires');
                    horairesList.innerHTML = ''; // Efface les anciens horaires

                    if (horaires.length === 0) {
                        horairesList.innerHTML = '<li>Aucun horaire disponible</li>';
                        return;
                    }

                    horaires.forEach(horaire => {
                        const li = document.createElement('li');
                        li.textContent = horaire;
                        li.onclick = () => selectHoraire(horaire, li);
                        horairesList.appendChild(li);
                    });
                })
                .catch(error => {
                    console.error('Erreur lors de la récupération des disponibilités :', error);
                });
        }

        // Sélectionner un horaire
        function selectHoraire(horaire, li) {
            document.getElementById('selectedHoraire').value = horaire;
            document.getElementById('selectedDate').value = document.getElementById('date').value;
            document.getElementById('reserverButton').disabled = false;

            // Met en surbrillance l'horaire sélectionné
            const horaires = document.getElementById('horaires').getElementsByTagName('li');
            Array.from(horaires).forEach(el => el.classList.remove('selected'));
            li.classList.add('selected');
        }

        // Réserver un rendez-vous
        function reserver(event) {
            event.preventDefault();

            const date = document.getElementById('selectedDate').value;
            const horaire = document.getElementById('selectedHoraire').value;
            const nom = document.getElementById('nom').value;
            const prenom = document.getElementById('prenom').value;

            axios.post('/api/rendezvous', {
                date,
                heure: horaire,
                nom_patient: nom,
                prenom
            }).then(response => {
                document.getElementById('message').textContent = response.data.message;
                document.getElementById('message').style.color = 'green';
                getDisponibilites(); // Rafraîchit les horaires disponibles
                document.getElementById('reserverButton').disabled = true;
            }).catch(error => {
                document.getElementById('message').textContent = error.response.data.message;
                document.getElementById('message').style.color = 'red';
            });
        }
    </script>
</body>
</html>
