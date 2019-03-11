


<template>
    
		<div class="timeline-cover">
 
                    <!--Timeline Menu for Large Screens-->
                    <div class="timeline-nav-bar hidden-sm hidden-xs">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile-info">

                                        <img :src="'/storage/uploads/'+userImg" alt="" class="img-responsive profile-photo" />


                                    <h3>Sarah Cruiz</h3>
                                    <p class="text-muted">Creative Director</p>
                                
                                </div>
                            </div>
                            <div class="col-md-9">
                                <ul class="list-inline profile-menu">
                                   <!-- <li><router-link to="/timeline">Timeline</router-link></li>-->

                                 <li><router-link to="/friend_about">About</router-link></li>
                                <li><router-link to="/friend_album">Album</router-link></li>
                                 <li><router-link to="/profile">Profile</router-link></li>
                                   
                                <li><router-link to="/friends">Friends</router-link></li>
                                </ul>
                                <ul class="follow-me list-inline">
                                    <li>1,299 people following her</li>
                                  <!-- v-if="id == auth.id" -->   <li><button class="btn-primary">Add Friend</button></li>

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


</template>

<script>
    export default {
        mounted() {
            console.log('ProfileHeader mounted.');
            this.getImage();
        },
        data(){
            return {
                profileImg : '',
                userImg : ''
            }
        },
        methods : {
        	getImage() {
                  let _this = this;
                axios.get('/get_friend_Image')
                    .then(function (response) {
                        _this.userImg =  response.data.image;
                       // console.log(response.data.image);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>




