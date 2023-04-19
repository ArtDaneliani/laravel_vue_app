require('./bootstrap');

window.Vue = require('vue').default;

import axios from 'axios'

window.$ = window.jQuery = require('jquery')
import {createApp} from 'vue'
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
$('#image').change(function () {
    let reader = new FileReader();
    reader.onload = (e) => {
        $('#preview_image').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
});
$('#To_Do').on('submit', function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var form = $(this)[0];
    var $form = new FormData(form);
    // var $form = $(this).serialize();
    $.ajax({
        url: '/todo/list',
        type: 'POST',
        data: $form,
        cache: false,
        processData: false,
        contentType: false,
        success: function (data) {
            $('#preview_image').attr('src', '');
            document.querySelector('#To_Do').reset()
            $('#todo_list').append('<tr class="item-todo">' +
                '<td>' + data.user_id + '</td>' +
                '<td>' +
                '<a target="_blank" href="' + data.path + '/storage/images/origin/' + data.image + '">' +
                '<img alt="thumb" class="thumbnail" src="/storage/images/thumbnail/' + data.image + '" style="height: 100%;width: auto;">' +
                '</a>' +
                '</td>' +
                '<td>' + data.title + '</td>' +
                '<td>' + ((data.done == 1) ? 'Готово' : 'Не готово') + '</td>' +
                '<td>' +
                '<form class="form" method="post" action="#">' +
                '<input  type="hidden" name="id" value="' + data.id + '"/>' +
                '<input  type="hidden" name="image" value="' + data.image + '"/>' +
                '<button type="submit" name="update_Todo"  class="editTodo">Изменить</button>&nbsp; ' +
                '<button type="submit" name="delete_Todo"  class="editTodo">Удалить</button>' +
                '</form>' +
                '</td>' +
                '</tr>');
            var src = data.path + '/storage/images/origin/' + data.image;
            return src;
        },
        error: function (e) {
            console.log("error");
        }
    });
});

$(document).on('click touchstart', '.editTodo', function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var $form = $(this).parent('form').serialize();
    var $btn = $(this).attr("name");
    $.ajax({
        url: '/todo/edit',
        type: 'POST',
        data: $form + '&' + $btn,
        success: $(this).closest('.item-todo').remove()
    })
})


