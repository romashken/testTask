<template>
  <div class="message">
    <span class="userName">User</span>
    <div class="contentContainer">
      <div class="content">3212233</div>
      <button class="closeButton">
        <img src="../../public/icons/CloseCross.svg" />
      </button>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  name: "MessageComponent",
  props: {
    for: String,
  },
});
</script>

<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");
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
}
.content {
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: flex-start;
  background: #f5f5f8;
  border-radius: 8px;
  padding: 16px 17px;
  width: calc(100% - 18px);

  font-family: "Roboto";
  font-style: normal;
  font-weight: 400;
  font-size: 16px;
  line-height: 19px;
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
