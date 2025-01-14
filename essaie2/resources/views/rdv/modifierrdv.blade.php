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
@section('title', 'delete_appointment')
@section('content')


    <div class="container col-md-4 mt-3">
        <h1>Change your appointment? </h1>
        @include('alert')
        <form method="POST" action="{{ route('page_modifierrdv2') }}">
            @csrf
            <div class="form-group mt-4">
                <label for="id">Enter your appointment code please</label>
                <input type="text" class="form-control" id="id" name="id" value="{{old('id')}}"  required>
            </div>
            <div class="form-group mb-3">
                <label for="nom">Enter your name also</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{old('nom')}}"  required>
            </div>
            <div class="form-group mb-3">
                <label for="date">Please change the Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{old('date')}}" onchange="getDisponibilites()"> {{--  --}}
            </div>
            <ul id="rdv">
                <!-- Les horaires disponibles seront affichés ici -->
            </ul>
            <div class="form-group mb-3">
                <label for="heure">Change hour there</label>
                <input type="time" class="form-control" id="heure" name="heure" readonly>

            </div>


            {{-- <input type="hidden" id="selectedHoraire" /> --}}
            <input type="hidden" id="selectedDate"  />
            <button type="submit" class="btn btn-primary mt-4">Send</button>
            <div class="container col-md-4 mt-3 d-flex justify-content-between">

                <a class="text-center" href="{{route('rendezvous.create')}}" >Other appointment</a>
            </div>


        </form>
        {{--@if(Session::has('rendezvousData'))
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Nom du Patient</th>
                    <th>Prénom du Patient</th>
                    <!-- Ajoutez d'autres colonnes si nécessaire -->
                </tr>
            </thead>
            <tbody>
                @foreach(session('rendezvousData') as $rdv)
                    <tr>
                        <td>{{ $rdv->date }}</td>
                        <td>{{ $rdv->heure }}</td>
                        <td>{{ $rdv->nom_patient }}</td>
                        <td>{{ $rdv->prenom }}</td>
                        <!-- Ajoutez d'autres colonnes si nécessaire -->
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>Aucun rendez-vous trouvé.</p>
        @endif--}}

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
            // document.getElementById('selectedHoraire').value = horaire;
            document.getElementById('selectedDate').value = document.getElementById('date').value;
            document.getElementById('heure').value = horaire;
            // Supprime la classe "selected" des autres éléments dans #rdv
            const horaires = document.querySelectorAll('#rdv li');
            horaires.forEach(el => el.classList.remove('selected'));

            // Ajoute la classe "selected" à l'élément cliqué
            li.classList.add('selected');
        }
        // function idee(event) {
        // event.preventDefault();
        // const selectedHoraire = document.getElementById('selectedHoraire').value;
        // document.getElementById('heure').value = selectedHoraire;
        // }

// Ajouter la fonction au champ "heure"
document.getElementById('heure').addEventListener('click', idee);

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


