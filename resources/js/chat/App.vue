<template>
    <div class="chat__wrapper">
        <div class="chat is-active" v-show="showChat">
            <template>
                <loader v-show="isLoadedMessages === true"
                        object="#2f5496"
                        color1="#ffffff"
                        color2="#17fd3d"
                        size="3"
                        speed="1"
                        bg="#343a40"
                        objectbg="#999793"
                        opacity="80"
                        disableScrolling="false"
                        name="spinning">
                </loader>
            </template>
            <button class="chat__btn"
                    @click="setActiveScreen('chat__inner')"
                    type="button">
                Contacts
            </button>
            <button class="chat__btn"
                    @click="setActiveScreen('chat__create')"
                    type="button">
                Create contact
            </button>
            <chat-list @setActive="setActiveScreen"
                       @setCurrentChat="setCurrentChat"
                       :delete-contact-id="deleteContact"
                       :contacts="contacts"></chat-list>
            <button class="chat__close"
                    @click="toggleChat"
                    type="button">
                Close
            </button>
            <div class="chat__inner"
                 :class="activeScreen === 'chat__inner' ? 'is-active' : ''">
                <div class="chat__contacts">
                    <div class="chat__contact"
                         v-for="contact in contacts"
                         @click="setActiveScreen('chat__settings'); setActiveContact(contact);"
                         :class="contact.status === true ? 'is-online' : ''"
                         :key="contact.id">
                        <span class="chat__name">
                            {{ contact.full_name }}
                        </span>
                        <span class="chat__status" :class="contact.status === 1 ? 'is-online' : ''">
                            {{ contact.status === 1 ? 'online' : 'offline' }}
                        </span>
                    </div>
                </div>
                <button class="chat__close"
                        @click="setActiveScreen('chat__contact')"
                        type="button">
                    Close
                </button>
            </div>
            <div class="chat__settings"
                 :class="activeScreen === 'chat__settings'
                 || activeScreen === 'chat__edit'
                 || activeScreen === 'chat__wrap'
                 || activeScreen === 'chat__delete'
                 ? 'is-active'
                 : ''">
                <chat-settings @setActive="setActiveScreen"
                               :contact="activeContact"
                               :new-message="newMessage"
                               :screen="activeScreen"
                               :current-chat-id="currentChatId"></chat-settings>
<!--                <div class="chat__contact is-online">-->
<!--                    <span class="chat__name">Ed Lee</span>-->
<!--                    <span class="chat__status">ON Line</span>-->
<!--                </div>-->
<!--                <div class="chat__row">-->
<!--                    <button class="chat__close" type="button">Send link</button>-->
<!--                    <button class="chat__close js-edit-chat"-->
<!--                            @click="setActiveScreen('chat__edit')"-->
<!--                            type="button">-->
<!--                        Edit contact-->
<!--                    </button>-->
<!--                    <button class="chat__close js-begin-chat"-->
<!--                            @click="setActiveScreen('chat__wrap')"-->
<!--                            type="button">-->
<!--                        Open chat-->
<!--                    </button>-->
<!--                    <button class="chat__close js-open-delete"-->
<!--                            @click="setActiveScreen('chat__delete')"-->
<!--                            type="button">-->
<!--                        Delete contact-->
<!--                    </button>-->
<!--                </div>-->
<!--                <button class="chat__close"-->
<!--                        @click="setActiveScreen('chat__inner')"-->
<!--                        type="button">-->
<!--                    Close-->
<!--                </button>-->
<!--                <chat-messages v-show="activeScreen === 'chat__wrap'"-->
<!--                               :new-message="newMessage"-->
<!--                               :screen="activeScreen"-->
<!--                               :chat-id="currentChatId"></chat-messages>-->
<!--                <div class="chat__edit"-->
<!--                     :class="activeScreen === 'chat__edit' ? 'is-active' : ''">-->
<!--                    <p class="chat__subtitle">Edit contact</p>-->
<!--                    <input class="form-control input" type="text" placeholder="Edit chat">-->
<!--                    <button class="chat__close js-close-edit" type="button">Edit</button>-->
<!--                    <button class="chat__close js-close-edit" type="button">Close</button>-->
<!--                </div>-->
<!--                <div class="chat__delete">-->
<!--                    <p class="chat__subtitle">Delete contact</p>-->
<!--                    <input class="form-control input" type="text" placeholder="Edit chat">-->
<!--                    <button class="chat__close" type="button">Delete</button>-->
<!--                    <button class="chat__close js-close-chat-delete"-->
<!--                            @click="setActiveScreen('chat__wrap')"-->
<!--                            type="button">-->
<!--                        Close-->
<!--                    </button>-->
<!--                </div>-->
            </div>
            <create-contact v-show="activeScreen === 'chat__create'"></create-contact>
<!--            <div class="chat__create"-->
<!--                 :class="activeScreen === 'chat__create' ? 'is-active' : ''">-->
<!--                <div class="chat__inputs">-->
<!--                    <input class="chat__input" type="text" placeholder="First Name">-->
<!--                    <input class="chat__input" type="text" placeholder="Last Name">-->
<!--                    <input class="chat__input" type="email" placeholder="Email">-->
<!--                </div>-->
<!--                <div class="chat__buttons">-->
<!--                    <button class="chat__close"-->
<!--                            @click="createContact"-->
<!--                            type="button">-->
<!--                        Invite-->
<!--                    </button>-->
<!--                    <button class="chat__close"-->
<!--                            @click="setActiveScreen('')"-->
<!--                            type="button">-->
<!--                        Close-->
<!--                    </button>-->
<!--                </div>-->
<!--            </div>-->
        </div>
        <button class="chat__open"
                @click="toggleChat"
                type="button">
            <span class="chat__icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                    <path d="M32,3C15.4,3,0,16.2,0,30c0,7.8,6.3,14.7,13,19.3c-0.1,1.2-0.9,5.3-5.7,9.8c-0.7,0.7-0.2,1.8,0.8,1.7
                        c8.6-1,15.5-5.8,16.7-6.7c1.4,0.3,4.6,0.8,7.2,0.8c16.6,0,32-11.2,32-25S48.6,3,32,3z"/>
                </svg>
            </span>
            <span class="chat__open-text">Chat</span>
        </button>
    </div>

<!--    <div id="imageModal" class="image-modal">-->
<!--        <span class="closeImageModal">&times;</span>-->
<!--        <img class="image-modal-content" id="img01">-->
<!--        <div id="caption"></div>-->
<!--    </div>-->
<!--    <chat-test></chat-test>-->
</template>

<script>
import ChatTest from "./components/ChatTest";
import ChatTextarea from "./components/ChatTextarea";
import ChatList from "./components/ChatList";
import ChatMessages from "./components/ChatMessages";
import CreateContact from "./components/CreateContact";
import ChatSettings from "./components/ChatSettings";
export default {
    name: "App",
    components: {
        ChatSettings,
        ChatList,
        ChatTest,
        ChatTextarea,
        ChatMessages,
        CreateContact
    },
    provide() {
        return {
            setActiveScreen: this.setActiveScreen,
            leaveChat: this.leaveChat,
            stopListenChat: this.stopListenChat,
            setCurrentChat: this.setCurrentChat,
            setActiveContact: this.setActiveContact,
            updateContact: this.updateContact
        };
    },
    data(){
        return {
            showChat: false,
            activeScreen: '',
            currentChatId: '',
            validMessage: true,
            activeContact: {},
            contacts: [
            ],
            newMessage: {},
            lastMessageId: '',
            isLoadedMessages: false,
            backPath: '',
            deleteContact: '',
        }
    },
    methods: {
        toggleChat(){
            this.showChat = !this.showChat;
        },
        setActiveScreen(className){
            console.log('setActiveScreen: ', className);
            this.activeScreen = className;
        },
        setActiveContact(contact){
            console.log('setActiveContact: ', contact);
            this.activeContact = contact;
        },
        setCurrentChat(chatId){
            console.log('setCurrentChat: ', chatId);
            this.currentChatId = chatId;
            this.enterChat(chatId)
            this.listenChat();
        },
        enterChat(chatId){
            return axios.post('/api/chat/messages/enter',
                {
                    chat_id: chatId
                })
                .catch(function(e) {
                    console.log('error: ', e);
                });
        },
        listenChat(){
            var that = this
            window.Echo.channel('chat_' + this.currentChatId)
                .listen('.chat_' + this.currentChatId, message => {
                    that.newMessage = message.data.message;
                    that.lastMessageId = message.data.message.message_id;
                });
        },
        listenContacts() {
            window.Echo.join('chat')
                .here((users) => {
                    console.log('CHAT: here', users); // doesnt get logged
                })
                .joining((user) => {
                    console.log('CHAT: joining', user);
                    axios.post('/api/chat/user/online', {
                        user_id: user.id
                    });
                    if (this.contacts.length > 0 && this.contacts.some(e => e.id === user.id)) {
                        console.log('JOINING');
                        this.contacts.find(item => item.id === user.id).status = 1;
                    }
                })
                .leaving((user) => {
                    console.log('CHAT: leaving', user);
                    axios.post('/api/chat/user/offline', {
                        user_id: user.id
                    });
                    if (this.contacts.length > 0 && this.contacts.some(e => e.id === user.id)) {
                        console.log('LEAVING');
                        this.contacts.find(item => item.id === user.id).status = 0;
                    }
                });
                // .listen('UserOnlineStatus', (e) => {
                //     console.log('CHAT: UserOnline: ', e);
                //     // this.friend = e.user;
                // })
                // .listen('UserOfflineStatus', (e) => {
                //     console.log('UserOffline: ', e);
                //     // this.friend = e.user;
                // });
        },
        stopListenChat(){
            console.log('stopListenChat');
            window.Echo.channel('chat_' + this.currentChatId)
                .stopListening('.chat_' + this.currentChatId);
        },
        leaveChat(){
            console.log('leaveChat lastMessageId: ', this.lastMessageId);
            return axios.post('/api/chat/messages/leave',
                {
                    chat_id: this.currentChatId,
                    message_id: this.lastMessageId
                })
                .catch(function(e) {
                    console.log('error: ', e);
                });
        },
        getContacts(){
            return axios.get('/api/chat/user_contacts')
                .then(response => {
                    console.log('getContacts: ', response);
                    var that = this;
                    response.data.data.forEach(function(item){
                        console.log('getContacts: ', item);
                        that.contacts.push({
                            id: item.id,
                            status: item.status,
                            full_name: item.full_name,
                            name: item.name,
                            last_name: item.last_name,
                            chatId: item.chatId
                        });
                        console.log('that.contacts: ', that.contacts);
                    })
                })
                .catch(function(e) {
                    console.log('error: ', e);
                });
        },
        setOnline(){
            axios.post('/api/chat/user/online', {
                user_id: this.authId
            });
        },
        updateContact(contact){
            this.contacts.find(item => item.id === contact.id).full_name = contact.full_name;
        }
    },
    mounted() {
        this.listenContacts();
        this.getContacts();
        // this.setOnline();
    }
}
</script>

<style scoped>
.message__img {
    width: 50%;
    height: auto
}
.is-online{
    color: #5dcf5d;
}
</style>
