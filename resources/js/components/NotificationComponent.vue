<template>
  <div class="">
    <div v-for="friends in orderedUsers">
      <a class="dropdown-item" href="#">
        <div class="contacts-list-item">
          <template v-if="userdata.id == friends.sender_id">
            <div class="avatar">
              <template v-if="friends.receiver_info.profile_image != null">
                <img :src="'/images/user_images/'+friends.receiver_info.profile_image" alt="" />
              </template>
              <template v-else>
                <img src="images/s1.png" alt="" />
              </template>
              <!-- <img src="images/avatar (1).svg" alt="" /> -->
            </div>
            <div class="text">
              <h4>{{friends.receiver_info.first_name}} {{friends.receiver_info.last_name}} <span v-if="friends.last_message" :class="'lastMessageDate-'+friends.conversation_id">{{istoday(friends.last_message.message_date)}}</span></h4>
              <p v-if="friends.last_message" :class="'lastMessage-'+friends.conversation_id">{{friends.last_message.message_desc}}</p>
            </div>
          </template>
          <template v-else>
            <div class="avatar">
              <template v-if="friends.sender_info.profile_image != null">
                <img :src="'/images/user_images/'+friends.sender_info.profile_image" alt="" />
              </template>
              <template v-else>
                <img src="images/s1.png" alt="" />
              </template>
            </div>
            <div class="text">
              <h4>{{friends.sender_info.first_name}} {{friends.sender_info.last_name}} <span v-if="friends.last_message" class="time 'lastMessageDate-'+friends.conversation_id">{{istoday(friends.last_message.message_date)}}</span></h4>
              <p v-if="friends.last_message" :class="'lastMessage-'+friends.conversation_id">{{friends.last_message.message_desc}}</p>
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
        // console.log(data);
        if(data.message_receiver == this.userdata.id){

            var time = moment().format('hh:mm A');
            $('.lastMessageDate-'+data.conversation_id).html('<small class="text-muted text-uppercase"> TODAY AT '+time+'</small>');
            $('.lastMessage-'+data.conversation_id).html('<p>'+data.message_desc+'</p>');

            console.log("check notfication",$('.notificationMessage-'+data.conversation_id).text());

          }
        }.bind(this));
    },
    computed:{
      orderedUsers: function() {
      return _.orderBy(this.friendList, 'time', 'desc')
    },
    },
    methods: {
      istoday: function (date) {
        return moment(date).calendar();
      },
      friendlistss: function(){
        axios.get('http://localhost:8000/api/friendsList/'+this.user_id)
        .then(responce => {
          this.friendList = responce.data;
          console.log(this.friendList);
          var url = window.location.href;
          var conversation_id = url.substring(url.lastIndexOf('=') + 1);
          if (conversation_id) {
            const post = this.friendList.filter((obj) => {
              return conversation_id == obj.conversation_id;
            }).pop();
            if (post) {
              $('#'+post.conversation_id).addClass('active');
              // $('#1212577981').addClass('active');
              this.getSingleChat(post);
              var height = 0;
              // var container = this.$el.querySelector("#startchat");
              // $("#startchat").animate({ scrollTop: container.scrollHeight + 7020}, "fast");
              // console.log(container);
              $(".chat-widget-conversation").each(function(i, value){
                height += parseInt($(this).height());
              });
              height += 20000;
              $(".chat-widget-conversation").animate({scrollTop: height});

            }
          }
        })
      },
    },

    }
</script>
