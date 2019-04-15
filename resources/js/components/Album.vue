<template>
    
     <div class="container">

      <!-- Timeline
      ================================================= -->
      <div class="timeline">
        
    
        <profileHeader @added="imgInAlbum"></profileHeader>


        <div id="page-contents">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">

              <!-- Photo Album:src="user_image.image"
              ================================================= -->
  
              <ul class="album-photos">

                <li v-for="(user_image , index ) in images">
                  <div class="img-wrapper" data-toggle="modal" :data-target="'#'+index">
                    <img v-bind:src="'storage/uploads/' + user_image.image" alt="photo" style="width: 200px; height: 150px;" /> <br>
                  </div>

                  <div class="modal fade" :id="index"  tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <img v-bind:src="'storage/uploads/'+ user_image.image" alt="photo" />
                      </div>
                    </div>
                  </div>
                </li>

              </ul>
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
            console.log('Album mounted.');
            this.get_all_images();
            //this.getProfileImage();
        },
        data(){
            return {
                images : []
            }
        },
        methods : {
            get_all_images() {
                
                let _this = this;
                axios.get('/get_all_images')
                    .then(function (response) { 
                        _this.images = response.data; 
                        console.log(response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            imgInAlbum(img)
            {
               let _this = this;
              //  this.images.push(img); 
              // console.log(img);
                  axios.get('/get_all_images')
                    .then(function (response) { 
                        _this.images = response.data; 
                      //  console.log(response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },
            ImageDelete(id)
            {
                  alert(id);
            }


        },
        components: {
            profileHeader
        }
    }
</script>
