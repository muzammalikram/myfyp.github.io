

<template>
    <div>

        <!--<header id="header" class="lazy-load">-->
            <nav class="navbar navbar-default navbar-fixed-top menu">
                <div class="container">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index-register.html"><img src="assets/images/logo.png" alt="logo" /></a>
                    </div>


                    <ul class="nav navbar-nav navbar-right main-menu">


                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home <span><img src="assets/images/down-arrow.png" alt="" /></span></a>
                            <ul class="dropdown-menu newsfeed-home">
                                <li><a href="index.html">Landing Page 1</a></li>
                                <li><a href="index-register.html">Landing Page 2</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Newsfeed <span><img src="assets/images/down-arrow.png" alt="" /></span></a>
                            <ul class="dropdown-menu newsfeed-home">
                                <li><router-link to='/newsfeed'>Newsfeed</router-link></li>
                                <li><a href="newsfeed-people-nearby.html">Poeple Nearly</a></li>
                                <li><router-link  to='/messages'>Chatroom</router-link></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Timeline <span><img src="assets/images/down-arrow.png" alt="" /></span></a>
                            <ul class="dropdown-menu login">
                                <li><router-link to='/timeline'>Timeline</router-link></li>
                                <li><router-link to='/about'>Timeline About</router-link></li>
                                <li><router-link to='/album'>Timeline Album</router-link></li>
                                <li><router-link to='/friends'>Timeline Friends</router-link></li>
                                <li><router-link to='/profile'>Edit: Profile</router-link></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">All Pages <span><img src="assets/images/down-arrow.png" alt="" /></span></a>
                            <ul class="dropdown-menu page-list">
                                <li><a href="index.html">Landing Page 1</a></li>
                                <li><a href="index-register.html">Landing Page 2</a></li>
                                <li><a href="newsfeed.html">Newsfeed</a></li>
                                <li><a href="newsfeed-people-nearby.html">Poeple Nearly</a></li>
                                <li><a href="newsfeed-friends.html">My friends</a></li>
                                <li><a href="newsfeed-messages.html">Chatroom</a></li>
                                <li><a href="newsfeed-images.html">Images</a></li>
                                <li><a href="newsfeed-videos.html">Videos</a></li>
                                <li><a href="timeline.html">Timeline</a></li>
                                <li><a href="timeline-about.html">Timeline About</a></li>
                                <li><a href="timeline-album.html">Timeline Album</a></li>
                                <li><a href="timeline-friends.html">Timeline Friends</a></li>
                                <li><a href="edit-profile-basic.html">Edit Profile</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                                <li><a href="faq.html">FAQ Page</a></li>
                                <li><a href="404.html">404 Not Found</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bell" style="font-size: 18px;"></i>{{ count_notifications }}</a>
                            <!-- <notification @counter="count"></notification> -->
                            <notification @counter="count"></notification>
                        </li>

                        <!-- <notification></notification> -->
                    </ul>
                    <form class="navbar-form navbar-right hidden-sm">
                        <div class="form-group">
                            <i class="icon ion-android-search"></i>
                            <input type="text" class="form-control" placeholder="Search friends, photos, videos">
                        </div>
                    </form>


                </div>

    </nav>
    <!--</header>-->



    </div>
</template>

<script>
    import notification from './Notifications.vue'
    export default {
        mounted() {
            console.log('Header component mounted.')
        },
        data() {
            return {
                nn : {},
                count_notifications : '',
                sender_name : ''
            }
        },
        methods : {
            count(data)
            { 
                this.count_notifications = data;
            }
        },
        components : {
            notification
        },
    }
</script>
