<template>
    <div class="container">
          
   <div id="page-contents">
        <div class="container">
            <div class="row">
 
          <!-- Newsfeed Common Side Bar Left
          ================================================= -->
                <newsfeedsimilar></newsfeedsimilar>
                <div class="col-md-7">
                  <button type="button" @click.prevent="get_friends_comments()">aaaaa</button>

            <!-- Post Create Box
            ================================================= -->
            <div class="create-post">
                <div class="row">
                    <div class="col-md-7 col-sm-7">
                  <div class="form-group">
                    <img src="assets/images/users/user-1.jpg" alt="" class="profile-photo-md" />
                    <textarea name="texts" id="exampleTextarea" cols="30" rows="1" class="form-control" placeholder="Write what you wish"></textarea>
                  </div>
                </div>
                    <div class="col-md-5 col-sm-5">
                  <div class="tools">
                    <ul class="publishing-tools list-inline">
                      <li><a href="#"><i class="ion-compose"></i></a></li>
                      <li><a href="#"><i class="ion-images"></i></a></li>
                      <li><a href="#"><i class="ion-ios-videocam"></i></a></li>
                      <li><a href="#"><i class="ion-map"></i></a></li>
                    </ul>
                    <button class="btn btn-primary pull-right">Publish</button>
                  </div>
                </div>
                </div>
            </div><!-- Post Create Box End-->

           
       


            <!-- Post Content
            ================================================= -->
              <div class="post-content" v-for="post in posts">

              {{ post.id }}
              <img v-if="post.image != null " :src="'/storage/uploads/'+post.image" alt="post-image" class="img-responsive post-image" />
              <div class="post-container">
                <img src="assets/images/users/user-5.jpg" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail">
                  <div class="user-info">
                    <h5><a href="timeline.html" class="profile-link">Alexis Clark</a> <span class="following">following</span></h5>
                    <p class="text-muted">Published a photo about 3 mins ago</p>
                  </div>
                  <div class="reaction">
                    <a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>
                    <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>

                    <a class="btn btn-danger" v-if="post.price != null ">Add To Cart </a>
                     <a  class="profile-link" v-if="post.image != null ">Price {{ post.price }}</a>  
                  </div>
                  <div class="line-divider"></div>
                  <div class="post-text">
                    <p> {{ post.caption }}<i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
                  </div>
                  <div class="line-divider"></div>

                  <div class="post-comment" v-for="comment in comments">
                    
                    <div class="post-comment" v-if="comment.model_id == post.id">
                    <img :src="'/storage/uploads/'+userImg" alt="" class="profile-photo-sm" />
                    <p><a href="timeline.html" class="profile-link">{{ userName }} </a><i class="em em-laughing"></i> {{ comment.details }}</p>
                    </div>

                  </div>
                    <div class="post-comment"  >
                      <!--{{ post_id = post.id }}-->
                      <!--{{ userImg.image }}-->
                      <img  :src="'/storage/uploads/'+userImg" alt="" class="profile-photo-sm" />
                      <input type="text" class="form-control" placeholder="Post a comment"  >  
                    <!--   <button type="button" @click="addComment(post.id , index)">click</button>
 -->
                    </div>

                  
                </div>
              </div>
            </div>
          </div>
 

          <!-- Newsfeed Common Side Bar Right
          ================================================= -->
                <div class="col-md-2 static">
            <div class="suggestions" id="sticky-sidebar">
              <h4 class="grey">Who to Follow</h4>
              <div class="follow-user">
                <img src="assets/images/users/user-11.jpg" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Diana Amber</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="assets/images/users/user-12.jpg" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Cris Haris</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="assets/images/users/user-13.jpg" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Brian Walton</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="assets/images/users/user-14.jpg" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Olivia Steward</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="assets/images/users/user-15.jpg" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Sophia Page</a></h5>
                  <a href="#" class="text-green">Add friend</a>
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
    import newsfeedsimilar from './newsfeedSimilar'
    export default {
        mounted() {
            console.log('Component mounted.');
            this.ClickedFn();
        },
        data() {
          return {
              posts : [],
              comments : [],
              userName: '',
              userImg : ''
          }
        },
        methods : {
          ClickedFn() {
            let _this = this;
             axios.get('/get_newsFeed')
                    .then(function (response) {
                        console.log(response.data.posts);
                        _this.posts= response.data.posts;
                        _this.comments = response.data.post_action; 
                        _this.userName = response.data.userName;
                        _this.userImg = response.data.userImg.image;

                    })
                    .catch(function (error) {
                        console.log(error);
                    });
          },
          get_friends_comments() {
              let _this = this; 
              let params = { posts: _this.posts }
                
                 axios.post('/get_friends_comments' , params)
                    .then(function (response) {

                        console.log(response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
          }
        }, 
        components : {
           newsfeedsimilar
        }
    }
</script> 
