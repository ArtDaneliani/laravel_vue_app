require('./bootstrap');

import { createApp } from 'vue'
import Welcome from './components/Welcome'
import Home from './components/Home'

const app = createApp({})

app.component('welcome', Welcome)
app.component('home', Home)

app.mount('#app')
