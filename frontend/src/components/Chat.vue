<template>
  <div class="chat">
    <div class="content">
      <div class="chat_loader" v-if="loader"></div>
      <div
        class="message"
        v-else
        v-for="message in messages"
        :key="(message as NewMessage).id"
      >
        <span class="userName">{{ (message as NewMessage).nickName }}</span>
        <div class="contentContainer">
          <div class="contentOfMessage">
            {{ (message as NewMessage).message }}
            <span class="time">{{ (message as NewMessage).createdAt }} </span>
          </div>
          <button
            class="closeButton"
            @click="removeMessage((message as NewMessage).id)"
          >
            <img src="../../public/icons/CloseCross.svg" />
          </button>
        </div>
      </div>
    </div>
    <div class="footer">
      <div class="textField">
        <textarea
          placeholder="Введите сообщение"
          rows="1"
          @keyup.enter="sendMessage"
          v-model="value"
        ></textarea>
        <button class="sendButton" @click="sendMessage">
          <img src="../../public/icons/Send.svg" />
        </button>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import { mapActions, mapGetters } from "vuex";
import store from "@/store";

export interface Message {
  loader: string;
  message: {
    nickName: string;
    message: string;
    createdAt: string;
    id: string;
  };
}
export interface NewMessage {
  nickName: string;
  message: string;
  createdAt: string;
  id: string;
}

export default defineComponent({
  name: "ChatComponent",
  data() {
    return {
      value: "",
    };
  },
  methods: {
    ...mapActions({
      setNickName: "setNick",
      addMessage: "addMessage",
      removeMessage: "removeMessage",
      getAllMessages: "getAllMessages",
    }),
    sendMessage(e: any) {
      if (this.value) {
        store.dispatch("addMessage", this.value);
        this.value = "";
        e.target.blur();
      }
    },
    sendNickName(e: any) {
      if (this.value) {
        this.setNickName(this.value);
        e.target.blur();
      }
    },
  },
  computed: {
    ...mapGetters({
      loader: "getLoader",
      messages: "getAllMessages",
    }),
    nickName(): string {
      return this.value;
    },
  },
  mounted() {
    this.getAllMessages();
  },
});
</script>

<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");

::-webkit-scrollbar {
  width: 16px;
  display: flex;
  box-sizing: border-box;
  padding: 3px;
  display: flex;
  border: 2px solid transparent;
  padding: 2px;
  border-radius: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  box-sizing: border-box;
  border-radius: 10px;
}

/* Handle */
::-webkit-scrollbar-thumb {
  display: flex;
  box-sizing: border-box;
  border: 5px solid rgba(0, 255, 0, 0);
  background-color: rgba(97, 97, 97, 0.42);
  border-radius: 8px;
  min-height: 25px;
  margin: 2px;
  background-clip: content-box;
}

//
.chatContainer {
  display: flex;
  flex-direction: row;
  width: fit-content;
}
.chat {
  display: flex;
  flex-direction: column;
  background: #f5f5f8;
  border-radius: 8px;
  border: 1px solid rgba(35, 44, 94, 0.21);
  box-shadow: 0px 6px 25px rgba(19, 35, 68, 0.1);
  box-sizing: border-box;
  width: 37.5%;
  max-width: 37.5%;
}
.content {
  display: flex;
  position: relative;
  flex-direction: column;
  padding: 32px;
  overflow-y: scroll;
  height: 56.7632dvh;
  margin-top: 32px;
  background: #ffffff;
  border-top: 1px solid rgba(35, 44, 94, 0.13);
  border-bottom: 1px solid rgba(35, 44, 94, 0.13);
  box-sizing: border-box;
}
.chat_loader {
  display: flex;
  position: absolute;
  z-index: 90;
  background: #ffffff;
  opacity: 0.7;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
.footer {
  display: flex;
  flex-direction: column;
  box-sizing: border-box;
  padding: 36px 32px;
  width: 100%;
  max-width: 100%;
  justify-content: center;
}
.textField {
  display: flex;
  flex-direction: row;
  box-sizing: border-box;
  position: relative;
  width: 100%;
}

textarea {
  display: flex;
  flex-direction: row;
  border: 1px solid rgba(35, 44, 94, 0.21);
  border-radius: 8px;
  padding: 17px 18px;
  width: 100%;
  height: unset;
  min-height: 0px;
  max-width: 100%;

  resize: none;

  font-family: "Roboto";
  font-style: normal;
  font-weight: 400;
  font-size: 16px;
  line-height: 19px;
  color: #222222;

  &:focus {
    border: 1px solid #232c5e;
    outline: unset;
  }
  &::placeholder {
    display: flex;
    flex-direction: row;
    height: fit-content;
    font-family: "Roboto";
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 19px;
  }
}

.sendButton {
  cursor: pointer;
  position: absolute;
  top: 0;
  bottom: 0;
  right: 16.5px;
  display: flex;
  width: fit-content;
  height: fit-content;
  border: unset;
  background-color: transparent;
  padding: unset;
  margin: auto 0;
}

input {
  display: flex;
  flex-direction: row;
  border: 1px solid rgba(35, 44, 94, 0.21);
  border-radius: 8px;
  box-sizing: border-box;
  padding: 17px 18px;
  width: 100%;
  height: unset;
  min-height: 0px;
  max-width: 100%;

  font-family: "Roboto";
  font-style: normal;
  font-weight: 400;
  font-size: 16px;
  line-height: 19px;
  color: #222222;

  &:focus {
    border: 1px solid #232c5e;
    outline: unset;
  }
  &::placeholder {
    display: flex;
    flex-direction: row;
    height: fit-content;
    font-family: "Roboto";
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 19px;
  }
}
//
.message {
  display: flex;
  margin-bottom: 24px;
  width: 70%;
  flex-direction: column;
  align-items: flex-start;
  &:last-of-type {
    margin-bottom: unset;
  }
}
.userName {
  display: flex;
  margin-bottom: 6px;

  font-family: "Roboto";
  font-style: normal;
  font-weight: 400;
  font-size: 16px;
  line-height: 19px;
  color: #5e5e5e;
}
.contentContainer {
  display: flex;
  flex-direction: row;
  width: 100%;
  height: fit-content;
}
.contentOfMessage {
  display: flex;
  position: relative;
  flex-direction: column;
  box-sizing: border-box;
  justify-content: flex-start;
  align-items: flex-start;
  overflow-wrap: anywhere;
  text-align: start;
  background: #f5f5f8;
  border-radius: 8px;
  padding: 16px 17px;
  width: calc(100% - 18px);
  height: fit-content;

  font-family: "Roboto";
  font-style: normal;
  font-weight: 400;
  font-size: 16px;
  line-height: 19px;
}
.time {
  position: absolute;
  display: flex;
  right: 6px;
  bottom: 6px;

  font-family: "Roboto";
  font-style: normal;
  font-weight: 400;
  font-size: 10px;
  line-height: 12px;

  color: #969696;
}
.closeButton {
  cursor: pointer;
  display: flex;
  border: unset;
  background: transparent;
  width: fit-content;
  height: fit-content;
  padding: 3px 0px 0px 8px;
  & > img {
    width: 10px;
    height: 10px;
  }
}
</style>
