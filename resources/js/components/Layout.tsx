import React from "react";
import Navbar from "./Navbar";
import { ToastContainer } from "react-toastify";
export default function Layout({ children }: { children: React.ReactNode }) {
    return (
        <div className="bg-dark">
            <Navbar />
            <main className="client-dashboard">{children}</main>
            <ToastContainer />
        </div>
    );
}
