<template>

    <div class="container">

      <!-- Timeline
      ================================================= -->
      <div class="timeline">

 
        <div class="timeline-cover">

          <!--Timeline Menu for Large Screens-->
          <div class="timeline-nav-bar hidden-sm hidden-xs">
            <div class="row">
              <div class="col-md-3">
                <div class="profile-info">

                  <img :src="'/storage/uploads/'+profileImg.image" alt="" class="img-responsive profile-photo" />

                  <h3>{{ user.f_name }}  {{ user.l_name }}</h3>
                  <p class="text-muted">{{ profile.work_designation }}</p>

                </div>
              </div>
              <div class="col-md-9">
                <ul class="list-inline profile-menu">
                  <!-- <li><router-link to="/timeline">Timeline</router-link></li>-->

                  <li><a v-on:click="show_about($route.params.userId)" >About</a></li>
                  <li><a v-on:click="show_album()">Album</a></li>
                  <li><a v-on:click="show_timeline()">Timeline</a></li>
                  <li><a v-on:click="show_friends()">Friends</a></li>
                  <!-- <li><router-link to="/friends">Friends</router-link></li> -->
                </ul>
                <ul class="follow-me list-inline">
                  <li> 1,299 people following her   {{ auth_id }}</li>

                  <!--<li v-if="request_status == "><button  class="btn-primary" @click.prevent="add_friend($route.params.userId)">Add Friend</button></li> -->

                  <!--<li v-if="request_status == 0"><button  class="btn-primary" @click.prevent="add_friend($route.params.userId, request_status)">Request Sent</button></li>-->

<!--                     <li><button  class="btn-primary" @click.prevent="friendAdded()">Add Friend</button></li> -->
                    <li><button  :class="buttonClass" @click.prevent="add_friendCustom($route.params.userId, request_status)">{{buttonText}}</button></li>

                  <!--<li v-if="request_status == 2"><button  class="btn-primary" @click.prevent="add_friend($route.params.userId, request_status)">Accept Request</button></li>-->
                  
                  <!-- <li v-if="receiver_id == auth_id"><button  class="btn-primary" @click.prevent="add_friend($route.params.userId)">Accept Request</button></li>  -->

                  <!--<li v-if="request_status == 1"><button  class="btn-success btn-primary">Friend</button></li>-->

                  <!--<li v-if="request_status == 3"><button  class="btn-success btn-primary" @click.prevent="add_friend($route.params.userId,request_status)">Add Friend</button></li>-->

                </ul>
              </div>
            </div>
          </div><!--Timeline Menu for Large Screens End-->

          <!--Timeline Menu for Small Screens-->
          <div class="navbar-mobile hidden-lg hidden-md">
            <div class="profile-info">
              <img  alt="" class="img-responsive profile-photo" />
              <h4>Sarah Cruiz</h4>
              <p class="text-muted">Creative Director</p>
            </div>
            <div class="mobile-menu">
              <ul class="list-inline">
                <li><router-link to="/timeline">Timeline</router-link></li>

                <li><router-link to="/album">About</router-link></li>
                <li><router-link to="/album">Album</router-link></li>

                <li><router-link to="/album">Fiends</router-link></li>
                <li><router-link to="/profile">Profile</router-link></li>
              </ul>
              <button class="btn-primary">Add Friend</button>
            </div>
          </div><!--Timeline Menu for Small Screens End-->

        </div>




        <div id="page-contents">
          <div class="row">
            <div class="col-md-3">

              <!--Edit Profile Menu-->

            </div>
            <div class="col-md-7">


              <div class="about-profile" v-if="!about">

                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>Personal Information</h4>
                  <p>{{ user.description }}</p>
                </div>
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-briefcase-outline icon-in-title"></i>Work Experiences</h4>
                  <div class="organization">
                    <img src="images/envato.png" alt="" class="pull-left img-org" />
                    <div class="work-info">
                      <h5>{{ profile.work_company }}</h5>
                      <p>{{ profile.work_designation }} <span class="text-grey">
                        {{ profile.work_from }} To {{ profile.work_to }}</span></p>
                    </div>
                  </div>


                </div>
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-location-outline icon-in-title"></i>Location</h4>
                  <p>{{ profile.work_city }}</p>
                  <div class="google-maps">
                    <div id="map" class="map"></div>
                  </div>
                </div>
                <div class="edit-block">
                  <ul class="list-inline interests">
                    <li v-for="userInterest in userInterests">
                      <span> {{ userInterest.interest }}</span>
                    </li>
                  </ul>
                  <div class="line"></div>

                </div>
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-chatbubble-outline icon-in-title"></i>Language</h4>
                  <ul>
                    <li><a href="#">Russian</a></li>
                    <li><a href="#">English</a></li>
                  </ul>
                </div>
              </div>

               <!--
                =======================AlBum===================
              -->

              <div class="post-content" v-if="!timeline">


                <!--Post Date-->

                <div class="post-container">
                  <img src="assets/images/post-images/12.jpg" alt="post-image" class="img-responsive post-image" />
                  <br>
                  <img src="assets/images/users/user-1.jpg" alt="user" class="profile-photo-md pull-left" />
                  <div class="post-detail">
                    <div class="user-info">
                      <h5><a href="timeline.html" class="profile-link">Sarah Cruiz</a> <span class="following">following</span></h5>
                      <p class="text-muted">Published a photo about 15 mins ago</p>
                    </div>
                    <div class="reaction">
                      <a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>
                      <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
                    </div>
                    <div class="line-divider"></div>
                    <div class="post-text">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
                    </div>
                    <div class="line-divider"></div>
                    <div class="post-comment">
                      <img src="assets/images/users/user-11.jpg" alt="" class="profile-photo-sm" />
                      <p><a href="timeline.html" class="profile-link">Diana </a><i class="em em-laughing"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                    </div>
                    <div class="post-comment">
                      <img src="assets/images/users/user-4.jpg" alt="" class="profile-photo-sm" />
                      <p><a href="timeline.html" class="profile-link">John</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                    </div>
                    <div class="post-comment">
                      <img src="assets/images/users/user-1.jpg" alt="" class="profile-photo-sm" />
                      <input type="text" class="form-control" placeholder="Post a comment">
                    </div>
                  </div>
                </div>


              </div>

              <!-- {{ posts }} -->

              <ul class="album-photos" v-if="!album">
                <li v-for="userImg in userImgs">
                  {{ userImg.image}}
                  <div class="img-wrapper" data-toggle="modal" data-target=".photo-1">
                    <img :src="'storage/uploads/'+userImg.image" alt="photo" />
                  </div>
                  <div class="modal fade photo-1" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <img src="'storage/uploads/'+userImg" alt="photo" />
                      </div>
                    </div>
                  </div>
                </li>

              </ul>


              <div class="post-content" v-if="!friends">


                <!--Post Date-->

                <div class="post-container">
                  FRIENDS 
                </div>


              </div>

              <!--
                ========================Album End===============
              -->

              <!--

              =====================================Timeline ===============

              -->


              <!--
              ===========================Timeline end==================
              -->

            </div>
            <div class="col-md-2 static">

              <!--Sticky Timeline Activity Sidebar-->
              <div id="sticky-sidebar">
                <h4 class="grey">Sarah's activity</h4>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> Commended on a Photo</p>
                    <p class="text-muted">5 mins ago</p>
                  </div>
                </div>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> Has posted a photo</p>
                    <p class="text-muted">an hour ago</p>
                  </div>
                </div>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> Liked her friend's post</p>
                    <p class="text-muted">4 hours ago</p>
                  </div>
                </div>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> has shared an album</p>
                    <p class="text-muted">a day ago</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


</template>

<script>
   // import profileHeader from './ProfileHeader.vue'
    import axios from 'axios'

    export default {
        mounted() {
            console.log('Component mounted.');

            this.show_about(this.$route.params.userId);
            this.get_add_friend();
            //this.setRequestButton(this.request_status);
            console.log(this.request_status);
             
            //this.get_basic_information();
            //  this.get_edu_information();
            //this.get_auth();
            this.url_id = this.$route.params.userId;
            this.auth_id = document.head.querySelector('meta[name="userId"]').content;




        },
        data (){
            return {

                about: false,
                timeline : true,
                album : true,
                friends : true,
                userImg : '',

                user : {},
                posts : {},
                userImgs : {},
                userInterests : {},
                profile : {},
                profileImg : {},
                request_status : 5,
                url_id : '' ,
                auth_id : '',
                sender_id : '',
                receiver_id : '',
                buttonClass:'',
                buttonText : '',


            }
        },
        computed : {

        },
        methods : {

            show_about(id) {

                let _this = this;
                let userId = id;

                _this.about = false;
                _this.timeline = true;
                _this.album = true;
                _this.friends = true;

                    axios.get('/get_friend_info/'+userId)
                    .then(function (response) {
                          _this.user = response.data.user;
                         _this.posts = response.data.posts;
                         _this.userImgs = response.data.userImg;
                         _this.profile = response.data.profile;
                         _this.userInterests = response.data.userInterest;
                         _this.profileImg = response.data.profileImg;

                        console.log( response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },
            show_album() {

                this.about = true;
                this.timeline = true;
                this.album = false;
                this.friends = true;
            },

            setRequestButton(status){

            console.log('Check'+ this.request_status); 
            
            if(status == 5){
              this.buttonText = 'add friend';
              this.buttonClass = 'btn-primary';
             }
             if(status == 0){
              this.buttonText = 'Request Sended';
              this.buttonClass = 'btn-info';
             }
              if(status == 1){
              this.buttonText = 'unfriend';
              this.buttonClass = 'btn-success';
             }
              if(status == 2){
              this.buttonText = 'Blocked';
              this.buttonClass = 'btn-danger';
             }
             console.log('Check 2'+ this.buttonClass); 
           },
            show_friends() {

                this.about = true;
                this.timeline = true;
                this.album = true;
                this.friends = false;
           
            },
            show_timeline() {
                this.about = true;
                this.timeline = false;
                this.album = true;
                this.friends = true;
            },
            friend_request() 
            {
                let _this = this;
               
                axios.post('/friend_request')
                    .then(function (response) {

                      //  _this.Basic_info = response.data;
                    //  _this.friend_data.push(response.data);

                     console.log(response.data);

                    })
                    .catch(function (error) {

                        console.log(error);

                    });

            },
            friendAdded(){

                let _this = this;
                let url_id = _this.url_id;

                axios.post('/friendAdded' , {'url_id' : url_id})
                    .then(function (response) {

                        console.log(response.data );

                    })
                    .catch(function (error) {

                        console.log(error);

                    });

            },
            add_friend(id , status) {
                let _this = this;
                let userId = id;

                axios.post('/addFriend/'+userId , {'status' : status})
                    .then(function (response) {

                          // _this.request_status = response.data.status;
                          // _this.sender_id = response.data.sender_id;
                          // _this.receiver_id = response.data.receiver_id;

                      console.log(response.data );

                    })
                    .catch(function (error) {

                        console.log(error);

                    });
            },

            add_friendCustom(id , status) {
                //status = -1;
                let _this = this;
                let userId = id;
                if( (status == 2) ){//for already blocked or freind request already Sended 
                  console.log('No operation');
                  return;
                }
                status = (status == 5 ? 0 : -1);

                axios.post('/addFriendCustom', {'user_id' :userId, 'status' : status})
                    .then(function (response) {
                       _this.request_status = response.data;
                      // _this.sender_id = response.data.sender_id;
                      // _this.receiver_id = response.data.receiver_id;
                       //console.log(response.data );
                      _this.setRequestButton(response.data);

                    })
                    .catch(function (error) {

                      console.log(error);

                    });
            },

            accept_request(id) {
                let _this = this;

                axios.post('accept_Request/'+userId )
                    .then(function (response) {

                        console.log(response.data );

                    })
                    .catch(function (error) {

                        console.log(error);

                    });

            },
            get_add_friend() { 
              let _this = this;
              let userId = _this.$route.params.userId;
             //  alert(userId);
                axios.get('/get_add_friend/'+userId )
                    .then(function (response) {

                      _this.request_status = response.data;
                     _this.setRequestButton(_this.request_status);
                      console.log('hello 123');
                      console.log(_this.request_status);

                    })
                    .catch(function (error) {

                        console.log(error);

                    });

            }
        },
        components : {
           // profileHeader
        }
    }
</script>
