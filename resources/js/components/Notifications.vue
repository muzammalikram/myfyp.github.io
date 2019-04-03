<template>
                             <div>
                               
                                <ul class="dropdown-menu page-list"> 
                             <!--   <button type="button" @click.prevent="hello()">asd</button> -->

                                <li v-for="n in sender_data">
                                  <!-- {{ n.data.user.f_name  }} Sent you friend Request -->
               
                                    <router-link :to="{ name: 'friendsProfile', params: { userId: n.data.user.id }}">  {{ n.data.user.f_name }} Sent You Request </router-link>  

                                </li>
                                <br>
                            
                            </ul>
                                
</div>
                             

</template>

<script>
    export default {
        mounted() {
            console.log('notification mounted.')
        },
        data() {
            return {
             //   get_notification : '',
                notifications : {},
                count : '',
                sender_data : []
            }
        }, 
        methods:{
             hello() {
                 // let _this = this;
                 //  axios.post('/get_notifications')
                 //      .then(function (response) { 
                 //            _this.count = response.data.count;
                 //               _this.sender_data = response.data.all_notifications;
                 //             // _this.sender_data.push(response.data.all_notifications);
                 //           // _this.$emit('counter' , _this.count);
                 //            console.log(_this.sender_data);

                 //      })
                 //      .catch(function (error) {
                 //          console.log(error);
                 //      });

             }
        }, 
        created()
        {
               let _this = this;
                  axios.post('/get_notifications')
                      .then(function (response) { 
                            _this.count = response.data.count;
                             // this.sender_data = response.data.all_notifications;
                            _this.sender_data = response.data.all_notifications;

                            _this.$emit('counter' , _this.count);
                         //   console.log(response.data.all_notifications);

                      })
                      .catch(function (error) {
                          console.log(error);
                      });

           // let userId = $('meta[name="userId"]').attr('content');
            //console.log(userId);
            // let userId = 1;
            let userId = document.head.querySelector('meta[name="userId"]').content;

            Echo.private('App.User.'+userId).notification((notification) => {

                            {'notification_count':notification.count, 'sender_name':notification.user.f_name}
                           //_this.$emit('')
                       //   _this.sender_data = notification;
                           _this.sender_data.push(notification);
//                           _this.count = notification.count;

                             _this.$emit('counter' , notification.data.count);

                           //console.log(notification.data.count);
 

            });

        }
    }
</script>
