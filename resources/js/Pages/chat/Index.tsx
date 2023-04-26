import { Link } from "@inertiajs/react";
import React from "react";
export default function Index({ user }: { user: any }) {
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
                                            Direct Messages
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
                                        <li>
                                            <Link href="">
                                                <div className="d-flex">
                                                    <img
                                                        src="https://previews.123rf.com/images/apoev/apoev2107/apoev210700033/171405527-default-avatar-photo-placeholder-gray-profile-picture-icon-business-man-illustration.jpg"
                                                        alt=""
                                                    />
                                                    <p>John Doe</p>
                                                </div>
                                            </Link>
                                        </li>
                                        <li>
                                            <Link href="">
                                                <div className="d-flex">
                                                    <img
                                                        src="https://previews.123rf.com/images/apoev/apoev2107/apoev210700033/171405527-default-avatar-photo-placeholder-gray-profile-picture-icon-business-man-illustration.jpg"
                                                        alt=""
                                                    />
                                                    <p>John Doe</p>
                                                </div>
                                            </Link>
                                        </li>
                                        <li>
                                            <Link href="">
                                                <div className="d-flex">
                                                    <img
                                                        src="https://previews.123rf.com/images/apoev/apoev2107/apoev210700033/171405527-default-avatar-photo-placeholder-gray-profile-picture-icon-business-man-illustration.jpg"
                                                        alt=""
                                                    />
                                                    <p>John Doe</p>
                                                </div>
                                            </Link>
                                        </li>
                                        <li>
                                            <Link href="">
                                                <div className="d-flex">
                                                    <img
                                                        src="https://previews.123rf.com/images/apoev/apoev2107/apoev210700033/171405527-default-avatar-photo-placeholder-gray-profile-picture-icon-business-man-illustration.jpg"
                                                        alt=""
                                                    />
                                                    <p>John Doe</p>
                                                </div>
                                            </Link>
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
                                        <li>
                                            <Link href="">
                                                <p>
                                                    <i className="fa fa-check-circle"></i>{" "}
                                                    Roche
                                                </p>
                                            </Link>
                                        </li>
                                        <li>
                                            <Link href="">
                                                <p>
                                                    {" "}
                                                    <i className="fa fa-check-circle"></i>{" "}
                                                    Amref Health Africa
                                                </p>
                                            </Link>
                                        </li>
                                        <li>
                                            <Link href="">
                                                <p>
                                                    <i className="fa fa-check-circle"></i>{" "}
                                                    Amref Health Africa
                                                </p>
                                            </Link>
                                        </li>
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
                                        <li>
                                            <Link href="">
                                                <p>
                                                    <i className="fa fa-check-circle"></i>{" "}
                                                    Roche
                                                </p>
                                            </Link>
                                        </li>
                                        <li>
                                            <Link href="">
                                                <p>
                                                    {" "}
                                                    <i className="fa fa-check-circle"></i>{" "}
                                                    Amref Health Africa
                                                </p>
                                            </Link>
                                        </li>
                                        <li>
                                            <Link href="">
                                                <p>
                                                    <i className="fa fa-check-circle"></i>{" "}
                                                    Amref Health Africa
                                                </p>
                                            </Link>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-9">
                        <div className="bg-light chat-body-list">
                            <div className="card">
                                <div className="card-body">
                                    <h6>
                                        <i className="fa fa-check-circle"></i>{" "}
                                        Amref Health Africa{" "}
                                        <sup>
                                            <Link
                                                href=""
                                                className="main-color"
                                            >
                                                <small>Visit Booth</small>
                                            </Link>
                                        </sup>
                                    </h6>
                                </div>
                            </div>
                            <div className="chat-body">
                                <div className="d-flex">
                                    <div>
                                        <img
                                            src="https://previews.123rf.com/images/apoev/apoev2107/apoev210700033/171405527-default-avatar-photo-placeholder-gray-profile-picture-icon-business-man-illustration.jpg"
                                            alt=""
                                        />
                                    </div>
                                    <div>
                                        <h6>
                                            Amref TZ Frida Ngalesoni:{" "}
                                            <small>March 08, 6:18pm</small>
                                        </h6>
                                        <div className="chat-message">
                                            <p>
                                                Lorem ipsum dolor sit, amet
                                                consectetur adipisicing elit.
                                                Culpa, exercitationem aspernatur
                                                libero optio explicabo illo,
                                                alias ex quo voluptas tenetur
                                                voluptatem, suscipit
                                                consequuntur. Quibusdam itaque
                                                at optio esse, officia sed nam
                                                dolorum eaque minus nisi quos
                                                sunt sapiente ratione adipisci.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit, amet
                                                consectetur adipisicing elit.
                                                Culpa, exercitationem aspernatur
                                                libero optio explicabo illo,
                                                alias ex quo voluptas tenetur
                                                voluptatem, suscipit
                                                consequuntur. Quibusdam itaque
                                                at optio esse, officia sed nam
                                                dolorum eaque minus nisi quos
                                                sunt sapiente ratione adipisci.
                                            </p>
                                            <hr />
                                        </div>
                                    </div>
                                </div>
                                <div className="d-flex">
                                    <div>
                                        <img
                                            src="https://previews.123rf.com/images/apoev/apoev2107/apoev210700033/171405527-default-avatar-photo-placeholder-gray-profile-picture-icon-business-man-illustration.jpg"
                                            alt=""
                                        />
                                    </div>
                                    <div>
                                        <h6>
                                            Amref TZ Frida Ngalesoni:{" "}
                                            <small>March 08, 6:18pm</small>
                                        </h6>
                                        <div className="chat-message">
                                            <p>
                                                Lorem ipsum dolor sit, amet
                                                consectetur adipisicing elit.
                                                Culpa, exercitationem aspernatur
                                                libero optio explicabo illo,
                                                alias ex quo voluptas tenetur
                                                voluptatem, suscipit
                                                consequuntur. Quibusdam itaque
                                                at optio esse, officia sed nam
                                                dolorum eaque minus nisi quos
                                                sunt sapiente ratione adipisci.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit, amet
                                                consectetur adipisicing elit.
                                                Culpa, exercitationem aspernatur
                                                libero optio explicabo illo,
                                                alias ex quo voluptas tenetur
                                                voluptatem, suscipit
                                                consequuntur. Quibusdam itaque
                                                at optio esse, officia sed nam
                                                dolorum eaque minus nisi quos
                                                sunt sapiente ratione adipisci.
                                            </p>
                                            <hr />
                                        </div>
                                    </div>
                                </div>
                                <div className="d-flex">
                                    <div>
                                        <img
                                            src="https://previews.123rf.com/images/apoev/apoev2107/apoev210700033/171405527-default-avatar-photo-placeholder-gray-profile-picture-icon-business-man-illustration.jpg"
                                            alt=""
                                        />
                                    </div>
                                    <div>
                                        <h6>
                                            Amref TZ Frida Ngalesoni:{" "}
                                            <small>March 08, 6:18pm</small>
                                        </h6>
                                        <div className="chat-message">
                                            <p>
                                                Lorem ipsum dolor sit, amet
                                                consectetur adipisicing elit.
                                                Culpa, exercitationem aspernatur
                                                libero optio explicabo illo,
                                                alias ex quo voluptas tenetur
                                                voluptatem, suscipit
                                                consequuntur. Quibusdam itaque
                                                at optio esse, officia sed nam
                                                dolorum eaque minus nisi quos
                                                sunt sapiente ratione adipisci.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit, amet
                                                consectetur adipisicing elit.
                                                Culpa, exercitationem aspernatur
                                                libero optio explicabo illo,
                                                alias ex quo voluptas tenetur
                                                voluptatem, suscipit
                                                consequuntur. Quibusdam itaque
                                                at optio esse, officia sed nam
                                                dolorum eaque minus nisi quos
                                                sunt sapiente ratione adipisci.
                                            </p>
                                            <hr />
                                        </div>
                                    </div>
                                </div>
                                <div className="d-flex">
                                    <div>
                                        <img
                                            src="https://previews.123rf.com/images/apoev/apoev2107/apoev210700033/171405527-default-avatar-photo-placeholder-gray-profile-picture-icon-business-man-illustration.jpg"
                                            alt=""
                                        />
                                    </div>
                                    <div>
                                        <h6>
                                            Amref TZ Frida Ngalesoni:{" "}
                                            <small>March 08, 6:18pm</small>
                                        </h6>
                                        <div className="chat-message">
                                            <p>
                                                Lorem ipsum dolor sit, amet
                                                consectetur adipisicing elit.
                                                Culpa, exercitationem aspernatur
                                                libero optio explicabo illo,
                                                alias ex quo voluptas tenetur
                                                voluptatem, suscipit
                                                consequuntur. Quibusdam itaque
                                                at optio esse, officia sed nam
                                                dolorum eaque minus nisi quos
                                                sunt sapiente ratione adipisci.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit, amet
                                                consectetur adipisicing elit.
                                                Culpa, exercitationem aspernatur
                                                libero optio explicabo illo,
                                                alias ex quo voluptas tenetur
                                                voluptatem, suscipit
                                                consequuntur. Quibusdam itaque
                                                at optio esse, officia sed nam
                                                dolorum eaque minus nisi quos
                                                sunt sapiente ratione adipisci.
                                            </p>
                                            <hr />
                                        </div>
                                    </div>
                                </div>
                                <div className="d-flex">
                                    <div>
                                        <img
                                            src="https://previews.123rf.com/images/apoev/apoev2107/apoev210700033/171405527-default-avatar-photo-placeholder-gray-profile-picture-icon-business-man-illustration.jpg"
                                            alt=""
                                        />
                                    </div>
                                    <div>
                                        <h6>
                                            Amref TZ Frida Ngalesoni:{" "}
                                            <small>March 08, 6:18pm</small>
                                        </h6>
                                        <div className="chat-message">
                                            <p>
                                                Lorem ipsum dolor sit, amet
                                                consectetur adipisicing elit.
                                                Culpa, exercitationem aspernatur
                                                libero optio explicabo illo,
                                                alias ex quo voluptas tenetur
                                                voluptatem, suscipit
                                                consequuntur. Quibusdam itaque
                                                at optio esse, officia sed nam
                                                dolorum eaque minus nisi quos
                                                sunt sapiente ratione adipisci.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit, amet
                                                consectetur adipisicing elit.
                                                Culpa, exercitationem aspernatur
                                                libero optio explicabo illo,
                                                alias ex quo voluptas tenetur
                                                voluptatem, suscipit
                                                consequuntur. Quibusdam itaque
                                                at optio esse, officia sed nam
                                                dolorum eaque minus nisi quos
                                                sunt sapiente ratione adipisci.
                                            </p>
                                            <hr />
                                        </div>
                                    </div>
                                </div>
                                <div className="d-flex">
                                    <div>
                                        <img
                                            src="https://previews.123rf.com/images/apoev/apoev2107/apoev210700033/171405527-default-avatar-photo-placeholder-gray-profile-picture-icon-business-man-illustration.jpg"
                                            alt=""
                                        />
                                    </div>
                                    <div>
                                        <h6>
                                            Amref TZ Frida Ngalesoni:{" "}
                                            <small>March 08, 6:18pm</small>
                                        </h6>
                                        <div className="chat-message">
                                            <p>
                                                Lorem ipsum dolor sit, amet
                                                consectetur adipisicing elit.
                                                Culpa, exercitationem aspernatur
                                                libero optio explicabo illo,
                                                alias ex quo voluptas tenetur
                                                voluptatem, suscipit
                                                consequuntur. Quibusdam itaque
                                                at optio esse, officia sed nam
                                                dolorum eaque minus nisi quos
                                                sunt sapiente ratione adipisci.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit, amet
                                                consectetur adipisicing elit.
                                                Culpa, exercitationem aspernatur
                                                libero optio explicabo illo,
                                                alias ex quo voluptas tenetur
                                                voluptatem, suscipit
                                                consequuntur. Quibusdam itaque
                                                at optio esse, officia sed nam
                                                dolorum eaque minus nisi quos
                                                sunt sapiente ratione adipisci.
                                            </p>
                                            <hr />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form className="message-form">
                            <div className="input-group mb-3">
                                <input
                                    type="text"
                                    className="form-control"
                                    placeholder="Enter Message"
                                />
                                <button
                                    className="btn btn-outline-secondary"
                                    type="button"
                                >
                                    <i className="fa fa-paper-plane"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </>
    );
}
