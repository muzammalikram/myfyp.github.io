
<template>
     
   <div class="col-md-3 static">
            <div class="profile-card">
                <img :src="'storage/uploads/'+userImg.image" alt="user" class="profile-photo" />
                <h5><a href="timeline.html" class="text-white">{{ userName }}</a></h5>
                <a href="#" class="text-white"><i class="ion ion-android-person-add"></i> {{ followers }} followers</a>
            </div><!--profile card ends-->
            <ul class="nav-news-feed">
                <li><i class="icon ion-ios-paper"></i><div><router-link to="/newsfeed">My Newsfeed</router-link></div></li>
              <li><i class="icon ion-ios-people"></i><div><router-link to="/friends">Friends</router-link></div></li>
              <li><i class="icon ion-ios-people-outline"></i><div><router-link to="/newsfeed">People Nearby</router-link></div></li>
              <li><i class="icon ion-chatboxes"></i><div><router-link to="/messages">Messages</router-link></div></li>
              <li><i class="icon ion-images"></i><div><router-link to="/album">Images</router-link></div></li>
            </ul><!--news-feed links ends-->
            <div id="chat-block">
              <div class="title">Chat online</div>
              <ul class="online-users list-inline">
                <li><a href="newsfeed-messages.html" title="Linda Lohan"><img src="assets/images/users/user-2.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Sophia Lee"><img src="assets/images/users/user-3.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="John Doe"><img src="assets/images/users/user-4.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Alexis Clark"><img src="assets/images/users/user-5.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="James Carter"><img src="assets/images/users/user-6.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Robert Cook"><img src="assets/images/users/user-7.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Richard Bell"><img src="assets/images/users/user-8.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Anna Young"><img src="assets/images/users/user-9.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Julia Cox"><img src="assets/images/users/user-10.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
              </ul>
            </div><!--chat block ends-->
          </div>
 
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            this.get_newsfeed_simillar();
        },
        data() {
          return {
              userName : '',
              userImg : '',
              followers : ''
          }
        },
        methods : {
          get_newsfeed_simillar(){
              let _this = this;
              axios.get('/get_user_newsfeed_similar_data' )
                  .then(function (response) {
                        _this.userName = response.data.userName;
                        _this.userImg = response.data.userImg;
                      _this.followers = response.data.followers;

                      console.log(response.data);

                  })
                  .catch(function (error) {
                      console.log(error);
                  });
          }
        } 
    }
</script>
