import React, { useRef } from "react";
import { toast } from "react-toastify";

export default function DirectMessageChatList({
    user,
    myDirectMessages,
}: {
    user: any;
    myDirectMessages: any;
}) {
    const messageRef = useRef<HTMLInputElement>(null);
    const createDirectMessage = (e: any) => {
        e.preventDefault();
        const message = messageRef.current?.value;
        if (!message) {
            toast.error("Please enter a message");
            return;
        }
    };
    return (
        <div className="col-md-9">
            <div className="bg-light chat-body-list">
                <div className="card">
                    <div className="card-body">
                        <h6>
                            <i className="fa fa-check-circle text-success"></i>{" "}
                            {user.name}
                        </h6>
                    </div>
                </div>
                <div className="chat-body">
                    {myDirectMessages.map((message: any) => (
                        <div className="d-flex" key={message.id}>
                            <div>
                                <img
                                    src="https://previews.123rf.com/images/apoev/apoev2107/apoev210700033/171405527-default-avatar-photo-placeholder-gray-profile-picture-icon-business-man-illustration.jpg"
                                    alt=""
                                />
                            </div>
                            <div>
                                <h6>
                                    {message.sender.name}:{" "}
                                    <small>
                                        {message.created_at.toLocaleString()}
                                    </small>
                                </h6>
                                <div className="chat-message">
                                    <p>{message.message}</p>
                                    <hr />
                                </div>
                            </div>
                        </div>
                    ))}
                    {myDirectMessages.length === 0 && (
                        <div className="text-center">
                            <h5 style={{ marginTop: "350px" }}>
                                You have no messages 😃
                            </h5>
                        </div>
                    )}
                </div>
            </div>
            <form className="message-form" onSubmit={createDirectMessage}>
                <div className="input-group mb-3">
                    <input
                        type="text"
                        className="form-control"
                        placeholder="Enter Message"
                        aria-label="Enter Message"
                        aria-describedby="button-addon2"
                        ref={messageRef}
                    />
                    <button className="btn btn-outline-secondary" type="submit">
                        <i className="fa fa-paper-plane"></i>
                    </button>
                </div>
            </form>
        </div>
    );
}
