import React from "react";
import ChatLayout from "../../components/ChatLayout";
export default function Index({
    user,
    chatRooms,
    chats,
}: {
    user: any;
    chatRooms: any;
    chats: any;
}) {
    return (
        <ChatLayout
            user={user}
            chatRooms={chatRooms}
            chats={chats}
        >
            <div className="col-md-9 text-center">
                <h5 style={{ marginTop: "350px" }} className="main-color">
                    Please select a chat room/direct message or create a new one
                    to start chatting 😃
                </h5>
            </div>
        </ChatLayout>
    );
}
