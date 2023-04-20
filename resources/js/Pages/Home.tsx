import React from "react";
import Layout from "../components/Layout";
import { Link } from "@inertiajs/react";
export default function Home() {
    return (
        <Layout>
            <div className="three_d_view">
                <div className="container">
                    <div className="bg-view"></div>
                </div>
            </div>
            <div className="container">
                <div className="row intro">
                    <div className="col-md-4">
                        <div className="card">
                            <h5 className="card__title-inner">
                                Exhibitors Index
                            </h5>
                            <div className="card-body">
                                <ul>
                                    <li>
                                        <Link href="/">Amref Enterprises</Link>
                                    </li>
                                    <li>
                                        <Link href="/">Amref Enterprises</Link>
                                    </li>
                                    <li>
                                        <Link href="/">Amref Enterprises</Link>
                                    </li>
                                    <li>
                                        <Link href="/">Amref Enterprises</Link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-4">
                        <div className="card">
                            <h5 className="card__title-inner">How it works</h5>
                            <div className="card-body pt-3">
                                <p>
                                    1. Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Minima, accusamus.
                                </p>
                                <p>
                                    2. Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Minima, accusamus.
                                </p>
                                <p>
                                    3. Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Minima, accusamus.
                                </p>
                                <p>
                                    4. Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Minima, accusamus.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-4">
                        <div className="card">
                            <div className="card-body pt-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </Layout>
    );
}
