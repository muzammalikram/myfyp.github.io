


<template>


		<div class="timeline-cover">
 
                    <!--Timeline Menu for Large Screens-->
                    <div class="timeline-nav-bar hidden-sm hidden-xs">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile-info">
                                    <label for="imagUpload">
                                        <img :src="'/storage/uploads/'+userImg" alt="" class="img-responsive profile-photo" />
                                    </label>
                                    <input type="file" name="file" ref="file" id="imagUpload"  @change="ImageUploaded()" style="display: none;">
                                    <h3 v-if="profile.f_name != '' ">{{ user.f_name }}</h3>
                                 
                                    <p class="text-muted">{{ profile.work_designation }}</p>
                                
                                </div>
                            </div>
                            <div class="col-md-9">
                                <ul class="list-inline profile-menu">
                                    <li><router-link to="/timeline">Timeline</router-link></li>

                                <li><router-link to="/about">About</router-link></li>
                                <li><router-link to="/album">Album</router-link></li>
                                <li><router-link to="/profile">Profile</router-link></li>
                                   
                                <li><router-link to="/friends">Friends</router-link></li>
                                </ul>
                                <ul class="follow-me list-inline">
                                    <li style="margin-top: 8px;">{{ followers }} people following you</li>

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
                                
                                <li><router-link to="/about">About</router-link></li>
                                <li><router-link to="/album">Album</router-link></li>
                                
                                <li><router-link to="/friends">Fiends</router-link></li>
                                <li><router-link to="/profile">Profile</router-link></li>

                            </ul>
                            <button class="btn-primary" >Add Friend</button>

                        </div>
                    </div><!--Timeline Menu for Small Screens End-->

                </div>


</template>

<script>
    export default {
        mounted() {
            console.log('ProfileHeader mounted.');
            // let userId = $('meta[name="userId"]').attr('content');
            // alert(userId);
            this.getImage();
        },
        data(){
            return {
                profileImg : '',
                userImg : '',
                profile : {},
                user : {},
                followers : '',
            }
        },
        methods : {
        	getImage() {
                  let _this = this;
                axios.get('/get_Image')
                    .then(function (response) {
                         _this.userImg =  response.data.get_image.image;
                         _this.profile = response.data.get_profile;
                         _this.user = response.data.user;
                         _this.followers = response.data.followers;
                        console.log(response.data.get_image);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }, 

              ImageUploaded() {

                    this.userImg = this.$refs.file.files[0];                 
                    let _this = this;

                     let formData = new FormData();
                     formData.append('file', _this.userImg);
 
                        //console.log(formData);
                            axios.post('/userImage' , formData,
                            {
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            })
                        .then(function (response) {
                            //_this.images = response.data;
                            if (response.data == "no_image.jpg") {
                                //alert('Sorry Image Uploaded Failed');
                                 _this.$toast.error({
                                        title:'Error',
                                        message:'Sorry Image Uploaded Failed'
                                    })
                            }
                            else
                            { 
                                _this.userImg =  response.data;
                                 _this.$emit('added' , _this.userImg);
                                 
                                 _this.$toast.success({
                                        title:'Success',
                                        message:'Image Uploaded Successfully'
                                    }) 
                            } 
                        }).catch(function (error) {
                                    _this.$toast.error({
                                        title:'Error',
                                        message:'Sorry Image Uploaded Failed'
                                    })
                            console.log(error);
                    });
            }
        }
    }
</script>




