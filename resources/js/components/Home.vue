<template>


    <div  style="
        background: rgb(255,181,18);
        background: linear-gradient(180deg, rgba(255,181,18,1) 27%, rgba(244,184,17,1) 62%, rgba(244,219,72,1) 100%);
        min-height: 610px;
        margin-top:-26px;">



        <div class="container" style="    max-width: 1337px;">

        

            <div class="row">

                <div class="col-12 col-sm-12 col-md-6 col-lg-6">

                    <div class="row" style="margin-top:186px;">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <h1 style="color:white;margin-bottom: 36px;font-family: 'Rubik', sans-serif;font-size: 46px;">Find a job in one of North America's black companies.</h1>
                        </div>
                    </div>

                    <div class="row" style="    margin-top: 0px;">
                        
                        
                        <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                            <h5 style="font-family: 'Rubik', sans-serif;">What</h5>
                            <input style="height: 45px;" type="text" class="form-control" v-on:keyup.enter="search" @keyup="searchlistjob" placeholder="Job title" v-model="form.search_job">
                            <div v-if="form.arr_results_job.length>0" style="background:white;z-index:5;position: absolute;    width: 89.5%;
                            padding: 11px 14px;
                            border-right: 1px solid #e0e0e0;
                            border-left: 1px solid #e0e0e0;
                            border-bottom: 1px solid #e0e0e0;
                            border-bottom-left-radius: 6px;
                            border-bottom-right-radius: 6px;
                            margin-top: -3px;">
                                <div v-for="result in form.arr_results_job" class="searchbarresults">
                                    <p @click.prevent="add_in_field_job(result)">{{result}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-5 col-lg-5" style="">
                            <h5 style="font-family: 'Rubik', sans-serif;">Where</h5>
                            <input style="height: 45px;" v-if="form.location=='Canada'" type="text" class="form-control" v-model="form.search_city" placeholder="City" v-on:keyup.enter="search" @keyup="searchlistcity">
                            <input style="height: 45px;" v-if="form.location=='United States'" type="text" class="form-control" v-model="form.search_city" placeholder="City" v-on:keyup.enter="search" @keyup="searchlistcity">
                            <div v-if="form.arr_results_city.length>0" style="background:white;z-index:5;position: absolute;    width: 89.5%;
                            padding: 11px 14px;
                            border-right: 1px solid #e0e0e0;
                            border-left: 1px solid #e0e0e0;
                            border-bottom: 1px solid #e0e0e0;
                            border-bottom-left-radius: 6px;
                            border-bottom-right-radius: 6px;
                            margin-top: -3px;">
                                <div v-for="city in form.arr_results_city" class="searchbarresults">
                                    <p @click.prevent="add_in_field_city(city)">{{city}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-2 col-lg-2" style="    padding-top: 28px;">
                            <button class="btn btn-dark" @click.prevent="search" style="height:45px;width: 100%;font-family: 'Rubik', sans-serif;">Search</button>
                        </div>
                    </div>
                </div>


                

                <div class="col-12 col-sm-12 col-md-6 col-lg-6" style="text-align: center;">
                    <img src="/img/duo.png" class='img-fluid'
                    style="user-drag: none;user-select: none;-moz-user-select: none;-webkit-user-drag: none;-webkit-user-select: none;-ms-user-select: none;height: 564px;
                    margin-top: 82px;">
                </div>

            </div>

        
        </div>




        
    </div>


    
</template>

<script>

    import { Form, HasError, AlertError } from 'vform'
    import moment from 'moment'
    import swal from 'sweetalert';

    export default {



        props:{
            country:{
                type:String,
                required:true
            }
        },



        data(){
            return{

                form: new Form({

                    location:'',
                    search_job:'',
                    search_city:'',
                    arr_results_job:[],
                    arr_results_city:[],
                })


            }
        },


        methods:{


            search(){

                if (this.form.search_job !== '') {
                    if (this.form.search_city !== '') {

                        window.location = `/search/${this.convertToSlug(this.form.search_job)}/${this.convertToSlug(this.form.search_city)}`

                    }else{

                        var city = 'anywhere'
                        window.location = `/search/${this.convertToSlug(this.form.search_job)}/${city}`

                    }
                } else {
                    swal({
                      title: "Oops",
                      text: "Write the kind of job you are seeking.",
                      icon: "error",
                      button: "ok",
                    });
                }

            },


            convertToSlug(Text)
            {
                return Text
                    .toLowerCase()
                    .replace(/[^\w ]+/g,'')
                    .replace(/ +/g,'-')
                    ;
            },


            searchlistjob(){

                var vm = this

                if (this.form.search_job == '') {
                    this.form.arr_results_job = []
                } else {

                    this.form.post(`/search/job`)
                    .then((response) => {

                        vm.form.arr_results_job = []

                        response.data.data.forEach(function(val) {

                            vm.form.arr_results_job.push(val.title)

                        });

                        vm.removeDuplicatesJob(vm.form.arr_results_job)



                    }, (error) => {
                      console.log(error);
                    });

                }


            },


            add_in_field_job(x){
                this.form.search_job = x
                this.form.arr_results_job = []
            },


            add_in_field_city(x){
                this.form.search_city = x
                this.form.arr_results_city = []
            },


            removeDuplicatesCity(data){
                this.form.arr_results_city = data.filter((value, index) => data.indexOf(value) == index)
            },

            removeDuplicatesJob(data){
                this.form.arr_results_job = data.filter((value, index) => data.indexOf(value) == index)
            },



            searchlistcity(){

                var vm = this

                if (this.form.search_city == '') {
                    this.form.arr_results_city = []
                } else {

                    this.form.post(`/search/city`)
                    .then((response) => {

                        vm.form.arr_results_city = []

                        response.data.data.forEach(function(val) {

                            vm.form.arr_results_city.push(val.city)

                        });

                        vm.removeDuplicatesCity(vm.form.arr_results_city)


                    }, (error) => {
                      console.log(error);
                    });

                }


            }



        },


        created(){

            if (this.country == 'Canada') {
                this.form.location = 'Canada'
            } else {
                this.form.location = 'United States'
            }


        }




    }
</script>
