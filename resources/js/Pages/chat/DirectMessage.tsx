import React, { useEffect } from "react";
import ChatLayout from "../../components/ChatLayout";
import DirectMessageChatList from "../../components/DirectMessageChatList";

export default function DirectMessage({
    user,
    chatRooms,
    joinUserChatRooms,
    chats,
    directMessageUser,
}: {
    user: any;
    chatRooms: any;
    joinUserChatRooms: any;
    chats: any;
    directMessageUser: any;
}) {
    console.log(chats);
    useEffect(() => {
        // Function to remove the element on component load
        const removeBackdrop = () => {
            const backdrop = document.querySelector(
                ".modal-backdrop.fade.show"
            );
            if (backdrop) {
                backdrop.remove();
            }
        };

        // Call the function to remove the element
        removeBackdrop();
    }, []);
    return (
        <ChatLayout
            user={user}
            chatRooms={chatRooms}
            userJoinedChatRooms={joinUserChatRooms}
            chats={chats}
        >
            <DirectMessageChatList user={directMessageUser} chats={chats} />
        </ChatLayout>
    );
}
