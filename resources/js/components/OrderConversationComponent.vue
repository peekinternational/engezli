<template>
  <div class="">
    <template v-for="conversation in getConversation">
    <div class="tab-list-item" v-if="conversation.message_type != 'delivery'">
      <div class="t-header">
        <div class="box-item">
          <template v-if="conversation.user_info.profile_image">
            <img :src="'/images/user_images/'+conversation.user_info.profile_image" alt="" />
          </template>
          <template v-else>
            <img src="/../images/s1.png" alt="" />
          </template>
        </div>
        <div class="box-item">
          <button
            class="btn btn-link btn-block pl-0"
            type="button"
            data-toggle="collapse"
            :data-target="'#collapseOne'+conversation.id"
            aria-expanded="true"
            aria-controls="collapseOne561">
            <h6 class="text-primary">
              <template v-if="conversation.sender_id == user_id">
                Me
              </template>
              <template v-else>
                {{conversation.user_info.first_name}} {{conversation.user_info.last_name}}
              </template>
              <span class="time">{{istoday(conversation.created_at)}}</span>
            </h6>
          </button>
        </div>
      </div>
      <div class="t-body">
        <div
          class="accordion custom-accordion"
          id="accordionExamplesd46">
          <div class="card">
            <div
              :id="'collapseOne'+conversation.id"
              class="collapse show"
              data-parent="#accordionExamplesd46">
              <div class="card-body">
                <p>{{conversation.message}}</p>
                <template v-if="conversation.message_type == 'image'">
                <div class="attachments">
                  <h6>attachment</h6>
                  <div class="attachment-lists">
                    <div class="list-item-box">
                      <img :src="'/images/order_conversation/'+conversation.file" alt="" />
                      <div
                        class="attachment-info d-flex justify-content-between align-items-center">
                        <p>
                          <!-- {{conversation.file}} -->
                          {{conversation.file_name}}
                          <!-- <span>(173 kb)</span> -->
                        </p>
                        <a :href="'/images/order_conversation/'+conversation.file" download><i class="fa fa-download"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </template>
              <template v-if="conversation.message_type == 'file'">
                <div class="delivered-order">
                  <div class="attachments source-file-container">
                    <h6>source file</h6>
                    <div class="source-file">
                      <a :href="'/images/order_conversation/'+conversation.file" download class="source-list-item">
                        <p>
                          {{conversation.file_name}}
                          <!-- <span>(3 mb)</span> -->
                        </p>
                        <i class="fa fa-download"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </template>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ////////////////////////// -->
    <div class="tab-list-item delivered-order" v-else>
      <div class="t-header">
        <div class="box-item">
          <template v-if="conversation.user_info.profile_image">
            <img :src="'/images/user_images/'+conversation.user_info.profile_image" alt="" />
          </template>
          <template v-else>
            <img src="/../images/s1.png" alt="" />
          </template>
        </div>
        <div class="box-item">
          <button
            class="btn btn-link btn-block pl-0"
            type="button"
            data-toggle="collapse"
            :data-target="'#collapseOne'+conversation.id"
            aria-expanded="true"
            aria-controls="collapseOne5616546sd">
            <h6 class="text-primary">
              <template v-if="conversation.sender_id == user_id">
              Me
              <span class="delivered-text">delivered an order</span>
              <span class="time">{{istoday(conversation.created_at)}}</span>
            </template>
            <template v-else>
              {{conversation.user_info.first_name}} {{conversation.user_info.first_name}}
              <span class="delivered-text">delivered your order</span>
              <span class="time">{{istoday(conversation.created_at)}}</span>
            </template>

            </h6>

            <span class="form-field-file">
              <label
                for="cv-arquivo"
                aria-label="Attach file"
                class="btn1">
                <i class="fa fa-paperclip"
                  aria-hidden="true"></i>
              </label>

              <input type="file"
                name="cv-arquivo"
                id="cv-arquivo"
                class="field-file" />
            </span>
          </button>
        </div>
      </div>
      <div class="t-body">
        <div
          class="accordion custom-accordion"
          id="accordionExamplesd466516s">
          <div class="card">
            <div
              :id="'collapseOne'+conversation.id"
              class="collapse show"
              data-parent="#accordionExamplesd466516s">
              <div class="delivery-list-item rounded">
                <div class="content-header">
                  <h6>delivery #1</h6>
                </div>
                <div class="content-body">
                  <div class="user-info-content d-flex">
                    <div class="box user-img">
                      <template v-if="conversation.user_info.profile_image">
                        <img :src="'/images/user_images/'+conversation.user_info.profile_image" alt="" />
                      </template>
                      <template v-else>
                        <img src="/../images/s1.png" alt="" />
                      </template>
                    </div>
                    <div class="box user-details">
                      <h6 class="user-name">
                        {{conversation.user_info.first_name}}'
                        <span> message</span>
                      </h6>
                      <p>{{conversation.message}}</p>

                      <div class="attachments">
                        <h6>attachment</h6>
                        <div class="attachment-lists">
                          <template v-for="(delivery,index) in conversation.delivery">
                          <div class="list-item-box" v-if="delivery.type == 'image'">
                            <img :src="'/images/order_delivery/'+delivery.file" alt="" />
                            <div
                              class="attachment-info d-flex justify-content-between align-items-center">
                              <p>
                                {{delivery.file_name}}
                                <!-- <span>(173 kb)</span> -->
                              </p>
                              <a :href="'/images/order_delivery/'+delivery.file" download><i class="fa fa-download"></i></a>
                            </div>
                          </div>
                          <template v-else>
                            <template v-if="index == 0">
                              <p>No Source File Found</p>
                            </template>
                          </template>
                        </template>
                        </div>
                      </div>
                      <div class="attachments source-file-container">
                        <h6>source file</h6>
                        <div class="source-file">
                          <template v-for="(delivery,index) in conversation.delivery">
                          <a :href="'/images/order_delivery/'+delivery.file" download class="source-list-item" v-if="delivery.type == 'file'">
                            <p>
                              {{delivery.file}}
                              <!-- <span>(3 mb)</span> -->
                            </p>
                            <i class="fa fa-download"></i>
                          </a>
                          <template v-else>
                            <template v-if="index == 0">
                              <p>No Source File Found</p>
                            </template>
                          </template>
                        </template>

                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /////////////// -->
                  <!-- <div class="gig-extras card shadow-none">
                    <div class="header">
                      <h5>Upgrade your delivery</h5>
                      <p class="mt-2">
                        Add these popular extras
                      </p>
                    </div>

                    <div class="table-responsive border rounded">
                      <table class="table">
                        <tr class="text-uppercase">
                          <th>item</th>
                          <th>QTY.</th>
                          <th>duration</th>
                          <th>price</th>
                          <th></th>
                        </tr>
                        <tr>
                          <td>
                            Lorem ipsum dolor sit, amet
                            consectetur
                          </td>
                          <td>1</td>
                          <td>3 days</td>
                          <td>$60</td>
                          <td>
                            <button class="btn btn-primary custom-btn text-white">
                              add
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Lorem ipsum dolor sit, amet
                            consectetur
                          </td>
                          <td>1</td>
                          <td>3 days</td>
                          <td>$60</td>
                          <td>
                            <button class="btn btn-primary custom-btn text-white">
                              add
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Lorem ipsum dolor sit, amet
                            consectetur
                          </td>
                          <td>1</td>
                          <td>3 days</td>
                          <td>$60</td>
                          <td>
                            <button class="btn btn-primary custom-btn text-white">
                              add
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Lorem ipsum dolor sit, amet
                            consectetur
                          </td>
                          <td>1</td>
                          <td>3 days</td>
                          <td>$60</td>
                          <td>
                            <button class="btn btn-primary custom-btn text-white">
                              add
                            </button>
                          </td>
                        </tr>
                      </table>
                    </div>

                    <p>
                      <i class="fa fa-lock text-primary"></i>
                      <strong>SSL Secure payment.</strong>
                      you will not be changed yet.
                    </p>
                  </div> -->
                  <!-- ////////////////// -->
                  <template v-if="buyer_id == user_id">
                  <div class="confirm-order border-top mt-4 pt-4" v-if="conversation.status == 'delivery'">
                    <div class="user-info-content d-flex">
                      <div class="box user-img">
                        <img
                          src="/../images/s1.png"
                          alt=""/>
                      </div>
                      <div class="box user-details">
                        <h6>
                          You received your delivery from
                          Amnawrites.
                        </h6>
                        <h6>
                          Are you pleased with the delivery
                          and ready to approve it?
                        </h6>
                        <div class="btn-container mt-3">
                          <a href=""
                            class="btn btn-primary px-3 pr-0">yes, i approve delivery</a>
                          <a href=""
                            class="btn btn-primary px-3 pr-0">i'm not ready yet</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </template>
                  <!-- ////////////////// -->
                </div>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  <!-- ///////////////////// -->
  <template v-if="seller_id == user_id">
    <div class="delivery-btn-wrapper btn-container text-center d-block my-4">
      <a href=""
      class="btn btn-primary"
      data-toggle="modal"
      data-target="#exampleModal"
      >deliver now</a>
      <h6 class="small font-weight-bold d-sm-none mt-3">
        - OR -
      </h6>
    </div>
  </template>
  <!-- ///////////////////// -->

    <!-- ////////////////////////// -->
    <!-- <div class="user-info-content d-flex order-completed border-top align-items-center p-3 px-4 mt-3">
      <div class="box user-img">
        <img src="images/s1.png" alt="" />
      </div>
      <div class="box user-details">
        <h6>Me</h6>
        <p class="mb-0">Thanks</p>
      </div>
    </div> -->

</div>

</template>

<script>
import VueSocketio from 'vue-socket.io';
import socketio from 'socket.io-client';
import moment from 'moment';

    export default {
      props: [
        'orderdata',
        'userdata',
      ],
      data: function() {
          return {
            getConversation: [],
            user_id:"",
            seller_id:"",
            buyer_id:"",
            friendList: [],
            singleChate: {},
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
        this.seller_id =  this.orderdata.seller_id;
        this.buyer_id =  this.orderdata.buyer_id;
        this.order_id =  this.orderdata.id;
        // this.profile_image = this.userdata.profile_image;
        // this.first_name = this.userdata.first_name;
        // this.last_name = this.userdata.last_name;
        // this.user_names =  this.userdata.username;
        this.orderConversation();

        var socket = socketio('https://peekvideochat.com:22000');
        // var socket = socketio('http://192.168.100.17:3000');
        socket.on("birdsreceivemsg", function(data){
        // console.log("socket data",data);
        if (data.order_id == this.order_id) {
          this.getConversation.push(data);

        }

        }.bind(this));


    },
    methods: {
      istoday: function (date) {
        return moment(date).calendar();
      },

      orderConversation: function(){
          axios.get('http://localhost:8000/api/getOrderConversation/'+this.order_id).then(responce => {
            this.getConversation = responce.data;
            console.log(this.getConversation);
          }, function(err) {
            console.log('err', err);
            alert('error');
          })

      },

    },

    }
</script>
<style>
.source-file {
    display: -ms-grid;
    display: grid;
    -ms-grid-columns: (1fr)[3];
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 15px;
}
.source-list-item {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  padding: 10px;
  border: 1px solid rgba(0, 0, 0, 0.1);
  border-left: 3px solid #007bff;
  border-radius: 4px;
}
.source-file .source-list-item i.fa {
    color: #007bff;
    margin-left: 5px;
}
</style>
