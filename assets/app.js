/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';

// import js library
import * as bootstrap from 'bootstrap';
const axios = require('axios').default;

//  ---------- CODE JS ----------

//Permet de cliquer sur entrer dans la modal de connection
let el = document.getElementById("password_login");
el.addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
        document.getElementById("submit_login").click();
    }
});

// submit login
let elSubmitLogin = document.getElementById('submit_login');
elSubmitLogin.addEventListener("click", function() {

    let urlSubmit = document.getElementById('dropdown_login').dataset.url;
    axios.get(urlSubmit, {
            params: {
                password: document.getElementById('password_login').value
            }
        })
        .then(function (response) {
            if(response.data['loginStatus'] === 'success'){
                callToast('primary', 'Information', 'You are connected');
                document.getElementById('password_login').value = '';
                document.getElementById('profil_name').innerHTML = 'Admin';
                document.getElementById('icon_admin').classList.remove('d-none');
                document.getElementById('icon_guest').classList.add('d-none');
                document.getElementById('dropdown_login').classList.add('d-none');
                document.getElementById('dropdown_logout').classList.remove('d-none');
            } else {
                callToast('danger', 'Error', 'Your password is incorrect');
                document.getElementById('password_login').value = '';
            }
        })
        .catch(function (error) {
            callToast('danger', 'Error', 'Your password is incorrect');
        })
});

// submit logout
let elSubmitLogout = document.getElementById('submit_logout');
elSubmitLogout.addEventListener("click", function() {

    let urlSubmit = document.getElementById('dropdown_logout').dataset.url;
    axios.get(urlSubmit)
        .then(function (response) {
            callToast('primary', 'Information', 'You are disconnected');
            document.getElementById('profil_name').innerHTML = 'Guest';
            document.getElementById('icon_admin').classList.add('d-none');
            document.getElementById('icon_guest').classList.remove('d-none');
            document.getElementById('dropdown_login').classList.remove('d-none');
            document.getElementById('dropdown_logout').classList.add('d-none');
        })
        .catch(function (error) {
            callToast('danger', 'Error', 'An error occurred while logging out');
        })
});

function callToast(type, title, text){

    document.getElementById('toast_icon').removeAttribute('class');
    document.getElementById('toast_icon').className = 'bi bi-square-fill me-2 text-' + type;
    document.getElementById('toast_title').innerHTML = title;
    document.getElementById('toast_description').innerHTML = text;

    let elToastHtml = document.getElementById('liveToast');
    let elToast = new bootstrap.Toast(elToastHtml);
    elToast.show();
}