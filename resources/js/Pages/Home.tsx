import React, { useRef, useState } from "react";
import Layout from "../components/Layout";
import { Link } from "@inertiajs/react";
export default function Home({ exhibitors }: { exhibitors: [] }) {
    console.log(exhibitors);
    const [isDragging, setIsDragging] = useState<boolean>(false);
    const [startX, setStartX] = useState<number | null>(null);
    const [scrollLeft, setScrollLeft] = useState<number>(0);
    const containerRef = useRef<HTMLDivElement | null>(null);

    const handleMouseDown = (event: React.MouseEvent<HTMLDivElement>) => {
        setIsDragging(true);
        setStartX(event.pageX - containerRef.current!.offsetLeft);
        setScrollLeft(containerRef.current!.scrollLeft);
    };

    const handleMouseMove = (event: React.MouseEvent<HTMLDivElement>) => {
        if (!isDragging) return;
        event.preventDefault();
        const x = event.pageX - containerRef.current!.offsetLeft;
        const distance = x - (startX as number);
        containerRef.current!.scrollLeft = scrollLeft - distance;
    };

    const handleMouseUp = () => {
        setIsDragging(false);
    };

    return (
        <Layout>
            <div className="three_d_view">
                <div className="container" ref={containerRef}>
                    <div
                        className="three_d_view_img_list"
                        onMouseDown={handleMouseDown}
                        onMouseMove={handleMouseMove}
                        onMouseUp={handleMouseUp}
                    >
                        {exhibitors.map((exhibitor: { [x: string]: any }) => {
                            if (exhibitor.banner != null) {
                                return (
                                    <Link
                                        key={exhibitor.id}
                                        href={`/exhibitor/${exhibitor.slug}/details`}
                                    >
                                        <img
                                            className="three_d_view_img"
                                            src={exhibitor.banner.original_url}
                                            alt={exhibitor.name}
                                            title="Scroll to view more"
                                        />
                                    </Link>
                                );
                            }
                        })}
                    </div>
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
                                    {exhibitors.map(
                                        (exhibitor: { [x: string]: any }) => (
                                            <li key={exhibitor.id}>
                                                <Link
                                                    href={`/exhibitor/${exhibitor.slug}/details`}
                                                >
                                                    {exhibitor.name}
                                                </Link>
                                            </li>
                                        )
                                    )}
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
                            <div className="card-body pt-3 logos_landing text-center">
                                {exhibitors.map(
                                    (exhibitor: { [x: string]: any }) => (
                                        <img
                                            key={exhibitor.id}
                                            src={exhibitor.logo.original_url}
                                            alt={exhibitor.name}
                                            title="Scroll to view more"
                                        />
                                    )
                                )}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Layout>
    );
}
