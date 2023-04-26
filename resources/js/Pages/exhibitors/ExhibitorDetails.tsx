import React from "react";
import Layout from "../../components/Layout";
import { Link } from "@inertiajs/react";
export default function ExhibitorDetails() {
    return (
        <Layout>
            <div className="three_d_view">
                <div className="container">
                    <div className="bg-view"></div>
                </div>
            </div>
            <div className="container" style={{ paddingBottom: "50px" }}>
                <div className="center-navbar">
                    <div className="row">
                        <div className="col-md-12 text-center">
                            <ul>
                                <li>
                                    <a
                                        href=""
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        Website
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href=""
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        Twitter
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href=""
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        Linkedin
                                    </a>
                                </li>
                                <li>
                                    <Link href="/chat">Chat</Link>
                                </li>
                                <li>
                                    <Link href="/chat">
                                        Reserve a Chat Slot
                                    </Link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div className="tabs mt-3 bg-white">
                    <ul className="nav nav-tabs" id="myTab" role="tablist">
                        <li className="nav-item" role="presentation">
                            <button
                                className="nav-link active"
                                id="description-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#description"
                                type="button"
                                role="tab"
                                aria-controls="description"
                                aria-selected="true"
                            >
                                <i className="fa fa-building"></i> Description
                            </button>
                        </li>
                        <li className="nav-item" role="presentation">
                            <button
                                className="nav-link"
                                id="profile-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#profile"
                                type="button"
                                role="tab"
                                aria-controls="profile"
                                aria-selected="false"
                            >
                                <i className="fa fa-video-camera"></i> Videos
                            </button>
                        </li>
                        <li className="nav-item" role="presentation">
                            <button
                                className="nav-link"
                                id="contact-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#contact"
                                type="button"
                                role="tab"
                                aria-controls="contact"
                                aria-selected="false"
                            >
                                <i className="fa fa-list"></i> Documents
                            </button>
                        </li>
                    </ul>
                    <div className="tab-content" id="myTabContent">
                        <div
                            className="tab-pane fade show active"
                            id="description"
                            role="tabpanel"
                            aria-labelledby="description-tab"
                        >
                            <div className="row">
                                <div className="col-md-12">
                                    <h4>Roche Africa</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. Fugit optio suscipit
                                        atque neque vero, cum dignissimos esse
                                        rerum distinctio similique tenetur nobis
                                        velit repellendus vitae consequatur est
                                        numquam. Sunt animi totam,
                                        necessitatibus veniam explicabo ad
                                        similique dignissimos. Ea, magni. Sint,
                                        necessitatibus facere animi nulla
                                        tempore esse eum odio consequatur fugit!
                                    </p>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. Fugit optio suscipit
                                        atque neque vero, cum dignissimos esse
                                        rerum distinctio similique tenetur nobis
                                        velit repellendus vitae consequatur est
                                        numquam. Sunt animi totam,
                                        necessitatibus veniam explicabo ad
                                        similique dignissimos. Ea, magni. Sint,
                                        necessitatibus facere animi nulla
                                        tempore esse eum odio consequatur fugit!
                                    </p>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. Fugit optio suscipit
                                        atque neque vero, cum dignissimos esse
                                        rerum distinctio similique tenetur nobis
                                        velit repellendus vitae consequatur est
                                        numquam. Sunt animi totam,
                                        necessitatibus veniam explicabo ad
                                        similique dignissimos. Ea, magni. Sint,
                                        necessitatibus facere animi nulla
                                        tempore esse eum odio consequatur fugit!
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            className="tab-pane fade"
                            id="profile"
                            role="tabpanel"
                            aria-labelledby="profile-tab"
                        >
                            <div className="videos-list d-flex justify-content-between">
                                <div>
                                    <h6>Preparing for better farming</h6>
                                </div>
                                <div>
                                    <button className="btn btn-thm btn-lg btn-sm">
                                        View
                                    </button>
                                </div>
                            </div>
                            <div className="videos-list d-flex justify-content-between">
                                <div>
                                    <h6>Preparing for better farming</h6>
                                </div>
                                <div>
                                    <button className="btn btn-thm btn-lg btn-sm">
                                        View
                                    </button>
                                </div>
                            </div>
                            <div className="videos-list d-flex justify-content-between">
                                <div>
                                    <h6>Preparing for better farming</h6>
                                </div>
                                <div>
                                    <button className="btn btn-thm btn-lg btn-sm">
                                        View
                                    </button>
                                </div>
                            </div>
                            <div className="videos-list d-flex justify-content-between">
                                <div>
                                    <h6>Preparing for better farming</h6>
                                </div>
                                <div>
                                    <button className="btn btn-thm btn-lg btn-sm">
                                        View
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div
                            className="tab-pane fade"
                            id="contact"
                            role="tabpanel"
                            aria-labelledby="contact-tab"
                        >
                            <div className="videos-list d-flex justify-content-between">
                                <div>
                                    <h6>Preparing for better farming</h6>
                                </div>
                                <div>
                                    <button className="btn btn-thm btn-lg btn-sm">
                                        View
                                    </button>
                                </div>
                            </div>
                            <div className="videos-list d-flex justify-content-between">
                                <div>
                                    <h6>Preparing for better farming</h6>
                                </div>
                                <div>
                                    <button className="btn btn-thm btn-lg btn-sm">
                                        View
                                    </button>
                                </div>
                            </div>
                            <div className="videos-list d-flex justify-content-between">
                                <div>
                                    <h6>Preparing for better farming</h6>
                                </div>
                                <div>
                                    <button className="btn btn-thm btn-lg btn-sm">
                                        View
                                    </button>
                                </div>
                            </div>
                            <div className="videos-list d-flex justify-content-between">
                                <div>
                                    <h6>Preparing for better farming</h6>
                                </div>
                                <div>
                                    <button className="btn btn-thm btn-lg btn-sm">
                                        View
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Layout>
    );
}
