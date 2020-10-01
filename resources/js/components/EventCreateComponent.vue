<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Создание события</h2></div>
                    <div class="card-body">
                         <h3 style="color: #38c172;">{{message}}</h3>
                        <form v-on:submit.prevent="addNewEvent">	  
                            <input v-model="name" class="form-control" placeholder="Наименование">
                            <span v-if="errors.title" class="error">{{errors.title[0]}}</span></br>
                            <input v-model="date" class="form-control" id="date" type="date" v-bind:min='my_var' >
                            <span v-if="errors.start" class="error">{{errors.start[0]}}</span></br>

                            <select v-model="color" class="form-control">
                                <option  value="" disabled>Выберите цвет</option>
                                <option  value="#80a35e">Зеленый</option>
                                <option  value="#d3d358">Желтый</option>
                                <option  value="#3a87ad">Синий</option>
                                <option  value="#d04040">Красный</option>
                            </select>
                            <span v-if="errors.color" class="error">{{errors.color[0]}}</span></br>
                            <select v-model="rad" class="form-control">
                                <option  value="0" disabled>Повторение</option>
                                <option  value="no">Нет</option>
                                <option  value="daily">Каждый день</option>
                                <option  value="weekly">Каждую неделю</option>
                                <option  value="monthly">Каждый месяц</option>
                                <option  value="yearly">Каждый год</option>
                            </select>
                            <span v-if="errors.repeat" class="error">{{errors.repeat[0]}}</span></br>

                            <button type="submit" style="width: 100%;" class="btn btn-primary btn-block  mt-3">Добавить</button>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import axios from 'axios'

    export default {
        data() {
        return {
            my_var: new Date().toISOString().slice(0,10),
            name: '',
            date: '',
            flag: true,
            rad: "0",
            color: '',
            errors: '',
            message: '',
        }
        },
        
        mounted() {
        },
        methods:{
                    addNewEvent() 
                    {
                        axios.post('/events',{ title: this.name, start: this.date, repeat:this.rad, color:this.color})   
                        .then((res) => {
                            this.message="Событие создано!"
                            this.errors=[]
                            }).catch((err) => {
                                this.message=''
                                this.errors=err.response.data.errors
                            })	    
                 },
        }
    }
</script>
