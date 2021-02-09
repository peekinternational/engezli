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
                  <div class="form-group">
                    <i class="fa fa-search"></i>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Search"
                    />
                  </div>
                </form>
              </div>
              <div class="user-lists">
                <div
                  class="user-list-item d-flex align-items-center p-3 border-bottom"
                  :id="friends.conversation_id" v-for="friends in friendList" @click="getSingleChat(friends)">
                  <div class="box">
                    <template v-if="friends.receiver_info.profile_image != null">
                    <img :src="'/images/user_images/'+friends.receiver_info.profile_image" alt="" />
                  </template>
                  <template v-else>
                    <img src="images/s1.png" alt="" />
                  </template>
                  </div>
                  <div class="box w-100 pl-3">
                    <div class="inner-box d-flex justify-content-between mb-1">
                      <h6 class="">{{friends.receiver_info.first_name}} {{friends.receiver_info.last_name}}</h6>
                      <small class="text-muted text-uppercase">12:15 PM</small>
                    </div>
                    <p>Lorem, ipsum dolor...</p>
                  </div>
                </div>
                <!-- <div class="user-list-item d-flex align-items-center p-3 border-bottom ">
                  <div class="box">
                    <img src="images/avatar (2).svg" alt="" />
                  </div>
                  <div class="box w-100 pl-3">
                    <div class="inner-box d-flex justify-content-between mb-1">
                      <h6 class="">User name</h6>
                      <small class="text-muted text-uppercase">12:15 PM</small>
                    </div>
                    <p>Lorem, ipsum dolor...</p>
                  </div>
                </div> -->
              </div>
            </div>
            <div class="m-box main-area" id="single_chat">
              <center id="selectConversation" class="mt-5 pt-5 mt-sm-5 pt-sm-5" >
                <img src="http://203.99.61.173/demos/gigtodo35/images/chat.png" width="180" alt="">
                <h3 class="mt-3 empty-heading" style="font-weight:410;">Select a Conversation</h3>
                <p class="lead">Try selecting a conversation or searching for someone specific.</p>
              </center>
              <div id="startchat" style="display: none;">

              <div class="msg-header sticky">
                <div class="user-info">
                  <h6>{{friendName}}</h6>
                  <p>Last Seen At 12:00 Pm, 12 Jul 2020</p>
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

              <div class="msg-body">
                <div class="msg-text-box" v-for=" chat in singleChate">
                  <div class="panel d-flex align-items-start">
                    <div class="box">
                      <template v-if="chat.sender_info.profile_image !=null">
                        <img :src="'/images/user_images/'+chat.sender_info.profile_image" alt="" />
                      </template>
                      <template v-else>
                        <img src="images/avatar (2).svg" alt="" />
                      </template>
                    </div>
                    <div class="box rounded w-100">
                      <div class="d-flex justify-content-between">
                        <h6>{{chat.sender_info.first_name}} {{chat.sender_info.last_name}}</h6>
                        <small class="text-uppercase">12:15 PM</small>
                      </div>
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
                      id="cv-arquivo"
                      class="field-file"
                    />
                  </span>
                </div>
                <div class="footer-box">
                  <input type="text" class="form-control" />
                </div>
                <div class="footer-box">
                  <button class="btn custom-btn">send</button>
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
                  <img src="images/avatar (2).svg" alt="" />
                </div>

                <div class="name-and-text">
                  <h5>john William</h5>
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
                    <td>france</td>
                  </tr>
                  <tr>
                    <td>english</td>
                    <td>basic</td>
                  </tr>
                  <tr>
                    <td>french</td>
                    <td>native</td>
                  </tr>
                </table>

                <div class="all-doc-lists">
                  <h5>All documents</h5>
                  <div class="doc-list-item">
                    <a href="" class="doc-item">
                      <img src="images/card (1).png" alt="" />
                    </a>
                    <a href="" class="doc-item">
                      <img src="images/card (2).png" alt="" />
                    </a>
                    <a href="" class="doc-item">
                      <img src="images/card (3).png" alt="" />
                    </a>
                    <a href="" class="doc-item">
                      <img src="images/card (4).png" alt="" />
                    </a>
                    <a href="" class="doc-item">
                      <img src="images/card (1).png" alt="" />
                    </a>
                    <a href="" class="doc-item">
                      <img src="images/card (2).png" alt="" />
                    </a>
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
    export default {
      props: [
        'userdata',
      ],
      data: function() {
          return {
            friendList: [],
            singleChate: {},
            friendName:"",
          }
      },
        mounted() {
          this.user_id =  this.userdata.id;
          this.user_names =  this.userdata.username;
          this.friendlistss();
            // console.log('Component mounted.')
            var socket = socketio('https://peekvideochat.com:22000');
            // var socket = socketio('http://192.168.100.17:3000');
            socket.on('userCount', function (data) {
                this.users = data.userCount;
            }.bind(this));
            socket.on("news-action:App\\Events\\TestEvent", function(data){
                this.dataMessages.push(data.nickname + ' : ' + data.message);
            }.bind(this));
        },
        methods: {
          friendlistss: function(){
            axios.get('http://localhost:8000/api/friendsList/'+this.user_id)
             .then(responce => {
              // console.log(responce.data);
             this.friendList = responce.data;
             console.log(this.friendList);
            })
          },
          getSingleChat: function(single){
            this.singleChatUser = single;
            console.log(this.singleChatUser);
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

            console.log(this.singleChatUser);
            if(this.singleChatUser.sender_id == this.user_id){
              // this.userImage=this.singleChatUser.sender_info.profileimage;
              this.friendName=this.singleChatUser.receiver_info.first_name+" "+this.singleChatUser.receiver_info.last_name;
              // this.friendId=this.singleChatUser.receiver_id;
              // this.friendImage=this.singleChatUser.receiver_info.profileimage;
              // this.message_group_id=this.singleChatUser.message_group_id;
              // this.message_status=this.singleChatUser.message_status;
            //console.log(this.friendImage);
            }else{
              this.friendName=this.singleChatUser.sender_info.first_name+" "+this.singleChatUser.sender_info.last_name;
              // this.friendId=this.singleChatUser.sender_id;
              // this.friendImage=this.singleChatUser.sender_info.profileimage;
              // this.userImage=this.singleChatUser.receiver_info.profileimage;
              // this.message_group_id=this.singleChatUser.message_group_id;
              // this.message_status=this.singleChatUser.message_status;
                  //console.log(this.friendImage);
            }
            // axios.post('http://localhost:8000/api/singleChat',{'sender_id':single.sender_id,'receiver_id':single.receiver_id})
            //  .then(responce => {
            //   console.log(responce.data);
            //
            //  this.singleChate = responce.data;
            // })
            axios.post('http://localhost:8000/api/singleChat',{'sender_id':single.sender_id,'receiver_id':single.receiver_id}).then(responce => {

              // socket.emit('sendgroupmsg', this.groupmsgObj);
              this.singleChate = responce.data;
              // console.log(responce.data);

            }, function(err) {
              console.log('err', err);
              alert('error');
            })
          },
        }
    }
</script>
<style>
  .user-list-item {
    cursor: pointer;
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
