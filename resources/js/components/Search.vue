<template>

    <div id="">

        <div style="background: #fff2da;
        min-height: 150px;
        margin-top: -24px;
        z-index:1;
        padding: 29px 0px;">

            <div class="container" style="margin-bottom">

                <div class="row" style="">

                    <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                        <h5 style="font-family: 'Rubik', sans-serif;font-weight:700px;">What</h5>
                        <input type="text" style="height: 45px;" class="form-control" @keyup="searchlistjob" v-on:keyup.enter="research" placeholder="Job title" v-model="form.search_job">
                        <div v-if="form.arr_results_job.length>0" style="background:white;z-index:5;position: absolute;    width: 95.5%;
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
                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                        <h5 style="font-family: 'Rubik', sans-serif;font-weight:700px;">Where</h5>
                        <input style="height: 45px;" v-if="form.location=='Canada'" type="text" class="form-control" v-model="form.search_city" placeholder="City" @keyup="searchlistcity" v-on:keyup.enter="research">
                        <input style="height: 45px;" v-if="form.location!=='Canada'" type="text" class="form-control" v-model="form.search_city" placeholder="City" @keyup="searchlistcity" v-on:keyup.enter="research">
                        <div v-if="form.arr_results_city.length>0" style="background:white;z-index:5;position: absolute;    width: 89.5%;
                        padding: 11px 14px;
                        border-right: 1px solid #e0e0e0;
                        border-left: 1px solid #e0e0e0;
                        border-bottom: 1px solid #e0e0e0;
                        border-bottom-left-radius: 6px;
                        border-bottom-right-radius: 6px;
                        margin-top: -3px;">
                            <div v-for="result in form.arr_results_city" class="searchbarresults">
                                <p @click.prevent="add_in_field_city(result)">{{result}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 col-12" style="padding-top: 29px;">
                        <button style="height: 44px;font-family: 'Rubik', sans-serif;" class="btn btn-dark" @click.prevent="research">Find jobs</button>
                    </div>

                </div>
            </div>
        </div>
        

    <div class="container">

        <div class="row" style="margin-top: 44px;">

            <div class="col-lg-8 col-md-8 col-sm-12 col-12" v-if="this.jobs[0].data.length !== 0">


                <div v-for="job in this.jobs[0].data" class="jobpost">
                    <div class="row" @click.prevent="getTarget(job.token)">
                        <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                            <h4>{{job.title}}</h4>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                            <h5>{{job.salary}}$/hour</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-12 col-12" @click.prevent="getTarget(job.token)">
                            <h6>{{job.company}}</h6>
                            <h6 style="font-style: italic;">{{job.city}}, {{job.state_province}} </h6>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12" style="">
                            <button style="border-radius: 0px;height: 43px;" class="btn btn-warning" @click.prevent="chooseFile(job.token)">Apply Now</button>
                            <input type="file" name="file" id="fileforapply" v-on:change="onFileChange" hidden/>
                        </div>
                    </div>
                    
                    
                    <div style="margin-top: 20px;" @click.prevent="getTarget(job.token)">
                        <div style="padding-right: 37px;" v-if="form.target!==job.token" :inner-html.prop="job.desc | cut"></div>
                        <div style="padding-right: 37px;" v-if="form.target==job.token" :inner-html.prop="job.desc"></div>
                        <p style="font-family: 'Rubik', sans-serif;font-weight:700px;">Needed : {{job.time_needed}}</p>
                        <p style="font-style:italic;font-size: 12px;">Required language - {{job.speaking | lang}}</p>
                    </div>
                    

                    <p style="color: grey;    margin-top: 17px;" @click.prevent="getTarget(job.token)">{{job.created_at | moment("from", "now")}}</p>

                </div>



            </div>

            <div class="col-lg-8 col-md-8 col-sm-12 col-12" v-if="this.jobs[0].data.length == 0" style="margin-top: 25px;min-height: 500px;">
                <h3 style="font-family: 'Rubik', sans-serif;font-weight:700px;">Nothing found for the moment...</h3>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-12" style="    padding-top: 30px;">
                <h5>{{this.jobs[0].data.length}} results for <strong>{{form.search_job}}</strong></h5>
                <h5><i class="fas fa-globe-americas"></i> {{this.form.location}}</h5>
                <h5><i class="fas fa-map-marker"></i> {{this.form.search_city}}</h5>
                
            </div>
            
     <!--        <div class="col-4">
                <div style="    height: 250px;
                width: 250px;
                text-align: center;
                background-image:url('/img/buss.jpg');
                background-size: cover;
                ">  
                    <div style="padding-top: 78px;color:white;">
                        <h5>City : {{this.form.search_city}} </h5>
                        <h5>{{form.search_job}}</h5>
                        <h5>{{this.jobs[0].data.length}} Results</h5>
                    </div>
                </div>
            </div> -->
            
           
        </div>

    </div>


    <div class="container" style="margin-top: 50px;
    margin-bottom: 12px;">
         <hr>
        <div class="row">
           
            <div class="col-lg-3 col-md-3 col-sm-12 col-12" style="text-align:center;">
                <p>@ 2021 Jobblack</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-12" style="text-align:center;">
                <a href="information">About Us</a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-12" style="text-align:center;">
                <a href="information">Contact Us</a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-12" style="text-align:center;">
                <a href="information">Privacy Policy</a>
            </div>
        </div>
    </div>

        
    </div>

    

        
    
</template>





<script>

    import { Form, HasError, AlertError } from 'vform'
    import truncate from 'vue-truncate-collapsed';
    import moment from 'moment'
    import swal from 'sweetalert';

    export default {
        

        props:{
            search:{
                type:String,
                required:true
            },
            city:{
                type:String,
                required:true
            },
            jobs:{
                type:Array,
                required:false
            },
            country:{
                type:String,
                required:true
            },
        },

        components: {
            truncate
        },

        data(){
            return{

                form: new Form({

                location:this.country,
                search_job:this.search.replace("-", " "),
                search_city:this.city.replace("-", " "),
                arr_results_job:[],
                arr_results_city:[],

                filename:'',
                file:'',
                token:'',
                target:'',

                })
            }
        },


        methods:{



          chooseFile(token) {
            this.form.token = token
            document.getElementById("fileforapply").click()
          },


          getTarget(token){

            if (this.form.target == token) {
                this.form.target = ''
            } else {
                this.form.target = token
            }

          },


          onFileChange(e){

                const vm = this
                
                const size_little = (e.target.files[0].size)/1000000;

                    if (e.target.files[0].type == 'application/pdf' || e.target.files[0].type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
             
                        
                        if (e.target.files[0].size<= 30000000) {

                            this.form.filename = e.target.files[0].name;
                            this.form.file = e.target.files[0];

                            let formData = new FormData();
                            formData.append('file', this.form.file)
                            formData.append('filename', this.form.filename)
                            formData.append('token', this.form.token)

                            axios.post(`/uploadresumecustomer/`,formData,{
                              headers: {
                                  'Content-Type': 'multipart/form-data'
                              },
                            })
                            .then((response) => {

                                swal({
                                  title: "Resume Sent!",
                                  icon: "success",
                                  button: "ok",
                                });

                                this.form.cv_name = response.data

                            }, (error) => {
                              console.log(error);
                            });


                        } else {

                            swal({
                              title: "Oops..",
                              text: "This file exceeds the allowed limit 30MB.",
                              icon: "error",
                              button: "ok",
                            });
                        }
                
             
                    } else {

                        swal({
                          title: "Oops..",
                          text: "This type of file is not supported (word or pdf supported).",
                          icon: "error",
                          button: "ok",
                        });
                        
                    }
               
            },



          research(){

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

            convertToSlug(Text)
            {
                return Text
                    .toLowerCase()
                    .replace(/[^\w ]+/g,'')
                    .replace(/ +/g,'-')
                    ;
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


        filters:{

            lang(val){
                if (val == 'bilingual-ef') {
                    return 'Bilingual english-french'
                } else if(val == 'bilingual-es') {
                    return 'Bilingual english-spanish'
                }else{
                    return val
                }
            },

            cut(x){
                if (x.length <201) {
                    return x
                } else {
                    return x.slice(0,200) + '...'
                }
                
            },

        },


        created(){

            console.log(this.jobs[0].data)
            console.log(this.search.replace("-", " "))

        }


    }
</script>
