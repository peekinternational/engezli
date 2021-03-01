<template>
  <div class="">
    <div v-for="(friends) in orderedUsers">
      <a class="dropdown-item" :href="'/order-details/'+friends.order_info.order_number">
        <div class="contacts-list-item">
          <template v-if="userdata.id == friends.receiver_id">
            <div class="avatar">
              <template v-if="friends.sender_info.profile_image != null">
                <img :src="'/images/user_images/'+friends.sender_info.profile_image" alt="" />
              </template>
              <template v-else>
                <img src="/images/s1.png" alt="" />
              </template>
              <!-- <img src="images/avatar (1).svg" alt="" /> -->
            </div>
            <div class="text">
              <h4>{{friends.sender_info.first_name}} {{friends.sender_info.last_name}} <span v-if="friends.last_message" :class="'lastNotificationDate-'+friends.order_id">{{istoday(friends.notification_date)}}</span></h4>
              <p v-if="friends.last_message" :class="'lastNotification-'+friends.order_id">{{friends.last_message.message}}</p>
              <template v-if="friends.last_message && friends.last_message.message_type == 'delivery' && friends.last_message.status == 'delivery'">
                <p v-if="friends.last_message" :class="'NotificationDelivery-'+friends.order_id">Your order is delivered</p>
              </template>
              <template v-else-if="friends.last_message && friends.last_message.message_type == 'delivery' && friends.last_message.status == 'reject'">
                <p v-if="friends.last_message" :class="'NotificationDelivery-'+friends.order_id">You reject the delivery</p>
              </template>
              <template v-else-if="friends.last_message && friends.last_message.message_type == 'delivery' && friends.last_message.status == 'approved'">
                <p v-if="friends.last_message" :class="'NotificationDelivery-'+friends.order_id">You approved the delivery</p>
              </template>
            </div>
          </template>
          <template v-else>
            <div class="avatar">
              <template v-if="friends.receiver_info.profile_image != null">
                <img :src="'/images/user_images/'+friends.receiver_info.profile_image" alt="" />
              </template>
              <template v-else>
                <img src="/images/s1.png" alt="" />
              </template>
            </div>
            <div class="text">
              <h4>{{friends.receiver_info.first_name}} {{friends.receiver_info.last_name}} <span v-if="friends.last_message" class="time 'lastNotificationDate-'+friends.order_id">{{istoday(friends.notification_date)}}</span></h4>
              <p v-if="friends.last_message" :class="'lastNotification-'+friends.order_id">{{friends.last_message.message}}</p>
              <template v-if="friends.last_message && friends.last_message.message_type == 'delivery' && friends.last_message.status == 'delivery'">
                <p v-if="friends.last_message" :class="'NotificationDelivery-'+friends.order_id">Your delivered your order</p>
              </template>
              <template v-else-if="friends.last_message && friends.last_message.message_type == 'delivery' && friends.last_message.status == 'reject'">
                <p v-if="friends.last_message" :class="'NotificationDelivery-'+friends.order_id">Your delivery is rejected</p>
              </template>
              <template v-else-if="friends.last_message && friends.last_message.message_type == 'delivery' && friends.last_message.status == 'approved'">
                <p v-if="friends.last_message" :class="'NotificationDelivery-'+friends.order_id">Your delivery is approved</p>
              </template>
            </div>
          </template>

        </div>
      </a>
    </div>
    <!-- <a class="dropdown-item" href="#">
    <div class="contacts-list-item">
    <div class="avatar">
    <img src="images/avatar (1).svg" alt="" />
  </div>
  <div class="text">
  <h4>sohanur rahman <span class="time">12:00 pm</span></h4>
  <p>Lorem ipsum dolor sit amet.</p>
</div>
</div>
</a> -->

</div>

</template>

<script>
import VueSocketio from 'vue-socket.io';
import socketio from 'socket.io-client';
import moment from 'moment';

    export default {
      props: [
        'userdata',
      ],
      data: function() {
          return {
            friendList: [],
            singleChate: {},
            friendId:"",
            friendName:"",
            friendImage:"",
            friendCountry:"",
            friendLanguage:"",
            friendStatus:"",
            searchFriend:"",
            post:"",
            message:"",
            check_image:"",
            conversation_id:"",
            showUsers:true,
            searchUser:false,
            typing:false,
            showDetails:false,
          }
      },
      sockets: {
          connect: function() {
            console.log('socket connected successfully')
          },

          disconnect() {
            console.log('socket disconnected')
          },
},

      mounted() {
        this.user_id =  this.userdata.id;
        this.profile_image = this.userdata.profile_image;
        this.first_name = this.userdata.first_name;
        this.last_name = this.userdata.last_name;
        this.user_names =  this.userdata.username;
        this.friendlistss();
        var socket = socketio('https://peekvideochat.com:22000');
        // var socket = socketio('http://192.168.100.17:3000');
        socket.on("birdsreceivemsg", function(data){
        data = data.notification;
        // console.log("notification data",data);
        if (data.order_id) {

        if(data.receiver_id == this.user_id){
          this.userdec = this.friendList.filter((obj_friend) => {
            return data.order_id === obj_friend.order_id;
          }).pop();
          $('.notification-dot').show();
          console.log("check nofitifcation",this.userdec,"last message",data.last_message.message);
          if (this.userdec) {
            console.log("check inside",this.userdec,"last message",data.last_message.message);
            this.userdec.notification_date = new Date().toISOString();
            var msg=data.last_message.message;
            var time2 = moment().format('hh:mm A');
            // console.log(msg,'lastNotificationDate-'+data.order_id);
            $('.lastNotification-'+data.order_id).html();
            setTimeout(() => $('.lastNotification-'+data.order_id).html('<p>'+msg+'</p>'),  2000);
            setTimeout(() => $('.lastNotificationDate-'+data.order_id).html('<small class="text-muted text-uppercase"> TODAY AT '+time2+'</small>'), 2000);
          }else {
            this.friendList.unshift(data);

          }

          }
        }

        }.bind(this));
    },
    computed:{
      orderedUsers: function() {
      return _.orderBy(this.friendList, 'notification_date', 'desc')
    },
    },
    methods: {
      istoday: function (date) {
        return moment(date).calendar();
      },
      friendlistss: function(){
        axios.get('http://localhost:8000/api/notifications/'+this.user_id)
        .then(responce => {
          this.friendList = responce.data;
          console.log("notification",responce.data);
        // var group =  _.groupBy(this.friendList,'sender_id');
        // this.friendList = group;
        console.log("frindlist",this.friendList);

        })
      },
    },

    }
</script>
