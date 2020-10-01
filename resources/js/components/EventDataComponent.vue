<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Событие</h2></div>
                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Наименование</th>
                                    <th>Дата</th>
                                    <th>Пользователь</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{urldata[0].title}}</td>
                                    <td>{{urldata[0].start}}</td>
                                    <td>{{urldata[1].name}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
.card{
    width: 550px;
}
</style>


<script>
    export default {
        props:[
            'urldata'
        ],
        mounted() {

        },
        methods:{

        }
    }
</script>
