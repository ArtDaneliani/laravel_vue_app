import {value} from "lodash/seq";

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

$(".tags").select2({
    placeholder: 'Теги',
    tags: true,
    tokenSeparators: [',', ' ']
})

$('#To_Do').on('submit', function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var tags = $(".tags").val()
    var form = $(this)[0];
    var $form = new FormData(form);
    $form.append('tags', tags);
    $.ajax({
        url: '/todo/list',
        type: 'POST',
        data: $form,
        cache: false,
        processData: false,
        contentType: false,
        success: function (data) {
            //console.log(data)
            var tags = data.tags.split(',');
            $('#preview_image').attr('src', '');
            document.querySelector('#To_Do').reset()

            $('#todo_list').append('<tr class="item-todo">' +
                '<td>' + data.user_id + '</td>' +
                '<td>' +
                ((data.image != 'no image') ? '<a target="_blank" href="' + data.path + '/storage/images/origin/' + data.image + '">' +
                    '<img alt="thumb" class="thumbnail" src="/storage/images/thumbnail/' + data.image + '" style="height: 100%;width: auto;">' +
                    '</a>' : '') +
                '</td>' +
                '<td>' + data.title + '</td>' +
                '<td><div class="tags_wrapper">' +
                $.each(tags, function (i, val) {
                    '<span class="show_tags">' + val +'</span>'
                }) +
                '</div></td>' +
                '<td>' + ((data.done == 1) ? 'Готово' : 'Не готово') + '</td>' +
                '<td>' +
                '<form class="form" method="post" action="#">' +
                '<input  type="hidden" name="id" value="' + data.id + '"/>' +
                '<input  type="hidden" name="image" value="' + data.image + '"/>' +
                '<p><a  href="todo/' + data.id +  '/edit" class="btn btn-success">Изменить</a></p>' +
                '<button type="submit" name="delete_Todo"  class="btn btn-danger editTodo">Удалить</button>' +
                '</form>' +
                '</td>' +
                '</tr>');
            // $.each(tags, function (i, val) {
            //     $('.tags_wrapper').addClass('dyn');
            //     $('.dyn').append('<span class="show_tags">' + val +'</span>');
            //     $('.tags_wrapper').removeClass('dyn');
            // })
            var src = data.path + '/storage/images/origin/' + data.image;
            return src;
        },
        error: function (e) {
            console.log("error");
        }
    });
});

$('#ToDo_update').on('submit', function () {
    // e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var tags = $(".tags").val()
    var form = $(this)[0];
    var $form = new FormData(form);
    var $btn = $('#updBtn').attr("name");
    $form.append('tags', tags)
    $form.append($btn, $btn)
    $.ajax({
        url: '/todo/update',
        type: 'POST',
        data: $form,
        cache: false,
        processData: false,
        contentType: false,
        success: function (data) {
            // console.log(data)
        },
        error: function () {
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
        url: '/todo/delete',
        type: 'POST',
        data: $form + '&' + $btn,
        success: $(this).closest('.item-todo').remove()
    })
})


