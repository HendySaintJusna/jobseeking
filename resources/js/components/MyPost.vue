<template>
    <div class="container">
        <h3 style="    margin-top: 35px;font-family: 'Rubik', sans-serif;font-weight:700px;">My post</h3>
        <div v-for="job in form.arr">
            <div style="background:white;cursor:pointer;padding: 19px 49px;margin-top: 26px;border: 1px solid #eaeaea;" @click.prevent="openjob(job.id)">

                <div class="row">
                    <div class="col-9">
                        <h4>{{job.title}}</h4>
                        <h6>Since <p>{{job.created_at | moment("from", "now")}}</p></h6>
                    </div>
                    <div class="col-3" style="text-align:center;padding: 20px 0px;">
                        <!-- <i class="fas fa-eye"></i> -->
                        <button class="btn btn-danger" @click.prevent="deletepost(job.id)"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                

                <div v-if="job.id == form.open">
                    
                    <hr>

                    <div class="row" style="    padding-top: 19px;">
                        <div class="col-9">
                            <h4>{{job.title}}</h4>
                        </div>
                        <div class="col-3" style="text-align:center;">
                            <h5>{{job.salary}}$/hour</h5>
                        </div>
                    </div>
                    
                    <h6>{{job.company}}</h6>

                    <h6>{{job.city}}, {{job.state_province}} </h6>

                    <p v-html="job.desc"></p>

                    <p>{{job.speaking | lang}}</p>

                    <p>{{job.created_at}}</p>


                </div>

            </div>
            
        </div>

        <div v-if="form.arr.length==0">
            <div class="row">
                <div class="col-12" style="text-align:center;margin-top: 49px;font-family: 'Rubik', sans-serif;font-weight:700px;">
                    <h3>No ad post yet.</h3>
                    <a href="/hiring" style="color:orange;">Create an ad</a>
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
            post:{
                type:Array,
                required:true
            }
        },



        data(){
            return{

                form: new Form({

                    open:0,
                    arr:this.post

                })


            }
        },


        methods:{

            openjob(id){
                if (this.form.open == id) {
                    this.form.open = 0
                } else {
                    this.form.open = id
                }
                
            },


            deletepost(id){
                var vm = this
                swal({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover this job post.",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {

                    vm.form.post(`/deletepost/${id}`)
                      .then(function (response) {

                        vm.form.arr = response.data

                        swal("Post deleted", {
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

            lang(val){
                if (val == 'bilingual-ef') {
                    return 'Bilingual english-french'
                } else if(val == 'bilingual-es') {
                    return 'Bilingual english-spanish'
                }else{
                    return val
                }
            }

        },


        created(){

      


        }




    }
</script>
