import React from "react";
import { ToastContainer } from "react-toastify";
import { Link } from "@inertiajs/react";
import ChatModal from "./ChatModal";
export default function ChatLayout({
    children,
    user,
    chatRooms,
    userJoinedChatRooms,
    chats,
}: {
    children: React.ReactNode;
    user: any;
    chatRooms: any;
    userJoinedChatRooms: any;
    chats: any;
}) {
    console.log(chats);
    return (
        <>
            <nav className="navbar-chat navbar bg-dark">
                <div className="container">
                    <Link href="/" className="navbar-brand">
                        <img
                            src="https://africacacongress.org/img/logo-white.png"
                            alt="Company Logo"
                        />
                    </Link>
                    <div className="d-flex">
                        <ul className="navbar-nav me-auto">
                            <li className="nav-item dropdown">
                                <div className="profile-avatar">
                                    <img
                                        src="https://previews.123rf.com/images/apoev/apoev2107/apoev210700033/171405527-default-avatar-photo-placeholder-gray-profile-picture-icon-business-man-illustration.jpg"
                                        alt=""
                                    />
                                </div>
                                <Link
                                    className="nav-link dropdown-toggle text-white"
                                    href="#"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    {user.name}
                                </Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div className="container chat">
                <div className="row mt-3">
                    <div className="col-md-2">
                        <div className="chat-list">
                            <div className="card">
                                <div className="card-body">
                                    <div className="d-flex justify-content-between chat-header">
                                        <h6 className="mt-2">
                                            Direct Messages{" "}
                                            <i
                                                className="fa fa-plus create-message"
                                                data-bs-toggle="modal"
                                                data-bs-target="#chatMessageModal"
                                            ></i>
                                        </h6>
                                        <ChatModal />
                                        <div className="dropdown">
                                            <button
                                                className="btn dropdown-toggle"
                                                type="button"
                                                id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                            ></button>
                                        </div>
                                    </div>
                                    <ul className="chat-container">
                                        <li>
                                            {chats.map((chat: any) => (
                                                <Link
                                                    href={`/chat/${chat.sender.slug}/direct-message`}
                                                    key={chat.id}
                                                >
                                                    <div className="d-flex">
                                                        <img
                                                            src="https://previews.123rf.com/images/apoev/apoev2107/apoev210700033/171405527-default-avatar-photo-placeholder-gray-profile-picture-icon-business-man-illustration.jpg"
                                                            alt=""
                                                        />
                                                        <p>
                                                            {chat.sender.name}
                                                        </p>
                                                    </div>
                                                </Link>
                                            ))}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div className="card">
                                <div className="card-body">
                                    <div className="d-flex justify-content-between chat-header">
                                        <h6 className="mt-2">
                                            Joined Chatrooms
                                        </h6>
                                        <div className="dropdown">
                                            <button
                                                className="btn dropdown-toggle"
                                                type="button"
                                                id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                            ></button>
                                        </div>
                                    </div>
                                    <ul className="chat-container">
                                        {userJoinedChatRooms.map(
                                            (chatRoom: any) => (
                                                <li key={chatRoom.id}>
                                                    <Link href="">
                                                        <p className="text-capitalize">
                                                            <i className="fa fa-check-circle"></i>{" "}
                                                            {chatRoom.name}
                                                        </p>
                                                    </Link>
                                                </li>
                                            )
                                        )}
                                    </ul>
                                </div>
                            </div>
                            <div className="card">
                                <div className="card-body">
                                    <div className="d-flex justify-content-between chat-header">
                                        <h6 className="mt-2">All Chatrooms</h6>
                                        <div className="dropdown">
                                            <button
                                                className="btn dropdown-toggle"
                                                type="button"
                                                id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                            ></button>
                                        </div>
                                    </div>
                                    <ul className="chat-container">
                                        {chatRooms.map((chatRoom: any) => (
                                            <li key={chatRoom.id}>
                                                <Link href="">
                                                    <p className="text-capitalize">
                                                        <i className="fa fa-check-circle"></i>{" "}
                                                        {chatRoom.name}
                                                    </p>
                                                </Link>
                                            </li>
                                        ))}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    {children}
                </div>
            </div>
            <ToastContainer />
        </>
    );
}
