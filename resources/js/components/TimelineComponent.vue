<template>
    
    
     <div class="container">

      <!-- Timeline
      ================================================= -->
      <div class="timeline">
            
 <profileHeader @added="get_posts"></profileHeader>

        <div id="page-contents">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">
                
                <!-- <button @click.prevent="loadMore()">ABCDFGH</button> -->
              <!--{{ postProfile.image }}-->

              <!-- Post Create Box ================================================= -->

              <div class="create-post">
                <div class="row">
                    <form>
                  <div class="col-md-7 col-sm-7">
                    <div class="form-group">
                      <img :src="'storage/uploads/'+postProfile.image" alt="" class="profile-photo-md" />
                      <textarea v-model="captions" name="texts" id="exampleTextarea" cols="30" rows="1" class="form-control" placeholder="Write what you wish"></textarea>
                    </div>
                    <!-- =======================PREVIEW IMAGE=================== -->
                            <div v-if="price_input" >
                                
                      <input type="text" class="form-control" name="price" placeholder="Add Price Here" v-model="price">
                              
                            </div>

<!-- <button type="button" @click.prevent="get_posts()">asdasds</button> -->

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
                            <input id="add_price" type="checkbox" name="add_price"   value="Y" v-on:click="price_input = !price_input" >
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
              <div class="post-content" v-for="(post , index) in posts">

                {{ post.id }}
                <!--Post Date-->
                <div class="post-date hidden-xs hidden-sm">
                  <h5>Sarah</h5>
                  <p class="text-grey">Sometimes ago</p>
                </div><!--Post Date End-->

                <img v-if="post.image != null " :src="'storage/uploads/UserPost/'+post.image" alt="post-image" class="img-responsive post-image" />
                <div class="post-container">
                  <img :src="'storage/uploads/'+postProfile.image" alt="user" class="profile-photo-md pull-left" />
                  <div class="post-detail">
                    <div class="user-info">
                      <h5><a href="timeline.html" class="profile-link">Sarah Cruiz</a> <span class="following">following</span></h5>
                      <p class="text-muted">Published a photo about 15 mins ago</p>
                    </div>
                    <div class="reaction">
                      <a class="btn text-green"><i class="icon ion-thumbsup"></i></a>
                      <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
                      <a class="btn btn-danger" v-if="post.price != null ">Add To Cart</a>
                    </div>
                    <div class="line-divider"></div>
                    <div class="post-text">
                      <p v-if="post.caption != null">{{ post.caption }} <i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
                    </div>
                    <div class="line-divider"></div>

                    <div  v-for="(comments , index) in post_comments">
                      <div class="post-comment" v-if="comments.model_id == post.id">
                        <img :src="'storage/uploads/'+userImg.image" alt="" class="profile-photo-sm" />
                        <p><a href="timeline.html" class="profile-link"> {{ userName }} </a><i class="em em-laughing"></i> {{ comments.details }}</p>
                      </div>
                    </div>


                    <div class="post-comment"  >
                      <!--{{ post_id = post.id }}-->
                      <!--{{ userImg.image }}-->
                      <img  :src="'storage/uploads/'+userImg.image" alt="" class="profile-photo-sm" />
                      <input type="text" class="form-control" placeholder="Post a comment" v-model="comment[index]" v-on:keyup.enter="addComment(post.id , index)" > {{ post.id }} <b>{{ index }}</b>
                    <!--   <button type="button" @click="addComment(post.id , index)">click</button>
 -->
                    </div>
                  </div>
                </div>
              



              </div>

    <!-- <infinite-loading @distance="1" @infinite="infiniteHandler"></infinite-loading> -->

 

              
              <!--Post End here dynamically-->

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
   // import infiniteScroll from 'vue-infinite-scroll'
   // import { statics } from '../static_variable'

     export default {
     

        mounted() {
            console.log('timeline mounted.');
 
            // console.log(statics.countries);
            // this.countries = statics.countries;
               this.get_posts();
             this.get_comments(); 
             //this.loadMore();
            
            
        },
        data(){
            return {
               captions : '',
               postImg : '',
               
               countries : {},
               price_input : false,
               price_box : '',
               price : '',
               posts : [],
                postProfile : {},
                comment : [],
                post_comments : [],
                like : 0,
                dislike : 0,
                userImg : '',
                post_index : [],
                userName : '',
                 page: 1 
            }
        },
         computed: {

         },
        methods : {


            //           infiniteHandler($state) {

            //     let _this = this;

            //     axios.get('/get_posts?page='+_this.page)
            //         .then(function (response) {

            //             // if (response.data.count > 5) {
                            
            //             // } 
            //             _this.posts = response.data.posts;
            //             //_this.posts.push(response.data.posts);
            //             console.log('Record count');
            //         //    console.log(_this.postProfile);
            //           //   _this.postProfile.push(response.data.userImg);
            //             $state.loaded();
                        
            //             console.log(_this.posts);

            //         })
            //         .catch(function (error) {
            //             console.log(error);
            //         }); 
            // },

 
          addComment(id , index){
            //alert(this.comment);
        //      console.log(index);
               let comm  = this.comment[index];
        //         console.log(com);
              let _this = this;
              let post_id = id;
              //let comment = _this.comment;
              let like = _this.like;
              let dislike = _this.dislike;

             // array.indexOf(2);

              axios.post('/post_action/'+post_id , { 'comment' : comm })
                  .then(function (response) {

                      _this.post_comments = response.data.result;
                    _this.comment[index] = '';
                    _this.userImg = response.data.userImg;
                    _this.userName = response.data.userName;

                   //  console.log(_this.post_comments);
                  })
                  .catch(function (error) {
                      console.log(error);
                  });





          },

             get_comments(){
               let  _this = this;
                axios.post('/all_comments/')
                    .then(function (response) {
                         _this.post_comments = response.data.comments;
                        _this.userImg = response.data.userImg;
                        _this.userName = response.data.userName;

 console.log(response.data.comments);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });



            },

           /* get_friends_comments() {
                let _this = this;
                let params = {posts: _this.posts}

                axios.post('/get_friends_comments', params)
                    .then(function (response) {

                        console.log(response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },*/

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
                 
            //     console.log(this.price_box);
              //   console.log(this.price_input);
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

                      //      console.log(response.data);
                            _this.$toast.success({
                                        title:'Success',
                                        message:'Post Added successfully'
                                    })

                        }).catch(function (error) {
                                  _this.$toast.error({
                                        title:'Failed',
                                        message:'Post Failed'
                                    })
                            console.log(error);
                    });

               // console.log(this.postImg); 
            },
            get_posts(img = null) {

                let _this = this;
                axios.get('/get_posts')
                    .then(function (response) {
                        _this.posts = response.data.posts;
                        _this.postProfile = response.data.userImg;
                   //     console.log(response.data.userImg);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }

        },
        components: {
            profileHeader
        },
         created() {
             Echo.private('Comments')
                 .listen('CommentEvent', (e) => {

                     this.post_comments.push(e.comment);
                     console.log(this.comments);
                     //  console.log(e.comment);
                 });
         }
    }
</script>