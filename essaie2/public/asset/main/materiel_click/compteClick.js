// document.addEventListener("DOMContentLoaded", function () {
//     const createLink = document.querySelectorAll("createLink");

//     let clickTimer;

//     createLink.addEventListener("click", function (event) {
//         event.preventDefault(); // Empêche la redirection par défaut

//         // URL pour le clic simple
//         const singleClickUrl = this.dataset.singleClickUrl;

//         // Timer pour différencier clic simple et double clic
//         clickTimer = setTimeout(function () {
//             window.location.href = singleClickUrl; // Redirection clic simple
//         }, 100);
//     });

//     createLink.addEventListener("dblclick", function (event) {
//         event.preventDefault(); // Empêche la redirection par défaut

//         // Annuler le timer du clic simple
//         clearTimeout(clickTimer);

//         // URL pour le double-clic
//         const doubleClickUrl = this.dataset.doubleClickUrl;

//         // Redirection clic double
//         window.location.href = doubleClickUrl;
//     });
// });
document.addEventListener("DOMContentLoaded", function () {
    // Sélectionner tous les éléments avec la classe 'createLink'
    const createLinks = document.querySelectorAll(".createLink");

    createLinks.forEach((link) => {
        let clickTimer;

        // Gérer le clic simple
        link.addEventListener("click", function (event) {
            event.preventDefault(); // Empêche la redirection par défaut

            // URL pour le clic simple
            const singleClickUrl = this.dataset.singleClickUrl;

            // Timer pour différencier clic simple et double clic
            clickTimer = setTimeout(function () {
                window.location.href = singleClickUrl; // Redirection clic simple
            }, 100);
        });

        // Gérer le double-clic
        link.addEventListener("dblclick", function (event) {
            event.preventDefault(); // Empêche la redirection par défaut

            // Annuler le timer du clic simple
            clearTimeout(clickTimer);

            // URL pour le double-clic
            const doubleClickUrl = this.dataset.doubleClickUrl;

            // Redirection clic double
            window.location.href = doubleClickUrl;
        });
    });
});
