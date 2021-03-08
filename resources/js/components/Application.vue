<template>
    <div class="container">
        <div class="row" style="margin-top: 50px;text-align:center;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <h2 style="font-family: 'Rubik', sans-serif;font-weight:700px;">Applications</h2>
                <p style="font-size: 19px;color: grey;">Here are displayed the resumes you receive from candidates. An email will be sent to you each time you receive an application.</p>
            </div>
        </div>

        <div class="row" style="    margin-top: 19px;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div v-for="application in form.appl">
                    <div style="background:white;border-bottom: 1px solid #d8d8d8;    padding: 10px 34px;">
                        <div class="row" style="">
                            <div class="col-lg-10 col-md-10 col-sm-12 col-12" style="text-align:center;">
                                <h4>You received an application for the job <strong>{{application.job_title}}</strong>. - {{application.created_at | moment("from", "now")}}</h4>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-6 col-6" style="text-align:center;">
                                <button class="btn btn-primary" @click.prevent="downloadFile(application.cv_file)"><i class="fas fa-file-download"></i></button>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-6 col-6" style="text-align:center;">
                                <button class="btn btn-danger" @click.prevent="deleteApp(application.id)"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="text-align:center;" v-if="form.appl.length==0">
                    <h3>No application received yet. Be patient.</h3>
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
            application:{
                type:Array,
                required:true
            },
            myjobpost:{
                type:Array,
                required:true
            }
        },



        data(){
            return{

                form: new Form({

                    appl:this.application,

                })


            }
        },


        methods:{

            downloadFile(file){
                window.location = `/app/public/resume-apply/${file}`;
            },


            deleteApp(id){
                var vm = this
                swal({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover this application.",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {

                    vm.form.post(`/deleteapp/${id}`)
                      .then(function (response) {

                        vm.form.appl = response.data

                        swal("Application deleted", {
                          icon: "success",
                        });


                      })
                      .catch(function (error) {
                        // handle error
                        console.log(error);
                      })
                    

                  } else {
                    swal("Action cancelled.");
                  }
                });


            },


        },


        filters:{



        },


        created(){

          

        }




    }
</script>
