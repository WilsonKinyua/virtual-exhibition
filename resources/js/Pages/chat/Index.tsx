import React from "react";
import ChatLayout from "../../components/ChatLayout";
export default function Index({
    user,
    chatRooms,
    joinUserChatRooms,
    chats,
}: {
    user: any;
    chatRooms: any;
    joinUserChatRooms: any;
    chats: any;
}) {
    return (
        <ChatLayout
            user={user}
            chatRooms={chatRooms}
            userJoinedChatRooms={joinUserChatRooms}
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
