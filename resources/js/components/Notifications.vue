<template>
        <div>
               <!-- {{ notifications }}-->
        <li class="dropdown">
                <a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">All Pages <span><img src="assets/images/down-arrow.png" alt="" /></span></a>
                <ul class="dropdown-menu page-list">


                        <!--{{ notifications }}
-->{{ notifications }}
                        <li v-for="n in notifications">
                                <a>{{ n  }}</a>
                               <!-- <a v-for="userData in n">
                                        {{ userData.f_name }}
                                </a>-->
                        </li>
                </ul>

        </li>

     <!--   <a @click="get_notifications()">Notification</a>
-->
        </div>
</template>

<script>
    export default {
        mounted() {
            console.log('notification mounted.')
        },
        data() {
            return {
                get_notification : '',
                notifications : {}
            }
        },
        created()
        {
            let _this = this;
            axios.post('/get_notifications')
                .then(function (response) {
                      //_this.notifications = response.data;
                     //  console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });

           // let userId = $('meta[name="userId"]').attr('content');
            //console.log(userId);
            let userId = 1;

            Echo.private('App.User.'+userId).notification((notification) => {

              //  _this.notifications = notification.data
                _this.get_notification = notification.data.user;
                           _this.notifications.push(_this.get_notification);
                           console.log(notification.data.user);

            });

        },
        methods : {

        }
    }
</script>
