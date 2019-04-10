<template>


    <div>
        <div id="page-contents">
            <div class="container">
                <div class="row">

                    <!-- Newsfeed Common Side Bar Left
              ================================================= -->
                    <div class="col-md-3 static">
                        <div class="profile-card">
                            <img src="assets/images/users/user-1.jpg" alt="user" class="profile-photo"/>
                            <h5><a href="timeline.html" class="text-white">Sarah Cruiz</a></h5>
                            <button type="button" @click.prevent="message_sent()">Click to sent</button>
                            <a href="#" class="text-white"><i class="ion ion-android-person-add"></i> 1,299
                                followers</a>
                        </div><!--profile card ends-->
                        <ul class="nav-news-feed">
                            <li><i class="icon ion-ios-paper"></i>
                                <div><a href="newsfeed.html">My Newsfeed</a></div>
                            </li>
                            <li><i class="icon ion-ios-people"></i>
                                <div><a href="newsfeed-people-nearby.html">People Nearby</a></div>
                            </li>
                            <li><i class="icon ion-ios-people-outline"></i>
                                <div><a href="newsfeed-friends.html">Friends</a></div>
                            </li>
                            <li><i class="icon ion-chatboxes"></i>
                                <div><a href="newsfeed-messages.html">Messages</a></div>
                            </li>
                            <li><i class="icon ion-images"></i>
                                <div><a href="newsfeed-images.html">Images</a></div>
                            </li>
                            <li><i class="icon ion-ios-videocam"></i>
                                <div><a href="newsfeed-videos.html">Videos</a></div>
                            </li>
                        </ul><!--news-feed links ends-->
                        <div id="chat-block">
                            <div class="title">Chat online</div>
                            <ul class="online-users list-inline">
                                <li><a href="newsfeed-messages.html" title="Linda Lohan"><img
                                        src="assets/images/users/user-2.jpg" alt="user"
                                        class="img-responsive profile-photo"/><span class="online-dot"></span></a></li>
                                <li><a href="newsfeed-messages.html" title="Sophia Lee"><img
                                        src="assets/images/users/user-3.jpg" alt="user"
                                        class="img-responsive profile-photo"/><span class="online-dot"></span></a></li>
                                <li><a href="newsfeed-messages.html" title="John Doe"><img
                                        src="assets/images/users/user-4.jpg" alt="user"
                                        class="img-responsive profile-photo"/><span class="online-dot"></span></a></li>
                                <li><a href="newsfeed-messages.html" title="Alexis Clark"><img
                                        src="assets/images/users/user-5.jpg" alt="user"
                                        class="img-responsive profile-photo"/><span class="online-dot"></span></a></li>
                                <li><a href="newsfeed-messages.html" title="James Carter"><img
                                        src="assets/images/users/user-6.jpg" alt="user"
                                        class="img-responsive profile-photo"/><span class="online-dot"></span></a></li>
                                <li><a href="newsfeed-messages.html" title="Robert Cook"><img
                                        src="assets/images/users/user-7.jpg" alt="user"
                                        class="img-responsive profile-photo"/><span class="online-dot"></span></a></li>
                                <li><a href="newsfeed-messages.html" title="Richard Bell"><img
                                        src="assets/images/users/user-8.jpg" alt="user"
                                        class="img-responsive profile-photo"/><span class="online-dot"></span></a></li>
                                <li><a href="newsfeed-messages.html" title="Anna Young"><img
                                        src="assets/images/users/user-9.jpg" alt="user"
                                        class="img-responsive profile-photo"/><span class="online-dot"></span></a></li>
                                <li><a href="newsfeed-messages.html" title="Julia Cox"><img
                                        src="assets/images/users/user-10.jpg" alt="user"
                                        class="img-responsive profile-photo"/><span class="online-dot"></span></a></li>
                            </ul>
                        </div><!--chat block ends-->
                    </div>
                    <div class="col-md-7">

                        <!-- Post Create Box
                        ================================================= -->
                        <div class="create-post">
                            <div class="row">
                                <div class="col-md-7 col-sm-7">
                                    <div class="form-group">
                                        <img src="assets/images/users/user-1.jpg" alt="" class="profile-photo-md"/>
                                        <textarea name="texts" id="exampleTextarea" cols="30" rows="1"
                                                  class="form-control" placeholder="Write what you wish"></textarea>
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
                        </div><!-- Post Create Box End -->

                        <!-- Chat Room
                        ================================================= -->
                        <div class="chat-room">
                            <div class="row">
                                <div class="col-md-5">

                                    <!-- Contact List in Left-->
                                    <ul class="nav nav-tabs contact-list scrollbar-wrapper scrollbar-outer">
                                        <!--<div >-->

                                        <li v-for="friend in friends" :class="{active : isActive}" v-on:click="input_show = true">

                                            <a :href="'#content'+friend.id" data-toggle="tab"
                                               @click="sender_div(friend.id)">
                                                <div class="contact">
                                                    <img src="assets/images/users/user-2.jpg" alt=""
                                                         class="profile-photo-sm pull-left"/>
                                                    <div class="msg-preview">
                                                        <h6>{{ friend.f_name }}</h6>
                                                        <p class="text-muted">hello</p>
                                                        <small class="text-muted">a min ago</small>
                                                        <div class="chat-alert">1</div>
                                                    </div>
                                                </div>
                                            </a>

                                        </li>

                                        <!--</div>-->

                                        <!--<li>-->
                                        <!--<a href="#contact-2" data-toggle="tab">-->
                                        <!--<div class="contact">-->
                                        <!--<img src="assets/images/users/user-10.jpg" alt="" class="profile-photo-sm pull-left"/>-->
                                        <!--<div class="msg-preview">-->
                                        <!--<h6>Julia Cox</h6>-->
                                        <!--<p class="text-muted">see you soon</p>-->
                                        <!--<small class="text-muted">an hour ago</small>-->
                                        <!--<div class="seen"><i class="icon ion-checkmark-round"></i></div>-->
                                        <!--</div>-->
                                        <!--</div>-->
                                        <!--</a>-->
                                        <!--</li>-->

                                    </ul><!--Contact List in Left End-->

                                </div>
                                <div class="col-md-7">

                                    <!--Chat Messages in Right-->
                                    <div class="tab-content scrollbar-wrapper wrapper scrollbar-outer" v-chat-scroll>


                                        <div class=" ">

                                            <div class="chat-body">

                                                <ul class="chat-message" v-chat-scroll>

                                                    <div v-for="(message ,index) in chat.message_all">


                                                    <div v-if="message.sender_id == auth_id">

                                                        <li class="right" > <!-- -->


                                                            <div class="chat-item">
                                                               <!-- <div class="chat-item-header">
                                                                    <h5 style="margin-left: 35px;">{{ chat.user[index]
                                                                        }}</h5>
                                                                    <small class="text-muted">{{ chat.time[index] }}
                                                                    </small>
                                                                </div>-->
                                                                <p>{{ message.message }}
                                                                    <small>{{ chat.time[index] }}</small>
                                                                </p>

                                                            </div>

                                                        </li>
                                                       <!-- <span class="badge badge-primary">{{ typing }}</span>-->
                                                    </div>

                                                    <div v-else>

                                                        <li class="left">


                                                            <div class="chat-item">
                                                                <!--<div class="chat-item-header">
                                                                    <h5>{{ chat.user[index] }}</h5>
                                                                    <small class="text-muted"
                                                                           style="margin-right: 25px;">{{
                                                                        chat.time[index] }}
                                                                    </small>
                                                                </div>-->
                                                                <p><i class="em em-hand"></i>{{ message.message }}
                                                                    <small>{{ chat.time[index] }}</small>
                                                                </p>


                                                            </div>

                                                        </li>
                                                    </div>

                                                    </div>


                                                    <!--<span class="badge badge-primary" v-if="">{{ typing }}</span>-->

                                                </ul>


                                            </div>

                                        </div>


                                        <div class="tab-pane" id="contact-6">
                                            <div class="chat-body">
                                                <ul class="chat-message">
                                                    <li class="left">
                                                        <img src="assets/images/users/user-8.jpg" alt=""
                                                             class="profile-photo-sm pull-left"/>
                                                        <div class="chat-item">
                                                            <div class="chat-item-header">
                                                                <h5>Richard Bell</h5>
                                                                <small class="text-muted">2 days ago</small>
                                                            </div>
                                                            <p>Hello</p>
                                                        </div>
                                                    </li>
                                                    <li class="left">
                                                        <img src="assets/images/users/user-8.jpg" alt=""
                                                             class="profile-photo-sm pull-left"/>
                                                        <div class="chat-item">
                                                            <div class="chat-item-header">
                                                                <h5>Richard Bell</h5>
                                                                <small class="text-muted">2 days ago</small>
                                                            </div>
                                                            <p>Hi</p>
                                                        </div>
                                                    </li>
                                                    <li class="left">
                                                        <img src="assets/images/users/user-8.jpg" alt=""
                                                             class="profile-photo-sm pull-left"/>
                                                        <div class="chat-item">
                                                            <div class="chat-item-header">
                                                                <h5>Richard Bell</h5>
                                                                <small class="text-muted">2 days ago</small>
                                                            </div>
                                                            <p>Hey</p>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div><!--Chat Messages in Right End-->

                                    <div class="send-message" v-if="input_show">
                                        <div class="input-group">

                                            <input type="text" class="form-control" placeholder="Type your message"
                                                   v-model="message" @keyup.enter="send()" :id="user_id">

                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Newsfeed Common Side Bar Right
              ================================================= -->
                    <div class="col-md-2 static">
                        <div class="suggestions" id="sticky-sidebar">
                            <h4 class="grey">Who to Follow</h4>
                            <div class="follow-user">
                                <img src="assets/images/users/user-11.jpg" alt="" class="profile-photo-sm pull-left"/>
                                <div>
                                    <h5><a href="timeline.html">Diana Amber</a></h5>
                                    <a href="#" class="text-green">Add friend</a>
                                </div>
                            </div>
                            <div class="follow-user">
                                <img src="assets/images/users/user-12.jpg" alt="" class="profile-photo-sm pull-left"/>
                                <div>
                                    <h5><a href="timeline.html">Cris Haris</a></h5>
                                    <a href="#" class="text-green">Add friend</a>
                                </div>
                            </div>
                            <div class="follow-user">
                                <img src="assets/images/users/user-13.jpg" alt="" class="profile-photo-sm pull-left"/>
                                <div>
                                    <h5><a href="timeline.html">Brian Walton</a></h5>
                                    <a href="#" class="text-green">Add friend</a>
                                </div>
                            </div>
                            <div class="follow-user">
                                <img src="assets/images/users/user-14.jpg" alt="" class="profile-photo-sm pull-left"/>
                                <div>
                                    <h5><a href="timeline.html">Olivia Steward</a></h5>
                                    <a href="#" class="text-green">Add friend</a>
                                </div>
                            </div>
                            <div class="follow-user">
                                <img src="assets/images/users/user-15.jpg" alt="" class="profile-photo-sm pull-left"/>
                                <div>
                                    <h5><a href="timeline.html">Sophia Page</a></h5>
                                    <a href="#" class="text-green">Add friend</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="chat-block">
                <div class="title">Chat online</div>
                <ul class="online-users list-inline">
                    <li><a href="newsfeed-messages.html" title="Linda Lohan"><img src="assets/images/users/user-2.jpg"
                                                                                  alt="user"
                                                                                  class="img-responsive profile-photo"/><span
                            class="online-dot"></span></a></li>
                    <li><a href="newsfeed-messages.html" title="Sophia Lee"><img src="assets/images/users/user-3.jpg"
                                                                                 alt="user"
                                                                                 class="img-responsive profile-photo"/><span
                            class="online-dot"></span></a></li>
                    <li><a href="newsfeed-messages.html" title="John Doe"><img src="assets/images/users/user-4.jpg"
                                                                               alt="user"
                                                                               class="img-responsive profile-photo"/><span
                            class="online-dot"></span></a></li>
                    <li><a href="newsfeed-messages.html" title="Alexis Clark"><img src="assets/images/users/user-5.jpg"
                                                                                   alt="user"
                                                                                   class="img-responsive profile-photo"/><span
                            class="online-dot"></span></a></li>
                    <li><a href="newsfeed-messages.html" title="James Carter"><img src="assets/images/users/user-6.jpg"
                                                                                   alt="user"
                                                                                   class="img-responsive profile-photo"/><span
                            class="online-dot"></span></a></li>
                    <li><a href="newsfeed-messages.html" title="Robert Cook"><img src="assets/images/users/user-7.jpg"
                                                                                  alt="user"
                                                                                  class="img-responsive profile-photo"/><span
                            class="online-dot"></span></a></li>
                    <li><a href="newsfeed-messages.html" title="Richard Bell"><img src="assets/images/users/user-8.jpg"
                                                                                   alt="user"
                                                                                   class="img-responsive profile-photo"/><span
                            class="online-dot"></span></a></li>
                    <li><a href="newsfeed-messages.html" title="Anna Young"><img src="assets/images/users/user-9.jpg"
                                                                                 alt="user"
                                                                                 class="img-responsive profile-photo"/><span
                            class="online-dot"></span></a></li>
                    <li><a href="newsfeed-messages.html" title="Julia Cox"><img src="assets/images/users/user-10.jpg"
                                                                                alt="user"
                                                                                class="img-responsive profile-photo"/><span
                            class="online-dot"></span></a></li>
                </ul>
            </div><!--chat block ends-->

        </div>


    </div>


</template>

<style scoped>
    .active{
        border: 1px solid #8dc63f;
    }
</style>
<script>
    export default {
        mounted() {
            console.log('Component mounted.');
            this.get_friends();

            let userId = document.head.querySelector('meta[name="userId"]').content;
            this.auth_id = userId;

        },
        data() {
            return {
                message: '',
                friends: {},
                typing: '',
                auth_id  : '',
                user_id : '',
                input_show : false,
                isActive : false,
                chat: {
                    message_all: [],
                    user: [],
                    time: []
                }

            }
        },
        watch: {
            message() {
                Echo.private('Chat')
                    .whisper('typing', {
                        name: this.message
                    });
            }
        },
        methods: {
            send() {

                //    alert(id);
                if (this.message.length != 0) {
                    let _this = this;

                    this.chat.message_all.push(this.message);

                    _this.chat.user.push('you');
                    _this.chat.time.push(_this.getTime());
                    //    console.log(this.message);

                    axios.post('send_message', {'message': _this.message , 'user_id' : _this.user_id})
                        .then(function (response) {
                            _this.message = '';
                            _this.sender_div(_this.user_id);
                            console.log(response.data);

                        })
                        .catch(function (error) {
                            console.log(error);
                        });

                }


            },
            sender_div(id) {
                //alert(id);
                let _this = this;
                _this.user_id = id;
                axios.get('getUserMessages/' + id)
                    .then(function (response) {
                        _this.chat.message_all = response.data;
                        console.log(_this.chat.message_all);

                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            getTime() {
                let time = new Date();
                return time.getHours() + ':' + time.getMinutes();
            },

            message_sent() {
                let _this = this;
                axios.get('send')
                    .then(function (response) {
                        console.log(response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            get_friends() {
                let _this = this;
                axios.get('get_friends')
                    .then(function (response) {
                        _this.friends = response.data;
                        console.log(response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        created() {
            Echo.private('Chat')
                .listen('ChatEvent', (e) => {
                    this.chat.message_all.push(e);
                    this.chat.user.push(e.user.f_name);

                    this.chat.time.push(this.getTime());
                    console.log(e);
                })
                .listenForWhisper('typing', (e) => {
                    if (e.name != '') {
                        this.typing = 'typing';
                        console.log('typing');
                    }
                    else {
                        this.typing = '';
                        console.log('');
                    }
                });
        },
    }
</script>
