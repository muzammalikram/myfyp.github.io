
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
