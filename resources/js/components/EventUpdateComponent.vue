<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><div class="ed"><h2>Редактирование события</h2></div><div class="del"><b v-on:click="delet()">Удалить</b></div></div>
                    <div class="card-body">
                        <h3 style="color: #38c172;">{{message}}</h3>
                        <form >	  
                            <input v-model="title" class="form-control">
                            <span v-if="errors.title" class="error">{{errors.title[0]}}</span></br>
                            <input v-model="start" class="form-control" type="date"  v-bind:min='my_var'>
                            <span v-if="errors.start" class="error">{{errors.start[0]}}</span></br>

                            <select v-model="color" class="form-control">
                                <option  value="" disabled>Выберите цвет</option>
                                <option  value="#80a35e">Зеленый</option>
                                <option  value="#d3d358">Желтый</option>
                                <option  value="#3a87ad">Синий</option>
                                <option  value="#d04040">Красный</option>
                            </select></br>

                            <select v-model="repeat" class="form-control">
                                <option  value="0" disabled>Повторение</option>
                                <option  value="no">Нет</option>
                                <option  value="daily">Каждый день</option>
                                <option  value="weekly">Каждую неделю</option>
                                <option  value="monthly">Каждый месяц</option>
                                <option  value="yearly">Каждый год</option>
                            </select>      
				            <button type="button" v-on:click="update()" style="width: 100%;"class="btn btn-primary btn-block  mt-3" >Обновить</button>
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
            title: this.urldata.title,
            start: this.urldata.start,
            message: '',
            repeat:this.urldata.repeat,
            checkedData: false,
            color: this.urldata.color,
            errors: '',
        }
        },
         props:[
            'urldata'
        ],      
        mounted() {

        },
        methods:{
                update() {
                    axios.put(`/events/${this.urldata.id}`,{ title: this.title, start: this.start , repeat:this.repeat, color:this.color})
                    .then((res) => 
                    {
                        this.message='Данные обновлены!'
                        this.errors=[]
                    }).catch((err) => {
                        this.message=''
                        this.errors=err.response.data.errors
                    })
                },

                delet() {
                    axios.delete(`/events/${this.urldata.id}`)
                    .then((res) => 
                    {
                        window.location.href = '/calendars/1'
                    }).catch((err) => {
                    console.log(err)
                    })
            },
        }
    }
</script>
