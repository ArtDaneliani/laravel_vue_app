require('./bootstrap');

window.Vue = require('vue').default;

import axios from 'axios'

import { createApp } from 'vue'
import Welcome from './components/Welcome'
import Home from './components/Home'
import Todo from './components/Todo'

const app = createApp({})

app.component('welcome', Welcome)
app.component('home', Home)
app.component('todo', Todo)

app.mount('#app')



// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app1 = new Vue({
//     el: '#app1',
// });


 /*   $('#To_Do').on('submit', function(e) {
        e.preventDefault();
        var $form = $(this).serialize();
        //var $btn = $(this).attr("name");

        $.ajax({
            url: '/todo/ToDo',
            type: 'POST',
            data: $form,
            cache:false,
            success: function( response ) {
                console.log('kuku');
            }
        });
    })
*/
