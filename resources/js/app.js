require('./bootstrap');

import { createApp } from 'vue'
import Welcome from './components/Welcome'
import Home from './components/Home'
import Todo from './components/Todo'

const app = createApp({})

app.component('welcome', Welcome)
app.component('home', Home)
app.component('todo', Todo)

app.mount('#app')




