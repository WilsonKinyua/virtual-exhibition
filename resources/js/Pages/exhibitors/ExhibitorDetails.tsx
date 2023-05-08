import React from "react";
import { Link } from "@inertiajs/react";
import parse from "html-react-parser";
import ReactPlayer from "react-player";
import Layout from "../../components/Layout";

export default function ExhibitorDetails({
    exhibitor,
    user,
}: {
    exhibitor: any;
    user: any;
}) {
    console.log(user);
    console.log(exhibitor);
    return (
        <Layout>
            <div className="three_d_view exhibitor-details">
                <div className="container">
                    <img
                        src={
                            exhibitor.banner
                                ? exhibitor.banner.original_url
                                : ""
                        }
                        alt={exhibitor.name}
                        title={exhibitor.name}
                    />
                </div>
            </div>
            <div className="container" style={{ paddingBottom: "50px" }}>
                <div className="center-navbar">
                    <div className="row">
                        <div className="col-md-10 text-center">
                            <ul>
                                <li>
                                    <a
                                        href={exhibitor.website_url}
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        Website
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href={exhibitor.twitter_url}
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        Twitter
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href={exhibitor.linkedin_url}
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
                        {exhibitor.admins.map((admin: any) => {
                            if (admin.id === user.id) {
                                return (
                                    <div className="col-md-2 text-center">
                                        <a
                                            href={`/profile/${exhibitor.slug}/exhibitor`}
                                            className="btn btn-sm mt-2 btn-primary"
                                        >
                                            Edit This Profile
                                        </a>
                                    </div>
                                );
                            }
                        })}
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
                                    <h4>{exhibitor.name}</h4>
                                    <p>{parse(exhibitor.description)}</p>
                                </div>
                            </div>
                        </div>
                        <div
                            className="tab-pane fade"
                            id="profile"
                            role="tabpanel"
                            aria-labelledby="profile-tab"
                        >
                            {exhibitor.exhibitor_video.length > 0 &&
                                exhibitor.exhibitor_video.map((video: any) => (
                                    <div
                                        key={video.id}
                                        className="videos-list d-flex justify-content-between"
                                    >
                                        <div>
                                            <h6>{video.title}</h6>
                                        </div>
                                        <div>
                                            <button
                                                data-bs-toggle="modal"
                                                data-bs-target={`#example${video.slug}Modal`}
                                                className="btn btn-thm btn-lg btn-sm"
                                            >
                                                View
                                            </button>
                                        </div>
                                        <div
                                            className="modal fade"
                                            id={`#example${video.slug}Modal`}
                                            tabIndex={-1}
                                            aria-labelledby="exampleModalLabel"
                                            aria-hidden="true"
                                        >
                                            <div className="modal-dialog modal-dialog-centered">
                                                <div className="modal-content">
                                                    {/* <div className="modal-header">
                                                        <button
                                                            type="button"
                                                            className="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"
                                                        ></button>
                                                    </div> */}
                                                    <div className="">
                                                        <ReactPlayer
                                                            controls={true}
                                                            url={
                                                                video.video
                                                                    .original_url
                                                            }
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                ))}
                        </div>
                        <div
                            className="tab-pane fade"
                            id="contact"
                            role="tabpanel"
                            aria-labelledby="contact-tab"
                        >
                            {exhibitor.exhibitor_document.length > 0 &&
                                exhibitor.exhibitor_document.map(
                                    (document: any) => (
                                        <div
                                            key={document.id}
                                            className="videos-list d-flex justify-content-between"
                                        >
                                            <div>
                                                <h6>{document.title}</h6>
                                            </div>
                                            <div>
                                                <a
                                                    href={
                                                        document.document
                                                            .original_url
                                                    }
                                                    target="_blank"
                                                    className="btn btn-thm btn-lg btn-sm"
                                                >
                                                    View
                                                </a>
                                            </div>
                                        </div>
                                    )
                                )}
                        </div>
                    </div>
                </div>
            </div>
        </Layout>
    );
}
