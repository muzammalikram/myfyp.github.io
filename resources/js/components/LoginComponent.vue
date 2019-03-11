<template>
     <div ><!--  class="tab-pane" id="login" -->
                  <h3>Login</h3>
                  <p class="text-muted">Log into your account</p>
                  
                  <!--Login Form-->
                  <form name="Login_form" id='Login_form'>
                     <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-email" class="sr-only">Email</label>
                        <input id="my-email" v-model="loginData.email" class="form-control input-group-lg" type="text" name="Email" title="Enter Email" placeholder="Your Email"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-password" class="sr-only">Password</label>
                        <input id="my-password" v-model="loginData.password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Password"/>
                      </div>
                    </div>
                      <p><a href="#">Forgot Password?</a></p>
                      <button class="btn btn-primary" @click.prevent="login()">Login Now</button>
                  </form><!--Login Form Ends--> 

                </div>
</template>

<script>

     import axios from 'axios'
  //  import TimelineComponent from './TimelineComponent.vue'

    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data (){
            return {
                loginData : {
                    email : '',
                    password : ''
                }
            }
        },
        methods : {
            testmethod() {


            },
            login() {
                var _this = this;

                axios.post('/api/auth/login' , _this.loginData)
                    .then(function (response) {
                        // document.getElementById("my-email").style.borderColor="#f1f2f2";
                        // document.getElementById("my-password").style.borderColor="#f1f2f2";

                      //  console.log(response.data);
                        var secret_key = response.data.access_token;
                        var user = response.data.user.id;

                        localStorage.setItem("token" , secret_key);
                        localStorage.setItem("user" , user);
//console.log(user);
                       _this.$router.push('profile');

                    })
                    .catch(function (error) {

                        // var errors = error.response;
                        //  let err = errors.data.errors;

                        console.log(error);
                         document.getElementById("my-email").style.borderColor="red";
                         document.getElementById("my-password").style.borderColor="red";
                    });

            }
        }
    }
</script>
