<template>
  <div class="py-5">
    <div class="message-container">
      <div class="container">
        <div class="card">
          <div class="heading px-3 py-3 border-bottom">
            <h3>Messages</h3>
          </div>
          <div class="outer-content">
            <div class="m-box sidebar scrollable">
              <div class="msg-header sticky">
                <form action="" class="form">
                  <!-- Searh -->
                  <div class="form-group">
                    <i class="fa fa-search"></i>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Search"
                      v-model="searchFriend"
                    />
                  </div>
                  <!-- Searh -->
                </form>
              </div>
              <div class="user-lists">
                <!-- show User -->
                <div class="" v-if="showUsers">
                  <div class="user-list-item d-flex align-items-center p-3 border-bottom"
                    :id="friends.conversation_id" v-for="friends in friendList" @click="getSingleChat(friends)">
                    <div class="box">
                    <template v-if="userdata.id == friends.sender_id">
                      <template v-if="friends.receiver_info.profile_image != null">
                        <img :src="'/images/user_images/'+friends.receiver_info.profile_image" alt="" />
                      </template>
                      <template v-else>
                        <img src="images/s1.png" alt="" />
                      </template>
                    </template>
                    <template v-else>
                      <template v-if="friends.sender_info.profile_image != null">
                        <img :src="'/images/user_images/'+friends.sender_info.profile_image" alt="" />
                      </template>
                      <template v-else>
                        <img src="images/s1.png" alt="" />
                      </template>
                    </template>
                    </div>
                    <div class="box w-100 pl-3">
                      <div class="inner-box d-flex justify-content-between mb-1">
                        <template v-if="userdata.id == friends.sender_id">
                          <h6 class="">{{friends.receiver_info.first_name}} {{friends.receiver_info.last_name}}</h6>
                        </template>
                        <template v-else>
                          <h6 class="">{{friends.sender_info.first_name}} {{friends.sender_info.last_name}}</h6>
                        </template>
                        <div :class="'lastMessageDate-'+friends.conversation_id">
                          <small class="text-muted text-uppercase" v-if="friends.message_id != 0">{{istoday(friends.last_message.message_date)}}</small>
                        </div>
                      </div>
                      <div :class="'lastMessage-'+friends.conversation_id">
                        <template v-if="userdata.id == friends.sender_id">
                          <p :id="'f_typing'+friends.receiver_id" v-if="friends.message_id != 0">{{friends.last_message.message_desc}}</p>
                        </template>
                        <template v-else>
                          <p :id="'f_typing'+friends.sender_id" v-if="friends.message_id != 0">{{friends.last_message.message_desc}}</p>
                        </template>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Show User -->
                <!-- Search User -->
                <div class="" v-if="searchUser">
                <div class="user-list-item d-flex align-items-center p-3 border-bottom"
                  :id="friends.conversation_id" v-for="friends in filteredUserlist" @click="getSingleChat(friends)">
                  <div class="box">
                  <template v-if="userdata.id == friends.sender_id">
                    <template v-if="friends.receiver_info.profile_image != null">
                      <img :src="'/images/user_images/'+friends.receiver_info.profile_image" alt="" />
                    </template>
                    <template v-else>
                      <img src="images/s1.png" alt="" />
                    </template>
                  </template>
                  <template v-else>
                    <template v-if="friends.sender_info.profile_image != null">
                      <img :src="'/images/user_images/'+friends.sender_info.profile_image" alt="" />
                    </template>
                    <template v-else>
                      <img src="images/s1.png" alt="" />
                    </template>
                  </template>
                  </div>
                  <div class="box w-100 pl-3">
                    <div class="inner-box d-flex justify-content-between mb-1">
                      <template v-if="userdata.id == friends.sender_id">
                        <h6 class="">{{friends.receiver_info.first_name}} {{friends.receiver_info.last_name}}</h6>
                      </template>
                      <template v-else>
                        <h6 class="">{{friends.sender_info.first_name}} {{friends.sender_info.last_name}}</h6>
                      </template>
                      <div :class="'lastMessageDate-'+friends.conversation_id">
                        <small class="text-muted text-uppercase" v-if="friends.message_id != 0">{{istoday(friends.last_message.message_date)}}</small>
                      </div>
                    </div>
                    <div :class="'lastMessage-'+friends.conversation_id">
                      <template v-if="userdata.id == friends.sender_id">
                        <p :id="'f_typing'+friends.receiver_id" v-if="friends.message_id != 0">{{friends.last_message.message_desc}}</p>
                      </template>
                      <template v-else>
                        <p :id="'f_typing'+friends.sender_id" v-if="friends.message_id != 0">{{friends.last_message.message_desc}}</p>
                      </template>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /Search User -->
              </div>
            </div>
            <div class="m-box main-area" id="single_chat">
              <center id="selectConversation" class="mt-5 pt-5 mt-sm-5 pt-sm-5" >
                <img src="http://203.99.61.173/demos/gigtodo35/images/chat.png" width="180" alt="">
                <h3 class="mt-3 empty-heading" style="font-weight:410;">Select a Conversation</h3>
                <p class="lead">Try selecting a conversation or searching for someone specific.</p>
              </center>
              <div id="startchat" class="m-box" style="display: none;">
              <div class="msg-header sticky">
                <div class="user-info">
                  <h6>{{friendName}}</h6>
                  <p>{{friendStatus}}</p>
                </div>
                <!-- <div class="other d-flex align-items-center">
                  <button class="btn"><i class="fa fa-phone"></i></button>
                  <button class="btn">
                    <i class="fa fa-video-camera" aria-hidden="true"></i>
                  </button>
                  <div class="dropdown">
                    <button
                      class="btn"
                      type="button"
                      id="dropdownMenuButton"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="fa fa-ellipsis-h"></i>
                    </button>
                    <div
                      class="dropdown-menu"
                      aria-labelledby="dropdownMenuButton"
                    >
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div> -->
              </div>

              <div class="msg-body chat-widget-conversation">
                <div class="msg-text-box" v-for=" chat in singleChate">
                  <div class="panel d-flex align-items-start">
                    <div class="box">
                      <template v-if="chat.sender_info.profile_image">
                        <img :src="'/images/user_images/'+chat.sender_info.profile_image" alt="" />
                      </template>
                      <template v-else>
                        <img src="images/s1.png" alt="" />
                      </template>
                    </div>
                    <div class="box rounded w-100">
                      <div class="d-flex justify-content-between">
                        <h6>{{chat.sender_info.first_name}} {{chat.sender_info.last_name}}</h6>
                        <small class="text-uppercase">{{istoday(chat.message_date)}}</small>
                      </div>
                      <template v-if="chat.message_file">
                        <div v-if="chat.message_type == 1">
                          <img :src="'images/chat_images/'+chat.message_file" alt="..." class="img-thumbnail" width="100">
                        </div>
                        <a :href="'images/chat_images/'+chat.message_file" download class="d-block mt-2 ml-1"  style="color: rgb(0 153 255);">
                        <i class="fa fa-download"></i> message-{{chat.message_file}}
                        </a>
                        </template>
                      <p>{{chat.message_desc}}</p>
                      <!-- <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing
                        elit. Aperiam, mollitia!
                      </p> -->
                    </div>
                  </div>
                </div>
                <!-- <div class="msg-text-box right">
                  <div class="panel d-flex align-items-end">
                    <div class="box">
                      <img src="images/avatar (2).svg" alt="" />
                    </div>
                    <div class="box rounded p-2">
                      <div class="d-flex justify-content-between">
                        <h6>Carl Jenkins</h6>
                        <small class="text-uppercase ml-2">12:15 PM</small>
                      </div>
                      <p>Hi, Are you there?</p>
                    </div>
                  </div>
                </div> -->
                <!-- <div class="past-date">
                  <div class="dropdown-divider"></div>
                  <h6 class="text-uppercase">
                    <small class="bg-white shadow-sm rounded p-2 px-3"
                      >DEC 22, 2020</small>
                  </h6>
                </div> -->

              </div>

              <div class="msg-footer align-items-center p-3">
                  <!-- <span v-show="typing" class="">{{ friendName }} is typing ...</span> -->
                  <div class="footer-box">
                    <span class="form-field-file">
                      <label
                        for="cv-arquivo"
                        aria-label="Attach file"
                        class="btn1"
                      >
                        <i class="fa fa-paperclip" aria-hidden="true"></i>
                      </label>

                      <input
                        type="file"
                        name="cv-arquivo"
                        ref="msg_file"
                        id="cv-arquivo"
                        class="field-file"
                      />
                    </span>
                  </div>
                  <div class="footer-box">
                    <input type="text" v-model="message" v-on:keyup="removecross()" class="form-control" @keyup.enter="sendMessage()" />
                  </div>
                  <div class="footer-box">
                    <button class="btn custom-btn" @click="sendMessage()">send</button>
                  </div>
              </div>
            </div>
            </div>
            <div class="m-box inner-content details-pane">
              <!-- <div class="inner-header">
                <h4>about</h4>
              </div> -->
              <div class="details-pane-body">
                <div class="avatar">
                  <template v-if="friendImage">
                    <img :src="'/images/user_images/'+friendImage" alt="" />
                  </template>
                  <template v-else>
                    <img src="images/s1.png" alt="" />
                  </template>
                </div>

                <div class="name-and-text">
                  <h5>{{friendName}}</h5>
                  <p>top buyer | top rated seller</p>
                </div>

                <table class="table">
                  <tr>
                    <td>Reviews</td>
                    <td>
                      <span><i class="fa fa-star"></i> 5.0</span> (1k+)
                    </td>
                  </tr>
                  <tr>
                    <td>avg response time</td>
                    <td>1 hr</td>
                  </tr>
                  <tr>
                    <td>from</td>
                    <td>{{friendCountry}}</td>
                  </tr>
                  <tr v-for="(lang,index) in friendLanguage">
                    <td>{{lang.language_title}}</td>
                    <td v-if="index == 0">basic</td>
                    <td v-else="index == 0">native</td>
                  </tr>
                </table>

                <div class="all-doc-lists" v-if="check_image == 1">
                  <h5>All documents</h5>
                  <div class="doc-list-item">
                    <template v-for="chat in singleChate">
                      <template v-if="chat.message_type == '1'">
                        <a target="_blank" :href="'images/chat_images/'+chat.message_file" class="doc-item">
                          <img :src="'images/chat_images/'+chat.message_file" alt="" />
                        </a>
                      </template>
                    </template>
                  </div>
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
          }
      },
      sockets: {
          connect: function() {
            console.log('socket connected successfully')
          },

          disconnect() {
            console.log('socket disconnected')
          },

          alphastarttyping(data) {
            // this.typing = true;
            console.log(data);
            if (data.selectFrienddata == this.user_id) {
              this.typing = true;
              $('#f_typing'+data.UserId).html('<span style="color: green;"> is typing ...</span>');
            }
          },

          alphastoptyping(data) {
            if (data.friendId == this.user_id) {
              this.typing = false;
              console.log("stop typing",data);

            if(data.selectFrienddata.last_message.message_desc){
              $('#f_typing'+data.UserId).html(data.selectFrienddata.last_message.message_desc);
            }
            else{
              $('#f_typing'+data.UserId).html('');
            }
          }
          },

        },
      mounted() {
        this.user_id =  this.userdata.id;
        this.profile_image = this.userdata.profile_image;
        this.first_name = this.userdata.first_name;
        this.last_name = this.userdata.last_name;
        this.user_names =  this.userdata.username;
        this.friendlistss();


          // console.log('Component mounted.')
          var socket = socketio('https://peekvideochat.com:22000');
          // var socket = socketio('http://192.168.100.17:3000');
          socket.on("birdsreceivemsg", function(data){
          // console.log(data);
          if(data.message_receiver == this.userdata.id){
              if (this.conversation_id == data.conversation_id) {
                this.singleChate.push(data);

              }
              var time = moment().format('hh:mm A');
              $('.lastMessageDate-'+data.conversation_id).html('<small class="text-muted text-uppercase"> TODAY AT '+time+'</small>');
              $('.lastMessage-'+data.conversation_id).html('<p>'+data.message_desc+'</p>');
              var height = 0;
              $(".chat-widget-conversation").each(function(i, value){
                height += parseInt($(this).height());
              });
              height += 20000;
              $(".chat-widget-conversation").animate({scrollTop: height});
            }
          }.bind(this));

      },
      watch: {
        searchFriend(){
          if (this.searchFriend.length > 0) {
            this.showUsers = false;
            this.searchUser = true;
          }else {
            this.showUsers = true;
            this.searchUser = false;
          }
        },
        message: _.debounce(function () {
            console.log('check message');
                this.$socket.emit('alphastopTyping', { selectFrienddata:this.singleChatUser,friendId:this.friendId, UserId:this.user_id});
            }, 1500),
      },
      computed: {
        filteredUserlist() {
          return this.friendList.filter(post => {
            // console.log(post.sender_info.first_name.toLowerCase().includes(this.searchFriend.toLowerCase()));
            if (post.sender_id == this.user_id) {
              return post.receiver_info.first_name.toLowerCase().includes(this.searchFriend.toLowerCase())
            }else {
              return post.sender_info.first_name.toLowerCase().includes(this.searchFriend.toLowerCase())
            }
          })
        },
      },
        methods: {
          istoday: function (date) {
            return moment(date).calendar();
          },
          removecross() {
              this.$socket.emit('alphamsgtyping', { selectFrienddata:this.friendId, UserId:this.user_id});
            },
          friendlistss: function(){
            axios.get('http://localhost:8000/api/friendsList/'+this.user_id)
            .then(responce => {
              this.friendList = responce.data;
              // console.log(this.friendList);
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
          getSingleChat: function(single){
            this.singleChatUser = single;
            // console.log(this.singleChatUser);
            $('.user-list-item.active').removeClass('active');
            $('#'+this.singleChatUser.conversation_id).addClass('active');
            $('#selectConversation').hide();
            $('#startchat').show();
            $('#single_chat').show();
            var height = 0;
            $(".chat-widget-conversation").each(function(i, value){
              height += parseInt($(this).height());
            });
            height += 20000;
            $(".chat-widget-conversation").animate({scrollTop: height});

            // console.log(this.singleChatUser);
            if(this.singleChatUser.sender_id == this.user_id){
              // this.userImage=this.singleChatUser.sender_info.profileimage;
              this.friendName=this.singleChatUser.receiver_info.first_name+" "+this.singleChatUser.receiver_info.last_name;
              this.conversation_id=this.singleChatUser.conversation_id;
              this.friendId=this.singleChatUser.receiver_id;
              this.friendImage=this.singleChatUser.receiver_info.profile_image;
              this.friendCountry=this.singleChatUser.receiver_info.country;
              this.friendStatus=this.singleChatUser.receiver_info.user_status;
              // this.message_status=this.singleChatUser.message_status;
            //console.log(this.friendImage);
            }else{
              this.friendName=this.singleChatUser.sender_info.first_name+" "+this.singleChatUser.sender_info.last_name;
              this.conversation_id=this.singleChatUser.conversation_id;
              this.friendId=this.singleChatUser.sender_id;
              this.friendImage=this.singleChatUser.sender_info.profile_image;
              this.friendCountry=this.singleChatUser.sender_info.country;
              this.friendStatus=this.singleChatUser.sender_info.user_status;
              // this.userImage=this.singleChatUser.receiver_info.profileimage;
              // this.message_status=this.singleChatUser.message_status;
                  //console.log(this.friendImage);
            }
            axios.post('http://localhost:8000/api/singleChat',{'sender_id':single.sender_id,'receiver_id':single.receiver_id}).then(responce => {
              // console.log(responce.data);
              this.singleChate = responce.data;
              var checkimage = responce.data.filter((obj) => {
                return '1' == obj.message_type;
              }).pop();
              if (checkimage != undefined) {
                this.check_image = '1';
              }else {
                this.check_image = '0';
              }
              axios.get('http://localhost:8000/api/friendData/'+this.friendId).then(responce => {
                this.friendLanguage = responce.data.languages;

              }, function(err) {
                console.log('err', err);
                alert('error');
              })

            }, function(err) {
              console.log('err', err);
              alert('error');
            })
          },
          sendMessage: function() {
          var socket = socketio.connect('https://peekvideochat.com:22000/');

          var config = {
            header: {
              'Content-Type': 'multipart/form-data'
            }
          }
        // console.log(this.friendId);
          let meeting_file =  this.$refs.msg_file.files;
            var meetingformDatas = new FormData();
                meetingformDatas.append('file',meeting_file[0]);
                meetingformDatas.append('message_sender',this.user_id);
                meetingformDatas.append('message_receiver',this.friendId);
                meetingformDatas.append('message',this.message);
                meetingformDatas.append('conversation_id',this.conversation_id);
                // meetingformDatas.append('message_status',this.message_status);


            var d = new Date($.now());
            var time = d.getFullYear()+"-"+(d.getMonth() + 1)+"-"+d.getDate()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
          var  message_type = 0;
          var filename = '';
            if(meeting_file.length > 0){
               var message_type = 1;
               filename = meeting_file[0].name;
            }
            var profile_image = '';
            if (this.profile_image  != null) {
              profile_image = this.profile_image;
            }

            var obj ={
              message_sender: this.user_id,
              message_receiver: this.friendId,
              message_desc: this.message,
              message_file: filename,
              sender_info: {profile_image:profile_image,first_name:this.first_name, last_name:this.last_name},
              // message_type: message_type,
              conversation_id: this.conversation_id,
              // message_status: this.message_status,
              created_at: time,
            }
            //console.log(filename+'hghghgh');
            // meetingformDatas.append('meetingformDatas', obj);
            // console.log(obj);
            // socket.emit('message', obj);

                axios.post('http://localhost:8000/api/chat/send-message',meetingformDatas,config)
                 .then(responce => {
                  this.singleChate.push(obj);
                  var height = 0;
                  $(".chat-widget-conversation").each(function(i, value){
                    height += parseInt($(this).height());
                  });
                  height += 20000;
                  $(".chat-widget-conversation").animate({scrollTop: height});
                  socket.emit('message', obj);
                  socket.emit('alphastopTyping', { selectFrienddata:this.friendId, UserId:this.user_id});
                  var time = moment().format('hh:mm A');
                  $('.lastMessageDate-'+this.conversation_id).html('<small class="text-muted text-uppercase"> TODAY AT '+time+'</small>');
                  console.log(this.conversation_id);
                  $('.lastMessage-'+this.conversation_id).html('<p>'+this.message+'</p>');

                 this.message = "";
                 this.$refs.msg_file.value=null;

                })


          },
        },

    }
</script>
<style>
  .user-list-item {
    cursor: pointer;
  }
  .img-thumbnail {
    padding: .25rem;
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: .25rem !important;
    /* max-width: 100%; */
    height: 100px !important;
    width: 100px !important;
}
    /* .msg-body .msg-text-box.right .panel {
      -webkit-box-orient: horizontal;
      -webkit-box-direction: reverse;
      -ms-flex-direction: row-reverse;
      flex-direction: row-reverse;
  }
  .msg-body .msg-text-box.right .panel .box:first-child {
    margin-left: 15px;
}
.msg-body .msg-text-box.right .panel .box {
    max-width: 450px;
}
.msg-body .msg-text-box.right .panel .box:last-child {
    background: #007bff;
}
.msg-body .msg-text-box.right .panel .box:last-child p, .msg-body .msg-text-box.right .panel .box:last-child h6 {
    color: #ffffff;
}
.message-container .outer-content .main-area .msg-body .msg-text-box.right .box small {
    color: #ffffff;
} */
</style>
