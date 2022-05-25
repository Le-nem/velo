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

