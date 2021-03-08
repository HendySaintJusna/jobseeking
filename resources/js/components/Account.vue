<template>


<div class="container">

	<div class="row">

		<div class="col-2"></div>
		
		<div class="col-8">

			<h1>My Profile <span style="height:20px;cursor:pointer;" @click.prevent="show_edit_form"><i class="fas fa-edit"></i></span></h1>
			<h5>Name : {{this.form.name}}</h5>
			<input type="text" v-if="form.showedit" class="form-control" v-model="form.name">
			<!-- <h5>Email : {{this.user[0].email}}</h5> -->
			<h5>Joined : {{this.user[0].created_at | moment("from", "now")}}</h5>

			<div>
				<img src="/icon/pin.png" style="height: 17px;margin-top: -6px;"> <span style="color:grey;">{{this.user[0].country}}, {{this.user[0].state}}  </span>
			</div>


			<div>

				<h5>About me</h5>
				<p>{{this.form.about_me}}</p>
				<textarea v-if="form.showedit" v-model="form.about_me" maxlength="225" class="form-control">{{this.form.about_me}}</textarea>
				<span v-if="form.showedit" style="float:right;">{{charact()}}</span>


				
			</div>

			<div>

				<h5 v-if="this.form.field == null "><i class="fas fa-briefcase"></i> No field selected yet </h5>
				<h5 v-if="this.form.field !== null "><i class="fas fa-briefcase"></i> {{this.form.field}} </h5>

				<div v-if="form.showedit">
					<select v-model="form.field" class="form-control">
					  <option value="Architecture-and-engineering">Architecture and engineering</option>
					  <option value="Arts-culture-and-entertainment">Arts, culture and entertainment</option>
					  <option value="Business-management-and-administration">Business, management and administration</option>
					  <option value="Communications">Communications</option>
					  <option value=">Community-and-social-services">Community and social services</option>
					  <option value="Education">Education</option>
					  <option value="Science-and-technology">Science and technology</option>
					  <option value="Installation-repair-and-maintenance">Installation, repair and maintenance</option>
					  <option value="Farming-fishing-and-forestry">Farming, fishing and forestry</option>
					  <option value="Government">Government</option>
					  <option value="Health and medicine">Health and medicine</option>
					  <option value="Law and public policy">Law and public policy</option>
					  <option value="Sales">Sales</option>
					</select>
				</div>

			</div>


			<div v-if="form.showedit">
				<button class="btn btn-success" @click.prevent="edit">Edit</button>
			</div>


			<!-- <div style="">
				<h3 v-if="this.user[0].cv_name == null">My resume</h3>
				<h3 v-if="this.user[0].cv_name !== null ">My resume <i class="fas fa-download" v-if="form.cv_name !== null" style="cursor:pointer;" @click.prevent="downloadResume"></i></h3>
			</div>
			
			<label for="file-upload">
				<div class="insertresume">
					<span v-if="form.cv_name == null"><img src="/icon/exclamation.png" style="height:27px;margin-right:8px;"> Add your resume</span>
					<span v-if="form.cv_name !== null"><img src="/icon/verifie.png" style="height:27px;margin-right:8px;"> {{this.form.cv_name | cutName}}</span>
					<input type="file" id="file-upload"  v-on:change="onFileChange"/>
				</div>
			</label> -->
			
		
		</div>
		
		<div class="col-2"></div>

	</div>

	

</div>


</template>




<script>

import { Form, HasError, AlertError } from 'vform'
import moment from 'moment'
import swal from 'sweetalert';

const axios = require('axios');

export default {

		props:{
			user:{
				type:Array,
				required:true
			}
		},


     	data(){
			return{

				form: new Form({

					filename:'',
					file:'',
					name: this.user[0].name,
					cv_name: this.user[0].cv_name,
					about_me: '',
					field: this.user[0].field,
					showedit:0,

				})


			}
		},

      
        methods: {


        	show_edit_form(){
        		this.form.showedit = !(this.form.showedit)
        	},


        	downloadResume(){
				window.location = `/app/public/resume/${this.user[0].cv_file}`;
				// window.open(`/app/public/tool-files/${name}`);	
			},


        	edit(){

        		var vm = this

        		this.form.post(`/edituser/`)
				.then((response) => {

					swal({
					  title: "Profile edited",
					  icon: "success",
					  button: "ok",
					});

					// this.form.cv_name = response.data
					console.log(response.data)
					vm.form.showedit = 0

				}, (error) => {
				  console.log(error);
				});
        	},


        	onFileChange(e){

        		const vm = this
	    		
	    		const size_little = (e.target.files[0].size)/1000000;

		            if (e.target.files[0].type == 'application/pdf' || e.target.files[0].type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
		     
		        		
	            		if (e.target.files[0].size<= 30000000) {

		            		this.form.filename = e.target.files[0].name;
		            		this.form.file = e.target.files[0];
		            		console.log(this.form.file)

		            		let formData = new FormData();
				            formData.append('file', this.form.file)
				            formData.append('filename', this.form.filename)

		            		axios.post(`/uploadresume/`,formData,{
						      headers: {
						          'Content-Type': 'multipart/form-data'
						      },
		    				})
							.then((response) => {

								swal({
								  title: "Resume Saved",
								  text: "You can now apply for jobs!",
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
						  text: "This type of file is not supported.",
						  icon: "error",
						  button: "ok",
						});
						
		            }
	           
	        },


	        charact(){
	        	if (this.form.about_me == null) {
	        		var note = 0
	        	} else {
	        		var note = this.form.about_me.length
	        	}
				
				if (note<226) {
					return (225 - note)
				} else {
					return 0
				}
			},


        	
        },



        filters:{
		
			cutName(value){
				if(value.length > 20){
					return value.substring(0, 20) + '..';
				}else{
					return value
				}
			},
		
		},




		created(){

			if (this.user[0].about_me == null) {
				this.form.about_me = 'No information'
			} else {
				this.form.about_me = this.user[0].about_me
			}


		}





}


</script>