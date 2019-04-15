<template>
    
    
    <div class="container">

      <!-- Timeline
      ================================================= -->
      <div class="timeline">

        <profileHeader></profileHeader>


        <div id="page-contents">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">
 
              <!--<button type="button" @click="allFriends()">all Friendss</button>-->
          

<!-- {{ imgs }} -->
              <div class="friend-list">
                <div class="row">
                  <div class="col-md-6 col-sm-6" v-for="(u, index) in users">

                    <!--{{ u.user_image }}-->



                    <div class="friend-card">
                      <img src="assets/images/covers/1.jpg" alt="profile-cover" class="img-responsive cover" />
                      <div class="card-info">

                        <img v-if="u.user_image == null" src="storage/uploads/dummy.jpg" alt="No image of this user" class="profile-photo-lg">
                        <img v-else :src="'storage/uploads/'+u.user_image.image" alt="user" class="profile-photo-lg" />
                      <!--  &lt;!&ndash;   {{ imgs[index].image }} &ndash;&gt;-->


                        <div class="friend-info">
                          <a href="#" class="pull-right text-green">My Friend</a>
                          <h5><router-link :to="{ name: 'friendsProfile', params: { userId: u.id }}" ><a class="profile-link" to="friendsProfile/1">{{ u.f_name }}</a></router-link>

                        </h5>
                          <p >Student at {{ profile[index].university }}</p>
                        </div>
                      </div>
                    </div>



                  </div>
                </div>


                <!--   <div class="col-md-6 col-sm-6">
                  <div class="friend-card">
                    <img src="assets/images/covers/3.jpg" alt="profile-cover" class="img-responsive cover" />
                    <div class="card-info">
                      <img src="assets/images/users/user-4.jpg" alt="user" class="profile-photo-lg" />
                      <div class="friend-info">
                        <a href="#" class="pull-right text-green">My Friend</a>
                        <h5><a href="timeline.html" class="profile-link">John Doe</a></h5>
                        <p>Traveler</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="friend-card">
                    <img src="assets/images/covers/4.jpg" alt="profile-cover" class="img-responsive cover" />
                    <div class="card-info">
                      <img src="assets/images/users/user-10.jpg" alt="user" class="profile-photo-lg" />
                      <div class="friend-info">
                        <a href="timeline.html" class="pull-right text-green">My Friend</a>
                        <h5><a href="#" class="profile-link">Julia Cox</a></h5>
                        <p>Art Designer</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="friend-card">
                    <img src="assets/images/covers/5.jpg" alt="profile-cover" class="img-responsive cover" />
                    <div class="card-info">
                      <img src="assets/images/users/user-7.jpg" alt="user" class="profile-photo-lg" />
                      <div class="friend-info">
                        <a href="#" class="pull-right text-green">My Friend</a>
                        <h5><a href="timelime.html" class="profile-link">Robert Cook</a></h5>
                        <p>Photographer at Photography</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="friend-card">
                    <img src="assets/images/covers/6.jpg" alt="profile-cover" class="img-responsive cover" />
                    <div class="card-info">
                      <img src="assets/images/users/user-8.jpg" alt="user" class="profile-photo-lg" />
                      <div class="friend-info">
                        <a href="#" class="pull-right text-green">My Friend</a>
                        <h5><a href="timeline.html" class="profile-link">Richard Bell</a></h5>
                        <p>Graphic Designer at Envato</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="friend-card">
                    <img src="assets/images/covers/7.jpg" alt="profile-cover" class="img-responsive cover" />
                    <div class="card-info">
                      <img src="assets/images/users/user-2.jpg" alt="user" class="profile-photo-lg" />
                      <div class="friend-info">
                        <a href="#" class="pull-right text-green">My Friend</a>
                        <h5><a href="timeline.html" class="profile-link">Linda Lohan</a></h5>
                        <p>Software Engineer</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="friend-card">
                    <img src="assets/images/covers/8.jpg" alt="profile-cover" class="img-responsive cover" />
                    <div class="card-info">
                      <img src="assets/images/users/user-9.jpg" alt="user" class="profile-photo-lg" />
                      <div class="friend-info">
                        <a href="#" class="pull-right text-green">My Friend</a>
                        <h5><a href="timeline.html" class="profile-link">Anna Young</a></h5>
                        <p>Musician</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="friend-card">
                    <img src="assets/images/covers/9.jpg" alt="profile-cover" class="img-responsive cover" />
                    <div class="card-info">
                      <img src="assets/images/users/user-6.jpg" alt="user" class="profile-photo-lg" />
                      <div class="friend-info">
                        <a href="#" class="pull-right text-green">My Friend</a>
                        <h5><a href="timeline.html" class="profile-link">James Carter</a></h5>
                        <p>CEO at IT Farm</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="friend-card">
                    <img src="assets/images/covers/10.jpg" alt="profile-cover" class="img-responsive cover" />
                    <div class="card-info">
                      <img src="assets/images/users/user-5.jpg" alt="user" class="profile-photo-lg" />
                      <div class="friend-info">
                        <a href="#" class="pull-right text-green">My Friend</a>
                        <h5><a href="timeline.html" class="profile-link">Alexis Clark</a></h5>
                        <p>Traveler</p>
                      </div>
                    </div>
                  </div>
                </div> -->
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
            this.allFriends();
        },
        data() {
            return {
                users : [],
                profile : [],
                imgs : []
            }
        },
        methods : {
            allFriends() {
//                alert('d');
                let _this = this;
                axios.post('/all_friends')
                    .then(function (response) {
                          _this.users = response.data.all_friends;
                      //   _this.users.push(response.data.Profiles);
                        _this.profile = response.data.Profiles;
                      //  _this.imgs = response.data.images;

                    //    _this.imgs[_this.imgs.length - 1];



                        console.log(response.data.all_friends);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        components : {
            profileHeader
        }
    }
</script>
