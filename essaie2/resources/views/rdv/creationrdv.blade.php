@extends('welcome')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<style>
    #rdv {
        list-style: none;
        padding: 0;
        display: flex; /* Utilise Flexbox pour aligner les éléments en ligne */
        flex-wrap: wrap; /* Permet de passer à la ligne si nécessaire */
        gap: 10px; /* Espace entre les éléments */
        justify-content: space-between; /* Équilibre les espaces entre les éléments */
    }

    #rdv li {
        flex: 1 1 calc(33.33% - 10px);
        margin: 5px 0;s
        padding: 10px;
        background-color: #6ddef4;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
        box-sizing: border-box;
    }

    #rdv li:hover {
        background-color: #d1d1d1;
    }

    #rdv li.selected {
        background-color: #4caf50;
        color: white;
    }
</style>
@section('title', 'create_appointment')
@section('content')

    <div class="container col-md-4 mt-3">
        <h1>Appointment schedulling</h1>
        @include('alert')
        <div class="form-group mt-4">
            <div class= " alert alert-success text-center d-none" id="message" style="margin-top: 20px;"></div>
        </div>
        <div class="form-group mt-4">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{old('date')}}" onchange="getDisponibilites()" >
        </div>
        <h4>Available time :</h4>
        <ul id="rdv">
            <!-- Les horaires disponibles seront affichés ici -->
        </ul>
        {{-- <form method="POST" action="{{ route('rendezvous.store') }}"> --}}
        <form id="reservationForm" onsubmit="reserver(event)">
            {{-- @csrf --}}

            <input type="hidden" id="selectedHoraire" name="horaire" />
            <input type="hidden" id="selectedDate" name="date" />
            {{-- <div class="form-group">
                <label for="heure">Hour</label>
                <input type="time" class="form-control" id="heure" name="heure" value="{{old('heure')}}" required>
            </div> --}}

            <div class="form-group">
                <label for="nom">Name</label>
                <input type="text" class="form-control" id="nom_patient" name="nom_patient" value="{{old('nom_patient')}}"  required>
            </div>
            <div class="form-group">
                <label for="prenom">First name</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="{{old('prenom')}}"  required>
            </div>


            {{-- <button type="submit" class="btn btn-primary mt-4">Register</button> --}}
            <button type="submit" class="btn btn-primary mt-4" id="reserverButton" disabled>Reserve</button>

        </form>


    </div>
        <div class="container col-md-4 mt-3 d-flex justify-content-between">
            <a href="{{route('page_modifierrdv')}}">Change your appointment</a>
            <a class="text-end" href="{{route('page_suppressionrdv')}}" >delete your appointment</a>
        </div>
<br><br><br>

        <script>
            // Obtenir les horaires disponibles
            function getDisponibilites() {
                const date = document.getElementById('date').value;
                if (!date) return;

                axios.get('/api/disponibilites', { params: { date } })
                    .then(response => {
                        const horaires = response.data;

                        // Sélectionne la liste par son ID spécifique
                        const horairesList = document.getElementById('rdv');
                        horairesList.innerHTML = ''; // Efface les anciens horaires

                        if (horaires.length === 0) {
                            horairesList.innerHTML = '<li>Aucun horaire disponible</li>';
                            return;
                        }

                        // Ajouter dynamiquement les horaires
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

                // Supprime la classe "selected" des autres éléments dans #rdv
                const horaires = document.querySelectorAll('#rdv li');
                horaires.forEach(el => el.classList.remove('selected'));

                // Ajoute la classe "selected" à l'élément cliqué
                li.classList.add('selected');
            }

            // Réserver un rendez-vous
            function reserver(event) {
                event.preventDefault();

                const date = document.getElementById('selectedDate').value;
                const horaire = document.getElementById('selectedHoraire').value;
                const nom = document.getElementById('nom_patient').value;
                const prenom = document.getElementById('prenom').value;

                axios.post('/api/rendezvous', {
                    date,
                    heure: horaire,
                    nom_patient: nom,
                    prenom
                }).then(response => {
                    document.getElementById('message').textContent = response.data.message;
                    document.getElementById('message').style.color = 'green';
                    updateMessage(document.getElementById('message').textContent)
                    getDisponibilites(); // Rafraîchit les horaires disponibles
                    document.getElementById('reserverButton').disabled = true;
                }).catch(error => {
                    document.getElementById('message').textContent = error.response.data.message;
                    document.getElementById('message').style.color = 'red';
                });
            }
            function updateMessage(content) {
           const messageDiv = document.getElementById('message');

    if (content) {
        // Ajoute le contenu et rend visible
        messageDiv.textContent = content;
        messageDiv.classList.remove('d-none');
        } else {
        // Cache la div si aucun texte
        messageDiv.textContent = '';
        messageDiv.classList.add('d-none');
        }
    }

        </script>





@endsection
