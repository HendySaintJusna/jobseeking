<template>


<div class="container" style="margin-bottom:50px;">

	<div class="row" style="    margin: 45px 0px;">
		<div class="col-lg-12 col-md-12 col-sm-12 col-12" style="text-align:center;">
			<h1 style="font-family: 'Rubik', sans-serif;">Hire easily</h1>
			<p style="font-size: 20px;">Take a few minutes to describe your job offer.</p>
		</div>
	</div>

	<div class="row">


		<div class="col-lg-6 col-md-6 col-sm-12 col-12" style="background:white;">
			<div>
				<h5 style="margin-bottom: 9px;">Your company name</h5>
				<input style="    margin-bottom: 17px;" type="text" class="form-control" v-model="form.company" maxlength="100">
			</div>
			<div>
				<h5 style="margin-bottom: 9px;">Job title</h5>
				<input style="    margin-bottom: 17px;" type="text" class="form-control" v-model="form.title" maxlength="100">
			</div>
			<div>
				<h5 style="margin-bottom: 9px;">Salary given</h5>
				<div class="row">
					<div class="col-lg-10 col-md-10 col-sm-10 col-10">
						<input style="    margin-bottom: 17px;" type="text" class="form-control" v-model="form.salary" placeholder="exemple: 12.5">
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-2" style="    padding: 8px 0px;">
						<h6>$/hour</h6>
					</div>
				</div>
				 
			</div>
			
<!-- 			<div>
				<h5 style="margin-bottom: 9px;">Field</h5>
				<select style="    margin-bottom: 17px;" v-model="form.field" class="form-control">
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
				  <option value="Restoration">Restoration</option>
				  <option value="Sales">Sales</option>
				  <option value="Others">Others</option>
				</select>
			</div> -->

			<div>
				<h5 style="margin-bottom: 9px;">Country</h5>

				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-6"  v-model="form.country.usa" style="text-align:center;">
						<img src="/icon/usa.png" @click.prevent="choosecountry(1)" style="height: 86px;cursor:pointer;"><br>
						<i class="fas fa-check" v-if="form.country.usa" style="color:green;    margin-top: 16px;    font-size: 20px;"></i>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-6" v-model="form.country.ca" style="text-align:center;">
						<img src="/icon/canada.png" @click.prevent="choosecountry(2)" style="height: 86px;cursor:pointer;"><br>
						<i class="fas fa-check" v-if="form.country.ca" style="color:green;    margin-top: 16px;font-size: 20px;"></i>
					</div>
				</div>


			</div>

			<div v-if="form.country.usa">
				<h5 style="margin-bottom: 9px;">State</h5>
				<select style="    margin-bottom: 17px;" v-model="form.state" class="form-control">
					<!-- <option value="" disabled selected>UNITED STATES</option> -->
					<option value="Alabama">Alabama</option>
					<option value="Alaska">Alaska</option>
					<option value="Arizona">Arizona</option>
					<option value="Arkansas">Arkansas</option>
					<option value="California">California</option>
					<option value="Colorado">Colorado</option>
					<option value="Connecticut">Connecticut</option>
					<option value="Delaware">Delaware</option>
					<option value="Florida">Florida</option>
					<option value="Georgia">Georgia</option>
					<option value="Hawaii">Hawaii</option>
					<option value="Idaho">Idaho</option>
					<option value="Illiois">Illiois</option>
					<option value="Indiana">Indiana</option>
					<option value="Iowa">Iowa</option>
					<option value="Kansas">Kansas</option>
					<option value="Kentucky">Kentucky</option>
					<option value="Louisiana">Louisiana</option>
					<option value="Maine">Maine</option>
					<option value="Maryland">Maryland</option>
					<option value="Massachusetts">Massachusetts</option>
					<option value="Michigan">Michigan</option>
					<option value="Massissippi">Massissippi</option>
					<option value="Missouri">Missouri</option>
					<option value="Montana">Montana</option>
					<option value="Nebraska">Nebraska</option>
					<option value="Nevada">Nevada</option>
					<option value="New-Hampshire">New Hampshire</option>
					<option value="New-Hampshire">New Hampshire</option>
					<option value="New-Jersey">New Jersey</option>
					<option value="New-Mexico">New Mexico</option>
					<option value="New-York">New York</option>
					<option value="North Carolina">North Carolina</option>
					<option value="Ohio">Ohio</option>
					<option value="Oklahoma">Oklahoma</option>
					<option value="Oregon">Oregon</option>
					<option value="Pennsylvania">Pennsylvania</option>
					<option value="Rhode-Island">Rhode Island</option>
					<option value="South-Carolina">South Carolina</option>
					<option value="South-Dakota">South Dakota</option>
					<option value="Tennessee">Tennessee</option>
					<option value="Texas">Texas</option>
					<option value="Utah">Utah</option>
					<option value="Vermony">Vermony</option>
					<option value="Virginia">Virginia</option>
					<option value="Washington">Washington</option>
					<option value="West-Virginia">West Virginia</option>
					<option value="Wisconsin">Wisconsin</option>
					<option value="Wyoming">Wyoming</option>
				</select>
			</div>


			<div v-if="form.country.ca">
				<h5 style="margin-bottom: 9px;">Province</h5>
				<select style="    margin-bottom: 17px;" v-model="form.state" class="form-control">
					<option value="Alberta">Alberta</option>
					<option value="British-Columbia">British Columbia</option>
					<option value="Manitova">Manitova</option>
					<option value="New-Brunswick">New Brunswick</option>
					<option value="Newfoundland-and-Labrador">Newfoundland-and-Labrador</option>
					<option value="Northwest-Territories">Northwest Territories</option>
					<option value="Nova Scotia">Nova Scotia</option>
					<option value="Nunavut">Nunavut</option>
					<option value="Ontario">Ontario</option>
					<option value="Prince Edward Island">Prince Edward Island</option>
					<option value="Quebec">Quebec</option>
					<option value="Saskatchewan">Saskatchewan</option>
					<option value="Yukon">Yukon</option>
				</select>
			</div>


			<div>
				<h5 style="margin-bottom: 9px;">City</h5>
				<input style="    margin-bottom: 17px;" type="text" v-model="form.city" class="form-control">
			</div>



			<div>
				<h5 style="margin-bottom: 9px;">Time needed</h5>
				<select style="    margin-bottom: 17px;" v-model="form.time_needed" class="form-control">
					<option value="Full-time">Full-time</option>
					<option value="Part-time">Part-time</option>
					<option value="Temporary">Temporary</option>
				</select>
			</div>

			<div>
				<h5 style="margin-bottom: 9px;">Luanguage required</h5>
				<select style="    margin-bottom: 17px;" v-model="form.lang" class="form-control">
					<option value="English">English</option>
					<option value="French">French</option>
					<option value="Spanish">Spanish</option>
					<option value="bilingual-ef">bilingual (English and French)</option>
					<option value="bilingual-es">bilingual (English and Spanish)</option>
				</select>
			</div>

	<!-- 		<div>
				<h5>Keywords</h5>
				<input type="text" class="form.control" @keyup.space="add_keywords" v-model="form.keyword_val">
				<div v-for="x in form.keywords">
					<p>{{x}}</p>
				</div>
			</div> -->


			
		
	</div>




	<div class="col-lg-6 col-md-6 col-sm-12 col-12">

		<div>
			<h5 style="margin-bottom: 9px;">About the job</h5>
			<!-- <textarea id="textareatarget" v-model="form.about_job"></textarea> -->

			<editor
			   v-model="form.about_job"
		       api-key="405k5wva11ixdga39bpe102ntjsr32p8nfkxss990f0jdd60"
		       :init="{
		         height: 500,
		         menubar: false,
		         plugins: [
		           'advlist autolink lists link image charmap print preview anchor',
		           'searchreplace visualblocks code fullscreen',
		           'insertdatetime media table paste code help wordcount'
		         ],
		         toolbar:
		           'undo redo | formatselect | bold italic backcolor | \
		           alignleft aligncenter alignright alignjustify | \
		           bullist numlist outdent indent | removeformat | help'
		       }"
		     />

		</div>


		<button style="width:100%;margin-top: 37px;" class="btn btn-dark" @click.prevent="post">Post the ad</button>


	</div>


		
	</div>


	





</div>


</template>




<script>

import { Form, HasError, AlertError } from 'vform'
import moment from 'moment'
import swal from 'sweetalert';
import Editor from '@tinymce/tinymce-vue'

const axios = require('axios');



export default {

		props:{
			companyname:{
				type:String,
				required:true
			}
		},

		components: {
	     'editor': Editor
	    },


     	data(){
			return{

				form: new Form({

					country:{
						usa:1,
						ca:0,
						selected:'',
					},
					state:'',
					title:'',
					salary:'',
					city:'',
					about_job:'',
					company:this.companyname,
					field:'Others',
					keywords:[],
					keyword_val:'',
					time_needed:'',
					lang:'',

				})


			}
		},

      
        methods: {


        	post(){

        		if (this.form.title !== '') {
        			if (this.form.salary !== '') {
        				if (this.form.about_job.length > 0) {
        					if (this.form.field !== '') {
        						if (this.form.state !== '') {
        							if (this.form.time_needed !== '') {
        								if (this.form.lang !== '') {
        									if (this.form.keywords.length == 0) {
        										if (this.form.company !== '') {
        											if (this.form.company !== '') {

    												this.form.keywords.push(this.form.title)

        											this.form.post(`/storeoffer/`)
													.then((response) => {

														swal({
														  title: "Ad posted",
														  icon: "success",
														  button: "ok",
														});

														window.location = '/applications'

													}, (error) => {
													  console.log(error);
													});

													}else{

														swal({
														  title: "Oops",
														  text: "Choose a city!",
														  icon: "error",
														  button: "ok",
														});
	        										

													}


        										} else {
        											swal({
													  title: "Oops",
													  text: "Give your company name!",
													  icon: "error",
													  button: "ok",
													});
        										}
        										

        									} else {
        										swal({
												  title: "Oops",
												  text: "Give at least one keyword for the job",
												  icon: "error",
												  button: "ok",
												});
        									}
        									
        								} else {
        									swal({
											  title: "Oops",
											  text: "You forgot the luanguage requirements!",
											  icon: "error",
											  button: "ok",
											});
        								}
        							} else {
										swal({
										  title: "Oops",
										  text: "You forgot the time needed for the job",
										  icon: "error",
										  button: "ok",
										});
        							}
        						} else {
        							swal({
									  title: "Oops",
									  text: "You forgot the state!",
									  icon: "error",
									  button: "ok",
									});
        						}
        					} else {
        						swal({
								  title: "Oops",
								  text: "You forgot the job field!",
								  icon: "error",
								  button: "ok",
								});
        					}
        				} else {
        					swal({
							  title: "Oops",
							  text: "You forgot the description of the job!",
							  icon: "error",
							  button: "ok",
							});
        				}
        			} else {
        				swal({
						  title: "Oops",
						  text: "You forgot the job salary!",
						  icon: "error",
						  button: "ok",
						});
        			}
        		} else {
        			swal({
					  title: "Oops",
					  text: "You forgot the job title!",
					  icon: "error",
					  button: "ok",
					});
        		}

        	},



        	choosecountry(x){
        		if (x == '1') {
    				this.form.country.usa = 1
    				this.form.country.ca = 0
    				this.form.country.selected = 'United States'
        		} else {
        			this.form.country.usa = 0
    				this.form.country.ca = 1
    				this.form.country.selected = 'Canada'
        		}
        	},

        	add_keywords(){

   				if (this.form.keywords.length < 6) {
   					this.form.keywords.push(this.form.keyword_val)
        			this.form.keyword_val = ''
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
			this.form.country.selected = 'United States'
		

		}





}


</script>