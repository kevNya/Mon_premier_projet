@extends('welcome')

@section('title', 'Home')
@section('content')
    <!-- Grand bloc pour le carrousel -->
    <div class="carousel1">
        <div class="carousel-container">
            <div class="carousel-slide">
                <img src="{{ asset('photo/Lab6.png') }}" alt="Laboratoire 1">
                <img src="{{ asset('photo/Lab5.png') }}" alt="Laboratoire 2">
                <img src="{{ asset('photo/Lab7.png') }}" alt="Laboratoire 3">
            </div>
        </div>
    </div>

    <!-- Bloc principal avec tableau à gauche et texte à droite -->
    <div class="main-section1">
        <!-- Tableau à gauche -->
        <div class="table-section1">
            <div class="gray-block">
                <a class="bl" href="#his">Historique</a>
            </div>

            <div class="gray-block">
                <a class="bl" href="#lesa">Les analyses</a>
            </div>

            <div class="gray-block">
                <a class="bl" href="#lesr">Les résultats</a>
            </div>

            <div class="gray-block">
                <a class="bl" href="#his">Historique</a>
            </div>
            <div class="gray-block">
                <a class="bl" href="#his">Historique</a>
            </div>
            <div class="gray-block">
                <a class="bl" href="#his">Historique</a>
            </div>
        </div>

        <!-- Texte à droite -->
        <div class="text-section1">
            <h2 class="blue bod" id="his">Historique</h2>
            <p class="bod">
                Bienvenue chez LabX-Zed, votre laboratoire d'analyse médicale de référence.
                Depuis plusieurs années, LabX-Zed s'engage à offrir des analyses médicales précises et fiables, grâce à des équipements de pointe et une équipe de professionnels hautement qualifiés. Que ce soit pour des bilans sanguins, des tests spécialisés ou des examens de routine, nous plaçons votre santé au cœur de nos priorités.
                Situé au cœur de la ville, notre laboratoire vous accueille dans un cadre moderne, confortable et respectueux des normes sanitaires les plus strictes. Nous mettons un point d'honneur à garantir des résultats rapides, sécurisés et accessibles via notre plateforme en ligne. Chez LabX-Zed, votre bien-être est notre mission. Confiez-nous vos analyses et bénéficiez d'une prise en charge personnalisée, à la hauteur de vos attentes. </p>
        </div>
    </div>

    <!-- Bloc suivant avec texte à gauche et image à droite -->
    <div class="content-section1">
        <div class="text-left1">
            <h2 class="blue bod" id="lesa">Les analyses</h2>
            <p class= "bod">
                Les résultats complets sont systématiquement transmis au patient par voie électronique via le Réseau Santé Wallon (RSW) dans un délai de maximum 24h après validation médicale et/ou inscription du patient sur le RSW.
                Les résultats ne sont jamais transmis par téléphone mais vous pouvez en recevoir une copie imprimée en vous présentant dans l’un de nos 4 laboratoires muni de votre carte d’identité.
                Les résultats partiels et complets sont systématiquement et directement transmis par voie électronique à votre prescripteur qui peut aussi les recevoir en version imprimée s’il en a fait la demande spécifique via l’adresse paperless@chc.be.</p>
        </div>
        <div class="image-right1">
            <img src="{{ asset('photo/echantillon.png') }}" alt="Image placeholder">
        </div>
    </div>
    <div class="content-section1">
        <div class="text-left1">
            <h2 class="blue bod" id="lesr">Les résultats</h2>
            <p class= "bod">
                Les résultats complets sont systématiquement transmis au patient par voie électronique via le Réseau Santé Wallon (RSW) dans un délai de maximum 24h après validation médicale et/ou inscription du patient sur le RSW.
                Les résultats ne sont jamais transmis par téléphone mais vous pouvez en recevoir une copie imprimée en vous présentant dans l’un de nos 4 laboratoires muni de votre carte d’identité.
                Les résultats partiels et complets sont systématiquement et directement transmis par voie électronique à votre prescripteur qui peut aussi les recevoir en version imprimée s’il en a fait la demande spécifique via l’adresse paperless@chc.be.</p>
        </div>
        <div class="image-right1">
            <img src="{{ asset('photo/Lab8.png') }}" alt="Image placeholder">
        </div>
    </div>

    <!-- Bloc texte centré -->
    <div class="centered-text1">
        <p class = "bod">Souhaitez-vous prendre un rendez-vous? Cliquez <a href="{{route('rendezvous.create')}}">ici</a></p>
    </div>
    <br><br>
@endsection
