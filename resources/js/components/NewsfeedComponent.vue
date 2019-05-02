<template>
  <div class="container">

    <div id="page-contents">
      <div class="container">
        <div class="row">

          <!-- Newsfeed Common Side Bar Left
          ================================================= -->
          <newsfeedsimilar></newsfeedsimilar>
          <div class="col-md-7">

            <!-- Post Create Box
            ================================================= -->
            <!--       <div class="create-post">
                       <div class="row">
                           <div class="col-md-7 col-sm-7">
                         <div class="form-group">
                           <img :src="'/storage/uploads/'+userImg" alt="" class="profile-photo-md" />
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
                   </div>&lt;!&ndash; Post Create Box End&ndash;&gt;


              -->

            <!-- Post Content
            ================================================= -->


            <div v-if="posts == ''">
              <h1>No post Available</h1>
            </div>
            <div v-else class="post-content" v-for="(post , index) in posts">



              <img v-if="post.image != null " :src="'/storage/uploads/'+post.image" alt="post-image" class="img-responsive post-image" />
              <div class="post-container">
                <img :src="'storage/uploads/'+profileImg.image" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail">
                  <div class="user-info">
                    <h5><a href="timeline.html" class="profile-link">{{profileName }}</a> <span class="following">following</span></h5>
                    <p class="text-muted">Published a photo about 3 mins ago</p>
                  </div>
                  <div class="reaction">
                    <a class="btn text-green" @click.prevent="liked(post.id)"><i class="icon ion-thumbsup"></i>{{ like }}</a>
                    <a class="btn text-red" @click.prevent="disliked(post.id)"><i class="fa fa-thumbs-down"></i> 0</a>

                    <a class="btn btn-danger" v-if="post.price != null ">Add To Cart </a>
                    <a  class="profile-link" v-if="post.image != null ">Price {{ post.price }}</a>
                  </div>
                  <div class="line-divider"></div>
                  <div class="post-text">
                    <p> {{ post.caption }}<i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
                  </div>
                  <div class="line-divider"></div>

                  <div  v-for="comment in comments">

                    <div class="post-comment" v-if="comment.model_id == post.id">

                      <img :src="'/storage/uploads/'+userImg" alt="" class="profile-photo-sm" />
                      <p><a href="timeline.html" class="profile-link">{{ userName }} </a><i class="em em-laughing"></i> {{ comment.details }}</p>

                    </div>

                  </div>

                  <div class="post-comment"  >
                    <!--{{ post_id = post.id }}-->
                    <!--{{ userImg.image }}-->
                    <img  :src="'/storage/uploads/'+userImg" alt="" class="profile-photo-sm" />
                    <input type="text" class="form-control" placeholder="Post a comment" v-model="comment[index]" v-on:keyup.enter="addComment(post.id , index)"  >
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
              <!-- <div class="follow-user" v-for="follower in followers">
                <img v- :src="'storage/uploads/'+follower.user_image.image" alt="" class="profile-photo-sm pull-left" />
                <img v-else :src="'storage/uploads/'+follower.user_image.image" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Diana Amber</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div> -->
              <div class="follow-user" v-for="follower in followers">
                <img v-if="follower.user_image == null" src="storage/uploads/dummy.jpg" alt="" class="profile-photo-sm pull-left" />
                <img v-else :src="'storage/uploads/'+follower.user_image.image" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5>
                    <router-link :to="{ name: 'friendsProfile', params: { userId: follower.id }}" ><a>{{ follower.f_name }}</a></router-link>
                    <a href="timeline.html"></a></h5>
                  <!--<a href="#" class="text-green">Add friend</a>-->
                  <router-link :to="{ name: 'friendsProfile', params: { userId: follower.id }}" ><a href="#" class="text-green">Add friend</a></router-link>
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
            //  this.get_newsfeed_comments();
            this.who_to_follow();
            this.get_newsfeed_simillar();
        },
        data() {
            return {
                posts : [],
                comments : [],
                userName: '',
                userImg : '',
                comment : [],
                like : 0,
                addlike : 0,
                followers : {},
                profileName : '',
                profileImg : ''


            }
        },
        methods : {

            who_to_follow(){
                let _this = this;
                axios.get('/who_to_follow')
                    .then(function (response) {
                        console.log('asdasd');
                        _this.followers = response.data;
                        console.log(response.data);
                        // _this.userName = response.data.userName;
                        // _this.userImg = response.data.userImg.image;

                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            get_newsfeed_simillar(){
                let _this = this;
                axios.get('/get_user_newsfeed_similar_data' )
                    .then(function (response) {
                        _this.profileName = response.data.userName;
                        _this.profileImg= response.data.userImg;
                       // _this.followers = response.data.followers;

                        //console.log(response.data);

                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

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
            addComment(p_id , index) {

                let _this = this;
                let comm  = _this.comment[index];

                if (comm != "")
                {
                    let params = { post_id: p_id , comment : comm };

                    axios.post('/add_comments' , params)
                        .then(function (response) {

                            _this.comments.push(response.data);
                            comm = '';

                            //    console.log(response.data);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }
            },
            get_newsfeed_comments(){
                axios.get('/get_newsfeed_comments' , {'posts' : 'eee'})
                    .then(function (response) {

                        console.log(response.data);

                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            liked(id){
                let _this = this;
                axios.post('/liked' , {'post_id' : id})
                    .then(function (response) {

                        console.log(response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            disliked(id){
                alert(id);
            }
        },
        components : {
            newsfeedsimilar
        },
        created() {
            Echo.private('Comments')
                .listen('CommentEvent', (e) => {

                    this.comments.push(e.comment);
                    console.log(this.comments);
                    //  console.log(e.comment);
                });
        }
    }
</script> 
