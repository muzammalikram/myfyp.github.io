<template>
    <div class="container">

        <ul class="chat-message" v-chat-scroll>

            <li class="left" >
                <img src="assets/images/users/user-1.jpg" alt="" class="profile-photo-sm pull-right" />
                <div class="chat-item">
                    <div class="chat-item-header">
                        <h5>Sarah Cruiz</h5>
                        <small class="text-muted">3 days ago</small>
                    </div>
                    <p><i class="em em-hand"></i>sss</p>
                </div>
            </li>
            <li class="right" v-for="message in chat.message_all" >

                <img src="assets/images/users/user-2.jpg" alt="" class="profile-photo-sm pull-left" />
                <div class="chat-item">
                    <div class="chat-item-header">
                        <h5>muzammal</h5>
                        <small class="text-muted">a min ago</small>
                    </div>
                    <p>{{ message }}</p>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                message : '',
                chat : {
                    message_all : [],
                }

            }
        },
        methods : {
            send() {
                if (this.message.length != 0)
                {
                    this.chat.message_all.push(this.message);
                    console.log(this.message);
                }
                this.message = '';

            }
        }
    }
</script>
