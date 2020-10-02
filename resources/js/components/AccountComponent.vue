<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Личный кабинет</div>
                    <div class="card-body">
                         
                         <h3 style="color: #38c172;">{{message}}</h3>

                        <form v-on:submit.prevent="addNewEvent">	  
                            Имя <input v-model="name" class="form-control">
                            Почта<input v-model="email" class="form-control" type="email"> 
                            <span v-if="errors.email" class="error">{{errors.email[0]}}</span></br>      
                            Пароль<input v-model="password"  class="form-control" type="password">    
                            <span v-if="errors.password" class="error">{{errors.password[0]}}</span></br>            
                            <button type="button" v-on:click="update()" style="width: 100%;" class="btn btn-primary btn-block  mt-3" >Изменить</button>
          
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
        props:[
            'urldata'
        ],
        data() {
        return {
            name: '',
            password: '',
            email: '',
            message: '',
            errors: '',
        }
        },
        mounted() {
            this.name=this.urldata.name
            this.email=this.urldata.email   
        },
        methods:{
                update() {                
                axios.put(`/accounts/${this.urldata.id}`,{ name: this.name, email: this.email ,password:this.password})
                
                .then((res) => {
                    this.password= ''
                    this.message="Данные обновлены!"
                    this.errors=[]
                    
                    }).catch((err) => {
                        this.message=''
                        this.errors=err.response.data.errors
                    })
                 },
        }
    }
</script>
