import { createRouter, createWebHashHistory, RouteRecordRaw } from "vue-router";
import HomeView from "../views/HomeView.vue";
import ChatViewVue from "../views/ChatView.vue";

const routes: Array<RouteRecordRaw> = [
  {
    path: "/",
    name: "home",
    // component: HomeView,
    component: () => import("../views/ChatView.vue"),
  },
  {
    path: "/chat",
    name: "chat",
    component: () => import("../views/ChatView.vue"),
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
