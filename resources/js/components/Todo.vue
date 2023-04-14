<template>
<!--    <div id="ToDoapp">-->
        <form  class="todo-add" action="#" method="post" @submit="send">
            <textarea name="title" v-model="title" rows="3" class="form-control" placeholder="Введите название и описание задания"></textarea><br>
            <select v-model="done" name="done" class="form-control">
                <option value="" selected>Статус</option>
                <option value="1">Готово</option>
                <option value="2">Не готово</option>
            </select><br>
            <input v-model="image" class="form-control" name="image" type="text" placeholder="Изображение"/><br>
            <button  name="add_task" class="btn btn-success">Добавить задание</button>
        </form>
        <pre>{{info}}</pre>
<!--    </div>-->
</template>

<script>
export default {
    name: "Todo",
    data() {
        return {
            title: '',
            done: '',
            image: '',
        }
    },
    methods: {
        send (e) {
            e.preventDefault();
            this.todo = {
                //body: {
                    title: this.title,
                    done: this.done,
                    image: this.image
               // }
            },
                console.log(this.todo)
        }
    }
}
</script>

<style scoped>

</style>
