<template>
<!--        <form id="ToDo" class="todo-add" action="#" method="post"  @submit="send">-->
<!--            <input type="hidden" name="_token" :value="csrf">-->
<!--            <textarea name="title" v-model="title" rows="3" class="form-control" placeholder="Введите название и описание задания"></textarea><br>-->
<!--            <select v-model="done" name="done" class="form-control">-->
<!--                <option value="" selected>Статус</option>-->
<!--                <option value="1">Готово</option>-->
<!--                <option value="2">Не готово</option>-->
<!--            </select><br>-->
<!--            <input v-model="image" class="form-control" name="image" type="text" placeholder="Изображение"/><br>-->
<!--            <button  name="add_task" class="btn btn-success">Добавить задание</button>-->
<!--        </form>-->
<!--        <pre>{{info}}</pre>-->
</template>

<script>

export default {
    name: "Todo",
 /*   data() {
        return {
            user_id: '',
            title: '',
            done: '',
            image: '',
            csrf: document.head.querySelector('meta[name="csrf-token"]').content,
        }
    },
    methods:{
        send(e) {
            e.preventDefault()
            axios
                .post('/api/todo/ToDo')
                .then(response => (
                    this.$router.push({name: 'home'})
                    // console.log(response.data)
                ))
                .catch(error => console.log(error))
                .finally(() => this.loading = false)
        },
    }  */
    // methods: {
    //     send (e) {
    //         e.preventDefault();
    //         this.todo = {
    //             //body: {
    //                 title: this.title,
    //                 done: this.done,
    //                 image: this.image
    //            // }
    //         },
    //             console.log(this.todo)
    //     }
    // }
}
</script>

<style scoped>

</style>
