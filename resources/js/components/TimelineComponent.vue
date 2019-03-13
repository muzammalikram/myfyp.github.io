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
                
                <button @click.prevent="get_posts()">ABCDFGH</button>

              <!-- Post Create Box
              ================================================= -->
              <div class="create-post">
                <div class="row">
                    <form>
                  <div class="col-md-7 col-sm-7">
                    <div class="form-group">
                      <img src="assets/images/users/user-1.jpg" alt="" class="profile-photo-md" />
                      <textarea v-model="captions" name="texts" id="exampleTextarea" cols="30" rows="1" class="form-control" placeholder="Write what you wish"></textarea>
                    </div>
                    <!-- =======================PREVIEW IMAGE=================== -->
                            <div v-if="price_input != true">
                                
                      <input type="text" class="form-control" name="price" placeholder="Add Price Here" v-model="price">
                              
                            </div>

<button type="button" @click.prevent="showData()">asdasds</button>

                    <!-- =======================PREVIEW IMAGE======================= -->

                  </div>
                  <div class="col-md-5 col-sm-5">
                    <div class="tools">
                      <ul class="publishing-tools list-inline">
                        <li><a href="#"><i class="ion-compose"></i></a></li>
                        <li><label for="postUpload">
                            
                            <i class="ion-images" style="font-size: 18px; cursor: pointer;"></i>


                        </label></li>
                        <li><a href="#"><i class="ion-ios-videocam"></i></a></li>
                        <li><a href="#"><i class="ion-map"></i></a></li>
                        <li>
                            <input id="add_price" type="checkbox" name="add_price" v-model="price_box" value="Y" @click="add_price()">
                        </li>
                      </ul><!-- ref="postImage" id="postUpload"  @change="ImageSaved" -->



                      <input type="file" name="file" ref="postImage" id="postUpload"  style="">
                      <button class="btn btn-primary pull-right" @click.prevent="add_post()">Publish</button>
                    </div>

                  </div>
              </form>
                </div>
              </div><!-- Post Create Box End-->


              <!--Dynamically post add-->

              <!-- Post Content
              ================================================= -->
              <div class="post-content" v-for="post in posts">

                <!--Post Date-->
                <div class="post-date hidden-xs hidden-sm">
                  <h5>Sarah</h5>
                  <p class="text-grey">Sometimes ago</p>
                </div><!--Post Date End-->

                <img v-if="post.image != null " :src="'storage/uploads/UserPost/'+post.image" alt="post-image" class="img-responsive post-image" />
                <div class="post-container">
                  <img src="assets/images/users/user-1.jpg" alt="user" class="profile-photo-md pull-left" />
                  <div class="post-detail">
                    <div class="user-info">
                      <h5><a href="timeline.html" class="profile-link">Sarah Cruiz</a> <span class="following">following</span></h5>
                      <p class="text-muted">Published a photo about 15 mins ago</p>
                    </div>
                    <div class="reaction">
                      <a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>
                      <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
                      <a class="btn btn-danger" v-if="post.price != null ">Add To Cart</a>
                    </div>
                    <div class="line-divider"></div>
                    <div class="post-text">
                      <p v-if="post.caption != null">{{ post.caption }} <i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
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

              <!--Post End here dynamically-->

              <!-- Post Content
              ================================================= -->
              <div class="post-content">

                <!--Post Date-->
                <div class="post-date hidden-xs hidden-sm">
                  <h5>Sarah</h5>
                  <p class="text-grey">Sometimes ago</p>
                </div><!--Post Date End-->

                <img src="assets/images/post-images/13.jpg" alt="post-image" class="img-responsive post-image" />
                <div class="post-container">
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

              <!-- Post Content
              ================================================= -->
              <div class="post-content">

                <!--Post Date-->
                <div class="post-date hidden-xs hidden-sm">
                  <h5>Sarah</h5>
                  <p class="text-grey">10/22/2016</p>
                </div><!--Post Date End-->

                <img src="assets/images/post-images/13.jpg" alt="post-image" class="img-responsive post-image" />
                <div class="post-container">
                  <img src="assets/images/users/user-1.jpg" alt="user" class="profile-photo-md pull-left" />
                  <div class="post-detail">
                    <div class="user-info">
                      <h5><a href="timeline.html" class="profile-link">Sarah Cruiz</a> <span class="following">following</span></h5>
                      <p class="text-muted">Yesterday</p>
                    </div>
                    <div class="reaction">
                      <a class="btn text-green"><i class="icon ion-thumbsup"></i> 49</a>
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

              <!-- Post Content
              ================================================= -->
              <div class="post-content">

                <!--Post Date-->
                <div class="post-date hidden-xs hidden-sm">
                  <h5>Sarah</h5>
                  <p class="text-grey">10/21/2016</p>
                </div><!--Post Date End-->

                <div class="post-container">
                  <img src="assets/images/users/user-1.jpg" alt="user" class="profile-photo-md pull-left" />
                  <div class="post-detail">
                    <div class="user-info">
                      <h5><a href="timeline.html" class="profile-link">Sarah Cruiz</a> <span class="following">following</span></h5>
                      <p class="text-muted">2 days ago</p>
                    </div>
                    <div class="reaction">
                      <a class="btn text-green"><i class="icon ion-thumbsup"></i> 49</a>
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
   // import { statics } from '../static_variable'

     export default {
        mounted() {
            console.log('timeline mounted.');
            // console.log(statics.countries);
            // this.countries = statics.countries;
            // this.get_posts();
            
        },
        data(){
            return {
               captions : '',
               postImg : '',
               
               countries : {},
               price_input : true,
               price_box : '',
               price : '',
               posts : {}
            }
        },
        methods : {

            showData()
            {
               // $comment = App\Comment::find(1);
                let _this = this;
                axios.get('/showData')
                    .then(function (response) {
                        console.log(response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            ImageSaved (e) {
                //console.log(e.target.files[0]);
                let _this = this;
                _this.postImg = e.target.files[0].name;
              //  console.log(this.postImg);
               // _this.postImg = e.target.files[0];
            },
            add_price()
            {
                /*let _this = this;
                if (_this.price_box = true) {

                    _this.price_input = true;
                    
                }*/
              //  alert('asd');
                this.price_input = false;
                 
                 console.log(this.price_box);
                 console.log(this.price_input);
            },
            
            add_post() {
               this.postImg = this.$refs.postImage.files[0];

 
                let _this = this;

                     let formData = new FormData();
                      formData.append('caption',  _this.captions );
                      formData.append('file' , _this.postImg); 
                      formData.append('price' , _this.price);
 

                        //console.log(formData);
                            axios.post('/addPost' , formData,
                            {
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            })
                        .then(function (response) {
                            _this.posts = response.data;
                            _this.captions = '';
                            _this.postImg = '';
                            _this.price = '';

                            console.log(response.data);
                        }).catch(function (error) {

                            console.log(error);
                    });

               // console.log(this.postImg); 
            },
            get_posts() {

                let _this = this;
                axios.get('/get_posts')
                    .then(function (response) {
                        _this.posts = response.data;
                        console.log(response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }

        },
        components: {
            profileHeader
        }
    }
</script>