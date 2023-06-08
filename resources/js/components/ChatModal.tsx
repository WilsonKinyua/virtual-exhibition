import React, { useState } from "react";
import { toast } from "react-toastify";
import { router, usePage } from "@inertiajs/react";

export default function ChatModal() {
    const { errors } = usePage().props;
    const [recipientEmail, setRecipientEmail] = useState("");

    const handleRecipientEmailSubmit = (e: any) => {
        e.preventDefault();
        console.log(recipientEmail);
        if (recipientEmail === "") {
            toast.error("Please enter a valid email address");
            return;
        }
        // toast.success("Chat started successfully");
        router.post("/chat/create/direct-message", {
            email: recipientEmail,
        });
    };
    return (
        <div
            className="modal fade"
            id="chatMessageModal"
            tabIndex={-1}
            aria-labelledby="chatMessageModalLabel"
            aria-hidden="true"
        >
            <div className="modal-dialog modal-dialog-centered">
                <div className="modal-content">
                    <div className="modal-header">
                        <h1
                            className="modal-title fs-5"
                            id="chatMessageModalLabel"
                        >
                            Send a Direct Message
                        </h1>
                        <button
                            type="button"
                            className="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div className="modal-body">
                        <form
                            className="recipient-form"
                            method="POST"
                            onSubmit={handleRecipientEmailSubmit}
                        >
                            <div className="mb-3">
                                <label
                                    htmlFor="recipient-name"
                                    className="col-form-label required"
                                >
                                    Recipient's Email:
                                </label>
                                <input
                                    type="email"
                                    className="form-control"
                                    id="recipient-email"
                                    name="recipient-email"
                                    value={recipientEmail}
                                    onChange={(e) =>
                                        setRecipientEmail(e.target.value)
                                    }
                                />
                                {errors.email && (
                                    <div className="text-danger">
                                        <small>{errors.email}</small>
                                    </div>
                                )}
                            </div>
                            <button type="submit" className="btn btn-primary">
                                Start Chat
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    );
}
