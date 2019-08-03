window.$ = window.jQuery = require('jquery')
window.Vue = require('vue');
require('bootstrap');



$(document).ready(function() {

    $(".btn-danger").hover(function() {
        $(this).toggleClass("btn-dark"
            //"background-color": "yellow",
            //"color": "black"
        );
        //$(this).mouseleave(function() {
        //    $(this).toggleClass("main");
        //})
    })
});


var firstTable = new Vue({
    el: '#firstTable',
    data() {
        return {
            rows: [],

        }
    },
    methods: {
        getAllUsers() {
            var self = this; // Armazena a instância do Vue em self

            fetch("http://127.0.0.1:11000/api.php")
                .then(response => response.json()).then(data => self.rows = data);
            //.then(console.log(rows));
            // Faz referência a data.users
            //})

        },
        myFunction(index) {
            let id = index
            var r = confirm("Are you sure you want to delete this record?");
            if (r == true) {
                window.location.assign("delete.php?id=" + id);
            }
        }
    },
    mounted() {
        this.getAllUsers()
    }
});

var app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue!'
    }

});

window.onload = function() {
    $('#app').show(1000);
    $('#jumbo').fadeIn(1500);
    $('.btn').slideDown(500);
}

// Definindo novo componente chamado button-counter
Vue.component('button-counter', {
    data: function() {
        return {
            count: 0
        }
    },
    template: '<button v-on:click="count++">Você clicou em mim {{ count }} vezes.</button>'
})

new Vue({ el: '#button-counter' })

// Definindo novo componente chamado button-counter
Vue.component('my-header', {
    data: function() {

    },
    template: `
    <div id="templat">
    <nav style="background-color: #E9ECEF;" class="navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(Página atual)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
        </ul>
    </div>
</nav>
</div>
    `
})
new Vue({ el: '#myheader' })