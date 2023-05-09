<template>
  <div class="mainContainer">
    <ChatComponent msg="Welcome to Your Vue.js + TypeScript App" />
    <AuthorizationComponent />
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import ChatComponent from "@/components/Chat.vue";
import AuthorizationComponent from "@/components/Authorization.vue";

export default defineComponent({
  name: "ChatView",
  components: {
    ChatComponent,
    AuthorizationComponent,
  },
});
</script>

<style scoped lang="scss">
.mainContainer {
  display: flex;
  flex-direction: row;
  align-items: flex-start;
  justify-content: center;
  column-gap: 130px;
  width: 100%;
  max-width: 1520px;
}
</style>
