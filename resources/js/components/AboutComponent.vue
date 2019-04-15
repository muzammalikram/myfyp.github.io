<template>
    
    
    <div class="container">

      <!-- Timeline
      ================================================= -->
      <div class="timeline" >
         <profileHeader></profileHeader>

          <!--Timeline Menu for Large Screens-->
         <!-- <header></header>-->
          <!--Timeline Menu for Small Screens-->
          <div class="navbar-mobile hidden-lg hidden-md">
            <div class="profile-info">
              <img src="images/users/user-1.jpg" alt="" class="img-responsive profile-photo" />
              <h4>Sarah Cruiz</h4>
              <p class="text-muted">Creative Director</p>
            </div>
            <div class="mobile-menu">
              <ul class="list-inline">
                <li><a href="timline.html">Timeline</a></li>
                <li><a href="timeline-about.html" class="active">About</a></li>
                <li><a href="timeline-album.html">Album</a></li>
                <li><a href="timeline-friends.html">Friends</a></li>
              </ul>
              <button class="btn-primary">Add Friend</button>
            </div>
          </div><!--Timeline Menu for Small Screens End-->

        </div>
        <div id="page-contents" v-if="load == 1">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">

              <!-- About
              ================================================= -->
              <div class="about-profile"  >

                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>Personal Information</h4>

              <button type="button" @click.prevent="Testing()">Testing</button>
                  <p>{{ user.description }}</p>
                </div>
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-briefcase-outline icon-in-title"></i>Work Experiences</h4>
                  <div class="organization">

                    <div class="work-info">
                      <h5>{{ profile.work_company }}</h5>
                      <p>{{ profile.work_designation }} <br><span class="text-grey">
                        {{ profile.work_from }} To {{ profile.work_to }}</span></p>
                    </div>
                  </div>


                </div>
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-location-outline icon-in-title"></i>Location</h4>
                  <p>{{ profile.work_city }}</p>
                 <!-- <div class="google-maps">
                    <div id="map" class="map"></div>
                  </div>-->
                </div>

                <div class="edit-block">
                  <ul class="list-inline interests">
                    <li v-for="userInterest in userInterests">
                      <span> {{ userInterest.interest }}</span>
                    </li>
                  </ul>
                  <div class="line"></div>

                </div>

               <!-- <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-heart-outline icon-in-title"></i>Interests</h4>

                </div>-->
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-chatbubble-outline icon-in-title"></i>Language</h4>
                  <ul>
                    <li><a href="#">Russian</a></li>
                    <li><a href="#">English</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-2 static">
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
  import profileHeader from './ProfileHeader.vue'
    export default {
        mounted() {
            console.log('Component mounted.');
            this.get_about();
        },
        data() {
            return {
              user : {},
                load : 0,
                profile : {},
                userInterests : {},


            }
        },
        methods : {

          Testing(){
                let _this = this;
  alert('sad');
                axios.post('http://127.0.0.1:9000/api/registered')
                  .then(function (response) {
                      console.log( response.data);
                  })
                  .catch(function (error) {
                      console.log(error);
                  });
          },
          get_about() {
              let _this = this;

              _this.$Progress.start();
 

              axios.get('/get_user_info')
                  .then(function (response) {

                      _this.user = response.data.user;


                      _this.profile = response.data.profile;
                      _this.userInterests = response.data.userInterest;

                      _this.$Progress.finish();
                       _this.load = 1;
                      console.log( response.data);
                  })
                  .catch(function (error) {
                      _this.$Progress.fail();
                      console.log(error);
                  });

             // this.$Progress.finish();
          }
        },
        components : {
            profileHeader
        }
    }
</script>
