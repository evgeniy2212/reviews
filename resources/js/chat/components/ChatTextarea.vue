<template>
    <div>
        <div class="chat__field-wrap">
            <div class="chat__field">
                <img class="chat__decor left__mod"
                     :src="baseUrl + '/images/message-decor.png'"
                     alt="#">
                <textarea class="chat__textarea"
                          :class="this.validMessage || this.message.length > 0 ? '' : 'invalid__message'"
                          v-model="message"
                          @keydown="isTyping"
                          @blur="validateInput"
                          placeholder="message">
                </textarea>
                <img class="chat__decor right__mod"
                     :src="baseUrl + '/images/message-decor.png'"
                     alt="#">
            </div>
            <button class="btn__emoji"
                    @click="toggleEmoji"
                    type="button">&#128512;</button>
            <div class="chat__emoji-holder"
                 :class="showEmoji === true ? 'is-show' : ''">
                <span class="chat__emoji"
                      v-for="emoji in emojis"
                      @click="sendMessageImage(emoji.src)">&#128512;</span>
            </div>
        </div>
        <div class="chat__buttons">
            <button class="chat__close js-close-messages"
                    @click="leaveCurrentChat"
                    type="button">Close</button>
            <button class="chat__close"
                    :disabled="!validMessage || this.message.length === 0"
                    @click="sendMessageItem(message)"
                    type="button">
                Send
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: "ChatTextarea",
    data() {
        return {
            message: '',
            showEmoji: false,
            validMessage: true,
            emojis: [
                {
                    id: 1,
                    src: this.baseUrl + '/images/positive_like.png'
                }
            ]
        }
    },
    inject: [
        'sendMessage',
        'setActiveScreen',
        'leaveChat',
        'stopListenChat',
        'isTyping'
    ],
    props: [
        'backPath'
    ],
    methods: {
        validateInput() {
            if(this.message === ''){
                this.validMessage = false;
            } else {
                this.validMessage = true;
            }
        },
        toggleEmoji(){
            this.showEmoji = !this.showEmoji;
        },
        sendMessageItem(message){
            this.sendMessage(message, false);
            this.message = '';
        },
        sendMessageImage(src){
            this.sendMessage(src, true);
            this.message = '';
            this.showEmoji = false;
        },
        leaveCurrentChat(){
            let back = 'chat__settings'
            if(this.backPath !== undefined) {
                this.back = this.backPath;
            }
            this.setActiveScreen(this.back)
            this.leaveChat()
            this.stopListenChat()
        }
    },
    mounted() {
        console.log(this.validMessage && this.message.length > 0);
    }
}
</script>

<style scoped>
.invalid__message{
    border: 1px solid #ff6c6c;
}
</style>
