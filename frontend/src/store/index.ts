import { createStore, Store } from "vuex";
import { InjectionKey } from "vue";
import { encryptData, decryptData } from "@/utils/encryption";
import { setUser, getChatLog, sendMessage, deleteMessage } from "@/utils/chat";

export interface State {
  nickName: string;
  allMessages: Array<unknown>;
  loader: boolean;
}

export const key: InjectionKey<Store<State>> = Symbol();

export const store: Store<State> = createStore({
  state: {
    nickName: "",
    allMessages: [],
    loader: false,
  },
  getters: {
    getNick(state: State) {
      return state.nickName;
    },
    getLoader(state: State) {
      return state.loader;
    },
    getAllMessages(state: State) {
      return JSON.parse(JSON.stringify(state.allMessages));
    },
  },
  mutations: {
    setNickName(state: State, payload) {
      state.nickName = payload;
    },
    setLoader(state: State, payload) {
      state.loader = payload;
    },
    addMessage(state: State, payload) {
      const date = new Date(payload.data.createdAt);
      const h = String(date.getHours());
      const m = String(date.getMinutes());
      const newDate = String(
        (h.length == 1 ? "0" + h : h) + ":" + (m.length == 1 ? "0" + m : m)
      );
      // state.allMessages = [...state.allMessages, decryptData(payload.message)];
      state.allMessages = [
        ...state.allMessages,
        {
          message: decryptData(payload.data.message),

          // message: payload.data.message,
          id: payload.data.id,
          createdAt: newDate,
          nickName: payload.data.nickName,
        },
      ];
    },
    deleteSingleMessage(state, payload) {
      const index = state.allMessages.findIndex(
        (message: any) => message.id == payload
      );
      state.allMessages.splice(index, 1);
    },
  },
  actions: {
    setNick(state, payload) {
      state.commit("setNickName", payload);
    },
    addMessage({ commit, state }, payload) {
      commit("setLoader", true);
      sendMessage(
        JSON.stringify({
          message: encryptData(payload),
          nickName: state.nickName,
        })
      )
        .then((res) => {
          commit("addMessage", res);
          commit("setLoader", false);
        })
        .catch((error) => {
          console.log("Ошибка при отправке сообщения:", error);
          commit("setLoader", false);
        });
    },
    removeMessage({ commit, dispatch, state }, payload) {
      commit("setLoader", true);
      deleteMessage(payload)
        .then((res) => {
          commit("deleteSingleMessage", payload);
          commit("setLoader", false);
        })
        .catch((error) => {
          console.log("Ошибка при удалении сообщения:", error);
          commit("setLoader", false);
        });
    },
    getAllMessages({ commit, state }) {
      commit("setLoader", true);
      getChatLog(state.nickName)
        .then((res) => {
          commit("addMessage", res.data);
          commit("setLoader", false);
        })
        .catch((error) => {
          console.log("Ошибка в получении истории сообщений:", error);
          commit("setLoader", false);
        });
    },
  },
});

export default store;
