import { instance } from "./instance";

export const setUser = () => {
  return instance.get("/setUser");
};

export const getChatLog = (data: any) => {
  return instance.get("/messages", { params: { name: data } });
};

export const sendMessage = (data: any) => {
  return instance.post("/send", data);
};

export const deleteMessage = (id: string) => {
  return instance.delete("/delete", { params: { id: id } });
};
