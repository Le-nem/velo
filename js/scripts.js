/*!
    * Start Bootstrap - SB Admin v7.0.5 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2022 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
// 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

function login() {
    document.querySelector('main').innerHTML =`
        <div class="container">
        <form action="../data/controller/LoginController.php" method="POST">
            <label for="login">Login</label>
            <input type="text" name="login">
                <label for="login">Password</label>
                <input type="password" name="password">
                    <button type="submit">Valider</button>
            
        </form><br>
        <a href="javascript:registery()">Création de compte</a>
</div>`
}


function registery(){
        document.querySelector('main').innerHTML =`
        <div class="container">
         <form action="../data/controller/RegisteryController.php" method="POST">
        <label for="login">Nom user</label>
        <input class="form-control" type="text" name="login" required><br>
        <label for="password">Mot de passe</label>
        <input class="form-control" type="password" name="password" required><br>
        <label for="nom">Nom</label>
        <input class="form-control" type="text" name="nom" required>
        <label for="prenom">Prénom</label>
        <input class="form-control"type="text" name="prenom" required><br>
        <label for="mail">Email</label>
        <input class="form-control" type="email" name="mail" required><br>
        <label for="adresse1">Adresse 1</label>
        <input class="form-control" type="text" name="adresse1" required>
        <label for="adresse2">Adresse 2</label>
        <input class="form-control" type="text" name="adresse2">
        <label for="cp">Code postal</label>
        <input class="form-control" type="text" name="cp" required>
        <label for="ville">Ville</label>
        <input class="form-control" type="text"name="ville" required>
        <button class="btn btn-primary" type="submit">Valider</button>
    </form></div> `


}

function stock() {
    fetch('../data/controller/ArticleController.php?action=all')
        .then((response) => {
            return response.json()
        }).then((data) => {
            let table = '';
            for (const element of data) {
                table += `<tr>
                <td>${element.id}</td>
                <td>${element.code}</td>
                <td>${element.description}</td>
                <td>${element.prix}</td>
                <td>${element.stock}</td>
                </tr>`
            }
            document.querySelector('main').innerHTML = `
            <table class='table table-dark table-striped'> 
            <thead>
            <tr>
            <th>id</th>
            <th>code</th>
            <th>description</th>
            <th>prix</th>
            <th>stock</th>
            </tr>
            </thead>
            ${table} 
            </table>`;
        })
}

function carte() {
    fetch('../data/controller/ArticleController.php?action=all')
        .then((response) => {
            return response.json()
        }).then((data) => {
            let card=""
        for (const element of data) {
        card +=`
        <div class="card">
        <div class="card-body">
        <h5 class="card-title">${element.code}</h5>
        <p class="card-text">${element.description} <br> Prix : ${element.prix} </p>
        <a href="../data/controller/ArticleController.php?action=order&id=${element.id}" class="btn btn-primary">Commander</a>
        </div>
        </div>`
        }
        document.querySelector('main').innerHTML = card
    })
}

function profile() {
    fetch('../data/controller/ClientsController.php?action=profile')
        .then((response) => {
        return response.json()
    }).then((data) => {
        document.querySelector('main').innerHTML =`
        <div class="container">
        <h1>Vue du profil </h1>
    <p>Login : ${data.login}</p>
    <p>Nom : ${data.nom}</p>
    <p>Prenom : ${data.prenom}</p>
    <p>Mail : ${data.mail}</p>
    <p>Adresse : ${data.adresse1} ${data.adresse2}</p>
    <p>Code postal : ${data.cp}</p>
    <p>Ville : ${data.ville}</p>
</div>      `
    })
    fetch('../data/controller/ClientsController.php?action=facture')
        .then((response) => {
            return response.json()
        }).then((data) => {
        let facture ="<div class='container'><h1>Facture :</h1>"
        for (const element of data) {
            facture += `
            <h2>Facture du ${element.date}</h2>
            <p>Nom : ${element.nom} ${element.prenom}</p>
            <p>Adresse de livraison : ${element.adresse1} ${element.adresse2} ${element.ville} ${element.cp}</p>
            <p>Date de livraison : ${element.date}</p>
            <p>Article : ${element.description}</p>
            <p>Prix : ${element.prix}</p>
            
            `}

        document.querySelector('main').innerHTML += facture + '</div>'
    })



}


function panier(){
    fetch('../data/controller/ClientsController.php?action=panier')
        .then((response) => {
            return response.json()
        }).then((data) => {
            let panier ='<h1>Panier</h1>'

            panier += `
            <p>${data.code}</p>
            <p>${data.description}</p>
            <p>${data.prix}</p>
            `

        document.querySelector('main').innerHTML = panier + "<a href='../data/controller/ArticleController.php?action=command'> Commander </a>"


    })

}


