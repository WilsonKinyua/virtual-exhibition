import React, { useRef, useEffect } from "react";
import { toast } from "react-toastify";
import { router, usePage, Link } from "@inertiajs/react";
import ChatLayout from "../../components/ChatLayout";

export default function ChatRoomConversation({
    user,
    chatRooms,
    chats,
    chatRoomChats,
    exhibitorOwnerChatRoom,
}: {
    user: any;
    chatRooms: any;
    chats: any;
    chatRoomChats: any;
    exhibitorOwnerChatRoom: any;
}) {
    const messageRef = useRef<HTMLInputElement>(null);
    const { errors } = usePage().props;
    const createDirectMessage = (e: any) => {
        e.preventDefault();
        const message = messageRef.current?.value;
        if (!message) {
            toast.error("Please enter a message");
            return;
        }
        router.post("/chat-create/direct-message", {
            chat_room_id: exhibitorOwnerChatRoom.id,
            message,
        });
        messageRef.current!.value = "";
    };
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
        <ChatLayout user={user} chatRooms={chatRooms} chats={chats}>
            <div className="col-md-10">
                <div className="bg-light chat-body-list">
                    <div className="card">
                        <div className="card-body">
                            <h6>
                                <i className="fa fa-check-circle"></i>{" "}
                                {exhibitorOwnerChatRoom.exhibitor.name}{" "}
                                <sup>
                                    <Link
                                        href={`/exhibitor/${exhibitorOwnerChatRoom.exhibitor.slug}/details`}
                                        className="main-color"
                                    >
                                        <small>Visit Booth</small>
                                    </Link>
                                </sup>
                            </h6>
                        </div>
                    </div>
                    <div className="chat-body">
                        {chatRoomChats.map((chat: any) => (
                            <div className="d-flex">
                                <div>
                                    <img
                                        src="https://previews.123rf.com/images/apoev/apoev2107/apoev210700033/171405527-default-avatar-photo-placeholder-gray-profile-picture-icon-business-man-illustration.jpg"
                                        alt=""
                                    />
                                </div>
                                <div>
                                    <h6 className="text-capitalize">
                                        {chat.sender.name}:{" "}
                                        <small>
                                            {chat.created_at.toLocaleString()}
                                        </small>
                                    </h6>
                                    <div className="chat-message">
                                        <p>{chat.message}</p>
                                        <hr />
                                    </div>
                                </div>
                            </div>
                        ))}
                        {chatRoomChats.length === 0 && (
                            <div className="text-center text-danger">
                                <h5 style={{ marginTop: "220px" }}>
                                    No messages yet
                                </h5>
                                <p className="text-danger">
                                    Send a message to start a conversation
                                </p>
                            </div>
                        )}
                    </div>
                </div>
                <form className="message-form" onSubmit={createDirectMessage}>
                    <div className="input-group mb-3">
                        <input
                            type="text"
                            className={
                                errors.message
                                    ? "form-control is-invalid"
                                    : "form-control"
                            }
                            placeholder="Enter Message"
                            aria-label="Enter Message"
                            aria-describedby="button-addon2"
                            ref={messageRef}
                        />
                        <button
                            className="btn btn-outline-secondary"
                            type="submit"
                        >
                            <i className="fa fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </ChatLayout>
    );
}
