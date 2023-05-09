<template>
  <div class="authorization">
    <div class="content">
      <span>Введите логин</span>
      <input
        type="text"
        id="login"
        v-model="nickName"
        @blur="updateStore"
        @keyup.enter="blur"
        placeholder=""
      />
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import { mapActions } from "vuex";
import store from "@/store";

export default defineComponent({
  name: "AuthorizationComponent",
  data() {
    return {
      nickName: "",
    };
  },
  methods: {
    ...mapActions({
      setNick: "setNick",
    }),
    blur(e: any) {
      e.target.blur();
    },
    updateStore() {
      store.commit("setNickName", this.nickName);
    },
  },
  mounted() {
    let lastNick = localStorage.getItem("nickName");
    if (lastNick) {
      this.nickName = lastNick;
      this.setNick(lastNick);
    }
  },
});
</script>

<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");
.authorization {
  margin-top: 21px;
  display: flex;
  flex-direction: column;
  padding: 38px 30px 52px;
  border: 1px solid rgba(35, 44, 94, 0.21);
  border-radius: 8px;
  box-shadow: 0px 6px 25px rgba(19, 35, 68, 0.1);
}
.content {
  display: flex;
  flex-direction: column;
  width: 100%;
  align-items: flex-start;
  row-gap: 6px;
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
</style>
