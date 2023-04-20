import { Link } from "@inertiajs/react";
import React from "react";
export default function Navbar() {
    return (
        <nav className="navbar navbar-expand-lg">
            <div className="container">
                <button
                    className="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <i className="fa fa-bars text-white"></i>
                </button>
                <div
                    className="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <ul className="navbar-nav mb-2 mb-lg-0">
                        <li className="nav-item">
                            <Link className="nav-link" href="/">
                                <i className="fa fa-list"></i> Auditorium
                            </Link>
                        </li>
                        <li className="nav-item">
                            <Link className="nav-link" href="/">
                                <i className="fa fa-briefcase-blank"></i>{" "}
                                Confrence Bag
                            </Link>
                        </li>
                        <li className="nav-item">
                            <Link className="nav-link" href="/">
                                <i className="fa fa-building"></i> Exhibit Hall
                            </Link>
                        </li>
                        <li className="nav-item">
                            <Link className="nav-link" href="/">
                                <i className="fa fa-circle-question"></i>{" "}
                                Information Desk
                            </Link>
                        </li>
                        <li className="nav-item">
                            <Link className="nav-link" href="/">
                                <i className="fa fa-building"></i> Lobby
                            </Link>
                        </li>
                        <li className="nav-item">
                            <Link className="nav-link" href="/">
                                <i className="fa fa-camera"></i> Media Rooms
                            </Link>
                        </li>
                        <li className="nav-item">
                            <Link className="nav-link" href="/">
                                <i className="fa fa-comment"></i> Networking
                            </Link>
                        </li>
                        <li className="nav-item">
                            <Link className="nav-link" href="/">
                                <i className="fa fa-bookmark"></i> Resources
                            </Link>
                        </li>
                        <li className="nav-item">
                            <Link className="nav-link" href="/">
                                <i className="fa fa-video"></i> Video Vault
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    );
}
